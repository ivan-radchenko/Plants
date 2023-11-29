<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $authUser=Auth::user();

        return view('auth.profile',[
            'authUser'=>$authUser
        ]);
    }
}
