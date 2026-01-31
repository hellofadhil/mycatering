@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
<div class="grid gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 rounded-3xl border border-slate-200 bg-white p-6">
        <h2 class="text-lg font-semibold">Pesanan #{{ $pemesanan->id }}</h2>
        <div class="mt-4 grid gap-3 text-sm text-slate-600">
            <div class="flex items-center justify-between">
                <span>Status</span>
                <span class="font-semibold text-emerald-600">{{ $pemesanan->status_pesan }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span>Tanggal Pesan</span>
                <span class="font-semibold">{{ $pemesanan->tgl_pesan->format('d M Y H:i') }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span>Metode Pembayaran</span>
                <span class="font-semibold">{{ $pemesanan->jenisPembayaran->metode_pembayaran ?? '-' }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span>Nomor Resi</span>
                <span class="font-semibold">{{ $pemesanan->no_resi ?? '-' }}</span>
            </div>
        </div>
        <div class="mt-6 rounded-2xl border border-slate-200 p-4">
            <h3 class="text-sm font-semibold text-slate-700">Detail Paket</h3>
            <p class="mt-2 text-base font-semibold">{{ $pemesanan->detail->first()?->paket?->nama_paket ?? '-' }}</p>
            <p class="text-sm text-slate-500">{{ $pemesanan->detail->first()?->paket?->jenis }} • {{ $pemesanan->detail->first()?->paket?->jumlah_pax }} pax</p>
        </div>
        <div class="mt-4 rounded-2xl border border-slate-200 p-4 text-sm text-slate-600">
            <h3 class="text-sm font-semibold text-slate-700">Pengiriman</h3>
            <p class="mt-2"><span class="text-slate-500">Nama Penerima:</span> {{ $pemesanan->nama_penerima }}</p>
            <p><span class="text-slate-500">Telepon:</span> {{ $pemesanan->telepon_penerima }}</p>
            <p><span class="text-slate-500">Alamat:</span> {{ $pemesanan->alamat_kirim }}</p>
            <p><span class="text-slate-500">Catatan:</span> {{ $pemesanan->catatan ?? '-' }}</p>
        </div>
    </div>
    <div class="rounded-3xl border border-emerald-200 bg-emerald-50 p-6">
        <p class="text-xs uppercase tracking-[0.2em] text-emerald-700">Total</p>
        <p class="mt-2 text-2xl font-semibold text-emerald-700">Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</p>
        <p class="mt-4 text-sm text-emerald-800">Pengiriman: {{ $pemesanan->pengiriman?->status_kirim ?? 'Menunggu' }}</p>
    </div>
</div>
@endsection
