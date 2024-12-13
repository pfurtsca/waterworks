<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    public function meter()
    {
        return $this->belongsTo(Meter::class);
    }
}
