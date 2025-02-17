<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->name) {
            $user = User::where('name', $request->name)->orWhere('email', $request->name)->first();
            if (Auth::attempt(['email' => $user->email ?? null, 'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect()->route('01.04.index');
            }
            session()->flash('loginFailed', true);
        }
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
