<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wali extends Model
{
    use HasFactory;
    protected $table = 'wali';
    protected $fillable = ['nama', 'telepon', 'email', 'alamat'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'wali_id');
    }
}
