<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengirimans', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tgl_kirim')->nullable();
            $table->dateTime('tgl_tiba')->nullable();
            $table->enum('status_kirim', ['Sedang Dikirim', 'Tiba Ditujuan'])->default('Sedang Dikirim');
            $table->string('bukti_foto')->nullable();
            $table->foreignId('id_pesan')->constrained('pemesanans')->cascadeOnDelete();
            $table->foreignId('id_user')->constrained('users')->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengirimans');
    }
};
