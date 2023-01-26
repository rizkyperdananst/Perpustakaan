<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            return redirect()->route('dashboard');
        }
            return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $creadials = request(['username', 'password']);
        if(Auth::attempt($creadials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        } 
            return back()->withErrors([
                'error' => 'Username dan Password Salah!'
            ]);
    }
}
