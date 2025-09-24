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
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@smkprestasiprima\.sch\.id$/'
            ],
            'password' => 'required|string',
        ], [
            'email.regex' => 'Email harus menggunakan domain @smkprestasiprima.sch.id',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('siakad')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::guard('siakad')->user();

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('siakad.dashboard')->with('success', 'Anda berhasil login.');
            }
        }
        return redirect()->route('siakad.dashboard')->with('error', 'Email atau password salah.');
    }


    public function logout(Request $request)
    {
        Auth::guard('siakad')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('siakad.login')->with('error', 'Anda berhasil logout.');
    }
}
