<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\RUser;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('layout.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $user = RUser::where('USERNAME', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->PASSWORD)) {
            Auth::login($user);
            session(['user' => $user]);

            if ($user->ROLE === 'kantor') {
                return redirect()->intended('pengunjung');
            }

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('user');
        return redirect('/login');
    }
}