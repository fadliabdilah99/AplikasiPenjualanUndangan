<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $count = Message::where('to', Auth::user()->email)->sum('notif');
        }else{
            $count = false;
        }
        $produk = produk::leftJoin('discounts', 'produks.id', '=', 'discounts.undangan_id')->select('produks.*', 'discounts.discount', 'discounts.deskripsi')->get();
        return view('home.index', compact('produk', 'count'));
    }
}
