<?php

namespace App\Livewire;

use App\Enums\Light;
use App\Enums\Wet;
use App\Models\Plants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPlant extends Component
{
    use WithFileUploads;
    #[locked]#[Rule('required')]
    public $plantID;
    #[locked]#[Rule('required')]
    public $userID;
    #[Rule('required | string | min:3 | max:30 ')]
    public $name;
    #[Rule('sometimes|nullable|image|mimes:jpg,jpeg,png| max: 10000')]
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
    #[Rule('sometimes|nullable|string|min:3|max:130')]
    public $notes;

    public function update(): void
    {
        $validated=$this->validate();

        if ($validated['image'] === null){
            $validated['image'] = $this->imageOld;
        } else {
            $image=$validated['image'];
            $path='storage/plants/'.Str::beforeLast($image->hashName(),'.').'.jpeg';
            $image=Image::read($image)->cover(1140,900,'center')->toJpeg(75);
            $image->save($path);

            $validated['image']=Str::after($path,'storage/');;
            Storage::disk('public')->delete($this->imageOld);
        }

        $plants=Plants::find($this->plantID)->update($validated);
        if ($plants===true)
        {
            redirect()->route('my-garden');
            request()->session()->flash('success','Растенька изменена!');
        }
    }

    public function increment($x)
    {
        if (gettype($this->$x) !== 'integer') {
            $this->$x = intval($this->$x);
        }
        if ($this->$x <  30)
            $this->$x=$this->$x+1;
    }

    public function decrement($x)
    {
        if (gettype($this->$x) !== 'integer') {
            $this->$x = intval($this->$x);
        }
        if ($this->$x >  1)
            $this->$x=$this->$x-1;
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
            return view('livewire.edit-plant')
                ->title('Изменить ' . $this->name);
    }
}
