<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasKamar extends Model
{
    use HasFactory;

    protected $fillable = ['fasilitas_kamar'];

    public function kosts()
    {
        return $this->belongsToMany(Kost::class);
    }
}
