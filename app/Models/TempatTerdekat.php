<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatTerdekat extends Model
{
    use HasFactory;

    protected $table = 'tempat_terdekat';

    protected $fillable = [
        'nama_tempat',
    ];

    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }
}
