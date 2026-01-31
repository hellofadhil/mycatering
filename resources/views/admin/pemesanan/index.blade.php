@extends('layouts.admin')

@section('title', 'Pemesanan')

@section('content')
<div class="rounded-2xl border border-slate-200 bg-white p-6">
    <h2 class="text-lg font-semibold">Daftar Pemesanan</h2>
    <div class="mt-4 overflow-hidden rounded-2xl border border-slate-200">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-left text-xs uppercase tracking-[0.2em] text-slate-500">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Pelanggan</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanans as $pemesanan)
                    <tr class="border-t border-slate-100">
                        <td class="px-4 py-3 font-semibold">#{{ $pemesanan->id }}</td>
                        <td class="px-4 py-3">{{ $pemesanan->pelanggan->nama_pelanggan }}</td>
                        <td class="px-4 py-3">{{ $pemesanan->status_pesan }}</td>
                        <td class="px-4 py-3">Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.pemesanan.show', $pemesanan) }}" class="text-emerald-600">Detail</a>
                                <a href="{{ route('admin.pemesanan.show', $pemesanan) }}" class="text-slate-600">Konfirmasi</a>
                                <form method="POST" action="{{ route('admin.pemesanan.destroy', $pemesanan) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-rose-600" onclick="return confirm('Hapus pemesanan ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $pemesanans->links() }}</div>
</div>
@endsection
