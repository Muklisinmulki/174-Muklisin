<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealEstate;
use Illuminate\Support\Facades\Log;

class RealEstateController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Request data:', $request->all());

        // Validate the form data
        $request->validate([
            'id_user' => 'required',
            'property_id' => 'required',
            'uang_muka' => 'required|numeric',
            'loan_term' => 'required|integer',
            'harga' => 'required|numeric',
            'asuransi' => 'required|string',
        ]);

        Log::info('Validation passed');

        // Create a new RealEstate entry
        $realEstate = new RealEstate([
            'id_user' => $request->id_user,
            'property_id' => $request->property_id,
            'uang_muka' => $request->uang_muka,
            'loan_term' => $request->loan_term,
            'harga' => $request->harga,
            'asuransi' => $request->asuransi,
        ]);

        // Save the RealEstate entry to the database
        if ($realEstate->save()) {
            Log::info('Real estate details saved successfully');
        } else {
            Log::error('Failed to save real estate details');
        }

        // Redirect or return a response
        return redirect()->back()->with('success', 'Real estate details saved successfully!');
    }
}

