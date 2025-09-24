<?php

namespace App\Http\Controllers\siakad\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLogin()
    {
        return view('siakad.auth.siakad-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('siakad')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::guard('siakad')->user();

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('siakad.admin.dashboard');
            } elseif ($user->role === 'guru') {
                return redirect()->route('siakad.guru.dashboard');
            } else {
                return redirect()->route('siakad.siswa.dashboard');
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('siakad')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('siakad.auth.siakad-login');
    }
}
