<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KalenderEvent extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'tanggal',
        'waktu',
        'lokasi',
        'kategori',
        'deskripsi',
        'warna',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
