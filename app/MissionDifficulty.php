<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionDifficulty extends Model
{
    public function missions()
    {
        return $this->hasMany(Mission::class);
    }
}
