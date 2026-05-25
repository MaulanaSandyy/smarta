<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PembayaranIuran extends Model
{
    protected $fillable = [
        'warga_id',
        'iuran_id',
        'user_id',
        'jumlah',
        'tanggal_bayar',
        'bulan',
        'metode',
        'keterangan',
        'bukti',
        'dikonfirmasi',
    ];

    public function warga(): BelongsTo
    {
        return $this->belongsTo(Warga::class);
    }

    public function iuran(): BelongsTo
    {
        return $this->belongsTo(Iuran::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
