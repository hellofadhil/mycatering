<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisPembayaran;
use Illuminate\Http\Request;

class JenisPembayaranController extends Controller
{
    public function index()
    {
        $jenisPembayarans = JenisPembayaran::latest()->paginate(10);

        return view('admin.jenis-pembayaran.index', compact('jenisPembayarans'));
    }

    public function create()
    {
        return view('admin.jenis-pembayaran.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'metode_pembayaran' => ['required', 'string', 'max:30'],
        ]);

        JenisPembayaran::create($data);

        return redirect()->route('admin.jenis-pembayaran.index')->with('success', 'Metode pembayaran ditambahkan.');
    }

    public function edit(JenisPembayaran $jenisPembayaran)
    {
        return view('admin.jenis-pembayaran.edit', compact('jenisPembayaran'));
    }

    public function update(Request $request, JenisPembayaran $jenisPembayaran)
    {
        $data = $request->validate([
            'metode_pembayaran' => ['required', 'string', 'max:30'],
        ]);

        $jenisPembayaran->update($data);

        return redirect()->route('admin.jenis-pembayaran.index')->with('success', 'Metode pembayaran diperbarui.');
    }

    public function destroy(JenisPembayaran $jenisPembayaran)
    {
        $jenisPembayaran->delete();

        return redirect()->route('admin.jenis-pembayaran.index')->with('success', 'Metode pembayaran dihapus.');
    }
}
