<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\presmaboard_user;
use App\Models\presmaboarduser;
use Illuminate\Support\Facades\Hash;

class PresmaboardController extends Controller
{
    public function Eligible_profile()
    {
        return view('presmaboard.eligible');
    }

    public function leaderboard()
    {
        return view('presmaboard.leaderboard');
    }

    public function dashboard()
    {
        return view('presmaboard.dashboard');
    }

    public function siswa()
    {
        return view('presmaboard.siswa');
    }

    public function nilai_pkp()
    {
        return view('presmaboard.nilai_pkp');
    }

    public function prestasi()
    {
        return view('presmaboard.prestasi');
    }

    public function project()
    {
        return view('presmaboard.project');

    }
 public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = presmaboarduser::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    session([
        'presmaboard_user' => $user,
        'username' => $user->name,
    ]);

    // kirim session “toast” agar script JS di Blade bisa mendeteksi
    return redirect()->route('presmaboard.dashboard')
        ->with('toast', 'login');
}


public function logout(Request $request)
{
    $request->session()->forget('presmaboard_user');
    return redirect()
        ->route('presmaboard.login')
        ->with('success', 'logout');
}
}