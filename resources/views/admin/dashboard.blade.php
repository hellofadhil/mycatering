@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="grid gap-4 md:grid-cols-4">
    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Paket</p>
        <p class="mt-2 text-2xl font-semibold">{{ $stats['paket'] }}</p>
    </div>
    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Pelanggan</p>
        <p class="mt-2 text-2xl font-semibold">{{ $stats['pelanggan'] }}</p>
    </div>
    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Pemesanan</p>
        <p class="mt-2 text-2xl font-semibold">{{ $stats['pemesanan'] }}</p>
    </div>
    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Pengiriman</p>
        <p class="mt-2 text-2xl font-semibold">{{ $stats['pengiriman'] }}</p>
    </div>
</div>

<div class="mt-8 grid gap-6 lg:grid-cols-3">
    <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-5 text-sm text-emerald-900">
        <p class="text-xs uppercase tracking-[0.3em] text-emerald-700">Flow Admin</p>
        <ol class="mt-3 space-y-2">
            <li>1. Buat paket & harga.</li>
            <li>2. Tambah metode pembayaran.</li>
            <li>3. Konfirmasi pesanan pelanggan.</li>
            <li>4. Atur pengiriman ke kurir.</li>
        </ol>
    </div>
    <div class="lg:col-span-2 rounded-2xl border border-slate-200 bg-white p-6 shadow-md">
        <h3 class="text-lg font-semibold">Pesanan Terbaru</h3>
        <div class="mt-4 space-y-3">
            @forelse ($pesananTerbaru as $pesanan)
                <div class="flex items-center justify-between rounded-xl border border-slate-100 bg-slate-50 px-4 py-3 text-sm">
                    <div>
                        <p class="font-semibold">#{{ $pesanan->id }} - {{ $pesanan->pelanggan->nama_pelanggan }}</p>
                        <p class="text-slate-500">{{ $pesanan->tgl_pesan->format('d M Y') }}</p>
                    </div>
                    <span class="text-emerald-600">{{ $pesanan->status_pesan }}</span>
                </div>
            @empty
                <p class="text-sm text-slate-500">Belum ada pesanan.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
