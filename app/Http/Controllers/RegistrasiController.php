<?php

// app/Http/Controllers/RegistrasiController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;

class RegistrasiController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:registrasis,email',
            'phone_number' => 'required|string|max:15',
            'role' => 'required|string|in:admin,client,developer',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan data ke dalam database
        $registrasi = Registrasi::create($validatedData);
        
        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect('/')->with('success', 'Registrasi berhasil!');

    }
}
