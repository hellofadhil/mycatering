@extends('layouts.admin')

@section('title', 'Edit Paket')

@section('content')
<div class="rounded-2xl border border-slate-200 bg-white p-6">
    <form method="POST" action="{{ route('admin.paket.update', $paket) }}" enctype="multipart/form-data" class="grid gap-4 md:grid-cols-2">
        @csrf
        @method('PUT')
        <div class="md:col-span-2">
            <label class="text-sm font-medium text-slate-600">Nama Paket</label>
            <input type="text" name="nama_paket" value="{{ $paket->nama_paket }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Jenis</label>
            <select name="jenis" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                @foreach (['Prasmanan','Box'] as $jenis)
                    <option value="{{ $jenis }}" @selected($paket->jenis === $jenis)>{{ $jenis }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Kategori</label>
            <select name="kategori" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                @foreach (['Pernikahan','Selamatan','Ulang Tahun','Studi Tour','Rapat'] as $kategori)
                    <option value="{{ $kategori }}" @selected($paket->kategori === $kategori)>{{ $kategori }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Jumlah Pax</label>
            <input type="number" name="jumlah_pax" value="{{ $paket->jumlah_pax }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Harga Paket</label>
            <input type="number" name="harga_paket" value="{{ $paket->harga_paket }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        </div>
        <div class="md:col-span-2">
            <label class="text-sm font-medium text-slate-600">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">{{ $paket->deskripsi }}</textarea>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Foto Utama</label>
            <input type="file" name="foto1" class="mt-2 w-full text-sm">
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Foto Tambahan 1</label>
            <input type="file" name="foto2" class="mt-2 w-full text-sm">
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Foto Tambahan 2</label>
            <input type="file" name="foto3" class="mt-2 w-full text-sm">
        </div>
        <div class="md:col-span-2">
            <button class="rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
