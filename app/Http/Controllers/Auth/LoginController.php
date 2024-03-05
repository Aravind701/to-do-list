<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * show register form
     * @return view
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * @param $request
     * login a user
     * @return Redirect
     */
    public function login(LoginAuthRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    /**
     * logout user
     * @return view
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
