@extends('layouts.admin')

@section('title', 'Edit Pemesanan')

@section('content')
<div class="rounded-2xl border border-slate-200 bg-white p-6">
    <form method="POST" action="{{ route('admin.pemesanan.update', $pemesanan) }}" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="text-sm font-medium text-slate-600">Status Pemesanan</label>
            <select name="status_pesan" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
                @foreach (['Menunggu Konfirmasi','Sedang Diproses','Menunggu Kurir'] as $status)
                    <option value="{{ $status }}" @selected($pemesanan->status_pesan === $status)>{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Nomor Resi</label>
            <input type="text" name="no_resi" value="{{ $pemesanan->no_resi }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
        </div>
        <button class="rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white">Simpan</button>
    </form>
</div>
@endsection
