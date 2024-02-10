<?php

namespace App\Livewire\Auth;

use App\Models\User;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Http\Request;

class Login extends Component
{
    use WithRateLimiting;
    #[Rule('required | email')]
    public $email;

    #[Rule('required | string')]
    public $password;

    #[Rule('boolean')]
    public $remember=false;

    public function login(): void
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

    public function socialRedirect(Request $request): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        $driver = $request->route()->parameters()['driver'];
        return Socialite::driver($driver)->redirect();
    }

    public function socialCallback(Request $request)
    {
        $driver = $request->route()->parameters()['driver'];
        $socialUser = Socialite::driver($driver)->user();
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();

        if ($user === null) {
            $newUser=[
                'name'=>$socialUser->getName(),
                'email'=>$socialUser->getEmail(),
                'password'=>Hash::make($socialUser->getId().rand(10000000,99999900))
            ];
            $user=User::create($newUser);
            if ($user->save()){
                Auth::login($user);
                return redirect(route('my-garden'));
            }
            return back()->with('error',('Что-то пошло не так =('));
        } else {
            Auth::login($user);
             return redirect(route('my-garden'));
        }
    }
    #[Title('Вход')]
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
