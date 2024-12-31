<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',        
        'service_provider_id',
        'appointment_date',
        'appointment_time',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }    

    public function serviceProvider()
    {
        return $this->belongsTo(User::class, 'service_provider_id');
    }
}