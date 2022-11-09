<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    public $timestamps = false;
    protected $primaryKey = 'id_prodi';

    protected $fillable = [
        'nm_prodi',
        'jenjang',
        'id_jurusan',
        'nip_dos',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jur');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nip_dos', 'nip');
    }
}
