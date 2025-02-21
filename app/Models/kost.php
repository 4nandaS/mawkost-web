<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kost'; // Menentukan kolom primary key
    public $incrementing = false; // Menonaktifkan auto-increment karena menggunakan string sebagai primary key

    protected $fillable = [
        'id_kost',
        'nama_kost',
        'alamat_kost',
        'kota',
        'tempat_terdekat',
        'harga_kost',
        'fasilitas_kamar',
        'fasilitas_bersama',
        'gender',
        'no_hp',
        'foto', // Pastikan kolom ini menyimpan JSON
        'informasi_tambahan',
    ];

    protected $casts = [
        'harga_kost' => 'integer',
        'fasilitas_kamar' => 'array',
        'fasilitas_bersama' => 'array',
        'foto' => 'array',
        'informasi_tambahan' => 'string',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Ambil jumlah kost yang sudah ada
            $count = self::count();
            // Buat ID baru dengan format KOST + nomor urut
            $model->id_kost = 'KOST' . ($count + 1);
        });
    }

    // Accessor untuk menampilkan foto sebagai array
    public function getFotoAttribute($value)
    {
        return json_decode($value, true);
    }

    // Mutator untuk menyimpan foto sebagai JSON
    public function setFotoAttribute($value)
    {
        $this->attributes['foto'] = json_encode($value);
    }

    public function fasilitasKamar()
    {
        return $this->belongsToMany(FasilitasKamar::class);
    }

    public function fasilitasBersama()
{
    return $this->belongsToMany(FasilitasBersama::class, 'fasilitas_bersama_kost', 'kost_id', 'fasilitas_bersama_id');
}
}
