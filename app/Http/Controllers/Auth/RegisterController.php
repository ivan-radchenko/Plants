<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create(): view
    {
        return \view('auth.register');
    }

    public function store(Register $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')){
            $file = $validated['image'];
            $path = $file->storeAs('users',$file->hashName(),'public');

            $validated['image']=$path;
        }

        $user=User::create($validated);
        if ($user->save()){
            Auth::login($user);
            return redirect()->route('home');
        }

        return back()->with('error',('Что-то пошло не так =('));
    }
}
