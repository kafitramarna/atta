<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'harga',
        'deskripsi',
        'fasilitas',
        'latitude',
        'longitude',
    ];
}
