<?php

namespace App\Livewire;

use App\Models\Plants;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyGarden extends Component
{
    public function render()
    {
        $plants=Plants::query()->where('userID','=',Auth::user()->id)->get();

        return view('livewire.my-garden',[
            'plants' => $plants
        ]);
    }
}
