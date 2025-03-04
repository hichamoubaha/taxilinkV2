<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'passenger_id', // Add this linee
        'driver_id',
        'pickup_time',
        'pickup_location',
        'destination',
        'status',
    ];
    
    public function passenger()
{
    return $this->belongsTo(User::class, 'passenger_id');
}
}