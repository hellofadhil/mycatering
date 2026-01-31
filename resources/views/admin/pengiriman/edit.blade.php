@extends('layouts.admin')

@section('title', 'Edit Pengiriman')

@section('content')
<div class="rounded-2xl border border-slate-200 bg-white p-6">
    <form method="POST" action="{{ route('admin.pengiriman.update', $pengiriman) }}" enctype="multipart/form-data" class="grid gap-4 md:grid-cols-2">
        @csrf
        @method('PUT')
        <div class="md:col-span-2">
            <label class="text-sm font-medium text-slate-600">Pesanan</label>
            <select name="id_pesan" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                @foreach ($pemesanans as $pemesanan)
                    <option value="{{ $pemesanan->id }}" @selected($pengiriman->id_pesan === $pemesanan->id)>#{{ $pemesanan->id }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Kurir</label>
            <select name="id_user" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                @foreach ($kurirs as $kurir)
                    <option value="{{ $kurir->id }}" @selected($pengiriman->id_user === $kurir->id)>{{ $kurir->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Status</label>
            <select name="status_kirim" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                <option value="Sedang Dikirim" @selected($pengiriman->status_kirim === 'Sedang Dikirim')>Sedang Dikirim</option>
                <option value="Tiba Ditujuan" @selected($pengiriman->status_kirim === 'Tiba Ditujuan')>Tiba Ditujuan</option>
            </select>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Tanggal Kirim</label>
            <input type="datetime-local" name="tgl_kirim" value="{{ optional($pengiriman->tgl_kirim)->format('Y-m-d\\TH:i') }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Tanggal Tiba</label>
            <input type="datetime-local" name="tgl_tiba" value="{{ optional($pengiriman->tgl_tiba)->format('Y-m-d\\TH:i') }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
        </div>
        <div class="md:col-span-2">
            <label class="text-sm font-medium text-slate-600">Bukti Foto</label>
            <input type="file" name="bukti_foto" class="mt-2 w-full text-sm">
        </div>
        <div class="md:col-span-2">
            <button class="rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white">Simpan Perubahan</button>
        </div>
    </form>
</div>
<div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-900">
    <h3 class="text-sm font-semibold">Info Pelanggan</h3>
    <p class="mt-2"><span class="text-emerald-700">Nama:</span> {{ $pengiriman->pemesanan->pelanggan->nama_pelanggan ?? '-' }}</p>
    <p><span class="text-emerald-700">Telepon:</span> {{ $pengiriman->pemesanan->pelanggan->telepon ?? '-' }}</p>
    <p><span class="text-emerald-700">Alamat:</span> {{ $pengiriman->pemesanan->alamat_kirim ?? '-' }}</p>
    <p><span class="text-emerald-700">Catatan:</span> {{ $pengiriman->pemesanan->catatan ?? '-' }}</p>
</div>
@endsection
