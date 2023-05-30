<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as Session;



class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()){
            return redirect('/guests');
        }else{
            return view('guest.login',[
                'title' => 'Login | Summarecon',
                'model' => 'summarecon'
            ]);
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'username'=>$request->input('username'),
            'password'=>$request->input('password')
        ];


        if (Auth::Attempt($data)) {
            return redirect('/guests');
        }else{
            Session::flash('error', 'Username atau Password Salah');
            return redirect('/login');
        }
    }

    public function actionLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
