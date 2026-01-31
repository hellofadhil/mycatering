@extends('layouts.auth')

@section('title', 'Daftar Pelanggan')

@section('content')
<form method="POST" action="{{ route('pelanggan.register.submit') }}" class="space-y-4">
    @csrf
    <div>
        <label class="text-sm font-medium text-slate-600">Nama Lengkap</label>
        <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        @error('nama_pelanggan')
            <p class="mt-2 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label class="text-sm font-medium text-slate-600">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        @error('email')
            <p class="mt-2 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="grid gap-4 md:grid-cols-2">
        <div>
            <label class="text-sm font-medium text-slate-600">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Telepon</label>
            <input type="text" name="telepon" value="{{ old('telepon') }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        </div>
    </div>
    <div>
        <label class="text-sm font-medium text-slate-600">Alamat Utama</label>
        <input type="text" name="alamat1" value="{{ old('alamat1') }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
    </div>
    <div>
        <label class="text-sm font-medium text-slate-600">Password</label>
        <input type="password" name="password" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
    </div>
    <div>
        <label class="text-sm font-medium text-slate-600">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
    </div>
    <button class="w-full rounded-xl bg-emerald-600 px-4 py-3 text-sm font-semibold text-white hover:bg-emerald-700">Daftar Sekarang</button>
    <p class="text-center text-xs text-slate-500">Sudah punya akun? <a href="{{ route('pelanggan.login') }}" class="text-emerald-600">Masuk</a></p>
</form>
@endsection
