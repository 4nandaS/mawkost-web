<?php

namespace App\Filament\Resources\KostResource\Pages;

use App\Filament\Resources\KostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreateKost extends CreateRecord
{
    protected static string $resource = KostResource::class;

    protected function handleRecordCreation(array $data): \App\Models\Kost
    {
        // Handle upload foto
        if (isset($data['foto']) && is_array($data['foto'])) {
            $fotoPaths = [];
            foreach ($data['foto'] as $foto) {
                if ($foto instanceof \Illuminate\Http\UploadedFile) {
                    $path = $foto->store('kosts', 'public');
                    $fotoPaths[] = $path;
                }
            }
            $data['foto'] = json_encode($fotoPaths);
        } else {
            $data['foto'] = json_encode([]);
        }

        // Buat instance Kost baru
        $kost = new \App\Models\Kost();
        $kost->nama_kost = $data['nama_kost'];
        $kost->alamat_kost = $data['alamat_kost'];
        $kost->kota = $data['kota'];
        $kost->tempat_terdekat = $data['tempat_terdekat'];
        $kost->harga_kost = $data['harga_kost'];
        $kost->fasilitas_kamar = json_encode($data['fasilitas_kamar']);
        $kost->fasilitas_bersama = json_encode($data['fasilitas_bersama']);
        $kost->gender = $data['gender'];
        $kost->no_hp = $data['no_hp'];
        $kost->foto = $data['foto'];
        $kost->informasi_tambahan = $data['informasi_tambahan'];

        // Simpan data
        $kost->save();

        return $kost;
    }
}
