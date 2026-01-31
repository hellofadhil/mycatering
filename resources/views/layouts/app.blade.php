<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Catering Online')</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=sora:300,400,500,600,700" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body { font-family: "Sora", system-ui, sans-serif; }
        </style>
    </head>
    <body class="bg-[#f7f8fb] text-slate-900">
        <div class="absolute inset-x-0 top-0 -z-10 h-72 bg-gradient-to-br from-emerald-50 via-white to-slate-100"></div>
        <header class="sticky top-0 z-50 border-b border-slate-200/70 bg-white/80 backdrop-blur">
            <div class="mx-auto flex w-full max-w-6xl items-center justify-between px-6 py-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-900 text-white">CR</span>
                    <div>
                        <p class="text-xs uppercase tracking-[0.4em] text-emerald-600">Catering</p>
                        <p class="-mt-1 text-lg font-semibold">Cita Rasa</p>
                    </div>
                </a>
                <nav class="hidden items-center gap-6 text-sm font-medium md:flex">
                    <a href="{{ route('home') }}" class="text-slate-600 hover:text-slate-900">Beranda</a>
                    <a href="{{ route('pelanggan.paket.index') }}" class="text-slate-600 hover:text-slate-900">Paket</a>
                    <a href="{{ route('pelanggan.pemesanan.create') }}" class="text-slate-600 hover:text-slate-900">Pesan</a>
                    <a href="{{ route('pelanggan.pemesanan.riwayat') }}" class="text-slate-600 hover:text-slate-900">Riwayat</a>
                </nav>
                <div class="flex items-center gap-3">
                    @auth('pelanggan')
                        <a href="{{ route('pelanggan.dashboard') }}" class="rounded-full border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm font-semibold text-emerald-700">Dashboard</a>
                        <form method="POST" action="{{ route('pelanggan.logout') }}">
                            @csrf
                            <button class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100">Keluar</button>
                        </form>
                    @else
                        <a href="{{ route('pelanggan.login') }}" class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100">Masuk</a>
                        <a href="{{ route('pelanggan.register') }}" class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800">Daftar</a>
                    @endauth
                </div>
            </div>
        </header>

        <main class="mx-auto w-full max-w-6xl px-6 py-10">
            @if (session('success'))
                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-800 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>

        <footer class="border-t border-slate-200 bg-white">
            <div class="mx-auto flex w-full max-w-6xl flex-col gap-4 px-6 py-10 text-sm text-slate-500 md:flex-row md:items-center md:justify-between">
                <p>© {{ date('Y') }} Catering Cita Rasa. Semua hak dilindungi.</p>
                <p>Kontak: halo@citarasa.id • 0812-1234-5678</p>
            </div>
        </footer>
    </body>
</html>
