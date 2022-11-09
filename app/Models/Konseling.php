<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    use HasFactory;

    protected $table = 'konseling';

    protected $fillable = [
        'topik',
        'description',
        'nip_dos',
        'nim_mhs',
    ];

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d-M-Y ( H:i )');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nip_dos', 'nip');
    }


    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim_mhs', 'nim');
    }

    /**
     * Get all of the detail_konseling for the Konseling
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail_konseling()
    {
        return $this->hasMany(Detailkonseling::class, 'id_konseling', 'id');
    }
}
