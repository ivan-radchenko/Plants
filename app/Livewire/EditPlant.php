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

class EditPlant extends Component
{
    use WithFileUploads;
    #[locked]#[Rule('required')]
    public $plantID;
    #[locked]#[Rule('required')]
    public $userID;
    #[Rule('required | string | min:3 | max:20 ')]
    public $name;
    #[Rule('sometimes|nullable|image|mimes:jpg,jpeg,png| max: 5500')]
    public $image;
    #[locked]
    public $imageOld;
    #[Rule('required|integer|min:1|max:30')]
    public $waterSummer;
    #[Rule('required|integer|min:1|max:30')]
    public $waterWinter;
    #[Rule('required|integer|min:1|max:24')]
    public $lightSummer;
    #[Rule('required|integer|min:1|max:24')]
    public $lightWinter;
    #[Rule(new Enum(Light::class))]
    public $light;
    #[Rule(new Enum(Wet::class))]
    public $wet;
    #[Rule('sometimes|nullable|string|min:3|max:1000')]
    public $notes;

    public function update()
    {
        $validated=$this->validate();

        if ($validated['image'] === null){
            $validated['image'] = $this->imageOld;
        } else {
            $path=$validated['image']->store('plants','public');
            $validated['image']=$path;
        }

        $plants=Plants::find($this->plantID)->update($validated);
        if ($plants===true)
        {
            redirect()->route('my-garden');
            request()->session()->flash('success_update_plant','Растенька обновлена');
        }
    }

    public function mount(Plants $plant)
    {
        $this->plantID=$plant->id;
        $this->userID=$plant->userID;
        $this->name=$plant->name;
        $this->imageOld=$plant->image;
        $this->waterSummer=$plant->waterSummer;
        $this->waterWinter=$plant->waterWinter;
        $this->lightSummer=$plant->lightSummer;
        $this->lightWinter=$plant->lightWinter;
        $this->light=$plant->light;
        $this->wet=$plant->wet;
        $this->notes=$plant->notes;
    }

    public function render()
    {
            return view('livewire.edit-plant');
    }
}
