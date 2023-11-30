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

        if (Auth::attempt(['email'=>$this->email,'password'=>$this->password], $this->remember)) {

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
