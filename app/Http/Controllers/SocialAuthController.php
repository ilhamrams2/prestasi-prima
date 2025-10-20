<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    // Redirect ke provider (Google/Facebook/Apple)
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Callback setelah login
    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();

            // Cek apakah user sudah ada
            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                // Kalau belum ada, buat user baru
                $user = User::create([
                    'name' => $socialUser->getName() ?? $socialUser->getNickname() ?? 'User-' . Str::random(5),
                    'email' => $socialUser->getEmail(),
                    'password' => bcrypt(Str::random(16)), // password random
                ]);
            }

            Auth::login($user);

            return redirect('/jobs'); // redirect ke page kamu
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Gagal login dengan ' . ucfirst($provider)]);
        }
    }
}
