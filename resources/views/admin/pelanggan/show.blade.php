@extends('layouts.admin')

@section('title', 'Detail Pelanggan')

@section('content')
<div class="grid gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 rounded-2xl border border-slate-200 bg-white p-6">
        <h2 class="text-xl font-semibold">{{ $pelanggan->nama_pelanggan }}</h2>
        <div class="mt-4 grid gap-3 text-sm text-slate-600">
            <div class="flex items-center justify-between">
                <span>Email</span>
                <span class="font-semibold">{{ $pelanggan->email }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span>Telepon</span>
                <span class="font-semibold">{{ $pelanggan->telepon ?? '-' }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span>Alamat</span>
                <span class="font-semibold">{{ $pelanggan->alamat1 ?? '-' }}</span>
            </div>
        </div>
    </div>
    <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-6">
        <p class="text-xs uppercase tracking-[0.2em] text-emerald-700">Foto Kartu</p>
        <div class="mt-4 h-40 rounded-2xl bg-white">
            @if ($pelanggan->foto)
                <img src="{{ asset('storage/' . $pelanggan->foto) }}" class="h-full w-full rounded-2xl object-cover" alt="Foto pelanggan">
            @endif
        </div>
        <a href="{{ route('admin.pelanggan.edit', $pelanggan) }}" class="mt-4 inline-flex rounded-xl bg-emerald-600 px-4 py-2 text-sm font-semibold text-white">Edit Data</a>
    </div>
</div>
@endsection
