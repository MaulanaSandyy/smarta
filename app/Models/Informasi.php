<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Informasi extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'isi',
        'kategori',
        'penting',
        'diterbitkan',
        'tanggal_terbit',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
