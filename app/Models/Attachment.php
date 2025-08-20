<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'attachment_type',
        'file_path',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
