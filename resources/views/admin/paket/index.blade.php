@extends('layouts.admin')

@section('title', 'Manajemen Paket')

@section('content')
<div class="flex items-center justify-between">
    <h2 class="text-lg font-semibold">Daftar Paket</h2>
    <a href="{{ route('admin.paket.create') }}" class="rounded-xl bg-emerald-600 px-4 py-2 text-sm font-semibold text-white">Tambah Paket</a>
</div>

<div class="mt-6 overflow-hidden rounded-2xl border border-slate-200 bg-white">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-left text-xs uppercase tracking-[0.2em] text-slate-500">
            <tr>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Jenis</th>
                <th class="px-4 py-3">Kategori</th>
                <th class="px-4 py-3">Harga</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pakets as $paket)
                <tr class="border-t border-slate-100">
                    <td class="px-4 py-3 font-semibold">{{ $paket->nama_paket }}</td>
                    <td class="px-4 py-3">{{ $paket->jenis }}</td>
                    <td class="px-4 py-3">{{ $paket->kategori }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</td>
                    <td class="px-4 py-3">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.paket.show', $paket) }}" class="text-emerald-600">Detail</a>
                            <a href="{{ route('admin.paket.edit', $paket) }}" class="text-slate-600">Edit</a>
                            <form method="POST" action="{{ route('admin.paket.destroy', $paket) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-rose-600" onclick="return confirm('Hapus paket ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $pakets->links() }}</div>
@endsection
