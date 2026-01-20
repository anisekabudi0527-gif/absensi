<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PengurusKelas;
use Illuminate\Support\Facades\Hash;

class DefaultUsersSeeder extends Seeder
{
    public function run(): void
    {
        // Wali kelas
        User::updateOrCreate(
            ['email' => 'wali@demo.id'],
            [
                'name' => 'Wali Kelas',
                'password' => Hash::make('password'),
                'role' => 'wali_kelas',
                'is_active' => true,
            ]
        );

        // Sekretaris (ambil dari pengurus sekretaris aktif)
        $sekre = PengurusKelas::whereRaw('LOWER(jabatan)=?', ['sekretaris'])
            ->orderByDesc('periode_awal')
            ->first();

        if ($sekre) {
            User::updateOrCreate(
                ['email' => 'sekre@demo.id'],
                [
                    'name' => 'Sekretaris Kelas',
                    'password' => Hash::make('password'),
                    'role' => 'sekretaris',
                    'siswa_id' => $sekre->siswa_id,
                    'is_active' => true,
                ]
            );
        }
    }
}
