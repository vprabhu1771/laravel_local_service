<?php

namespace App\Enums;


enum Religion: String 
{
    case HINDU = 'HINDU';
    
    case MUSLIM = 'MUSLIM';

    case CHRISTIAN = 'CHRISTIAN';

    public static function getValues(): array
    {
        return array_column(Religion::cases(), 'value');
    }

    public static function getKeyValues(): array
    {
        return array_column(Religion::cases(), 'value', 'key');
    }
}