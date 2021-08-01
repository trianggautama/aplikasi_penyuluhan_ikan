<?php

namespace App\Models;

use App\Models\Kelurahan;
use App\Models\Penyuluh;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penyuluhan extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the user that owns the Penyuluhan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penyuluh(): BelongsTo
    {
        return $this->belongsTo(Penyuluh::class);
    }

    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
