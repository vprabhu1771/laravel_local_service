<?php

namespace App\Enums;


enum AppointmentStatus: String 
{
    case Scheduled = 'Scheduled';
    
    case Completed = 'Completed';

    case Canceled = 'Canceled';

    public static function getValues(): array
    {
        return array_column(AppointmentStatus::cases(), 'value');
    }

    public static function getKeyValues(): array
    {
        return array_column(AppointmentStatus::cases(), 'value', 'key');
    }
}