<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'birthdate',
        'address',
        'contact_number'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}