<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class messageController extends Controller
{
    public function index()
    {
        $email = Auth::User()->email;
        $message = message::where('to', $email)->get();
        return view('messages.index', compact('message'));
    }


    public function read($id)
    {

        $message = message::where('id', $id)->first();
        message::where('id', $id)->update(['notif' => 0]);
        return view('messages.read', compact('message'));
    }

    public function report(Request $request)
    {

        // dd($request->send);
        $request->validate([
            'send' => 'required',
            'to' => 'required',
            'title' => 'required',
            'message' => 'required',
        ]);

        message::create($request->all());
        return redirect('index')->with('success', 'Report anda sedang di periksa, tunggu balasan dari kami dalam 1x24 jam');
    }

    public function shareViaWhatsApp(Request $request)
    {
        // URL yang ingin Anda bagikan via WhatsApp
        $url = "https://undanganulfavia.000webhostapp.com$request->link";

        // Format pesan untuk dibagikan via WhatsApp
        $message = "Hallo, kami pihak keluarga dari $request->pengantin ingin menyampaikan undangan ini kepada pihak yang bersangkutan, kami harap anda datang pada tanggal yang di tentukan. info lebih lanjut ->: " . $url;

        // Redirect ke URL WhatsApp dengan pesan yang sudah disiapkan
        return redirect()->away('https://api.whatsapp.com/send?text=' . urlencode($message));
    }



    public function copy(Request $request)
    {
        $text = $request->input('copy');

        // Menyimpan teks ke dalam file sementara
        $tempFilePath = tempnam(sys_get_temp_dir(), 'text_');
        File::put($tempFilePath, $text);

        // Membuat respons dengan file sementara untuk didownload
        return response()->download($tempFilePath, "undangan luxuri $request->pengantin.txt", ['Content-Type' => 'text/plain'])
            ->deleteFileAfterSend(true); // Hapus file sementara setelah respons terkirim
    }
}
