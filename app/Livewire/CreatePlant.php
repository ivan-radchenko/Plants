<?php

namespace App\Livewire;

use App\Enums\Light;
use App\Enums\Wet;
use App\Models\Plants;
use App\Services\SeasonNow;
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

    #[Rule('required | string | min:3 | max:50 ')]
    public $name;

    #[Rule('required|image|mimes:jpg,jpeg,png| max: 5500')]
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
    public $light=Light::BRIGHT->value;
    #[Rule(new Enum(Wet::class))]
    public $wet=Wet::MEDIUM->value;
    #[Rule('sometimes|nullable|string|min:3|max:1000')]
    public $notes;
    #[locked]#[Rule('required')]
    public $status;
    public function create()
    {
        $validated=$this->validate();

        $path=$validated['image']->store('plants','public');
        $validated['image']=$path;

        $plants=Plants::create($validated);
        if ($plants->save())
        {
            redirect()->route('my-garden');
            request()->session()->flash('success','Растенька добавлена!');
        }
    }

    public function mount(): void
    {
        $this->userID=Auth::user()->id;
        $this->status=SeasonNow::season();
    }

    public function render()
    {
        return view('livewire.create-plant');
    }
}
