<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    public $timestamps = false;
    protected $primaryKey = 'id_kelas';

    protected $fillable = [
        'nm_kelas',
        'angkatan',
        'nip_dos',
        'prodi_id',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nip_dos', 'nip');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id_prodi');
    }

    /**
     * Get all of the mahasiswa for the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'kelas_id', 'id_kelas');
    }
}
