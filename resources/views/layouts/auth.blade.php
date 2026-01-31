<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Masuk')</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=sora:300,400,500,600,700" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body { font-family: "Sora", system-ui, sans-serif; }
        </style>
    </head>
    <body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-900 to-emerald-950 text-slate-100">
        <main class="mx-auto flex min-h-screen w-full max-w-6xl items-center justify-center px-6 py-10">
            <div class="grid w-full gap-8 rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl md:grid-cols-2">
                <div class="flex flex-col justify-between gap-6">
                    <div>
                        <p class="text-xs uppercase tracking-[0.4em] text-emerald-300">Catering Online</p>
                        <h1 class="mt-2 text-3xl font-semibold leading-tight text-white">@yield('title', 'Masuk')</h1>
                        <p class="mt-3 text-sm text-slate-300">Pengalaman pemesanan yang modern, fokus, dan rapi.</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/10 px-6 py-5 text-sm text-slate-100">
                        <p class="text-base font-semibold">Flow yang jelas, tim yang solid.</p>
                        <p class="mt-2 text-slate-300">Paket → Pesanan → Pengiriman → Selesai.</p>
                    </div>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white p-6 text-slate-900">
                    @yield('content')
                </div>
            </div>
        </main>
    </body>
</html>
