<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KeuanganMasjid extends Model
{
    protected $fillable = [
        'user_id',
        'tipe',
        'jumlah',
        'kategori',
        'keterangan',
        'tanggal',
        'bukti',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
