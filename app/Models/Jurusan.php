<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = "jurusan";
    public $timestamps = false;
    protected $primaryKey = "id_jur";

    protected $fillable = [
        'nm_jur',
        'nipdos',
    ];

    public function prodi()
    {
        return $this->hasMany(Prodi::class, 'id_jurusan', 'id_jur');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nipdos', 'nip');
    }
}
