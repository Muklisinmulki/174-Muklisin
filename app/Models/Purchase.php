<?php
// app/Models/Purchase.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'id_user',
        'property_id',
        'latitude',
        'longtitude',
        'uang_muka',
        'loan_term',
        'harga',
        'asuransi',
    ];
}
