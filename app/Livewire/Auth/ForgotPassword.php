<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ForgotPassword extends Component
{
    #[Rule('required | email')]
    public $email;

    public function send(): void
    {
        $validated=$this->validate();
        $status = Password::sendResetLink($validated);
        back()->with(['status' => __($status)]);
        back()->withErrors(['email' => __($status)]);
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
