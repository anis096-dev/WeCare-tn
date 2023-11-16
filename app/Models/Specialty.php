<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialty extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name' , 'slug', 'desc'];

    protected $dates = [
        'deleted_at'
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = strtoupper($value);
    }

    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('name','like', "%$term%")
                ->orWhere('slug','like', "%$term%");
        });
    }

    public function user(){
        return $this->hasMany(User::class);
    }

    public function treatment(){
        return $this->hasMany(Treatment::class);
    }

    public function appointments(){
        return $this->belongsTo(Appointment::class);
    }
}
