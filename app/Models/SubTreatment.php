<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubTreatment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name' , 'currency', 'price_day', 'price_night', 'price_weekend', 'treatment_id'];

    protected $dates = [
        'deleted_at'
    ];


    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('name','like', "%$term%");
        });
    }

    public function treatment(): BelongsTo
    {
        return $this->belongsTo(Treatment::class);
    }

    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
}
