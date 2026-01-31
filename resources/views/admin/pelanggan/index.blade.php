@extends('layouts.admin')

@section('title', 'Data Pelanggan')

@section('content')
<div class="rounded-2xl border border-slate-200 bg-white p-6">
    <h2 class="text-lg font-semibold">Daftar Pelanggan</h2>
    <div class="mt-4 overflow-hidden rounded-2xl border border-slate-200">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-left text-xs uppercase tracking-[0.2em] text-slate-500">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Telepon</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggans as $pelanggan)
                    <tr class="border-t border-slate-100">
                        <td class="px-4 py-3 font-semibold">{{ $pelanggan->nama_pelanggan }}</td>
                        <td class="px-4 py-3">{{ $pelanggan->email }}</td>
                        <td class="px-4 py-3">{{ $pelanggan->telepon ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.pelanggan.show', $pelanggan) }}" class="text-emerald-600">Detail</a>
                                <a href="{{ route('admin.pelanggan.edit', $pelanggan) }}" class="text-slate-600">Edit</a>
                                <form method="POST" action="{{ route('admin.pelanggan.destroy', $pelanggan) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-rose-600" onclick="return confirm('Hapus pelanggan ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $pelanggans->links() }}</div>
</div>
@endsection
