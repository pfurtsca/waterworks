<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    protected $fillable = ['location'];

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function readings()
    {
        return $this->hasMany(Reading::class);
    }
}
