<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginproses(Request $request ){
        if(Auth::attempt($request->only('name','password'))){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }



        return back()->with('loginError', 'Login Failed !!!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');

    }
}
