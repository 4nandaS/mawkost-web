<?php

namespace App\Filament\Resources\KostResource\Pages;

use App\Filament\Resources\KostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditKost extends EditRecord
{
    protected static string $resource = KostResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
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
            // Jika tidak ada foto baru, gunakan foto yang sudah ada
            $data['foto'] = $record->foto;
        }

        // Dapatkan instance Kost yang akan diperbarui
        $kost = $record;
        $kost->nama_kost = $data['nama_kost'];
        $kost->alamat_kost = $data['alamat_kost'];
        $kost->kecamatan = $data['kecamatan'];
        $kost->kota = $data['kota'];
        $kost->tempat_terdekat = $data['tempat_terdekat'];
        $kost->harga_kost = $data['harga_kost'];
        $kost->fasilitas_kamar = json_encode($data['fasilitas_kamar']);
        $kost->fasilitas_bersama = json_encode($data['fasilitas_bersama']);
        $kost->gender = $data['gender'];
        $kost->no_hp = $data['no_hp'];
        $kost->foto = $data['foto'];
        $kost->informasi_tambahan = $data['informasi_tambahan'];

        // Simpan perubahan
        $kost->save();

        return $kost;
    }
}
