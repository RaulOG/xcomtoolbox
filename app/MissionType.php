<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionType extends Model
{
    public function missions()
    {
        return $this->hasMany(Mission::class);
    }
}
