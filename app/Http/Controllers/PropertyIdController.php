<?php
// app/Http/Controllers/PropertyController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\BuyForm;
use Illuminate\Support\Facades\Auth;

class PropertyIdController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Get the current logged-in user's ID
        $buyForms = BuyForm::where('user_id', $userId)->pluck('property_id')->toArray(); // Get all property_ids for this user
        $properties = Property::whereIn('id', $buyForms)->get(); // Fetch properties with those IDs

        return response()->json($properties);
    }
}
