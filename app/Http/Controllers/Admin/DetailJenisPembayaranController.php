<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailJenisPembayaran;
use App\Models\JenisPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DetailJenisPembayaranController extends Controller
{
    public function index()
    {
        $details = DetailJenisPembayaran::with('jenisPembayaran')->latest()->paginate(10);

        return view('admin.detail-jenis-pembayaran.index', compact('details'));
    }

    public function create()
    {
        $jenisPembayarans = JenisPembayaran::orderBy('metode_pembayaran')->get();

        return view('admin.detail-jenis-pembayaran.create', compact('jenisPembayarans'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_jenis_pembayaran' => ['required', 'exists:jenis_pembayarans,id'],
            'no_rek' => ['nullable', 'string', 'max:255'],
            'tempat_bayar' => ['nullable', 'string', 'max:50'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pembayaran', 'public');
        }

        DetailJenisPembayaran::create($data);

        return redirect()->route('admin.detail-jenis-pembayaran.index')->with('success', 'Detail pembayaran ditambahkan.');
    }

    public function edit(DetailJenisPembayaran $detailJenisPembayaran)
    {
        $jenisPembayarans = JenisPembayaran::orderBy('metode_pembayaran')->get();

        return view('admin.detail-jenis-pembayaran.edit', compact('detailJenisPembayaran', 'jenisPembayarans'));
    }

    public function update(Request $request, DetailJenisPembayaran $detailJenisPembayaran)
    {
        $data = $request->validate([
            'id_jenis_pembayaran' => ['required', 'exists:jenis_pembayarans,id'],
            'no_rek' => ['nullable', 'string', 'max:255'],
            'tempat_bayar' => ['nullable', 'string', 'max:50'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            if ($detailJenisPembayaran->foto) {
                Storage::disk('public')->delete($detailJenisPembayaran->foto);
            }
            $data['foto'] = $request->file('foto')->store('pembayaran', 'public');
        }

        $detailJenisPembayaran->update($data);

        return redirect()->route('admin.detail-jenis-pembayaran.index')->with('success', 'Detail pembayaran diperbarui.');
    }

    public function destroy(DetailJenisPembayaran $detailJenisPembayaran)
    {
        if ($detailJenisPembayaran->foto) {
            Storage::disk('public')->delete($detailJenisPembayaran->foto);
        }

        $detailJenisPembayaran->delete();

        return redirect()->route('admin.detail-jenis-pembayaran.index')->with('success', 'Detail pembayaran dihapus.');
    }
}
