<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('guest.index', [
            'title' => 'Login | Summarecon',
            'model' => 'summarecon'
        ]);
    }
}