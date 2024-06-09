<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\pdua;
use App\Models\psatu;
use App\Models\stori;
use App\Models\ucapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class product1Controller extends Controller
{
   public function produk1()
   {
      return view('produks.satu.produk1');
   }

   public function index($id)
   {
      $data = pdua::where('id', $id)->first();
      $status = $data->status;
      $tanggal = $data->tanggal;

      // mengirim data
      $p2['data'] = pdua::where('id', $id)->first();
      $p2['ucapan'] = ucapan::where('undangan_id', $id)->paginate(10);
      $p2['totalucapan'] = ucapan::where('undangan_id', $id)->count();
      $p2['story'] = stori::where('undangan_id', $id)->get();
      $p2['tanggal'] = date("l d F Y", strtotime($tanggal));


      // memanggil foto
      $p2['foto_l'] = foto::where('undangan_id', $id)->where('noFoto', 1)->pluck('foto')->first();
      $p2['foto_p'] = foto::where('undangan_id', $id)->where('noFoto', 2)->pluck('foto')->first();
      $p2['album'] = Foto::where('undangan_id', $id)->where('noFoto', '>', 2)->get();

      // memisahkan data akad dan resepsi
      $dataArray = Str::of($p2['data']->akadResepsi)->explode('-');
      $p2['akad'] = $dataArray[0];
      $p2['resepsi'] = $dataArray[1];

      // memisahkan data rekening
      $dataArray = Str::of($p2['data']->rekening)->explode('-');
      $p2['rekening1'] = $dataArray[0];
      $p2['namarekening1'] = $dataArray[1];
      $p2['rekening2'] = $dataArray[2];
      $p2['namarekening2'] = $dataArray[3];


      // waktu
      $dataArray = Str::of($data->tanggal)->explode('-');
      $p2['tahun'] = $dataArray[0];
      $p2['bulan'] = $dataArray[1];
      $p2['hari'] = $dataArray[2];


      if ($data->No == 1) {
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
      } else {
         return view('produks.error');
      }
   }


   public function create(Request $request)
   {
      if (strpos($request->input('rekening1'), '-') == false || strpos($request->input('rekening2'), '-') == false ) {
         return redirect('index')->with('peringatan', 'GAGAL! Silahkan edit rekening Anda dengan (NOREK-NAMABANK)');
      }
      $request->validate([
         'user_id' => 'required',
         'pengantin_l' => 'required|string|max:255',
         'pengantin_p' => 'required|string|max:255',
         'tanggal' => 'required|date',
         'ortu_LL' => 'required|string|max:255',
         'ortu_LP' => 'required|string|max:255',
         'ortu_PL' => 'required|string|max:255',
         'ortu_PP' => 'required|string|max:255',
         'akad' => 'nullable|date_format:H:i',
         'resepsi' => 'nullable|date_format:H:i',
         'linkGmaps' => 'nullable|string|max:255',
         'alamat' => 'nullable|string|max:255',
         'rekening1' => 'nullable|string|max:255',
         'rekening2' => 'nullable|string|max:255',
         'foto_l' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:ratio=1/1',
         'foto_p' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:ratio=1/1',
         'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:ratio=1/1',
      ]);



      $pdua = pdua::create([
         'user_id' => $request->input('user_id'),
         'No' => 1,
         'pengantin_l' => $request->input('pengantin_l'),
         'pengantin_p' => $request->input('pengantin_p'),
         'tanggal' => $request->input('tanggal'),
         'ortu_l' => 'Bapak ' . $request->input('ortu_LL') . ('-') . ' Ibu' . $request->input('ortu_LP'),
         'ortu_p' => 'Bapak ' . $request->input('ortu_PL') . ('-') . ' Ibu' . $request->input('ortu_PP'),
         'akadResepsi' => $request->input('akad') . '-' . $request->input('resepsi'),
         'linkGmaps' => $request->input('linkGmaps'),
         'alamat' => $request->input('alamat'),
         'rekening' => $request->input('rekening1') . '-' . $request->input('rekening2'),
      ]);

      // proses foto profile
      $image = $request->file('foto_l');
      $filename_l = date('Y-m-d') . $image->getClientOriginalName();
      $path = 'assets/' . $filename_l;
      Storage::disk('public')->put($path, file_get_contents($image));



      $image = $request->file('foto_p');
      $filename_p = date('Y-m-d') . $image->getClientOriginalName();
      $path = 'assets/' . $filename_p;
      Storage::disk('public')->put($path, file_get_contents($image));
      foto::create([
         'No' => 1,
         'undangan_id' => $pdua->id,
         'foto' => $filename_l,
         'noFoto' => 1,
      ]);
      foto::create([
         'No' => 1,
         'undangan_id' => $pdua->id,
         'foto' => $filename_p,
         'noFoto' => 2,
      ]);
      // foto album
      if ($request->hasFile('photos')) {
         $noFoto = 2;
         foreach ($request->file('photos') as $photo) {
            $album = date('Y-m-d') . $photo->getClientOriginalName();
            $path = 'assets/' . $album;
            Storage::disk('public')->put($path, file_get_contents($photo));

            // Simpan data ke database
            foto::create([
               'No' => 1,
               'undangan_id' => $pdua->id,
               'foto' => $album,
               'noFoto' => ++$noFoto,
            ]);
         }
      }
      return redirect('ekonomi/' . $pdua->id)->with('success', 'data Berhasil Terkirim');
   }

   public function story($id, Request $request)
   {
      $request->validate([
         'No' => 'required',
         'foto' => 'required',
         'title' => 'required',
         'tanggal' => 'required',
         'deskripsi' => 'required',
      ]);

      $image = $request->file('foto');
      $filename = date('Y-m-d_H-i-s') . '_' . microtime(true) . '_' . $image->getClientOriginalName();
      $path = 'assets/' . $filename;
      Storage::disk('public')->put($path, file_get_contents($image));


      stori::create([
         'undangan_id' => $id,
         'No' => $request->input('No'),
         'foto' => $filename,
         'title' => $request->input('title'),
         'tanggal' => $request->input('tanggal'),
         'deskripsi' => $request->input('deskripsi'),
      ]);
      return redirect('ekonomi/' . $id)->with('success', 'data Berhasil Terkirim');
   }

   public function update($id, Request $request)
   {

      $delete = stori::find($id);

      $request->validate([
         'No' => 'required',
         'foto' => 'required',
         'title' => 'required',
         'tanggal' => 'required',
         'deskripsi' => 'required',
      ]);

      if ($request->hasFile('foto')) {
         Storage::disk('public')->delete('assets/' . $delete->foto);
      }

      $image = $request->file('foto');
      $filename = date('Y-m-d_H-i-s') . '_' . microtime(true) . '_' . $image->getClientOriginalName();
      $path = 'assets/' . $filename;
      Storage::disk('public')->put($path, file_get_contents($image));


      stori::where('undangan_id', $id)->update([
         'No' => $request->input('No'),
         'foto' => $filename,
         'title' => $request->input('title'),
         'tanggal' => $request->input('tanggal'),
         'deskripsi' => $request->input('deskripsi'),
      ]);
      return redirect('ekonomi/' . $id)->with('success', 'data Berhasil Terkirim');
   }

   public function ucapan(Request $request)
   {
      $request->validate([
         'No' => 'required',
         'undangan_id' => 'required',
         'nama' => 'required',
         'kehadiran' => 'required',
         'ucapan' => 'required',
      ]);

      ucapan::create($request->all());
      return redirect('ekonomi/' . $request->undangan_id)->with('success', 'data Berhasil Terkirim');
   }
}
