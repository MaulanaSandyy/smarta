<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ronda extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
        'aktif',
    ];

    public function jadwalRonda(): HasMany
    {
        return $this->hasMany(JadwalRonda::class);
    }
}
