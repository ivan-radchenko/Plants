<?php

namespace App\Services;

use App\Enums\PlantStatus;
use Carbon\Carbon;

class SeasonNow
{
    public static function season()
    {
        $monthNow=Carbon::now()->month;
        if ($monthNow === 12 || $monthNow <= 2 ){
            return PlantStatus::WINTER->value;
        } else{
            return PlantStatus::SUMMER->value;
        }
    }

}
