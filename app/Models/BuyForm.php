<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyForm extends Model
{
    protected $fillable = ['id_user', 'property_id', 'uang_muka', 'loan_term','latitude','longtitude', 'harga', 'asuransi'];
}
