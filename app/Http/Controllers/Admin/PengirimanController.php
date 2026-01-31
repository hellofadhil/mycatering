<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Pengiriman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengirimans = Pengiriman::with(['pemesanan', 'user'])->latest()->paginate(10);

        return view('admin.pengiriman.index', compact('pengirimans'));
    }

    public function create()
    {
        if (auth()->user()?->level === 'kurir') {
            abort(403);
        }

        $pemesanans = Pemesanan::with('pelanggan')->orderByDesc('tgl_pesan')->get();
        $kurirs = User::where('level', 'kurir')->orderBy('name')->get();
        $selectedOrder = request()->query('order');

        return view('admin.pengiriman.create', compact('pemesanans', 'kurirs', 'selectedOrder'));
    }

    public function store(Request $request)
    {
        if (auth()->user()?->level === 'kurir') {
            abort(403);
        }

        $data = $request->validate([
            'id_pesan' => ['required', 'exists:pemesanans,id'],
            'id_user' => ['required', 'exists:users,id'],
            'tgl_kirim' => ['nullable', 'date'],
            'tgl_tiba' => ['nullable', 'date'],
            'status_kirim' => ['required', 'in:Sedang Dikirim,Tiba Ditujuan'],
            'bukti_foto' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('bukti_foto')) {
            $data['bukti_foto'] = $request->file('bukti_foto')->store('pengiriman', 'public');
        }

        Pengiriman::create($data);

        return redirect()->route('admin.pengiriman.index')->with('success', 'Pengiriman ditambahkan.');
    }

    public function edit(Pengiriman $pengiriman)
    {
        $pemesanans = Pemesanan::with('pelanggan')->orderByDesc('tgl_pesan')->get();
        $kurirs = User::where('level', 'kurir')->orderBy('name')->get();

        return view('admin.pengiriman.edit', compact('pengiriman', 'pemesanans', 'kurirs'));
    }

    public function update(Request $request, Pengiriman $pengiriman)
    {
        $data = $request->validate([
            'id_pesan' => ['required', 'exists:pemesanans,id'],
            'id_user' => ['required', 'exists:users,id'],
            'tgl_kirim' => ['nullable', 'date'],
            'tgl_tiba' => ['nullable', 'date'],
            'status_kirim' => ['required', 'in:Sedang Dikirim,Tiba Ditujuan'],
            'bukti_foto' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('bukti_foto')) {
            if ($pengiriman->bukti_foto) {
                Storage::disk('public')->delete($pengiriman->bukti_foto);
            }
            $data['bukti_foto'] = $request->file('bukti_foto')->store('pengiriman', 'public');
        }

        $pengiriman->update($data);

        return redirect()->route('admin.pengiriman.index')->with('success', 'Pengiriman diperbarui.');
    }

    public function destroy(Pengiriman $pengiriman)
    {
        if (auth()->user()?->level === 'kurir') {
            abort(403);
        }

        if ($pengiriman->bukti_foto) {
            Storage::disk('public')->delete($pengiriman->bukti_foto);
        }

        $pengiriman->delete();

        return redirect()->route('admin.pengiriman.index')->with('success', 'Pengiriman dihapus.');
    }
}
