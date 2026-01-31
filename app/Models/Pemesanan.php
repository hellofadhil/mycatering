<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pelanggan',
        'id_jenis_bayar',
        'nama_penerima',
        'telepon_penerima',
        'alamat_kirim',
        'catatan',
        'no_resi',
        'tgl_pesan',
        'status_pesan',
        'total_bayar',
    ];

    protected function casts(): array
    {
        return [
            'tgl_pesan' => 'datetime',
        ];
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function jenisPembayaran()
    {
        return $this->belongsTo(JenisPembayaran::class, 'id_jenis_bayar');
    }

    public function detail()
    {
        return $this->hasMany(DetailPemesanan::class, 'id_pemesanan');
    }

    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class, 'id_pesan');
    }
}
