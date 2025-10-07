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
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek user berdasarkan email
        $pengguna = User::where('email', $request->email)->first();

        // Cek password
        if ($pengguna && Hash::check($request->password, $pengguna->password)) {
            Auth::login($pengguna);

            // 🔥 Cek role dan arahkan ke route sesuai role
            if ($pengguna->role === 'admin') {
                return redirect()->route('admin.jobs.index')->with('success', 'Login berhasil sebagai Admin!');
            } else {
                return redirect()->route('jobs.index')->with('success', 'Login berhasil!');
            }
        }

        // Jika gagal login
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
}
