<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalRonda extends Model
{
    protected $fillable = [
        'ronda_id',
        'warga_id',
        'hari',
        'waktu',
        'pos',
        'tanggal',
        'hadir',
    ];

    public function ronda(): BelongsTo
    {
        return $this->belongsTo(Ronda::class);
    }

    public function warga(): BelongsTo
    {
        return $this->belongsTo(Warga::class);
    }
}
