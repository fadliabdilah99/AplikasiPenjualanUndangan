<?php

namespace App\Http\Controllers;

use App\Models\discount;
use App\Models\pdua;
use App\Models\produk;
use App\Models\psatu;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index($id)
    {
        // produk2
        $data['produk2'] = pdua::where(function ($query) use ($id) {
            if ($id == 2) {
                // Jika id = 4, ambil semua data
                $query->whereNotNull('pduas.id');
            } else {
                // Jika id bukan 4, gunakan where sesuai id
                $query->where('user_id', $id);
            }
        })
            ->join('users', 'pduas.user_id', '=', 'users.id')
            ->join('produks', 'pduas.No', '=', 'produks.id')
            ->leftJoin('discounts', 'pduas.No', '=', 'discounts.undangan_id')
            ->select('pduas.*', 'users.name', 'users.email', 'produks.harga', 'produks.nama', 'discounts.discount', 'discounts.deskripsi')
            ->get();

        $data['produkAll'] = produk::get();
        $data['belumdibayar'] = pdua::where('status', 'edit')->count();
        $data['terjual'] = pdua::where('status', 'public')->count();
        $data['pendapatan'] = pdua::where('status', 'public')->join('produks', 'pduas.No', '=', 'produks.id')
            ->sum('produks.harga');
        $data['date'] = date("Y-m-d");

        $data['jumlah'] = pdua::where('status', 'public')->where('user_id', $id)->count();


        // dd($data);
        return view('profile.index')->with($data);
    }


    public  function product()
    {
        $product = produk::get();
        return view('productadmin.index', compact('product'));
    }

    public function discount(Request $request)
    {

        $request->validate([
            'undangan_id' => 'required',
            'discount' => 'required',
            'deskripsi' => 'required',
        ]);

        if (discount::select('undangan_id')->where('undangan_id', $request->undangan_id)->first() == null) {
            discount::create($request->all());
            return redirect('product')->with('success', 'Discount created successfully!');
        } else {
            return redirect('product')->with('success', 'gagal!');
        }
    }
}
