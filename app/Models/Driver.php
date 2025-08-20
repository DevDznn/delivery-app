<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'driver_number',
        'employment_type',
        'status',
        'is_suspended',
        'is_ceased',
        'id_iqarna',
        'iqama_issue',
        'iqama_duration',
        'id_iqarna_expiry',
        'dob',
        'nationality',
        'country',
        'city',
        'imei',
        'gender',
        'note',
        'photo_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'iqama_issue' => 'date',
        'id_iqarna_expiry' => 'date',
        'dob' => 'date',
    ];

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class); 
    }
}
