<?php

namespace App\Models;

use App\Models\Penyuluhan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
