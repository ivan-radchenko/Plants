<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    #[Rule('sometimes |nullable|image|mimes:jpg,jpeg,png| max: 5500')]
    public $image;
    #[Rule('required | string | min:3 | max:20 ')]
    public $name;
    #[Rule('required | email')]
    public $email;
    #[Rule('sometimes|nullable|string | min:6 | max:20')]
    public $password;

    public function updateImage($image):void
    {
        $path=$image->store('users','public');

        if (Auth::user()->image !== 'users/default.svg') {
            Storage::disk('public')->delete(Auth::user()->image);
        }

        User::find(Auth::user()->id)->update(['image'=>$path]);
        request()->session()->flash('success','Данные сохранены.');
    }
    public function updateName($name): void
    {
        User::find(Auth::user()->id)->update(['name'=>$name]);
        request()->session()->flash('success','Данные сохранены.');
    }
    public function updateEmail($email): void
    {
        User::find(Auth::user()->id)->update(['email'=>$email]);
        request()->session()->flash('success','Данные сохранены.');
    }
    public function updatePassword($password): void
    {
        $user = Auth::user();
        $user->forceFill([
            'password' => Hash::make($password)
        ]);
        $user->save();
        request()->session()->flash('success','Данные сохранены.');
    }

    public function update()
    {
        $validated = $this->validate();
        if($validated['image']) {
            $this->updateImage($validated['image']);
        }
        if($validated['name'] !== Auth::user()->name) {
            $this->updateName($validated['name']);
        }
        if($validated['email'] !== Auth::user()->email) {
            $emailUniq=$this->validate([
                'email' => 'unique:users'
            ]);
            $this->updateEmail($emailUniq['email']);
        }
        if($validated['password']) {
            $this->updatePassword($validated['password']);
        }
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
    #[Title('Профиль')]
    public function render()
    {
        if (session('success'))
        {
            $this->dispatch(
                'alert',
                icon:'success',
                title:session('success'),
                position:'center'
            );
        }

        return view('livewire.auth.profile',[
            'authUser'=>Auth::user()
        ]);
    }
}
