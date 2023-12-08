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

    public $image;
    public $name;
    public $email;
    public $password;

    public function updateImage():void
    {
        $image=$this->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png| max: 5500'
        ]);
        $image = $image['image'];

        $path=$image->store('users','public');

        if (Auth::user()->image !== 'users/default.svg') {
            Storage::disk('public')->delete(Auth::user()->image);
        }

        User::find(Auth::user()->id)->update(['image'=>$path]);
        request()->session()->flash('success_update_image','Фото обновлено');
    }
    public function updateName(): void
    {
        $name=$this->validate([
            'name' => 'required | string | min:3 | max:20 '
        ]);
        $name = $name['name'];

        User::find(Auth::user()->id)->update(['name'=>$name]);
        request()->session()->flash('success_update_name','Имя обновлено');
    }
    public function updateEmail(): void
    {
        $email=$this->validate([
            'email' => 'required | email | unique:users'
        ]);
        $email = $email['email'];

        User::find(Auth::user()->id)->update(['email'=>$email]);
        request()->session()->flash('success_update_email','Email обновлен');
    }
    public function updatePassword(): void
    {
        $password=$this->validate([
            'password' => 'required | string | min:6 | max:20'
        ]);
        $password = $password['password'];

        $user = Auth::user();
        $user->forceFill([
            'password' => Hash::make($password)
        ]);
        $user->save();
        request()->session()->flash('success_update_password','Пароль успешно сохранен');
    }

    public function delete(): void
    {
        User::find(Auth::user()->id)->delete();

        redirect(route('home'));
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
