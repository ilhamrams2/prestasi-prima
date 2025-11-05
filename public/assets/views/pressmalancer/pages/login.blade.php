@extends('app')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@include('header')
<div class="min-h-screen flex items-center justify-center bg-white px-4 py-12">
    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md border border-gray-200">
        {{-- Tombol Sosial --}}
        <a href="{{ route('auth.google', ['provider' => 'google']) }}"
            class="group flex items-center justify-center w-full border border-orange-400 rounded-md py-2 mb-3 hover:bg-orange-500 transition">
            <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-5 h-5 mr-2">
            <span class="text-gray-700 font-medium group-hover:text-white transition">Continue with Google</span>
        </a>

        {{-- Garis Pemisah --}}
        <div class="flex items-center my-6">
            <hr class="flex-grow border-gray-300">
            <span class="mx-3 text-gray-400">♦</span>
            <hr class="flex-grow border-gray-300">
        </div>

        {{-- Form Email & Password --}}
        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Email address" required
                class="w-full px-4 py-2 border border-gray-700 rounded-md focus:outline-none 
        focus:border-orange-500 focus:ring-2 focus:ring-orange-400 
        focus:ring-opacity-50 transition-all duration-300 ease-in-out">

            <input type="password" name="password" placeholder="Password" required
                class="w-full px-4 py-2 border border-gray-700 rounded-md focus:outline-none 
        focus:border-orange-500 focus:ring-2 focus:ring-orange-400 
        focus:ring-opacity-50 transition-all duration-300 ease-in-out">

            <button type="submit"
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 rounded-md shadow-md transition">
                Login
            </button>

            @if ($errors->any())
                <p class="text-red-500 text-sm">{{ $errors->first() }}</p>
            @endif
        </form>

        {{-- Link Register --}}
        <p class="text-center text-gray-600 text-sm mt-4">
            Don’t have an account?
            <a href="/register" class="text-orange-500 font-medium hover:underline">Register</a>
        </p>
    </div>
</div>
@include('ChatbotUI')
