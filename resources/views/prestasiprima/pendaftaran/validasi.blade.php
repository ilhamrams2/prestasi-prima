@extends('layouts.app')

@section('title', 'Formulir Terkirim - SMK Prestasi Prima')

@section('content')
    <!-- Section Validasi -->
    <section class="bg-[#0c1b2c] min-h-[70vh] flex items-center justify-center px-6 py-20">
        <div class="bg-white rounded-xl shadow-lg max-w-2xl p-10 text-center mt-20">
            <h1 class="text-3xl md:text-4xl font-bold text-orange-600 mb-6 uppercase">
                FORM TERKIRIM
            </h1>
            <p class="text-gray-700 leading-relaxed mb-8">
                Formulir Pendaftaran Calon Siswa Baru SMK Prestasi Prima telah berhasil dikirim.
                Kami akan segera menghubungi Anda melalui WhatsApp untuk informasi lebih lanjut mengenai:<br><br>
                <span class="font-semibold">Jadwal Tes Masuk</span> & <span class="font-semibold">Tahapan Seleksi Berikutnya</span>.<br><br>
                Tetap pantau WA Anda dan jangan ragu menghubungi kami jika ada pertanyaan.
            </p>
            <a href="https://wa.me/6285199528886" target="_blank"
               class="inline-block bg-orange-600 hover:bg-orange-700 text-white font-semibold px-6 py-3 rounded-lg transition-all duration-300">
                Hubungi Kami
            </a>
        </div>
    </section>
@endsection
