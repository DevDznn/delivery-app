<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'car_type',
        'plate_number',
        'year_model',
        'brand_model',
        'unit_service_type',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}
