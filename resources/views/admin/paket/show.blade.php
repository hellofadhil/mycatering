@extends('layouts.admin')

@section('title', 'Detail Paket')

@section('content')
<div class="grid gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 rounded-2xl border border-slate-200 bg-white p-6">
        <h2 class="text-xl font-semibold">{{ $paket->nama_paket }}</h2>
        <p class="mt-2 text-sm text-slate-500">{{ $paket->jenis }} • {{ $paket->kategori }}</p>
        <p class="mt-4 text-sm text-slate-600">{{ $paket->deskripsi }}</p>
        <div class="mt-6 flex flex-wrap gap-3">
            @foreach ([$paket->foto1, $paket->foto2, $paket->foto3] as $foto)
                @if ($foto)
                    <img src="{{ asset('storage/' . $foto) }}" class="h-28 w-40 rounded-xl object-cover" alt="Foto paket">
                @endif
            @endforeach
        </div>
    </div>
    <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-6">
        <p class="text-xs uppercase tracking-[0.2em] text-emerald-700">Harga</p>
        <p class="mt-2 text-2xl font-semibold text-emerald-700">Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</p>
        <p class="mt-3 text-sm text-emerald-900">Jumlah Pax: {{ $paket->jumlah_pax }}</p>
        <a href="{{ route('admin.paket.edit', $paket) }}" class="mt-4 inline-flex rounded-xl bg-emerald-600 px-4 py-2 text-sm font-semibold text-white">Edit Paket</a>
    </div>
</div>
@endsection
