<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman Presmacontact.
     */
    public function index()
    {
        return view('prestasiprima.pages.presmacontact');
    }

    /**
     * (Opsional) Menangani pengiriman form kontak.
     */
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'pesan' => 'required|string|max:1000',
        ]);

        // Di sini nanti bisa dikirim ke email, disimpan di database, atau keduanya
        // contoh:
        // ContactMessage::create($validated);
        // atau kirim email ke admin:
        // Mail::to('admin@smkprestasiprima.sch.id')->send(new ContactMail($validated));

        return back()->with('success', 'Pesan kamu berhasil dikirim! Terima kasih telah menghubungi kami.');
    }
}
