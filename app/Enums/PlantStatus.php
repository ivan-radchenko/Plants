<?php

namespace App\Enums;

enum PlantStatus:string
{
    case SUMMER = 'summer';
    case WINTER = 'winter';

    public static function getEnums(): array
    {
        return [
            self::SUMMER->value,
            self::WINTER->value,
        ];
    }
}
