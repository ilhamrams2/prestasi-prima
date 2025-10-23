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

            if ($user && $user->role === 'admin') {
                return redirect()->route('login')->with('error', 'Admin accounts cannot log in with Google.');
            }

            if (!$user) {
                $user = \App\Models\User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => \Illuminate\Support\Facades\Hash::make(uniqid()),
                    'google_id' => $googleUser->id,
                    'email_verified_at' => now(),
                    'role' => 'user',
                ]);
            } elseif (!$user->google_id) {
                $user->google_id = $googleUser->id;
                $user->save();
            }

            \Illuminate\Support\Facades\Auth::login($user);
    
            return redirect()->route('jobs.index');

        } catch (\Exception $e) {
            return redirect()->route('register')->with('error', 'Unable to login using Google. Please try again.');
        }
    }


}
