<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'properties';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_user',
        'alamat',
        'luas',
        'lebar',
        'jumlah_lantai',
        'tanggal_jual',
        'latitude',
        'longtitude',
        'harga'
    ];
}
