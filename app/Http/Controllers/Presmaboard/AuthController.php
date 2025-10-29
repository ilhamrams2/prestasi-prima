<?php

namespace App\Http\Controllers\Presmaboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index()
    {
        return view('presmaboard.login');
    }

    function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('presmaboard')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('presmaboard.admin.dashboard')->with('success', 'Login berhasil!');
        } else {
            return redirect()->route('presmaboard.login')->with('error', 'Invalid username or password');
        }
    }

    function logout(Request $request)
    {
        Auth::guard('presmaboard')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('presmaboard.login')->with('success', 'Logout Berhasil!');
    }
}
