<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class DateBetween implements Rule
{
    public function passes( $attribute, $value)
    {
        $pickupDate = Carbon::parse($value);
        $lastDate = Carbon::now()->addWeek();

        return $value >= now() && $value <= $lastDate;
    }

    public function message()
    {
        return 'You can only make an appointment before 1 week from now!';
    }    
}
