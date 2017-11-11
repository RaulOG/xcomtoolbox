<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlienType extends Model
{
    public function aliens()
    {
        return $this->hasMany(Alien::class);
    }
}
