@extends('layouts.admin')

@section('title', 'Edit Pelanggan')

@section('content')
<div class="rounded-2xl border border-slate-200 bg-white p-6">
    <form method="POST" action="{{ route('admin.pelanggan.update', $pelanggan) }}" enctype="multipart/form-data" class="grid gap-4 md:grid-cols-2">
        @csrf
        @method('PUT')
        <div class="md:col-span-2">
            <label class="text-sm font-medium text-slate-600">Nama Lengkap</label>
            <input type="text" name="nama_pelanggan" value="{{ $pelanggan->nama_pelanggan }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Email</label>
            <input type="email" name="email" value="{{ $pelanggan->email }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Telepon</label>
            <input type="text" name="telepon" value="{{ $pelanggan->telepon }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
        </div>
        <div class="md:col-span-2">
            <label class="text-sm font-medium text-slate-600">Alamat 1</label>
            <input type="text" name="alamat1" value="{{ $pelanggan->alamat1 }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Alamat 2</label>
            <input type="text" name="alamat2" value="{{ $pelanggan->alamat2 }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Alamat 3</label>
            <input type="text" name="alamat3" value="{{ $pelanggan->alamat3 }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Kartu ID</label>
            <input type="text" name="kartu_id" value="{{ $pelanggan->kartu_id }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Foto</label>
            <input type="file" name="foto" class="mt-2 w-full text-sm">
        </div>
        <div class="md:col-span-2">
            <button class="rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
