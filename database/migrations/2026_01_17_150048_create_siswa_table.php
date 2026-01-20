<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wali_id')->nullable();

            $table->string('nis', 30)->unique();
            $table->string('nama', 150);
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();

            $table->string('tempat_lahir', 80)->nullable();
            $table->date('tgl_lahir')->nullable();

            $table->text('alamat')->nullable();
            $table->string('telepon', 30)->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('wali_id')->references('id')->on('wali')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
