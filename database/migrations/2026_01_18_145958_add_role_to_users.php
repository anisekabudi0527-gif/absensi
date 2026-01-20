<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 30)->default('wali_kelas')->after('password');
            $table->unsignedBigInteger('siswa_id')->nullable()->after('role');
            $table->boolean('is_active')->default(true)->after('siswa_id');
            $table->timestamp('last_login_at')->nullable()->after('is_active');

            $table->index('role');
            $table->unique('siswa_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('siswa_id')->references('id')->on('siswa')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['siswa_id']);
            $table->dropIndex(['role']);
            $table->dropUnique(['siswa_id']);
            $table->dropColumn(['role', 'siswa_id', 'is_active', 'last_login_at']);
        });
    }
};
