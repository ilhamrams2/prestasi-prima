@extends('prestasiprima.index')
@section('title','NotFound')

@section('content')
<section class="flex flex-col justify-center items-center text-center px-4 sm:px-6 md:px-8">
    <!-- Maskot -->
    <img
        src="{{ asset('assets/images/erorpage/maskot.svg') }}"
        alt="404 Mascot"
        class="w-40 sm:w-56 md:w-64 lg:w-72 h-auto mt-20 sm:mt-28 md:mt-32 lg:mt-44"
    >

    <!-- Judul -->
    <h1 class="text-2xl sm:text-3xl md:text-5xl lg:text-6xl font-bold text-orange-600 mb-16 sm:mb-24 md:mb-28 lg:mb-32">
        Not Internet
    </h1>
</section>
@endsection
