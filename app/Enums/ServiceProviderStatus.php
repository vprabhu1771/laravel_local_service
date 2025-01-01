<?php

namespace App\Enums;


enum ServiceProviderStatus: String 
{
    case Available = 'Available';
    
    case NotAvailable = 'Not Available';

    public static function getValues(): array
    {
        return array_column(ServiceProviderStatus::cases(), 'value');
    }

    public static function getKeyValues(): array
    {
        return array_column(ServiceProviderStatus::cases(), 'value', 'key');
    }
}