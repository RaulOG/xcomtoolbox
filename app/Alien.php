<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alien extends Model
{
    public function pod()
    {
        return $this->belongsTo(Pod::class);
    }

    public function type()
    {
        return $this->belongsTo(AlienType::class, 'alien_type_id');
    }

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }
}
