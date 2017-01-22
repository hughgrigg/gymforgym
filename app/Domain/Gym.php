<?php

namespace GymForGym\Domain;

use GymForGym\Structure\Spatial\Point;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Gym extends Model
{
    /**
     * @param Point|string $location
     */
    public function setLocationAttribute($location)
    {
        if ($location instanceof Point) {
            $this->attributes['location'] = $location;

            return;
        }

        $this->attributes['location'] = $location;
    }

    /**
     * @return Point
     */
    public function getLocationAttribute()
    {
        if (!$this->attributes['location'] instanceof Point) {
            $this->attributes['location'] = Point::parse(
                $this->attributes['location']
            );
        }

        return new Point();
    }
}
