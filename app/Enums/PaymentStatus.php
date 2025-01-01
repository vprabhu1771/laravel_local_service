<?php

namespace App\Enums;


enum PaymentStatus: String 
{
    case Paid = 'Paid';
    
    case Pending = 'Pending';

    // case OTHER = 'Other';

    public static function getValues(): array
    {
        return array_column(PaymentStatus::cases(), 'value');
    }

    public static function getKeyValues(): array
    {
        return array_column(PaymentStatus::cases(), 'value', 'key');
    }
}