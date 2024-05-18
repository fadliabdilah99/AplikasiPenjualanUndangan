<?php

namespace App\Http\Controllers;

use App\Models\pdua;
use App\Models\produk;
use App\Models\psatu;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index($id)
    {

        // jika sudah lebih dari satu undangan, tampung dulu data setiap undangan di  dalam variable, lalu di jumlahkan untuk di return ke view

        // produk2
        $data['belumdibayar'] = pdua::where('status', 'edit')->count();
        $data['terjual'] = pdua::where('status', 'public')->count();
        $data['pendapatan'] = $data['terjual'] * produk::select('harga')->where('id', 2)->first()->harga;

        $data['produk1'] = psatu::where(function ($query) use ($id) {
            if ($id == 4) {
                // Jika id = 4, ambil semua data
                $query->whereNotNull('pduas.id');
            } else {
                // Jika id bukan 4, gunakan where sesuai id
                $query->where('user_id', $id);
            }
        })
            ->join('users', 'psatus.user_id', '=', 'users.id')
            ->join('produks', 'psatus.No', '=', 'produks.id')
            ->select('psatus.*', 'users.name', 'users.email', 'produks.harga', 'produks.nama')
            ->get();

        $data['produkAll'] = produk::get();
        $data['date'] = date("Y-m-d");





        $data['produk2'] = pdua::where(function ($query) use ($id) {
            if ($id == 4) {
                // Jika id = 4, ambil semua data
                $query->whereNotNull('pduas.id');
            } else {
                // Jika id bukan 4, gunakan where sesuai id
                $query->where('user_id', $id);
            }
        })
            ->join('users', 'pduas.user_id', '=', 'users.id')
            ->join('produks', 'pduas.No', '=', 'produks.id')
            ->select('pduas.*', 'users.name', 'users.email', 'produks.harga', 'produks.nama')
            ->get();

        $data['produkAll'] = produk::get();
        $data['date'] = date("Y-m-d");


        // dd($data);
        return view('profile.index')->with($data);
    }
}
