@extends('prestasiprima.index')
@section('title', 'Tidak Ada Koneksi Internet')

@section('content')
<section class="flex flex-col justify-center items-center text-center px-4 sm:px-6 md:px-8 min-h-screen bg-white">
    <img
        src="{{ asset('assets/images/erorpage/maskot.svg') }}"
        alt="No Internet Mascot"
        class="w-40 sm:w-56 md:w-64 lg:w-72 h-auto mt-20 sm:mt-28 md:mt-32 lg:mt-44"
    >

    <h1 class="text-2xl sm:text-3xl md:text-5xl lg:text-6xl font-bold text-orange-600 mb-6">
        Tidak Ada Koneksi Internet
    </h1>

    <p class="text-gray-600 text-sm sm:text-base md:text-lg">
        Sepertinya kamu sedang offline. <br>
        Pastikan koneksi internetmu aktif lalu muat ulang halaman ini.
    </p>

    <button onclick="window.location.reload()" class="mt-6 bg-orange-600 text-white px-6 py-2 rounded-lg hover:bg-orange-700 transition">
        Muat Ulang
    </button>
</section>
@endsection