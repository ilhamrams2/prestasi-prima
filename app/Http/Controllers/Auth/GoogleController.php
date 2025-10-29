<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle()
    {
        $driver = Socialite::driver('google');
        if (is_callable([$driver, 'stateless'])) {
            $driver = call_user_func([$driver, 'stateless']);
        }

        return $driver->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function handleGoogleCallback()
    {
        try {
            // Build driver instance
            $driver = Socialite::driver('google');

            // Use stateless() when available to avoid state/session issues on some hosting environments
            if (is_callable([$driver, 'stateless'])) {
                // call stateless dynamically to avoid static-analysis false positives
                $driver = call_user_func([$driver, 'stateless']);
            }

            $googleUser = $driver->user();

            // If Google didn't return an email, we can't proceed — show error to user
            if (empty($googleUser->getEmail())) {
                Log::warning('Google login attempt without email. id=' . $googleUser->getId());
                return redirect()->route('login')->with('error', 'Google account tidak memberikan email. Silakan daftar atau gunakan login manual.');
            }

            // Try to find user by google_id first, then by email
            $user = User::where('google_id', $googleUser->getId())->first();

            if (!$user && $googleUser->getEmail()) {
                $user = User::where('email', $googleUser->getEmail())->first();
            }

            // Prevent admin login via Google
            if ($user && data_get($user, 'role') === 'admin') {
                return redirect()->route('login')->with('error', 'Admin accounts cannot log in with Google.');
            }

            if (!$user) {
                // Create new user
                $user = User::create([
                    'name' => $googleUser->getName() ?? $googleUser->getNickname() ?? 'Google User',
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(uniqid('google_', true)),
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(),
                    'role' => 'user',
                ]);
                Log::info('Created user via Google', ['email' => $user->email, 'google_id' => $user->google_id]);
            } else {
                // If user exists but doesn't have google_id, attach it
                if (empty($user->google_id)) {
                    $user->google_id = $googleUser->getId();
                    $user->save();
                    Log::info('Linked google_id to existing user', ['email' => $user->email, 'google_id' => $user->google_id]);
                }
            }

            Auth::login($user, true);

            return redirect()->intended(route('jobs.index'));

        } catch (\Exception $e) {
            // Log the exception for debugging and redirect to login with message
            Log::error('Google login error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Unable to login using Google. Please try again.');
        }
    }


}

