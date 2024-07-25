<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Support\Str;
use App\Models\foto;
use App\Models\pay;
use App\Models\pdua;
use App\Models\ucapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class produkController extends Controller
{
    public function produk2()
    {
        return view('produks.dua.produk2');
    }



    public function index($id)
    {
        $data = pdua::where('id', $id)->first();
        $status = $data->status;
        $tanggal = $data->tanggal;
        // pengiriman data
        $p2['data'] = pdua::where('id', $id)->first();
        $p2['ucapan'] = ucapan::where('undangan_id', $id)->paginate(10);
        $p2['totalucapan'] = ucapan::where('undangan_id', $id)->count();
        $p2['tanggal'] = date("l d F Y", strtotime($tanggal));


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



        // memanggil foto
        $p2['foto_l'] = foto::where('undangan_id', $id)->where('noFoto', 1)->pluck('foto')->first();
        $p2['foto_p'] = foto::where('undangan_id', $id)->where('noFoto', 2)->pluck('foto')->first();
        $p2['foto2'] = foto::where('undangan_id', $id)->where('noFoto', 88)->pluck('foto')->first();
        $p2['album'] = Foto::where('undangan_id', $id)->where('noFoto', '>', 2)->get();


        if ($data->No == 2) {
            if (auth()->check()) {
                if ($status == 'edit' && $data->user_id == auth()->user()->id) {
                    return view('produks.dua.buy')->with($p2);
                } else {
                    return view('produks.dua.buy')->with($p2);
                }
            } else {
                if ($status == 'public') {
                    return view('produks.dua.buy')->with($p2);
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
        if (strpos($request->input('rekening1'), '-') == false || strpos($request->input('rekening2'), '-') == false) {
            return redirect('index')->with('info', 'GAGAL! Silahkan edit rekening Anda dengan (NOREK-NAMABANK)');
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
            'foto2' => 'required',
            'foto_l' => 'required',
            'foto_p' => 'required',
            'photos.*' => 'required',
        ]);



        $pdua = pdua::create([
            'user_id' => $request->input('user_id'),
            'pengantin_l' => $request->input('pengantin_l'),
            'pengantin_p' => $request->input('pengantin_p'),
            'tanggal' => $request->input('tanggal'),
            'ortu_l' => 'Bapak ' . $request->input('ortu_LL') . ' Ibu ' . $request->input('ortu_LP'),
            'ortu_p' => 'Bapak ' . $request->input('ortu_PL') . ' Ibu ' . $request->input('ortu_PP'),
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

        $image = $request->file('foto2');
        $filename_pasangan = date('Y-m-d') . $image->getClientOriginalName();
        $path = 'assets/' . $filename_pasangan;
        Storage::disk('public')->put($path, file_get_contents($image));


        $image = $request->file('foto_p');
        $filename_p = date('Y-m-d') . $image->getClientOriginalName();
        $path = 'assets/' . $filename_p;
        Storage::disk('public')->put($path, file_get_contents($image));
        foto::create([
            'No' => 2,
            'undangan_id' => $pdua->id,
            'foto' => $filename_l,
            'noFoto' => 1,
        ]);


        foto::create([
            'No' => 2,
            'undangan_id' => $pdua->id,
            'foto' => $filename_p,
            'noFoto' => 2,
        ]);


        foto::create([
            'No' => 2,
            'undangan_id' => $pdua->id,
            'foto' => $filename_pasangan,
            'noFoto' => 88,
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
                    'No' => 2,
                    'undangan_id' => $pdua->id,
                    'foto' => $album,
                    'noFoto' => ++$noFoto,
                ]);
            }
        }

        return redirect('luxuri/' . $pdua->id)->with('success', 'data Berhasil Terkirim');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'pengantin_l' => 'required',
            'pengantin_p' => 'required',
        ]);
        pdua::find($id)->update($request->all());

        return redirect("profile/" . Auth::user()->id)->with("success", "Data berhasil diubah");
    }



    public function destroy(pdua $pdua, $id)
    {
        $fotos = foto::where('undangan_id', $id)->get();
        foreach ($fotos as $foto) {
            Storage::disk('public')->delete('assets/' . $foto->foto);
        }
        Foto::where('undangan_id', $id)->delete();

        ucapan::where('undangan_id', $id)->delete();


        $pdua->where('id', $id)->delete();
        return redirect("profile/" . Auth::user()->id)->with('success', 'Delete data member berhasil');
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
        return redirect('luxuri/' . $request->undangan_id)->with('success', 'data Berhasil Terkirim');
    }

    public function daftartamu(Request $request)
    {

        $No = $request->No;
        $bukuundangan = ucapan::where('undangan_id', $request->undangan_id)->where('ucapans.No', $No);
        $bukuundangan2 = $bukuundangan;

        $Buku['ucapan'] = $bukuundangan->get();

        $Buku['pengantin'] = pdua::find($request->undangan_id);


        $Buku['tamuTH'] = $bukuundangan->where('kehadiran', '2')->count();
        $Buku['tamuH'] = $bukuundangan2->where('kehadiran', '1')->count();

        // dd($Buku['pengantin']);
        return view('produks.bukuundangan')->with($Buku);
    }
}
