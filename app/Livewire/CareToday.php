<?php

namespace App\Livewire;

use App\Models\Plants;
use App\Services\PlantsCare;
use Carbon\Carbon;
use Livewire\Component;

class CareToday extends Component
{

    public function wateringThis($plantID)
    {
        $plant=Plants::find($plantID);
        if (\Auth::user()->id === $plant->userID){
            /*$plant->update(['lastWatering' => Carbon::now()->toDateString()]);*/
            request()->session()->flash('success','Растенька полита');
        }
    }

    public function mount()
    {

    }
    public function render()
    {
        return view('livewire.care-today',[
            'plants'=> PlantsCare::watering(),
            'changeLighting'=>PlantsCare::lighting()
        ]);
    }
}
