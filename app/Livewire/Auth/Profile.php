<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

        if (Auth::user()->image !== 'users/default.png') {
            Storage::disk('public')->delete(Auth::user()->image);
        }

        User::find(Auth::user()->id)->update(['image'=>$path]);
        request()->session()->flash('success_update_image','Фото обновлено');
    }
    public function updateName(): void
    {
        User::find(Auth::user()->id)->update(['name'=>$this->name]);
        request()->session()->flash('success_update_name','Имя обновлено');
    }
    public function updateEmail(): void
    {
        User::find(Auth::user()->id)->update(['email'=>$this->email]);
        request()->session()->flash('success_update_email','Email обновлен');
    }
    public function updatePassword(): void
    {
        $user = Auth::user();
        $user->forceFill([
            'password' => Hash::make($this->password)
        ]);
        $user->save();
        request()->session()->flash('success_update_password','Пароль успешно сохранен');
    }

    public function mount(): void
    {
        $this->name=Auth::user()->name;
        $this->email=Auth::user()->email;
    }

    public function render()
    {
        $authUser=Auth::user();
        return view('livewire.auth.profile',[
            'authUser'=>$authUser
        ]);
    }
}
