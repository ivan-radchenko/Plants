<?php

namespace App\Livewire;

use App\Enums\Light;
use App\Enums\Wet;
use App\Models\Plants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePlant extends Component
{
    use WithFileUploads;

    #[locked]#[Rule('required')]
    public $userID;

    #[Rule('required | string | min:3 | max:20 ')]
    public $name;

    #[Rule('sometimes |nullable|image|mimes:jpg,jpeg,png| max: 5500')]
    public $image;
    #[Rule('required|integer|min:1|max:30')]
    public $waterSummer=1;
    #[Rule('required|integer|min:1|max:30')]
    public $waterWinter=2;
    #[Rule('required|integer|min:1|max:24')]
    public $lightSummer=15;
    #[Rule('required|integer|min:1|max:24')]
    public $lightWinter=8;
    #[Rule(new Enum(Light::class))]
    public $light=Light::BRIGHT;
    #[Rule(new Enum(Wet::class))]
    public $wet=Wet::MEDIUM;

    public function create()
    {
        $validated=$this->validate();

        $validated['light']=$validated['light']->value;
        $validated['wet']=$validated['wet']->value;

        if ($validated['image'] === null){
            $validated['image'] = 'plants/defaultPlant.svg';
        } else {

            $path=$validated['image']->store('plants','public');
            $validated['image']=$path;
        }

        $plants=Plants::create($validated);
        if ($plants->save())
        {
            redirect()->route('my-garden');
        }
    }

    public function mount(): void
    {
        $this->userID=Auth::user()->id;
    }

    public function render()
    {
        return view('livewire.create-plant');
    }
}
