@extends('layouts.admin')

@section('title', 'Detail Jenis Pembayaran')

@section('content')
<div class="flex items-center justify-between">
    <h2 class="text-lg font-semibold">Detail Pembayaran</h2>
    <a href="{{ route('admin.detail-jenis-pembayaran.create') }}" class="rounded-xl bg-emerald-600 px-4 py-2 text-sm font-semibold text-white">Tambah Detail</a>
</div>

<div class="mt-6 overflow-hidden rounded-2xl border border-slate-200 bg-white">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-left text-xs uppercase tracking-[0.2em] text-slate-500">
            <tr>
                <th class="px-4 py-3">Metode</th>
                <th class="px-4 py-3">No Rek</th>
                <th class="px-4 py-3">Tempat Bayar</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                <tr class="border-t border-slate-100">
                    <td class="px-4 py-3 font-semibold">{{ $detail->jenisPembayaran->metode_pembayaran }}</td>
                    <td class="px-4 py-3">{{ $detail->no_rek ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $detail->tempat_bayar ?? '-' }}</td>
                    <td class="px-4 py-3">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.detail-jenis-pembayaran.edit', $detail) }}" class="text-slate-600">Edit</a>
                            <form method="POST" action="{{ route('admin.detail-jenis-pembayaran.destroy', $detail) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-rose-600" onclick="return confirm('Hapus detail ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $details->links() }}</div>
@endsection
