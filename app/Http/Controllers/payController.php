<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\pay;
use App\Models\pdua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class payController extends Controller
{
    public function indexpay()
    {
        $data['pay'] = DB::table('pays')
            ->join('pduas', 'pays.undagan_id', '=', 'pduas.id')
            ->join('users', 'pduas.user_id', '=', 'users.id')
            ->select('pays.*', 'pduas.pengantin_l', 'pduas.pengantin_p', 'pduas.user_id', 'users.email')
            ->get();
        return view('pay.index')->with($data);
    }


    public function pay(Request $request, $id)
    {
        $pay = pay::where('undagan_id', $id)->first();

        if (!empty($pay)) {
            return redirect("profile/" . Auth::user()->id)->with('noted', 'Undangan ini sudah mengirimkan bukti pembayaran, mohon tunggu 1x24 jam.');
        } else {

            // dd($pay);
            $request->validate([
                'foto' => 'required|mimes:png,jpg,jpeg',
                'Nohp' => 'required',
            ]);


            $image = $request->file('foto');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = 'assets/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($image));

            $data['No'] = $request->No;
            $data['undagan_id'] = $id;
            $data['Nohp'] = $request->Nohp;
            $data['foto'] = $filename;

            pay::create($data);

            return redirect("profile/" . Auth::user()->id)->with('success', 'Data berhasil di kirim, data akan di periksa 1x24 jam.');
        }
    }


    public function confir(Request $request, $id)
    {
        $no_undangan = $request->No;
        $id_undangan = $request->undangan_id;
        $payment = Pay::find($id);


        // dd($no_undangan); 

        // membuka akses undangan
        Pdua::find($id_undangan)->update(['status' => 'public']);
        // menghapus foto dan menghapus table
        if ($payment->foto) {
            Storage::disk('public')->delete('assets/' . $payment->foto);
        } else {
            print('Foto tidak ada');
        }
        pay::find($id)->delete();

        // mengirimkan pesan
        $data['send'] = $request->send;
        $data['to'] = $request->to;
        $data['title'] = $request->title;
        $data['message'] = $request->massage;
        message::create($data);
        return redirect("pay")->with('success', 'Data berhasil di konfirmasi.');
    }
}
