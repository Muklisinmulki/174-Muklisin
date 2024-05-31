<?php
// app/Http/Controllers/ClientController.php

namespace App\Http\Controllers;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
    }
    public function buy()
    {
        return view('client.buy');
    }
    public function pay()
    {
        return view('client.pay');
    }
    public function doc()
    {
        return view('client.doc');
    }
}

