<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'adress',
        'Location_of_care',
        'phone',
        'email',
        'number_of_visits',
        'prescription',
        'prescription_file',
        'start_date',
        'end_date',
        'duration',
        'availability',
        'city_id',
        'specialty_id',
        'treatment_id',
    ];

    protected $dates = [
        'deleted_at'
    ];


    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('first_name','like', "%$term%")
            ->orWhere('last_name','like', "%$term%")
            ->orWhere('phone','like', "%$term%")
            ->orWhere('start_date','like', "%$term%");
        });
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }

}
