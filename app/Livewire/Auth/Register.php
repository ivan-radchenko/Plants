<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
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
            $path=$validated['image']->store('users','public');
            $validated['image']=$path;
        }

        $user=User::create($validated);
        if ($user->save()){
            Auth::login($user);
            redirect()->route('my-garden');
        }
        back()->with('error',('Что-то пошло не так =('));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
