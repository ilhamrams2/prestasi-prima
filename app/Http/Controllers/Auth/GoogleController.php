<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function handleGoogleCallback()
{
    try {
        $googleUser = \Laravel\Socialite\Facades\Socialite::driver('google')->user();

        $user = \App\Models\User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = \App\Models\User::create([
                'username' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => \Illuminate\Support\Facades\Hash::make(uniqid()),
                'date_of_birth' => now()->subYears(18),
                'email_verified_at' => now(),
                'role' => 'user', // tambahkan default role
            ]);
        }

        \Illuminate\Support\Facades\Auth::login($user);
 
        // 🔹 Tentukan redirect berdasarkan role
        session()->forget('url.intended');

        if ($user->role === 'admin') {
            return redirect()->route('admin.jobs.index'); // ke /admin/jobs
        } else {
            return redirect()->route('jobs.index'); // ke /jobs
        }

    } catch (\Exception $e) {
        return redirect()->route('register')->with('error', 'Unable to login using Google. Please try again.');
    }
}


}
