<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\ContactMessage;
use App\Mail\NewContactMessageMail;
use Illuminate\Support\Facades\Mail;

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

        // Simpan pesan ke database
        $message = ContactMessage::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'pesan' => $validated['pesan'],
            'ip_address' => $request->ip(),
        ]);

        // Kirim email notifikasi ke admin
        try {
            // Ganti dengan email admin yang sebenarnya
            $adminEmail = env('ADMIN_EMAIL', 'admin@prestasiprima.sch.id');
            Mail::to($adminEmail)->send(new NewContactMessageMail($message));
        } catch (\Exception $e) {
            // Log error tapi tetap lanjutkan (jangan gagalkan submit form)
            \Log::error('Failed to send contact notification email: ' . $e->getMessage());
        }

        return back()->with('success', 'Pesan kamu berhasil dikirim! Terima kasih telah menghubungi kami.');
    }
}
