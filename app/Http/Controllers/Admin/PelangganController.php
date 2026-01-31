<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::latest()->paginate(10);

        return view('admin.pelanggan.index', compact('pelanggans'));
    }

    public function show(Pelanggan $pelanggan)
    {
        return view('admin.pelanggan.show', compact('pelanggan'));
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('admin.pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $data = $request->validate([
            'nama_pelanggan' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:pelanggans,email,' . $pelanggan->id],
            'tgl_lahir' => ['nullable', 'date'],
            'telepon' => ['nullable', 'string', 'max:15'],
            'alamat1' => ['nullable', 'string', 'max:255'],
            'alamat2' => ['nullable', 'string', 'max:255'],
            'alamat3' => ['nullable', 'string', 'max:255'],
            'kartu_id' => ['nullable', 'string', 'max:255'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            if ($pelanggan->foto) {
                Storage::disk('public')->delete($pelanggan->foto);
            }
            $data['foto'] = $request->file('foto')->store('pelanggan', 'public');
        }

        $pelanggan->update($data);

        return redirect()->route('admin.pelanggan.index')->with('success', 'Data pelanggan diperbarui.');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        if ($pelanggan->foto) {
            Storage::disk('public')->delete($pelanggan->foto);
        }

        $pelanggan->delete();

        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan dihapus.');
    }
}
