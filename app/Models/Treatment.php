<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Treatment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name' , 'specialty_id'];

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

    public function subtreatments(): HasMany
    {
        return $this->hasMany(SubTreatment::class);
    }

    // public function appointments(){
    //     return $this->hasMany(Appointment::class);
    // }
}
