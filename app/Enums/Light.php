<?php

namespace App\Enums;

enum Light: string
{
    case BRIGHT = 'яркий';
    case DIFFUSED = 'рассеянный';
    case PENUMBRA = 'полутень';

    public static function getEnums(): array
    {
        return [
            self::BRIGHT->value,
            self::DIFFUSED->value,
            self::PENUMBRA->value,
        ];
    }
}
