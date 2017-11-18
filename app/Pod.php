<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pod extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aliens()
    {
        return $this->hasMany(Alien::class);
    }

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }
}
