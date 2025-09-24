<?php

namespace App\Http\Controllers\siakad;

use App\Http\Controllers\Controller;
use App\Models\siakad\SiakadUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiakadUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:siakad_users,username',
            'email' => [
                'required',
                'email',
                'unique:siakad_users,email',
                function ($attribute, $value, $fail) {
                    if (!str_ends_with($value, '@smkprestasiprima.sch.id')) {
                        $fail('Email harus menggunakan domain @smkprestasiprima.sch.id');
                    }
                },
            ],
            'password' => 'required|min:6|confirmed',
        ]);

        $user = SiakadUser::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guru',
        ]);

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Registrasi berhasil!');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
