<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treatment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name' , 'currency', 'price_day', 'price_night_weekend', 'specialty_id'];

    protected $dates = [
        'deleted_at'
    ];


    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('name','like', "%$term%");
        });
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
