<?php

namespace App\Enums;

enum Wet: string
{
    case LOW = 'низкая';
    case MEDIUM = 'умеренная';
    case HIGH = 'высокая';

    public static function getEnums(): array
    {
        return [
            self::LOW->value,
            self::MEDIUM->value,
            self::HIGH->value,
        ];
    }
}
