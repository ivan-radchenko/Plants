<?php

namespace App\Livewire;

use App\Services\PlantsCare;
use Livewire\Component;

class CareToday extends Component
{
    public function render()
    {
        return view('livewire.care-today',[
            'plants'=> PlantsCare::watering(),
            'changeLighting'=>PlantsCare::lighting()
        ]);
    }
}
