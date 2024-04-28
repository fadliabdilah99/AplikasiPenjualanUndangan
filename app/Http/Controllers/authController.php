<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }
    public function registerV()
    {
        return view('auth.register');
    }


    public function validasi(Request $request)
    {
        // dd($request->email);
        $creadentials = $request->only('email', 'password');
        if (Auth::attempt($creadentials)) {
            return redirect('index')->with('success', 'Successfully logged in');
        } else {
            return redirect('login')->with('success', 'failed to login');
        };
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);


        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect('login')->with('success', 'Successfully Register');
    }


    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect('index');
    }
}
