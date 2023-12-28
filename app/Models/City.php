<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory ,SoftDeletes;

    protected $fillable = ['name' , 'slug' , 'country_id'];

    protected $dates = [
        'deleted_at'
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = strtoupper($value);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->belongsTo(Appointment::class);
    }
}
