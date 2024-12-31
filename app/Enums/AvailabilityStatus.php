<?php

namespace App\Enums;


enum AvailabilityStatus: String 
{
    case Available = 'Available';
    
    case Unavailable = 'Unavailable';

    // case OTHER = 'Other';

    public static function getValues(): array
    {
        return array_column(AvailabilityStatus::cases(), 'value');
    }

    public static function getKeyValues(): array
    {
        return array_column(AvailabilityStatus::cases(), 'value', 'key');
    }
}