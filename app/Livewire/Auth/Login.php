<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
    #[Rule('required | email')]
    public $email;

    #[Rule('required | string')]
    public $password;

    #[Rule('boolean')]
    public $remember=false;

    public function login()
    {
        $validated = $this->validate();
        if (Auth::attempt(['email'=>$validated['email'],'password'=>$validated['password']], $validated['remember'])) {

            session()->regenerate();

            redirect('my-plants');
        }
        back()->with(['status' => 'Неверный логин или пароль']);
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
