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
        // ✅ Ubah validasi unique ke presmalancer_users
        $request->validate([
    'username' => ['required', 'string', 'max:255', 'unique:presmalancer_users'],
    'email' => ['required', 'string', 'email', 'max:255', 'unique:presmalancer_users'],
    'password' => ['required', 'string', 'min:8', 'confirmed'],
    'date_of_birth' => ['required', 'date', 'before:today'],
]);


        // Buat user baru
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_of_birth' => $request->date_of_birth,
            'name' => $request->username,
        ]);

        // Trigger event bawaan Laravel
        event(new Registered($user));

        // Auto-login
        Auth::login($user);

        // Arahkan ke halaman setelah register
        return redirect()->route('jobs.index')->with('success', 'Registrasi berhasil!');
    }
}
    