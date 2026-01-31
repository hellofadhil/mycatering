@extends('layouts.admin')

@section('title', 'Tambah Paket')

@section('content')
<div class="rounded-2xl border border-slate-200 bg-white p-6">
    <form method="POST" action="{{ route('admin.paket.store') }}" enctype="multipart/form-data" class="grid gap-4 md:grid-cols-2">
        @csrf
        <div class="md:col-span-2">
            <label class="text-sm font-medium text-slate-600">Nama Paket</label>
            <input type="text" name="nama_paket" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Jenis</label>
            <select name="jenis" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                <option value="Prasmanan">Prasmanan</option>
                <option value="Box">Box</option>
            </select>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Kategori</label>
            <select name="kategori" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                <option value="Pernikahan">Pernikahan</option>
                <option value="Selamatan">Selamatan</option>
                <option value="Ulang Tahun">Ulang Tahun</option>
                <option value="Studi Tour">Studi Tour</option>
                <option value="Rapat">Rapat</option>
            </select>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Jumlah Pax</label>
            <input type="number" name="jumlah_pax" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Harga Paket</label>
            <input type="number" name="harga_paket" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        </div>
        <div class="md:col-span-2">
            <label class="text-sm font-medium text-slate-600">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm"></textarea>
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
            <button class="rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white">Simpan Paket</button>
        </div>
    </form>
</div>
@endsection
