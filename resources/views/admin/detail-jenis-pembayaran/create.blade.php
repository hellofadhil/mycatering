@extends('layouts.admin')

@section('title', 'Tambah Detail Pembayaran')

@section('content')
<div class="rounded-2xl border border-slate-200 bg-white p-6">
    <form method="POST" action="{{ route('admin.detail-jenis-pembayaran.store') }}" enctype="multipart/form-data" class="grid gap-4 md:grid-cols-2">
        @csrf
        <div class="md:col-span-2">
            <label class="text-sm font-medium text-slate-600">Metode Pembayaran</label>
            <select name="id_jenis_pembayaran" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                @foreach ($jenisPembayarans as $jenis)
                    <option value="{{ $jenis->id }}">{{ $jenis->metode_pembayaran }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">No Rekening</label>
            <input type="text" name="no_rek" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Tempat Bayar</label>
            <input type="text" name="tempat_bayar" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
        </div>
        <div class="md:col-span-2">
            <label class="text-sm font-medium text-slate-600">Foto</label>
            <input type="file" name="foto" class="mt-2 w-full text-sm">
        </div>
        <div class="md:col-span-2">
            <button class="rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white">Simpan</button>
        </div>
    </form>
</div>
@endsection
