<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $fillable = ['kota'];

    public function kosts()
    {
        return $this->hasMany(Kost::class);
    }
}
