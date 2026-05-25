<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanSurat extends Model
{
    protected $fillable = [
        'user_id',
        'warga_id',
        'jenis_surat',
        'nomor_surat',
        'keperluan',
        'keterangan',
        'status',
        'catatan',
        'tanggal_pengajuan',
        'tanggal_selesai',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function warga(): BelongsTo
    {
        return $this->belongsTo(Warga::class);
    }
}
