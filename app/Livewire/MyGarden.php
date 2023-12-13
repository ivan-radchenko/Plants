<?php

namespace App\Livewire;

use App\Models\Plants;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyGarden extends Component
{
    public $search;
    public function delete($plantID)
    {
        $plantUserID = Plants::find($plantID)['userID'];
        $userID = Auth::user()->id;
        if($plantUserID === $userID){
            Plants::find($plantID)->delete();
        }
    }

    public function render()
    {
        if ($this->search){

            $plants=Plants::query()->where('userID','=',Auth::user()->id)->where('name','ilike','%' .$this->search. '%')->get();
        }else{
            $plants=Plants::query()->where('userID','=',Auth::user()->id)->get();
        }

        return view('livewire.my-garden',[
            'plants' => $plants
        ]);
    }
}
