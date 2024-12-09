<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);
        Auth::login($user);
        event(new Registered($user));
        return redirect('/');
    }

    public function create_login()
    {
        return view('auth.login');
    }

    public function store_login(Request $request)
    {
        $credentitals = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ]);
        if(! Auth::attempt($credentitals)){
            return back()
                ->withInput()
                ->withErrors([
                    'email'=>"Не верный логин или пароль"
                ]);
        }
        return redirect()->intended('/');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
