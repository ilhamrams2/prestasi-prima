<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PresmaAuthController extends Controller
{
   public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $pengguna = User::where('Email', $request->email)->first();

    if ($pengguna && Hash::check($request->password, $pengguna->pass)) {

        Auth::login($pengguna);
        return redirect()->route('presmalancer.presmalance')->with('success', 'Login berhasil!');
    }

    return back()->withErrors(['email' => 'Email atau password salah.']);
}
}
