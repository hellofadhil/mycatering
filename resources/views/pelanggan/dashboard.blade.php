@extends('layouts.app')

@section('title', 'Dashboard Pelanggan')

@section('content')
<div class="grid gap-6 md:grid-cols-3">
    <div class="md:col-span-2 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Dashboard</p>
        <h2 class="mt-2 text-3xl font-semibold">Halo, {{ $pelanggan->nama_pelanggan }}</h2>
        <p class="mt-2 text-sm text-slate-500">Flow pesanan Anda: pilih paket → isi alamat → konfirmasi → kirim.</p>
        <div class="mt-6 flex flex-wrap gap-3">
            <a href="{{ route('pelanggan.pemesanan.create') }}" class="rounded-full bg-slate-900 px-5 py-2 text-sm font-semibold text-white">Buat Pesanan</a>
            <a href="{{ route('pelanggan.pemesanan.riwayat') }}" class="rounded-full border border-slate-200 px-5 py-2 text-sm font-semibold text-slate-700">Riwayat</a>
            <a href="{{ route('pelanggan.profil.edit') }}" class="rounded-full border border-emerald-200 bg-emerald-50 px-5 py-2 text-sm font-semibold text-emerald-700">Lengkapi Profil</a>
        </div>
    </div>
    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Akun</p>
        <h3 class="mt-2 text-lg font-semibold text-slate-900">Aktif</h3>
        <p class="mt-3 text-sm text-slate-600">Email: {{ $pelanggan->email }}</p>
        <p class="text-sm text-slate-600">Telepon: {{ $pelanggan->telepon ?? '-' }}</p>
    </div>
</div>

<div class="mt-10">
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold">Pesanan Terbaru</h3>
        <a href="{{ route('pelanggan.pemesanan.riwayat') }}" class="text-sm font-semibold text-emerald-600">Lihat semua</a>
    </div>
    <div class="mt-4 space-y-3">
        @forelse ($pesananTerbaru as $pesanan)
            <div class="rounded-2xl border border-slate-200 bg-white px-5 py-4 shadow-sm">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="text-sm text-slate-500">Pesanan #{{ $pesanan->id }}</p>
                        <p class="text-base font-semibold">{{ $pesanan->status_pesan }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-slate-500">{{ $pesanan->tgl_pesan->format('d M Y') }}</p>
                        <p class="text-sm font-semibold text-emerald-600">Rp {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-sm text-slate-500">Belum ada pesanan.</p>
        @endforelse
    </div>
</div>
@endsection
