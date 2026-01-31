@extends('layouts.admin')

@section('title', 'Pengiriman')

@section('content')
<div class="flex items-center justify-between">
    <h2 class="text-lg font-semibold">Daftar Pengiriman</h2>
    <a href="{{ route('admin.pengiriman.create') }}" class="rounded-xl bg-emerald-600 px-4 py-2 text-sm font-semibold text-white">Tambah Pengiriman</a>
</div>

<div class="mt-6 overflow-hidden rounded-2xl border border-slate-200 bg-white">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-left text-xs uppercase tracking-[0.2em] text-slate-500">
            <tr>
                <th class="px-4 py-3">Pesanan</th>
                <th class="px-4 py-3">Kurir</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Alamat</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengirimans as $pengiriman)
                <tr class="border-t border-slate-100">
                    <td class="px-4 py-3">#{{ $pengiriman->pemesanan->id }}</td>
                    <td class="px-4 py-3">{{ $pengiriman->user->name }}</td>
                    <td class="px-4 py-3">{{ $pengiriman->status_kirim }}</td>
                    <td class="px-4 py-3">{{ $pengiriman->pemesanan->alamat_kirim ?? '-' }}</td>
                    <td class="px-4 py-3">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.pengiriman.edit', $pengiriman) }}" class="text-slate-600">Edit</a>
                            <form method="POST" action="{{ route('admin.pengiriman.destroy', $pengiriman) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-rose-600" onclick="return confirm('Hapus data pengiriman ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $pengirimans->links() }}</div>
@endsection
