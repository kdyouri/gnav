<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shuttle extends Model
{
    use HasFactory;

    public $fillable = [
        'vehicle_id',
        'departure_city_id',
        'departure_time',
        'arrival_city_id',
        'arrival_time',
        'price',
        'passenger_count',
    ];

    static $validationRules = [
        'vehicle_id' => 'required',
        'departure_city_id' => 'required',
        'departure_time' => ['required', 'date_format:H:i:s'],
        'arrival_city_id' => 'required',
        'arrival_time' => ['required', 'date_format:H:i:s'],
        'price' => 'required',
        'passenger_count' => 'required'
    ];

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }

    public function departure_city() {
        return $this->belongsTo(City::class);
    }

    public function arrival_city() {
        return $this->belongsTo(City::class);
    }
}
