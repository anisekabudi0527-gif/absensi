<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'siswa_id',
        'is_active',
        'last_login_at'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'is_active' => 'boolean',
        'last_login_at' => 'datetime',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function isActiveSekretaris(): bool
    {
        if ($this->role !== 'sekretaris') return false;
        if (!$this->siswa_id) return false;

        return PengurusKelas::query()
            ->where('siswa_id', $this->siswa_id)
            ->whereRaw('LOWER(jabatan) = ?', ['sekretaris'])
            ->aktif()
            ->exists();
    }
}
