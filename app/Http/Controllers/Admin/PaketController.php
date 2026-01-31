<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::latest()->paginate(10);

        return view('admin.paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('admin.paket.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_paket' => ['required', 'string', 'max:50'],
            'jenis' => ['required', 'in:Prasmanan,Box'],
            'kategori' => ['required', 'in:Pernikahan,Selamatan,Ulang Tahun,Studi Tour,Rapat'],
            'jumlah_pax' => ['required', 'integer', 'min:1'],
            'harga_paket' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['nullable', 'string'],
            'foto1' => ['nullable', 'image', 'max:2048'],
            'foto2' => ['nullable', 'image', 'max:2048'],
            'foto3' => ['nullable', 'image', 'max:2048'],
        ]);

        foreach (['foto1', 'foto2', 'foto3'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('paket', 'public');
            }
        }

        Paket::create($data);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function show(Paket $paket)
    {
        return view('admin.paket.show', compact('paket'));
    }

    public function edit(Paket $paket)
    {
        return view('admin.paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $data = $request->validate([
            'nama_paket' => ['required', 'string', 'max:50'],
            'jenis' => ['required', 'in:Prasmanan,Box'],
            'kategori' => ['required', 'in:Pernikahan,Selamatan,Ulang Tahun,Studi Tour,Rapat'],
            'jumlah_pax' => ['required', 'integer', 'min:1'],
            'harga_paket' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['nullable', 'string'],
            'foto1' => ['nullable', 'image', 'max:2048'],
            'foto2' => ['nullable', 'image', 'max:2048'],
            'foto3' => ['nullable', 'image', 'max:2048'],
        ]);

        foreach (['foto1', 'foto2', 'foto3'] as $field) {
            if ($request->hasFile($field)) {
                if ($paket->$field) {
                    Storage::disk('public')->delete($paket->$field);
                }
                $data[$field] = $request->file($field)->store('paket', 'public');
            }
        }

        $paket->update($data);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy(Paket $paket)
    {
        foreach (['foto1', 'foto2', 'foto3'] as $field) {
            if ($paket->$field) {
                Storage::disk('public')->delete($paket->$field);
            }
        }

        $paket->delete();

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil dihapus.');
    }
}
