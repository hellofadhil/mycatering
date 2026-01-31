@extends('layouts.app')

@section('title', 'Buat Pesanan')

@section('content')
<div class="grid gap-8 lg:grid-cols-3">
    <div class="lg:col-span-2 rounded-3xl border border-slate-200 bg-white p-6">
        <h2 class="text-lg font-semibold">Form Pemesanan</h2>
        <form method="POST" action="{{ route('pelanggan.pemesanan.store') }}" class="mt-6 space-y-5">
            @csrf
            <div>
                <label class="text-sm font-medium text-slate-600">Pilih Paket</label>
                <select name="id_paket" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                    <option value="">-- pilih paket --</option>
                    @foreach ($pakets as $paket)
                        <option value="{{ $paket->id }}">{{ $paket->nama_paket }} ({{ $paket->jenis }})</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-600">Metode Pembayaran</label>
                <select name="id_jenis_bayar" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                    <option value="">-- pilih metode --</option>
                    @foreach ($jenisPembayarans as $jenis)
                        <option value="{{ $jenis->id }}">{{ $jenis->metode_pembayaran }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="text-sm font-medium text-slate-600">Nama Penerima</label>
                    <input type="text" name="nama_penerima" value="{{ auth('pelanggan')->user()->nama_pelanggan ?? '' }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-600">Telepon Penerima</label>
                    <input type="text" name="telepon_penerima" value="{{ auth('pelanggan')->user()->telepon ?? '' }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
                </div>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-600">Alamat Pengiriman</label>
                <input type="text" name="alamat_kirim" value="{{ auth('pelanggan')->user()->alamat1 ?? '' }}" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" required>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-600">Catatan</label>
                <textarea name="catatan" rows="3" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" placeholder="Catatan untuk kurir atau admin"></textarea>
            </div>
            <button class="rounded-full bg-emerald-600 px-6 py-3 text-sm font-semibold text-white">Kirim Pesanan</button>
        </form>
    </div>
    <div class="rounded-3xl border border-emerald-200 bg-emerald-50 p-6">
        <h3 class="text-sm font-semibold text-emerald-700">Tips Pemesanan</h3>
        <ul class="mt-4 space-y-3 text-sm text-emerald-800">
            <li>• Pilih paket sesuai kebutuhan acara.</li>
            <li>• Pastikan metode pembayaran aktif.</li>
            <li>• Admin akan mengonfirmasi pesanan Anda.</li>
        </ul>
    </div>
</div>
@endsection
