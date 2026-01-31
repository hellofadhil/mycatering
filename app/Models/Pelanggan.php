<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pelanggan extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama_pelanggan',
        'email',
        'password',
        'tgl_lahir',
        'telepon',
        'alamat1',
        'alamat2',
        'alamat3',
        'kartu_id',
        'foto',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'tgl_lahir' => 'date',
            'password' => 'hashed',
        ];
    }

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'id_pelanggan');
    }
}
