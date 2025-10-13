<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\siakad\SiakadUser;
use App\Models\siakad\SiakadUser as SiakadSiakadUser;

class PresmaboardController extends Controller
{
       public function Eligible_profile()
    {


        return view('presmaboard.eligible') ;

    }

         public function leaderboard()
    {


        return view('presmaboard.leaderboard') ;

    }



    public function dashboard()
    {

        return view('presmaboard.dashboard',);
    }

    public function siswa()
    {

        return view('presmaboard.siswa',);
    }

        public function nilai_pkp()
    {

        return view('presmaboard.nilai_pkp',);
    }
        public function prestasi()
    {

        return view('presmaboard.prestasi',);
    }

          public function project()
    {

        return view('presmaboard.project',);
    }



        public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = SiakadSiakadUser::where('email', $request->email)->first();

        if (!$user || !\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Email atau password salah!']);
        }

        session(['presmaboard_user' => $user]);

        return redirect()->route('presmaboard.dashboard')
        ->with('success', 'Berhasil login sebagai ' . $user->name);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('presmaboard_user');
        return redirect()->route('presmaboard.login')->with('success', 'Berhasil logout.');
    }




}
