<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ResetPassword extends Component
{
    #[Rule('required | email')]
    public $email;

    #[Rule('required | string | min:6 | max:20')]
    public $password;

    #[Rule('required')]
    public $token;

    public function resetPassword(): void
    {
        $status = Password::reset(
            $this->validate(),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        if ($status === 'passwords.reset'){
            redirect()->route('login');
            request()->session()->flash('success','Пароль был успешно изменен!');
        } else {
            throw ValidationException::withMessages([
                'email' => __($status),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
