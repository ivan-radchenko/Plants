<?php

namespace App\Services;

use App\Enums\PlantStatus;
use App\Models\Plants;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\warning;

class PlantsCare
{
    public static function watering(): array|null
    {
        $now=Carbon::now()->toDateString();
        $watering=null;
        if (SeasonNow::season() === PlantStatus::SUMMER->value){
            $plants=Plants::query()
                ->where('userID','=',Auth::user()->id)
                ->get(['id','name','image','waterSummer','lastWatering']);
            foreach ($plants as $plant){
                if (Carbon::parse($plant->lastWatering)->addDays($plant->waterSummer) <= $now){
                    $watering[]=$plant;
                }
            }
        } else {
            $plants=Plants::query()
                ->where('userID','=',Auth::user()->id)
                ->get(['id','name','image','waterWinter','lastWatering']);
            foreach ($plants as $plant){
                if (Carbon::parse($plant->lastWatering)->addDays($plant->waterWinter) <= $now){
                    $watering[]=$plant;
                }
            }
        }
        return $watering;
    }

    public static function lighting(): Collection
    {
        $seasonNow = SeasonNow::season();
        if ($seasonNow === PlantStatus::SUMMER->value){
            $plants=Plants::query()
                ->where('userID','=',Auth::user()->id)
                ->where('status','=',PlantStatus::WINTER->value)
                ->get(['id','name','image','status','lightSummer']);
            $lighting=$plants->groupBy('lightSummer');
        } else {
            $plants=Plants::query()
                ->where('userID','=',Auth::user()->id)
                ->where('status','=',PlantStatus::SUMMER->value)
                ->get(['id','name','image','status','lightWinter']);
            $lighting=$plants->groupBy('lightWinter');
        }

        return $lighting;
    }
}
