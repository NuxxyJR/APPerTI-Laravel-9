<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailkonseling extends Model
{
    use HasFactory;

    protected $table = 'detail_konseling';

    protected $fillable = [
        'id_konseling',
        'chat',
        'flag',
    ];

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d, M Y H:i');
    }

    public function konseling()
    {
        return $this->belongsTo(Konseling::class, 'id_konseling', 'id');
    }
}
