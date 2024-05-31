<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuyForm; // Ganti YourModel dengan model yang sesuai

class BuyFormController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'uang_muka' => 'required|numeric|min:0|max:9223372036854775807',
            'loan_term' => 'required|numeric',
            'harga' => 'required|numeric|min:0',
            'asuransi' => 'required|string',
        ]);

        // Simpan data ke dalam database
        BuyForm::create([
            'id_user' => $request->id_user,
            'property_id' => $request->property_id,
            'uang_muka' => $request->uang_muka,
            'loan_term' => $request->loan_term,
            'harga' => $request->harga,
            'asuransi' => $request->asuransi,
        ]);

        // Redirect atau melakukan operasi lain setelah menyimpan data
        return redirect()->route('client.index');
    }
}

