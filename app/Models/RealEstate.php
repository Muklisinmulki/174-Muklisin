<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'property_id',
        'uang_muka',
        'loan_term',
        'harga',
        'asuransi',
    ];
}

