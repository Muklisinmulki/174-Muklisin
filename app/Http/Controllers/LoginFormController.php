<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;

class LoginFormController extends Controller
{
  public function store(Request $request)
  {
    // Validasi data yang diterima dari form
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'password' => 'required|string|min:8',
    ]);

    // Periksa apakah username dan password sesuai dengan entri dalam tabel registrasis
    $user = Registrasi::where('name', $validatedData['name'])
      ->where('password', $validatedData['password'])
      ->first();

    if ($user) {
      // Simpan ID dan nama pengguna dalam sesi
      session()->put('id', $user->id);
      session()->put('name', $user->name);

      // Arahkan pengguna ke halaman yang sesuai berdasarkan peran (role) mereka
      if ($user->role === 'admin') {
        return redirect()->route('admin.index');
      } elseif ($user->role === 'client') {
        return redirect()->route('client.index');
      } elseif ($user->role === 'developer') {
        return redirect()->route('develop.index');
      }
    }

    // Jika kredensial tidak cocok, arahkan pengguna kembali ke halaman login
    return redirect()->back()->with('error', 'Username atau password salah.');
  }
}
