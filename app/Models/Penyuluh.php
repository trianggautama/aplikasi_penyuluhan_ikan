<?php

namespace App\Models;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penyuluh extends Model
{
    protected $guarded = [];

    /**
     * Get the user that owns the Penyuluh
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function penyuluhan()
    {
        return $this->hasMany(Penyuluhan::class);
    }
}
