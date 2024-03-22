<?php

namespace App\Livewire;

use App\Enums\AlertIcons;
use App\Models\Plants;
use App\Services\PlantsCare;
use App\Services\SeasonNow;
use Carbon\Carbon;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;


class CareToday extends Component
{
    #[locked]
    public $plants;
    #[locked]
    public $changeLighting;

    public function wateringThis($plantID): void
    {
        $plant=Plants::find($plantID);
        if (\Auth::user()->id === $plant->userID){
            $plant->update(['lastWatering' => Carbon::now()->toDateString()]);

            $this->dispatch(
                'alert',
                icon:AlertIcons::SUCCESS,
                title:$plant->name.' полита!',
                position:'top'
            );
        }
    }
    public function wateringAll(): void
    {
        foreach ($this->plants as $plant){
            $plant=Plants::find($plant->id);
            if (\Auth::user()->id === $plant->userID){
                $plant->update(['lastWatering' => Carbon::now()->toDateString()]);
            }
        }
        $this->dispatch(
            'alert',
            icon:AlertIcons::SUCCESS,
            title:'Все растеньки политы!',
            position:'top'
        );

    }

    public function changeSeason($plantGroup):void
    {
        $plants=$this->changeLighting[$plantGroup];
        foreach ($plants as $plant){
            $plant=Plants::find($plant->id);
            if (\Auth::user()->id === $plant->userID){
                $plant->update(['status'=>SeasonNow::season()]);
            }
        }
        if (SeasonNow::season() === 'summer'){
            $season='летнее';
        }else{
            $season='зимнее';
        }
        $this->dispatch(
            'alert',
            icon:AlertIcons::SUCCESS,
            title:'Группа переведена на '.$season.' освещение!',
            position:'top'
        );
    }

    public function mount(): void
    {
        $this->plants=PlantsCare::watering();
        $this->changeLighting=PlantsCare::lighting();
    }
    #[Title('Уход сегодня')]
    public function render()
    {
        return view('livewire.care-today');
    }
}
