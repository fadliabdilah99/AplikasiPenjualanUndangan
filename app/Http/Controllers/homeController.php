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
        $produk = produk::get();
        // dd($count);
        return view('home.index', compact('produk', 'count'));
    }
}
