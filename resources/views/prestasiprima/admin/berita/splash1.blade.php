@extends('prestasiprima.index')

@section('title', 'News Splash 1')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-white">
    <div class="w-[750px] h-[420px] rounded-3xl bg-orange-600 shadow-lg flex items-center justify-between px-12">

        <!-- Left Section -->
        <div class="flex flex-col justify-center w-1/2">
            <h1 class="text-5xl font-extrabold text-yellow-300 leading-snug">
                Welcome to
            </h1>
            <p class="text-2xl font-semibold text-white mt-2">
                News Management
            </p>

            <!-- Progress Bar -->
            <div class="mt-12 w-44 h-2 rounded-full bg-white overflow-hidden">
                <div class="h-full bg-yellow-400 w-1/4"></div>
            </div>
        </div>

        <!-- Right Section -->
        <div class="w-1/2 flex flex-col items-center justify-center">
            <img src="{{ asset('assets/images/news/splash1.png') }}"
                 alt="Splash 1"
                 class="w-[300px] h-[200px] object-cover rounded-md shadow-md">

            <!-- Next Button -->
            <a href="{{ route('splash.2') }}"
               class="mt-8 bg-white text-orange-600 font-semibold px-6 py-2 rounded-xl shadow hover:bg-gray-100 transition flex items-center gap-2">
                Next
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection
