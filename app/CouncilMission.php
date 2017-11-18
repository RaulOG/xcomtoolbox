<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouncilMission extends Model
{
    public function missions()
    {
        return $this->hasMany(Mission::class);
    }
}
