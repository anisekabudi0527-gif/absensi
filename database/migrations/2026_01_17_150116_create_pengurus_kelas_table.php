<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengurus_kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');

            $table->string('jabatan', 50); // ketua, sekretaris, bendahara, dst
            $table->date('periode_awal');
            $table->date('periode_akhir')->nullable();
            $table->text('tugas')->nullable();

            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswa')->cascadeOnDelete();
            $table->index(['jabatan', 'periode_awal']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengurus_kelas');
    }
};
