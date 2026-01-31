@extends('layouts.app')

@section('title', 'Riwayat Pesanan')

@section('content')
<h2 class="text-2xl font-semibold">Riwayat Pesanan</h2>
<div class="mt-6 space-y-4">
    @forelse ($pemesanans as $pemesanan)
        <div class="rounded-2xl border border-slate-200 bg-white px-5 py-4">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="text-sm text-slate-500">Pesanan #{{ $pemesanan->id }}</p>
                    <p class="text-base font-semibold">{{ $pemesanan->status_pesan }}</p>
                    <p class="mt-1 text-xs text-slate-400">Paket: {{ $pemesanan->detail->first()?->paket?->nama_paket ?? '-' }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-slate-500">{{ $pemesanan->tgl_pesan->format('d M Y') }}</p>
                    <p class="text-sm font-semibold text-emerald-600">Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</p>
                    <a href="{{ route('pelanggan.pemesanan.show', $pemesanan) }}" class="text-xs font-semibold text-emerald-600">Lihat Detail</a>
                </div>
            </div>
        </div>
    @empty
        <p class="text-sm text-slate-500">Belum ada pesanan.</p>
    @endforelse
</div>

<div class="mt-8">{{ $pemesanans->links() }}</div>
@endsection
