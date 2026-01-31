<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'metode_pembayaran',
    ];

    public function detail()
    {
        return $this->hasOne(DetailJenisPembayaran::class, 'id_jenis_pembayaran');
    }

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'id_jenis_bayar');
    }
}
