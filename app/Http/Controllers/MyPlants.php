<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MyPlants extends Controller
{
    public function index(): view
    {
        return view('my-plants');
    }
}
