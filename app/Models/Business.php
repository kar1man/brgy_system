<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'owner_name',
        'address',
        'contact_number',
        'status',
        'resident_id',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
