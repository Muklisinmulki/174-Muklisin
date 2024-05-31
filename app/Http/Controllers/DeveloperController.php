<?php
// app/Http/Controllers/DeveloperController.php

namespace App\Http\Controllers;

class DeveloperController extends Controller
{
    public function index()
    {
        return view('develop.index');
    }
    public function dashboard()
    {
        return view('develop.dashboard');
    }

    public function analytics()
    {
        return view('develop.analytics');
    }

    public function settings()
    {
        return view('develop.settings');
    }

    public function members()
    {
        return view('develop.members');
    }

    public function history()
    {
        return view('develop.history');
    }
}
