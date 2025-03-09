<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'position',
        'contact_number'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
