<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donasi extends Model
{
    protected $fillable = [
        'user_id',
        'donatur',
        'tanggal',
        'jenis',
        'jumlah',
        'status',
        'keterangan',
        'bukti',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
