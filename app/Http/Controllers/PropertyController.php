<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'id_user' => 'required|integer',
            'alamat' => 'required|string|max:255',
            'luas' => 'required|integer',
            'lebar' => 'required|integer',
            'jumlah_lantai' => 'required|integer',
            'tanggal_jual' => 'required|date',
            'latitude' => 'required|numeric',
            'longtitude' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        // Simpan data ke database
        Property::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', '');
    }
    public function getProperties()
    {
        $properties = Property::all();
        return response()->json($properties);
    }
}
