<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['model_name', 'color', 'capacity', 'air_condition', 'company_id'];

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
