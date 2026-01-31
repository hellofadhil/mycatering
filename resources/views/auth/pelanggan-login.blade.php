@extends('layouts.auth')

@section('title', 'Masuk Pelanggan')

@section('content')
<form method="POST" action="{{ route('pelanggan.login.submit') }}" class="space-y-4">
    @csrf
    <div>
        <label class="text-sm font-medium text-slate-600">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        @error('email')
            <p class="mt-2 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label class="text-sm font-medium text-slate-600">Password</label>
        <input type="password" name="password" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
    </div>
    <div class="flex items-center justify-between text-xs text-slate-500">
        <label class="flex items-center gap-2">
            <input type="checkbox" name="remember" class="rounded border-slate-300">
            Ingat saya
        </label>
        <a href="{{ route('pelanggan.register') }}" class="text-emerald-600">Buat akun</a>
    </div>
    <button class="w-full rounded-xl bg-emerald-600 px-4 py-3 text-sm font-semibold text-white hover:bg-emerald-700">Masuk</button>
</form>
@endsection
