<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Admin Catering')</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=sora:300,400,500,600,700" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body { font-family: "Sora", system-ui, sans-serif; }
        </style>
    </head>
    <body class="bg-[#f6f7fb] text-slate-900">
        <div class="flex min-h-screen">
            <aside class="hidden w-72 flex-col border-r border-slate-200 bg-white p-6 md:flex">
                <div class="flex items-center gap-3">
                    <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-900 text-white">CR</span>
                    <div>
                        <p class="text-xs uppercase tracking-[0.4em] text-emerald-600">Panel</p>
                        <p class="text-lg font-semibold">Cita Rasa</p>
                    </div>
                </div>
                <div class="mt-6 rounded-2xl bg-emerald-50 px-4 py-3 text-xs text-emerald-800">
                    <p class="font-semibold">Flow Operasional</p>
                    <p class="mt-2">1. Paket & pembayaran</p>
                    <p>2. Konfirmasi pesanan</p>
                    <p>3. Atur pengiriman</p>
                </div>
                <nav class="mt-6 flex flex-col gap-2 text-sm font-medium">
                    <a href="{{ route('admin.dashboard') }}" class="rounded-xl px-3 py-2 hover:bg-slate-100">Dashboard</a>
                    <a href="{{ route('admin.paket.index') }}" class="rounded-xl px-3 py-2 hover:bg-slate-100">Paket</a>
                    <a href="{{ route('admin.jenis-pembayaran.index') }}" class="rounded-xl px-3 py-2 hover:bg-slate-100">Jenis Pembayaran</a>
                    <a href="{{ route('admin.detail-jenis-pembayaran.index') }}" class="rounded-xl px-3 py-2 hover:bg-slate-100">Detail Pembayaran</a>
                    <a href="{{ route('admin.pemesanan.index') }}" class="rounded-xl px-3 py-2 hover:bg-slate-100">Pemesanan</a>
                    <a href="{{ route('admin.pengiriman.index') }}" class="rounded-xl px-3 py-2 hover:bg-slate-100">Pengiriman</a>
                    <a href="{{ route('admin.pelanggan.index') }}" class="rounded-xl px-3 py-2 hover:bg-slate-100">Pelanggan</a>
                </nav>
                <form method="POST" action="{{ route('admin.logout') }}" class="mt-auto">
                    @csrf
                    <button class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100">Keluar</button>
                </form>
            </aside>
            <div class="flex-1">
                <header class="flex items-center justify-between border-b border-slate-200 bg-white px-6 py-4">
                    <div>
                        <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Dashboard</p>
                        <h1 class="text-lg font-semibold">@yield('title', 'Admin')</h1>
                    </div>
                    <div class="rounded-full border border-slate-200 px-4 py-2 text-xs text-slate-600">
                        {{ auth()->user()->name ?? 'Admin' }} • {{ auth()->user()->level ?? '' }}
                    </div>
                </header>
                <main class="px-6 py-8">
                    @if (session('success'))
                        <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-800 shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>
