<?php

namespace App\Models;

use App\Models\Penyuluh;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];

    /**
     * Get the penyuluh associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function penyuluh(): HasOne
    {
        return $this->hasOne(Penyuluh::class);
    }

}
