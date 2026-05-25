<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortalKo extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'nik',
        'telepon',
        'alamat_kos',
        'pemilik',
        'kontak_pemilik',
        'tanggal_masuk',
        'tanggal_keluar',
        'biaya_sewa',
        'catatan',
        'aktif',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
