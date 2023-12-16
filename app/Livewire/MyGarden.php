<?php

namespace App\Livewire;

use App\Models\Plants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MyGarden extends Component
{
    public $search;
    public function delete($plantID)
    {
        $plant = Plants::find($plantID);
        if($plant->userID === Auth::user()->id){
            $plant->delete();
            Storage::disk('public')->delete($plant->image);
            $this->dispatch(
                'alert',
                icon:'success',
                title:$plant->name.' удалена!',
            );
        }
    }

    public function render()
    {
        if ($this->search){

            $plants=Plants::query()
                ->where('userID','=',Auth::user()->id)
                ->where('name','ilike','%' .$this->search. '%')
                ->get();
        }else{
            $plants=Plants::query()
                ->where('userID','=',Auth::user()->id)
                ->get();
        }

        if (session('success'))
        {
            $this->dispatch(
                'alert',
                icon:'success',
                title:session('success'),
            );
        }

        return view('livewire.my-garden',[
            'plants' => $plants
        ]);
    }
}
