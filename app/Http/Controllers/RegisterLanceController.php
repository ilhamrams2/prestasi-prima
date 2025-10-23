<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterLanceController extends Controller
{
    /**
     * Display the registration form.
     */
    public function showRegistrationForm()
    {
        // Perbaiki path view
        return view('pressmalancer.pages.register');
    }

    /**
     * Handle a registration request for the application.
     */
    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:presmalancer_users,name'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:presmalancer_users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Trigger event bawaan Laravel
        event(new Registered($user));

        // Auto-login
        Auth::login($user);

        // Arahkan ke halaman setelah register
        return redirect()->route('jobs.index')->with('success', 'Registrasi berhasil!');
    }
}