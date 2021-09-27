<?php

namespace App\Models;

use App\Models\Penyuluhan;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peserta extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the penyuluhan that owns the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penyuluhan(): BelongsTo
    {
        return $this->belongsTo(Penyuluhan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function penilaian(): HasMany
    {
        return $this->hasMany(PenilaianPeserta::class);
    }
}
