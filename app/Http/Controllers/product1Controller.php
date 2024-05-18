<?php

namespace App\Http\Controllers;

use App\Models\psatu;
use Illuminate\Http\Request;

class product1Controller extends Controller
{
   public function produk1()
   {
      return view('produks.satu.produk1');
   }

   public function index($id)
   {
      $data = psatu::where('id', $id)->first();
      $status = $data->status;
      // mengirim data
      $p2['data'] = psatu::where('id', $id)->first();




      if (auth()->check()) {
         if ($status == 'edit' && $data->user_id == auth()->user()->id) {
            return view('produks.satu.buy')->with($p2);
         } else {
            return view('produks.satu.buy')->with($p2);
         }
      } else {
         if ($status == 'public') {
            return view('produks.satu.buy')->with($p2);
         } else {
            return view('produks.error');
         }
      }
   }


   public function create(Request $request)
   {
      $requesd = $request->validate([
         'user_id' => 'required',
         'pengantin_l' => 'required|string|max:255',
         'pengantin_p' => 'required|string|max:255',
      ]);

      $psatu = psatu::create([
         "user_id" =>$request->user_id,
         "pengantin_l" =>$request->pengantin_l,
         "pengantin_p" =>$request->pengantin_p,
      ]);


      return redirect('ekonomi/' . $psatu->id)->with('success', 'data Berhasil Terkirim');
   }
}
