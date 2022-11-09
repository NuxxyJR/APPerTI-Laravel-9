<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Authenticatable
{
    // use HasFactory;
    use Notifiable;
    protected $table = 'dosen';
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'nip';

    protected $fillable = [
        'nip',
        'nm_dos',
        'no_hp',
        'password'
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'nip_dos', 'nip');
    }


    public function konseling()
    {
        return $this->hasMany(Konseling::class, 'nip_dos', 'nip');
    }
}
