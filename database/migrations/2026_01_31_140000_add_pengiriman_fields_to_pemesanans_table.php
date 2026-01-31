<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->string('nama_penerima', 100)->nullable()->after('id_jenis_bayar');
            $table->string('telepon_penerima', 20)->nullable()->after('nama_penerima');
            $table->string('alamat_kirim')->nullable()->after('telepon_penerima');
            $table->text('catatan')->nullable()->after('alamat_kirim');
        });
    }

    public function down(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->dropColumn(['nama_penerima', 'telepon_penerima', 'alamat_kirim', 'catatan']);
        });
    }
};
