<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class TimeBetween implements Rule
{
    public function passes( $attribute, $value)
    {
        $pickupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
        // When you can get an apoointment
        $earliestTime = Carbon::createFromTimeString("06:00:00");
        $lastTime = Carbon::createFromTimeString("19:00:00");

        return $pickupTime->between($earliestTime, $lastTime) ? true:false;
    }

    public function message()
    {
        return 'You can only make an appointment between 6.am - 7.pm!';
    }    
}
