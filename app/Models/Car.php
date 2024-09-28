<?php

namespace App\Models;

use App\Models\Rental; // Make sure this line exists and is correct
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name', 'brand', 'model', 'year', 'car_type', 'daily_rent_price', 'availability', 'image',
    ];

    // Car can have many rentals
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}

