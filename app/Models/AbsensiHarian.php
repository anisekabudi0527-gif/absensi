<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiHarian extends Model
{
    protected $table = 'absensi_harian';

    protected $fillable = [
        'siswa_id',
        'tanggal',
        'status',
        'jam_masuk',
        'jam_keluar',
        'catatan',
        'dicatat_oleh',
        'finalized_at',
        'finalized_by'
    ];


    protected $casts = [
        'tanggal' => 'date',
        'finalized_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function getIsClosedAttribute(): bool
    {
        return !is_null($this->closed_at);
    }


    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function pencatat()
    {
        return $this->belongsTo(User::class, 'dicatat_oleh');
    }

    public function finalizer()
    {
        return $this->belongsTo(User::class, 'finalized_by');
    }

    public function getIsFinalizedAttribute(): bool
    {
        return !is_null($this->finalized_at);
    }
}
