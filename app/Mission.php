<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    const STATE_OPEN = 'open';
    const STATE_CLOSED = 'closed';

    const ERROR_UNKNOWN_STATE = 'Unknown state for a mission: [%s]';

    /**
     * @var array
     */
    private $acceptedStates = ['open', 'closed'];

    public function type()
    {
        return $this->belongsTo(MissionType::class, 'mission_type_id');
    }

    public function difficulty()
    {
        return $this->belongsTo(MissionDifficulty::class, 'mission_difficulty_id');
    }

    public function ufo()
    {
        return $this->belongsTo(Ufo::class, 'ufo_id');
    }

    public function council_mission()
    {
        return $this->belongsTo(CouncilMission::class, 'council_mission_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pods()
    {
        return $this->hasMany(Pod::class);
    }

    public function aliens()
    {
        return $this->hasMany(Alien::class);
    }

    public function setStateAttribute($state)
    {
        if(!in_array($state, $this->acceptedStates))
        {
            // @todo How should we handle our own exceptions?
            throw new \Exception(sprintf(self::ERROR_UNKNOWN_STATE, $state));
        }

        $this->attributes['state'] = $state;
    }
}
