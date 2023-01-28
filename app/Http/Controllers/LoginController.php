<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login', [
            "url_name" => "Login",
        ]);
    }

    public function authenticate(Request $request)
    {
        // Validasi login
        $credentials = $request->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:3'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Jika login berhasil, maka akan redirect kemudian di intended sebelum masuk ke middleware
            return redirect()->intended('/');
        }

        // Flash message
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

        // return view('logout');
    }
}
