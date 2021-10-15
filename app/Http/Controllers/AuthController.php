<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    function CheckLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')-> attempt($credentials)) {
            return redirect()->route('home');
        }
        return redirect()
            ->back()
            ->with('fail', 'Incorrect credentials');
    }

    function logout() {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
