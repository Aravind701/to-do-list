<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * show register form
     * @return view
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * @param $request
     * register a user
     * @return Redirect
     */
    public function register(AuthRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
