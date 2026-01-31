@extends('layouts.app')

@section('title', 'Detail Paket')

@section('content')
<div class="grid gap-8 lg:grid-cols-2">
    <div class="space-y-4">
        <div class="h-64 rounded-3xl bg-slate-100">
            @if ($paket->foto1)
                <img src="{{ asset('storage/' . $paket->foto1) }}" class="h-full w-full rounded-3xl object-cover" alt="{{ $paket->nama_paket }}">
            @endif
        </div>
        <div class="grid grid-cols-2 gap-4">
            @foreach ([$paket->foto2, $paket->foto3] as $foto)
                <div class="h-32 rounded-2xl bg-slate-100">
                    @if ($foto)
                        <img src="{{ asset('storage/' . $foto) }}" class="h-full w-full rounded-2xl object-cover" alt="Foto paket">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <p class="text-xs uppercase tracking-[0.2em] text-emerald-600">{{ $paket->kategori }}</p>
        <h1 class="mt-2 text-3xl font-semibold">{{ $paket->nama_paket }}</h1>
        <p class="mt-2 text-sm text-slate-500">{{ $paket->jenis }} • {{ $paket->jumlah_pax }} pax</p>
        <p class="mt-4 text-base text-slate-600">{{ $paket->deskripsi }}</p>
        <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-5">
            <p class="text-sm text-slate-500">Harga Paket</p>
            <p class="mt-1 text-2xl font-semibold text-emerald-600">Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</p>
            <button
                type="button"
                class="mt-4 inline-flex rounded-full bg-emerald-600 px-6 py-2 text-sm font-semibold text-white"
                data-open-modal
                data-paket-id="{{ $paket->id }}"
                data-paket-nama="{{ $paket->nama_paket }}"
                data-paket-harga="{{ number_format($paket->harga_paket, 0, ',', '.') }}"
            >
                Pesan Paket Ini
            </button>
        </div>
    </div>
</div>

<div id="order-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 px-6">
    <div class="w-full max-w-4xl rounded-3xl bg-white p-6 shadow-2xl">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold">Form Pemesanan</h3>
            <button type="button" class="text-slate-400 hover:text-slate-600" data-close-modal>✕</button>
        </div>
        <form method="POST" action="{{ route('pelanggan.pemesanan.store') }}" class="mt-5 grid gap-6 lg:grid-cols-2">
            @csrf
            <input type="hidden" name="id_paket" id="modal-paket-id">
            <div class="space-y-4">
                <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm">
                    <p class="text-slate-500">Paket</p>
                    <p class="mt-1 font-semibold" id="modal-paket-nama">-</p>
                    <p class="mt-2 text-slate-500">Total</p>
                    <p class="font-semibold text-emerald-600" id="modal-paket-harga">Rp 0</p>
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
            </div>
            <div class="space-y-4">
                <div>
                    <label class="text-sm font-medium text-slate-600">Catatan</label>
                    <textarea name="catatan" rows="6" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm" placeholder="Catatan untuk kurir atau admin"></textarea>
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
                <button class="w-full rounded-xl bg-emerald-600 px-4 py-3 text-sm font-semibold text-white">Kirim Pesanan</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('order-modal');
    const modalPaketId = document.getElementById('modal-paket-id');
    const modalPaketNama = document.getElementById('modal-paket-nama');
    const modalPaketHarga = document.getElementById('modal-paket-harga');

    document.querySelectorAll('[data-open-modal]').forEach((button) => {
        button.addEventListener('click', () => {
            const paketId = button.getAttribute('data-paket-id') || '';
            const paketNama = button.getAttribute('data-paket-nama') || '';
            const paketHarga = button.getAttribute('data-paket-harga') || '0';

            modalPaketId.value = paketId;
            modalPaketNama.textContent = paketNama;
            modalPaketHarga.textContent = `Rp ${paketHarga}`;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
    });

    document.querySelectorAll('[data-close-modal]').forEach((button) => {
        button.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
    });

    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    });
</script>
@endsection
