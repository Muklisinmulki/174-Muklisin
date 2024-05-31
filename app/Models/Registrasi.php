<?php

// app/Models/Registrasi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $fillable = [
        'name', 'email', 'phone_number', 'role', 'password',
    ];
}

