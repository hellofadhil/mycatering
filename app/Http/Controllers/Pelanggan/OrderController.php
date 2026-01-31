<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\DetailPemesanan;
use App\Models\JenisPembayaran;
use App\Models\Paket;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function dashboard()
    {
        $pelanggan = Auth::guard('pelanggan')->user();
        $pesananTerbaru = $pelanggan->pemesanans()->latest()->take(3)->get();

        return view('pelanggan.dashboard', compact('pelanggan', 'pesananTerbaru'));
    }

    public function paket()
    {
        $pakets = Paket::latest()->paginate(9);
        $jenisPembayarans = JenisPembayaran::orderBy('metode_pembayaran')->get();

        return view('pelanggan.paket.index', compact('pakets', 'jenisPembayarans'));
    }

    public function showPaket(Paket $paket)
    {
        $jenisPembayarans = JenisPembayaran::orderBy('metode_pembayaran')->get();

        return view('pelanggan.paket.show', compact('paket', 'jenisPembayarans'));
    }

    public function create()
    {
        $pakets = Paket::orderBy('nama_paket')->get();
        $jenisPembayarans = JenisPembayaran::orderBy('metode_pembayaran')->get();

        return view('pelanggan.pemesanan.create', compact('pakets', 'jenisPembayarans'));
    }

    public function store(Request $request)
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        if (! $pelanggan->tgl_lahir || ! $pelanggan->telepon || ! $pelanggan->alamat1) {
            return redirect()
                ->route('pelanggan.profil.edit')
                ->with('success', 'Lengkapi profil (tanggal lahir, telepon, alamat) sebelum memesan.');
        }

        $data = $request->validate([
            'id_paket' => ['required', 'exists:pakets,id'],
            'id_jenis_bayar' => ['required', 'exists:jenis_pembayarans,id'],
            'nama_penerima' => ['required', 'string', 'max:100'],
            'telepon_penerima' => ['required', 'string', 'max:20'],
            'alamat_kirim' => ['required', 'string', 'max:255'],
            'catatan' => ['nullable', 'string', 'max:500'],
        ]);

        $paket = Paket::findOrFail($data['id_paket']);

        $pemesanan = Pemesanan::create([
            'id_pelanggan' => $pelanggan->id,
            'id_jenis_bayar' => $data['id_jenis_bayar'],
            'nama_penerima' => $data['nama_penerima'],
            'telepon_penerima' => $data['telepon_penerima'],
            'alamat_kirim' => $data['alamat_kirim'],
            'catatan' => $data['catatan'] ?? null,
            'tgl_pesan' => now(),
            'status_pesan' => 'Menunggu Konfirmasi',
            'total_bayar' => $paket->harga_paket,
        ]);

        DetailPemesanan::create([
            'id_pemesanan' => $pemesanan->id,
            'id_paket' => $paket->id,
            'subtotal' => $paket->harga_paket,
        ]);

        return redirect()->route('pelanggan.pemesanan.riwayat')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function riwayat()
    {
        $pelanggan = Auth::guard('pelanggan')->user();
        $pemesanans = $pelanggan->pemesanans()->with('detail.paket')->latest()->paginate(10);

        return view('pelanggan.pemesanan.riwayat', compact('pemesanans'));
    }

    public function show(Pemesanan $pemesanan)
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        if ($pemesanan->id_pelanggan !== $pelanggan->id) {
            abort(403);
        }

        $pemesanan->load(['detail.paket', 'jenisPembayaran', 'pengiriman']);

        return view('pelanggan.pemesanan.show', compact('pemesanan'));
    }
}
