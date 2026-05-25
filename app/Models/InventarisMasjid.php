<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventarisMasjid extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'kategori',
        'jumlah',
        'kondisi',
        'lokasi',
        'nilai',
        'keterangan',
        'foto',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
