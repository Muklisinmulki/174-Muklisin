<?php

// app/Http/Controllers/PurchaseController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'property_id' => 'required',
            'latitude' => 'required',
            'longtitude' => 'required',
            'uang_muka' => 'required',
            'loan_term' => 'required',
            'harga' => 'required',
            'asuransi' => 'required',
        ]);
    
        Purchase::create([
            'id_user' => $request->id_user,
            'property_id' => $request->property_id,
            'latitude' => $request->latitude,
            'longtitude' => $request->longtitude,
            'uang_muka' => $request->uang_muka,
            'loan_term' => $request->loan_term,
            'harga' => $request->harga,
            'asuransi' => $request->asuransi,
        ]);
    
        return redirect()->route('success-page');
    }
    
}
