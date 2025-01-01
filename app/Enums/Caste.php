<?php

namespace App\Enums;


enum Caste: String 
{
    case SC_ST = 'SC ST';
    
    case MBC = 'MBC';

    case BC = 'BC';

    case BCM = 'BCM';

    case OC = 'OC';

    public static function getValues(): array
    {
        return array_column(Caste::cases(), 'value');
    }

    public static function getKeyValues(): array
    {
        return array_column(Caste::cases(), 'value', 'key');
    }
}