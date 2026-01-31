@extends('layouts.admin')

@section('title', 'Detail Pemesanan')

@section('content')
<div class="grid gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 rounded-2xl border border-slate-200 bg-white p-6">
        <h2 class="text-xl font-semibold">Pesanan #{{ $pemesanan->id }}</h2>
        <div class="mt-4 grid gap-3 text-sm text-slate-600">
            <div class="flex items-center justify-between">
                <span>Pelanggan</span>
                <span class="font-semibold">{{ $pemesanan->pelanggan->nama_pelanggan }}</span>
            </div>
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
                <span class="font-semibold">{{ $pemesanan->jenisPembayaran->metode_pembayaran }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span>No Resi</span>
                <span class="font-semibold">{{ $pemesanan->no_resi ?? '-' }}</span>
            </div>
        </div>
        <div class="mt-6 rounded-2xl border border-slate-200 p-4">
            <h3 class="text-sm font-semibold text-slate-700">Detail Paket</h3>
            <p class="mt-2 text-base font-semibold">{{ $pemesanan->detail->first()?->paket?->nama_paket ?? '-' }}</p>
            <p class="text-sm text-slate-500">{{ $pemesanan->detail->first()?->paket?->jenis }} • {{ $pemesanan->detail->first()?->paket?->jumlah_pax }} pax</p>
        </div>
        <div class="mt-4 rounded-2xl border border-slate-200 p-4 text-sm text-slate-600">
            <h3 class="text-sm font-semibold text-slate-700">Alamat Pengiriman</h3>
            <p class="mt-2"><span class="text-slate-500">Nama Penerima:</span> {{ $pemesanan->nama_penerima }}</p>
            <p><span class="text-slate-500">Telepon:</span> {{ $pemesanan->telepon_penerima }}</p>
            <p><span class="text-slate-500">Alamat:</span> {{ $pemesanan->alamat_kirim }}</p>
            <p><span class="text-slate-500">Catatan:</span> {{ $pemesanan->catatan ?? '-' }}</p>
        </div>
    </div>
    <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-6">
        <p class="text-xs uppercase tracking-[0.2em] text-emerald-700">Total</p>
        <p class="mt-2 text-2xl font-semibold text-emerald-700">Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</p>
        <p class="mt-4 text-sm text-emerald-800">Pengiriman: {{ $pemesanan->pengiriman?->status_kirim ?? 'Belum ada' }}</p>

        <div class="mt-6 rounded-2xl border border-emerald-200 bg-white p-4 text-sm">
            <p class="text-xs uppercase tracking-[0.2em] text-emerald-600">Konfirmasi Pesanan</p>
            <form method="POST" action="{{ route('admin.pemesanan.update', $pemesanan) }}" class="mt-3 space-y-3">
                @csrf
                @method('PUT')
                <input type="hidden" name="status_pesan" value="Sedang Diproses">
                <div>
                    <label class="text-sm font-medium text-slate-600">Nomor Resi</label>
                    <input type="text" name="no_resi" value="{{ $pemesanan->no_resi }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2 text-sm" required>
                </div>
                <button class="w-full rounded-xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white">
                    Konfirmasi Sekarang
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
