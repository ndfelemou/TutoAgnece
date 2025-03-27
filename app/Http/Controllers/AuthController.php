<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('property.index'));
        }
        return back()->withErrors([
            'email' => 'Identifiants incorrect !',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(RegisterRequest $request)
    {
        User::create($request->validated());
        return to_route('login')->with('success', 'Inscription effectuée avec succès veuillez vous connecter à présent !');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success', 'Vous êtes maintenant déconnecté.');
    }
}
