<?php

namespace App\Services;

use App\Enums\PlantStatus;
use Carbon\Carbon;

class SeasonNow
{
    public static function season(): string
    {
        $monthNow=Carbon::now()->month;
        if ($monthNow >= 11 || $monthNow <= 2 ){
            return PlantStatus::WINTER->value;
        } else{
            return PlantStatus::SUMMER->value;
        }
    }

}
