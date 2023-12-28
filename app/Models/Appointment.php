<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'appointment_id',
        'first_name',
        'last_name',
        'age',
        'gender',
        'country_id',
        'city_id',
        'specialty_id',
        'user_id',
        'adress',
        'Location_of_care',
        'phone',
        'email',
        'number_of_visits',
        'prescription',
        'prescription_file',
        'start_date',
        'duration',
        'subtreatments',
    ];

    protected $dates = [
        'start_date',
        'deleted_at'
    ];


    /**
     * The list of nbre_of_visits
     *
     * @return void
     */
    public static function nbre_of_visits()
    {
        return [
            'Just once - مرة واحدة',
            '1 in day - اليوم',
            '2 in day - اليوم',
            '3 in day - اليوم',
            '1 in week - الاسبوع',
            '2 in week - الاسبوع',
            '3 in week - الاسبوع',
            '1 in month - الشهر',
            '2 in month - الشهر',
            '3 in month - الشهر',
        ];
    }

    /**
     * The list of passage_nbr
     *
     * @return void
     */
    public static function duration()
    {
        return [
            '1 day - يوم',
            '2 days - يوم',
            '3 days - يوم',
            '4 days - يوم',
            '5 days - يوم',
            '6 days - يوم',
            '7 days - يوم',
            '8 days - يوم',
            '9 days - يوم',
            '10 days - يوم',
            '11 days - يوم',
            '12 days - يوم',
            '13 days - يوم',
            '14 days - يوم',
            '15 days - يوم',
            '16 days - يوم',
            '17 days - يوم',
            '18 days - يوم',
            '19 days - يوم',
            '20 days - يوم',
            '21 days - يوم',
            '22 days - يوم',
            '23 days - يوم',
            '24 days - يوم',
            '25 days - يوم',
            '26 days - يوم',
            '27 days - يوم',
            '28 days - يوم',
            '29 days - يوم',
            '30 days - يوم',
            '31 days - يوم',
            '32 days - يوم',
            '33 days - يوم',
            '34 days - يوم',
            '35 days - يوم',
            '36 days - يوم',
            '37 days - يوم',
            '38 days - يوم',
            '39 days - يوم',
            '40 days - يوم',
            '41 days - يوم',
            '42 days - يوم',
            '43 days - يوم',
            '44 days - يوم',
            '45 days - يوم',
            '46 days - يوم',
            '47 days - يوم',
            '48 days - يوم',
            '49 days - يوم',
            '50 days - يوم',
            '51 days - يوم',
            '52 days - يوم',
            '53 days - يوم',
            '54 days - يوم',
            '55 days - يوم',
            '56 days - يوم',
            '57 days - يوم',
            '58 days - يوم',
            '59 days - يوم',
            'more - اكثر',
        ];
    }

     /**
     * The list of careplace
     *
     * @return void
     */
    public static function careplace()
    {
        return [
            'Home - المنزل',
            'Cabinet - العيادة',
            'Both - بالتداول',
        ];
    }


    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('first_name','like', "%$term%")
            ->orWhere('last_name','like', "%$term%")
            ->orWhere('phone','like', "%$term%")
            ->orWhere('start_date','like', "%$term%");
        });
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function subtreatment()
    {
        return $this->hasMany(SubTreatment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $getAppointment = self::orderBy('appointment_id', 'desc')->first();

            if ($getAppointment) {
                $latestID = intval(substr($getAppointment->appointment_id, 7));
                $nextID = $latestID + 1;
            } else {
                $nextID = 1;
            }
            $model->appointment_id = 'RDV_' . sprintf("%07s", $nextID);
            while (self::where('appointment_id', $model->appointment_id)->exists()) {
                $nextID++;
                $model->appointment_id = 'RDV_' . sprintf("%07s", $nextID);
            }
        });   
    }


}
