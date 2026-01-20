<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wali;
use App\Models\Siswa;
use App\Models\PengurusKelas;

class DummySiswaSeeder extends Seeder
{
    public function run(): void
    {
        // Jumlah siswa dummy
        $jumlah = 30;

        // Buat 15 wali (rata-rata 2 anak per wali)
        $waliList = Wali::factory()->count(15)->create();

        // Buat siswa dummy
        $siswa = Siswa::factory()->count($jumlah)->make()->each(function ($s) use ($waliList) {
            // Acak wali
            $s->wali_id = $waliList->random()->id;
            $s->save();
        });

        // Tetapkan 1 sekretaris aktif (ambil 1 siswa random)
        $sekre = Siswa::inRandomOrder()->first();

        // Hapus dulu pengurus sekretaris lama (jaga-jaga)
        PengurusKelas::whereRaw('LOWER(jabatan)=?', ['sekretaris'])->delete();

        PengurusKelas::create([
            'siswa_id' => $sekre->id,
            'jabatan' => 'sekretaris',
            'periode_awal' => now()->subMonths(1)->toDateString(),
            'periode_akhir' => null,
            'tugas' => 'Menginput absensi harian jika dibutuhkan.',
        ]);

        $this->command?->info("Dummy dibuat: {$jumlah} siswa, 15 wali, sekretaris = {$sekre->nama} (NIS {$sekre->nis}).");
    }
}
