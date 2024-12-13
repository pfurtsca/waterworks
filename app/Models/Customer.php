<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function meters()
    {
        return $this->belongsToMany(Meter::class);
    }
}
