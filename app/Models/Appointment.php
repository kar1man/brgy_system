<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_id',
        'appointment_date',
        'purpose',
        'status',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
