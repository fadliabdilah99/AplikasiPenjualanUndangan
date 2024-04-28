<?php

namespace App\Http\Controllers;

use App\Models\mindtrans;
use App\Models\pdua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class midtransController extends Controller
{
    protected $response = [];

    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }



    public function store(Request $request)
    {
        // dd('fadli');
        DB::transaction(function () use ($request) {
            $donation = mindtrans::create([
                'No' => $request->No,
                'undangan_id' => $request->undangan_id,
                'donation_code' => 'sandbox-' . uniqid(),
                'donor_name' => $request->donor_name,
                'donor_email' => $request->donor_email,
                'donation_type' => $request->donation_type,
                'amount' => floatval($request->amount),
                'note' => $request->note,
            ]);

            $payload = [
                'transaction_details' => [
                    'order_id'      => $donation->donation_code,
                    'gross_amount'  => $donation->amount,
                ],
                'customer_details' => [
                    'first_name'    => $donation->donor_name,
                    'email'         => $donation->donor_email,
                    // 'phone'         => '08888888888',
                    // 'address'       => '',
                ],
                'item_details' => [
                    [
                        'id'       => $donation->donation_type,
                        'price'    => $donation->amount,
                        'quantity' => 1,
                        'name'     => ucwords(str_replace('_', ' ', $donation->donation_type))
                    ]
                ]
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($payload);
            $donation->snap_token = $snapToken;
            $donation->save();

            $this->response['snap_token'] = $snapToken;
        });

        return response()->json($this->response);
    }

    public function notification(Request $request)
    {
        // dd('anjai');
        // Menerima payload notifikasi dari Midtrans
        $payload = $request->getContent();

        // Log payload notifikasi
        Log::info('Midtrans Notification Received:');
        Log::info($payload);

        // Parsing payload JSON
        $notification = json_decode($payload);

        // Mendapatkan data yang relevan dari notifikasi
        $transactionStatus = $notification->transaction_status;
        $paymentType = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraudStatus = $notification->fraud_status;

        // Temukan donasi berdasarkan ID pesanan
        $donation = mindtrans::where('donation_code', $orderId)->first();

        $Nomor = $donation->No;
        $undangan_id = $donation->undangan_id;
        $pdua = pdua::where('id', $undangan_id)->first();


        // Jika donasi tidak ditemukan, log pesan dan kembalikan respons
        if (!$donation) {
            LOG::error('Donation with order ID ' . $orderId . ' not found.');
            return response('Donation not found.', 404);
        }

        if ($transactionStatus == 'capture') {
            if ($paymentType == 'credit_card') {

                if ($fraudStatus == 'challenge') {
                    $donation->setStatusPending();
                } else {
                    if ($Nomor == 1) {
                        $pdua->update(['status' => 'public']);
                    } elseif ($Nomor == 2) {
                        $pdua->update(['status' => 'public']);
                    } else {
                        // Tangani kasus default di sini
                    }
                    $donation->setStatusSuccess();
                }
            }
        } elseif ($transactionStatus == 'settlement') {


            if ($Nomor == 1) {
                $pdua->update(['status' => 'public']);
            } elseif ($Nomor == 2) {
                $pdua->update(['status' => 'public']);
            } else {
                // Tangani kasus default di sini
            }
            $donation->setStatusSuccess();
        } elseif ($transactionStatus == 'pending') {

            $donation->setStatusPending();
        } elseif ($transactionStatus == 'deny') {

            $donation->setStatusFailed();
        } elseif ($transactionStatus == 'expire') {

            $donation->setStatusExpired();
        } elseif ($transactionStatus == 'cancel') {

            $donation->setStatusFailed();
        }

        // Kembalikan respons OK jika proses berhasil
        return response('Notification processed.', 200);
    }
}
