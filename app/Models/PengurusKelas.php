<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengurusKelas extends Model
{
    protected $table = 'pengurus_kelas';

    protected $fillable = ['siswa_id', 'jabatan', 'periode_awal', 'periode_akhir', 'tugas'];

    protected $casts = [
        'periode_awal' => 'date',
        'periode_akhir' => 'date',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function scopeAktif($q)
    {
        $today = now()->toDateString();
        return $q->where('periode_awal', '<=', $today)
            ->where(function ($w) use ($today) {
                $w->whereNull('periode_akhir')->orWhere('periode_akhir', '>=', $today);
            });
    }
}
