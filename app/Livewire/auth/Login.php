<?php

namespace App\Livewire\auth;

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
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
