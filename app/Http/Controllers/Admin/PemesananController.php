<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with(['pelanggan', 'jenisPembayaran'])->latest()->paginate(10);

        return view('admin.pemesanan.index', compact('pemesanans'));
    }

    public function show(Pemesanan $pemesanan)
    {
        $pemesanan->load(['pelanggan', 'jenisPembayaran', 'detail.paket', 'pengiriman']);

        return view('admin.pemesanan.show', compact('pemesanan'));
    }

    public function edit(Pemesanan $pemesanan)
    {
        return view('admin.pemesanan.edit', compact('pemesanan'));
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        $data = $request->validate([
            'status_pesan' => ['required', 'in:Menunggu Konfirmasi,Sedang Diproses,Menunggu Kurir'],
            'no_resi' => ['nullable', 'string', 'max:30'],
        ]);

        $pemesanan->update($data);

        if ($data['status_pesan'] === 'Menunggu Kurir') {
            return redirect()
                ->route('admin.pengiriman.create', ['order' => $pemesanan->id])
                ->with('success', 'Status diperbarui. Silakan atur pengiriman.');
        }

        return redirect()->route('admin.pemesanan.show', $pemesanan)->with('success', 'Status pemesanan diperbarui.');
    }

    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()->route('admin.pemesanan.index')->with('success', 'Pemesanan dihapus.');
    }
}
