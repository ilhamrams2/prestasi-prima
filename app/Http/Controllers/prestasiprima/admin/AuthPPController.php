<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\PPuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthPPController extends Controller
{
    public function showLoginForm()
    {
        return view('prestasiprima.admin.login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba cari user dari tabel 'users' (pakai model PPuser)
        $user = PPuser::where('email', $request->email)->first();

        // Cek user & password manual
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::guard('authPP')->login($user);
            $request->session()->regenerate();

            return redirect()->intended(route('prestasiprima.admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        // Logout dari guard authPP
        Auth::guard('authPP')->logout();

        // Hapus semua data session (destroy total)
        $request->session()->flush();

        // Regenerasi token baru (biar aman dari CSRF reuse)
        $request->session()->regenerateToken();

        // Arahkan ke halaman login (atau bisa kamu ganti dashboard publik)
        return redirect()->route('landing')->with('success', 'Session telah berakhir.');
    }
}
