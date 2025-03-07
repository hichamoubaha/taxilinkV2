<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverAvailability extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id', // Correct column names
        'available_from',
        'available_to',
    ];

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id'); // Correct relationshipp
    }
}