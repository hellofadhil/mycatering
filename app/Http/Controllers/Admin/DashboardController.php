<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\Pengiriman;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'paket' => Paket::count(),
            'pelanggan' => Pelanggan::count(),
            'pemesanan' => Pemesanan::count(),
            'pengiriman' => Pengiriman::count(),
        ];

        $pesananTerbaru = Pemesanan::with('pelanggan')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'pesananTerbaru'));
    }
}
