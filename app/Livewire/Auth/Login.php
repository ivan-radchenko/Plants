<?php

namespace App\Livewire\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
    use WithRateLimiting;
    #[Rule('required | email')]
    public $email;

    #[Rule('required | string')]
    public $password;

    #[Rule('boolean')]
    public $remember=false;

    public function login()
    {
        try {
            $this->rateLimit(3,60);
            $validated = $this->validate();
            if (Auth::attempt(['email'=>$validated['email'],'password'=>$validated['password']], $validated['remember'])) {

                session()->regenerate();

                redirect()->route('my-garden');
            }
            back()->with(['status' => 'Неверный логин или пароль']);

        } catch (TooManyRequestsException $exception) {
            throw ValidationException::withMessages([
                'email' => "Пожалуйста, подождите еще {$exception->secondsUntilAvailable} секунд, чтобы войти в систему.",
            ]);
        }
    }

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
        return view('livewire.auth.login');
    }
}
