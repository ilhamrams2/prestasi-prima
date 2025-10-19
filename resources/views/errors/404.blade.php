@extends('prestasiprima.index')
@section('title', 'Not Found')

@section('content')
<section class="flex flex-col justify-center items-center text-center px-4 sm:px-6 md:px-8 min-h-screen bg-white">
    <!-- Maskot -->
    <img
        src="{{ asset('assets/images/erorpage/maskot.svg') }}"
        alt="404 Mascot"
        class="w-40 sm:w-56 md:w-64 lg:w-72 h-auto mt-20 sm:mt-28 md:mt-32 lg:mt-44"
    >

    <!-- Judul -->
    <h1 class="text-2xl sm:text-3xl md:text-5xl lg:text-6xl font-bold text-orange-600 mb-6">
        Not Found 404
    </h1>

    <!-- Pesan tambahan -->
    <p class="text-gray-600 text-sm sm:text-base md:text-lg">
        Halaman yang kamu cari tidak ditemukan. <br>
        <a href="{{ url('/') }}" class="text-orange-500 font-semibold hover:underline">Kembali ke beranda</a>
    </p>
</section>
@endsection
