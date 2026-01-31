@extends('layouts.admin')

@section('title', 'Jenis Pembayaran')

@section('content')
<div class="flex items-center justify-between">
    <h2 class="text-lg font-semibold">Metode Pembayaran</h2>
    <a href="{{ route('admin.jenis-pembayaran.create') }}" class="rounded-xl bg-emerald-600 px-4 py-2 text-sm font-semibold text-white">Tambah Metode</a>
</div>

<div class="mt-6 overflow-hidden rounded-2xl border border-slate-200 bg-white">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-left text-xs uppercase tracking-[0.2em] text-slate-500">
            <tr>
                <th class="px-4 py-3">Metode</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenisPembayarans as $jenis)
                <tr class="border-t border-slate-100">
                    <td class="px-4 py-3 font-semibold">{{ $jenis->metode_pembayaran }}</td>
                    <td class="px-4 py-3">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.jenis-pembayaran.edit', $jenis) }}" class="text-slate-600">Edit</a>
                            <form method="POST" action="{{ route('admin.jenis-pembayaran.destroy', $jenis) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-rose-600" onclick="return confirm('Hapus metode ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $jenisPembayarans->links() }}</div>
@endsection
