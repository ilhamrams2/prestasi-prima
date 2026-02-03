<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminPasswordController extends Controller
{
    /**
     * Tampilkan form ganti password
     */
    public function edit()
    {
        return view('prestasiprima.admin.password.edit');
    }

    /**
     * Update password dengan verifikasi password lama
     */
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'Password lama wajib diisi',
            'new_password.required' => 'Password baru wajib diisi',
            'new_password.min' => 'Password baru minimal 8 karakter',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok',
        ]);

        $user = Auth::guard('adminPP')->user();

        // Cek password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah!']);
        }

        // Update password baru
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('prestasiprima.admin.dashboard')->with('success', 'Password berhasil diperbarui!');
    }
}
