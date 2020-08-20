<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookable extends Model
{
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * @param int $from
     * @param int $to
     * @return bool
     */
    public function availableFor($from, $to): bool
    {
        // betweenDatesはBookigモデルのscopeBetweenDates
        return 0 != $this->bookings()->betweenDates($from, $to)->count();
    }
}
