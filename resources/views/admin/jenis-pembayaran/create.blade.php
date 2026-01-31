@extends('layouts.admin')

@section('title', 'Tambah Jenis Pembayaran')

@section('content')
<div class="rounded-2xl border border-slate-200 bg-white p-6">
    <form method="POST" action="{{ route('admin.jenis-pembayaran.store') }}" class="space-y-4">
        @csrf
        <div>
            <label class="text-sm font-medium text-slate-600">Nama Metode</label>
            <input type="text" name="metode_pembayaran" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
        </div>
        <button class="rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white">Simpan</button>
    </form>
</div>
@endsection
