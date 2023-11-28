<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): view
    {
        return view('auth.login');
    }

    public function login(Login $request)
    {
        $credentials=$request->validated();

        if (Auth::attempt($credentials,$request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect('my-plants');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
