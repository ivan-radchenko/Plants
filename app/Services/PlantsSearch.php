<?php

namespace App\Services;

use App\Models\Plants;
use Illuminate\Database\Eloquent\Collection;

class PlantsSearch
{
    public static function search($plant): Collection|array|null
    {
        $searchResult=null;
        if ($plant !== null){
            $searchResult=Plants::query()
                ->where('name','ilike',$plant.'%')
                ->get(['id','image','name','waterSummer','waterWinter','lightSummer','lightWinter','light','wet']);
        }
        return $searchResult;
    }

    public static function avg($searchResult): array|null
    {   $averageStats=null;
        if ($searchResult !== null) {
            $stats = collect($searchResult);
            $light = $stats->countBy('light')->sortDesc()->keys()->first();
            $wet = $stats->countBy('wet')->sortDesc()->keys()->first();
            $averageStats = array(
                'waterSummer' => round($stats->avg('waterSummer'), 1),
                'waterWinter' => round($stats->avg('waterWinter'), 1),
                'lightSummer' => round($stats->avg('lightSummer'), 1),
                'lightWinter' => round($stats->avg('lightWinter'), 1),
                'light' => $light,
                'wet' => $wet,
            );
        }
        return $averageStats;
    }
}
