<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
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

        redirect()->route('login')->with('status', __($status));
        back()->withErrors(['email' => [__($status)]]);
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
