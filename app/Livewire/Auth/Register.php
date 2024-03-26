<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
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

    public function register(): void
    {
        $validated = $this->validate();

        if ($validated['image'] === null){
            $validated['image'] = 'users/default.svg';
        } else {
            $image=$validated['image'];
            $path='storage/users/'.Str::beforeLast($image->hashName(),'.').'.jpeg';
            $image=Image::read($image)->cover(200,200,'center')->toJpeg(75);
            $image->save($path);

            $validated['image']=Str::after($path,'storage/');
        }

        $user=User::create($validated);
        if ($user->save()){
            Auth::login($user);
            redirect()->route('my-garden');
        }
        back()->with('error',('Что-то пошло не так =('));
    }
    #[Title('Регистрация')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
