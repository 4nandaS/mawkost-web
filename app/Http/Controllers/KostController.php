<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;

class KostController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_kost' => 'required|string',
            'alamat_kost' => 'required|string',
            'kota' => 'required|integer',
            'tempat_terdekat' => 'required|array', // Pastikan ini adalah array
            'harga_kost' => 'required|numeric',
            'fasilitas_kamar' => 'required|array', // Pastikan ini adalah array
            'fasilitas_bersama' => 'required|array', // Pastikan ini adalah array
            'gender' => 'required|string',
            'no_hp' => 'required|string',
            'foto' => 'required|array', // Pastikan ini adalah array jika Anda mengupload beberapa foto
            'informasi_tambahan' => 'required|string',
            'id_kost' => 'required|string',
        ]);

        // Serialisasi array menjadi string JSON
        $validatedData['tempat_terdekat'] = json_encode($validatedData['tempat_terdekat']);
        $validatedData['fasilitas_kamar'] = json_encode($validatedData['fasilitas_kamar']);
        $validatedData['fasilitas_bersama'] = json_encode($validatedData['fasilitas_bersama']);
        $validatedData['foto'] = json_encode($validatedData['foto']); // Jika Anda menyimpan beberapa foto

        // Simpan data ke database
        Kost::create($validatedData);

        // Redirect atau return response
        return redirect()->route('welcome')->with('success', 'Data berhasil disimpan!');
    }

    public function index()
{
    $kosts = Kost::all()->map(function ($kost) {
        $kost->tempat_terdekat = json_decode($kost->tempat_terdekat);
        $kost->fasilitas_kamar = json_decode($kost->fasilitas_kamar);
        $kost->fasilitas_bersama = json_decode($kost->fasilitas_bersama);
        $kost->foto = json_decode($kost->foto);
        return $kost;
    });

    return view('welcome', compact('kosts')); // Pastikan 'kosts' dikirim ke view //okee
}

}
