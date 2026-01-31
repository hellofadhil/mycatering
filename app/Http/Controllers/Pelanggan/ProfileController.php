<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        return view('pelanggan.profil.edit', compact('pelanggan'));
    }

    public function update(Request $request)
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        $data = $request->validate([
            'nama_pelanggan' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:pelanggans,email,' . $pelanggan->id],
            'tgl_lahir' => ['required', 'date'],
            'telepon' => ['required', 'string', 'max:15'],
            'alamat1' => ['required', 'string', 'max:255'],
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

        return redirect()->route('pelanggan.dashboard')->with('success', 'Profil berhasil diperbarui.');
    }
}
