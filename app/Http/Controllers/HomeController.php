<?php

namespace App\Http\Controllers;

use App\Models\Paket;

class HomeController extends Controller
{
    public function index()
    {
        $pakets = Paket::latest()->take(6)->get();

        return view('home', compact('pakets'));
    }
}
