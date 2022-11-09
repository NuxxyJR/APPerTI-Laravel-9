<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Authenticatable
{
    // use HasFactory;
    use Notifiable;

    protected $table = 'mahasiswa';
    protected $keyType = 'string';
    protected $primaryKey = 'nim';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'nim',
        'nm_mhs',
        'jenis_kelamin',
        'tgl_lahir',
        'tpt_lahir',
        'alamat_mhs',
        'no_hp',
        'prodi_id',
        'kelas_id',
        'password',
    ];


    public function prodi()
    {
        return $this->hasOne(Prodi::class, 'id_prodi', 'prodi_id');
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id_kelas', 'kelas_id');
    }

    public function konseling()
    {
        return $this->hasMany(Konseling::class, 'nim_mhs', 'nim');
    }
}
