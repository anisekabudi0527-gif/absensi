<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';

    protected $fillable = [
        'wali_id',
        'nis',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'telepon',
        'is_active'
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
        'is_active' => 'boolean',
    ];

    public function wali()
    {
        return $this->belongsTo(Wali::class, 'wali_id');
    }

    public function pengurus()
    {
        return $this->hasMany(PengurusKelas::class, 'siswa_id');
    }

    public function absensi()
    {
        return $this->hasMany(AbsensiHarian::class, 'siswa_id');
    }
}
