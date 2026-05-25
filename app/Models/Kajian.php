<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kajian extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'hari',
        'waktu',
        'pemateri',
        'tempat',
        'kategori',
        'deskripsi',
        'aktif',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
