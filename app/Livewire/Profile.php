<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    #[Rule('sometimes |nullable|image|mimes:jpg,jpeg,png| max: 5500')]
    public $image;

    #[Rule('required | string | min:3 | max:20 ')]
    public $name;

    #[Rule('required | email | unique:users')]
    public $email;

    #[Rule('required | string | min:6 | max:20')]
    public $password;

    public function updateImage():void
    {
        $path=$this->image->store('users','public');
        User::find(Auth::user()->id)->update(['image'=>$path]);
    }
    public function updateName(): void
    {
        User::find(Auth::user()->id)->update(['name'=>$this->name]);
        request()->session()->flash('success','Сохранено');
    }
    public function updateEmail(): void
    {
        User::find(Auth::user()->id)->update(['email'=>$this->email]);
    }
    public function updatePassword(): void
    {
        $user = Auth::user();
        $user->forceFill([
            'password' => Hash::make($this->password)
        ]);
        $user->save();
    }

    public function mount(): void
    {
        $this->name=Auth::user()->name;
        $this->email=Auth::user()->email;
    }

    public function render()
    {
        $authUser=Auth::user();
        return view('livewire.profile',[
            'authUser'=>$authUser
        ]);
    }
}
