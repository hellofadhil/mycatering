<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganAuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.pelanggan-register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'nama_pelanggan' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:pelanggans,email'],
            'password' => ['required', 'min:6', 'confirmed'],
            'tgl_lahir' => ['required', 'date'],
            'telepon' => ['required', 'string', 'max:15'],
            'alamat1' => ['required', 'string', 'max:255'],
        ]);

        $pelanggan = Pelanggan::create([
            'nama_pelanggan' => $data['nama_pelanggan'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tgl_lahir' => $data['tgl_lahir'],
            'telepon' => $data['telepon'],
            'alamat1' => $data['alamat1'],
        ]);

        Auth::guard('pelanggan')->login($pelanggan);

        return redirect()->route('pelanggan.dashboard');
    }

    public function showLogin()
    {
        return view('auth.pelanggan-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('pelanggan')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->route('pelanggan.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password tidak valid.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
