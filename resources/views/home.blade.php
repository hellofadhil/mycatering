@extends('layouts.app')

@section('title', 'Catering Online Modern')

@section('content')
<section class="grid items-center gap-10 md:grid-cols-2">
    <div>
        <p class="text-xs uppercase tracking-[0.4em] text-emerald-600">Catering Online</p>
        <h1 class="mt-3 text-4xl font-semibold leading-tight text-slate-900 md:text-5xl">
            Platform catering yang terasa seperti startup premium.
        </h1>
        <p class="mt-4 text-base text-slate-600">
            Flow jelas, pengalaman mulus, dan kontrol penuh dari paket sampai pengiriman.
        </p>
        <div class="mt-6 flex flex-wrap gap-3">
            <a href="{{ route('pelanggan.paket.index') }}" class="rounded-full bg-slate-900 px-6 py-3 text-sm font-semibold text-white hover:bg-slate-800">
                Lihat Paket
            </a>
            <a href="{{ route('pelanggan.pemesanan.create') }}" class="rounded-full border border-slate-200 px-6 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">
                Buat Pesanan
            </a>
        </div>
        <div class="mt-8 grid grid-cols-3 gap-4 text-sm text-slate-600">
            <div>
                <p class="text-2xl font-semibold text-slate-900">120+</p>
                <p>Acara terlayani</p>
            </div>
            <div>
                <p class="text-2xl font-semibold text-slate-900">24/7</p>
                <p>Dukungan</p>
            </div>
            <div>
                <p class="text-2xl font-semibold text-slate-900">4.9</p>
                <p>Rating pelanggan</p>
            </div>
        </div>
    </div>
    <div class="relative">
        <div class="absolute inset-0 -rotate-2 rounded-[32px] bg-gradient-to-br from-emerald-100 via-white to-slate-100"></div>
        <div class="relative rounded-[32px] border border-white bg-white p-6 shadow-2xl shadow-emerald-200/30">
            <div class="space-y-4">
                <div class="rounded-2xl bg-slate-900 px-5 py-4 text-white">
                    <p class="text-sm text-emerald-200">Paket Favorit</p>
                    <p class="mt-1 text-xl font-semibold">Elegance Wedding</p>
                </div>
                <div class="grid gap-3 rounded-2xl border border-slate-200 p-4 text-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500">Kategori</span>
                        <span class="font-semibold">Pernikahan</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500">Pax</span>
                        <span class="font-semibold">250</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500">Harga</span>
                        <span class="font-semibold text-emerald-600">Rp 35.000.000</span>
                    </div>
                </div>
                <div class="rounded-2xl bg-emerald-50 px-4 py-3 text-xs text-emerald-700">
                    Kurasi menu, layanan setup, dan tim profesional.
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-14">
    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Flow Platform</p>
        <div class="mt-4 grid gap-4 md:grid-cols-4">
            <div class="rounded-2xl border border-slate-200 p-4">
                <p class="text-sm font-semibold">1. Paket</p>
                <p class="mt-2 text-xs text-slate-500">Admin buat paket + harga.</p>
            </div>
            <div class="rounded-2xl border border-slate-200 p-4">
                <p class="text-sm font-semibold">2. Pesanan</p>
                <p class="mt-2 text-xs text-slate-500">Pelanggan pesan via modal.</p>
            </div>
            <div class="rounded-2xl border border-slate-200 p-4">
                <p class="text-sm font-semibold">3. Konfirmasi</p>
                <p class="mt-2 text-xs text-slate-500">Admin validasi & atur kurir.</p>
            </div>
            <div class="rounded-2xl border border-slate-200 p-4">
                <p class="text-sm font-semibold">4. Pengiriman</p>
                <p class="mt-2 text-xs text-slate-500">Kurir update status sampai selesai.</p>
            </div>
        </div>
    </div>
</section>

<section class="mt-16">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Paket Terbaru</p>
            <h2 class="mt-2 text-2xl font-semibold">Pilihan Paket Unggulan</h2>
        </div>
        <a href="{{ route('pelanggan.paket.index') }}" class="text-sm font-semibold text-emerald-600">Lihat semua</a>
    </div>
    <div class="mt-6 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($pakets as $paket)
            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="h-40 rounded-2xl bg-slate-100">
                    @if ($paket->foto1)
                        <img src="{{ asset('storage/' . $paket->foto1) }}" class="h-full w-full rounded-2xl object-cover" alt="{{ $paket->nama_paket }}">
                    @endif
                </div>
                <p class="mt-4 text-xs uppercase tracking-[0.2em] text-emerald-600">{{ $paket->kategori }}</p>
                <h3 class="mt-2 text-lg font-semibold">{{ $paket->nama_paket }}</h3>
                <p class="mt-1 text-sm text-slate-500">{{ $paket->jenis }} • {{ $paket->jumlah_pax }} pax</p>
                <div class="mt-4 flex items-center justify-between">
                    <p class="text-base font-semibold text-slate-900">Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</p>
                    <a href="{{ route('pelanggan.paket.show', $paket) }}" class="text-sm font-semibold text-emerald-600">Detail</a>
                </div>
            </div>
        @empty
            <p class="text-sm text-slate-500">Belum ada paket tersedia.</p>
        @endforelse
    </div>
</section>
@endsection
