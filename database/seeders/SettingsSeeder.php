<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'nama_kelas' => 'XI RPL 1',
            'jurusan' => 'RPL',
            'tingkat' => 'XI',
            'tahun_ajaran' => '2025/2026',
            'jam_masuk_batas' => '07:00',
        ];

        foreach ($defaults as $k => $v) {
            Setting::updateOrCreate(['key' => $k], ['value' => $v]);
        }
    }
}