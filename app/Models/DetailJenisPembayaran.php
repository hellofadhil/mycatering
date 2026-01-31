<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailJenisPembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jenis_pembayaran',
        'no_rek',
        'tempat_bayar',
        'foto',
    ];

    public function jenisPembayaran()
    {
        return $this->belongsTo(JenisPembayaran::class, 'id_jenis_pembayaran');
    }
}
