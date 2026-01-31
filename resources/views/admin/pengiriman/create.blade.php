@extends('layouts.admin')

@section('title', 'Tambah Pengiriman')

@section('content')
<div class="rounded-2xl border border-slate-200 bg-white p-6">
    <form method="POST" action="{{ route('admin.pengiriman.store') }}" enctype="multipart/form-data" class="grid gap-4 md:grid-cols-2">
        @csrf
        <div class="md:col-span-2">
            <label class="text-sm font-medium text-slate-600">Pesanan</label>
            <select name="id_pesan" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                @foreach ($pemesanans as $pemesanan)
                    <option value="{{ $pemesanan->id }}" @selected((string) $selectedOrder === (string) $pemesanan->id)>
                        #{{ $pemesanan->id }} - {{ $pemesanan->pelanggan->nama_pelanggan ?? 'Pelanggan' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Kurir</label>
            <select name="id_user" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                @foreach ($kurirs as $kurir)
                    <option value="{{ $kurir->id }}">{{ $kurir->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Status</label>
            <select name="status_kirim" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                <option value="Sedang Dikirim">Sedang Dikirim</option>
                <option value="Tiba Ditujuan">Tiba Ditujuan</option>
            </select>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Tanggal Kirim</label>
            <input type="datetime-local" name="tgl_kirim" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Tanggal Tiba</label>
            <input type="datetime-local" name="tgl_tiba" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
        </div>
        <div class="md:col-span-2">
            <label class="text-sm font-medium text-slate-600">Bukti Foto</label>
            <input type="file" name="bukti_foto" class="mt-2 w-full text-sm">
        </div>
        <div class="md:col-span-2">
            <button class="rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white">Simpan</button>
        </div>
    </form>
</div>
@endsection
