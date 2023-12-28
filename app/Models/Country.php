<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name' , 'slug' , 'ios3', 'country_code'];

    protected $dates = [
        'deleted_at'
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = strtoupper($value);
    }

    public function setIso3Attribute($value)
    {
        $this->attributes['iso3'] = strtoupper($value);
    }

    public function city()
    {
        return $this->hasMany(City::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function appointments()
    {
        return $this->belongsTo(Appointment::class);
    }
}
