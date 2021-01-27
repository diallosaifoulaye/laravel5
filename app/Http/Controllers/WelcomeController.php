<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//php artisan make:controller WelcomeController pour créer un controlleur


class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
