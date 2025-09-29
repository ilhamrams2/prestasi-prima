@extends('news.backend.index')

@section('title', "Splash $screen - News Management")

@section('content')
<div class="relative min-h-screen flex items-center justify-center px-6">
  {{-- Background Image --}}
  <img src="{{ asset('assets/images/news/bg.png') }}"
       alt="Splash Background"
       class="absolute inset-0 w-full h-full object-cover z-0"/>

  {{-- Overlay -- bisa hitam atau oranye transparan --}}
  <div class="absolute inset-0 bg-black opacity-40 z-10"></div>
  {{-- atau: bg-orange-600 opacity-50, tergantung nuansa --}}

  {{-- Konten card di atas overlay --}}
  <div class="relative z-20 w-full max-w-[1100px]">        @switch($screen)
            {{-- ================== SCREEN 1 (WELCOME) ================== --}}
            @case(1)
    <div class="splash-card bg-orange-600 text-white rounded-3xl flex w-[1100px] h-[650px] overflow-hidden animate-fadeIn">
                    <!-- Left Content -->
                    <div class="flex flex-col justify-center w-1/2 px-12">
                        <h1 class="text-3xl font-medium text-yellow-300">Welcome to</h1>
                        <p class="text-5xl font-extrabold mt-2">Content Management</p>
                        <p class="text-lg mt-4 opacity-90">Kelola berita & galeri sekolah dengan mudah.</p>

                        <!-- Progress -->
                        <div class="mt-8">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-semibold">Step 1/4</span>
                            </div>
                            <div class="h-3 bg-orange-300 rounded-full overflow-hidden">
                                <div class="h-full w-1/4 bg-yellow-400 transition-all duration-500 progress"></div>
                            </div>
                        </div>

                        <!-- Next -->
                        <div class="flex items-center gap-6 mt-12">
                            <a href="{{ url('/splash/2') }}"
                                class="bg-white text-orange-600 font-bold px-6 py-3 rounded-xl shadow-md flex items-center gap-2 group transition hover:scale-105 hover:shadow-lg">
                                <span>Next</span>
                                <svg class="w-6 h-6 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Right Illustration -->
                <div class="w-1/2 flex items-center justify-center">
    <img src="{{ asset('assets/images/news/splash1.png') }}"
         class="splash-img animate-slideInRight w-[460px] max-h-[600px] object-contain drop-shadow-xl">
</div>
                </div>
            @break

            {{-- ================== SCREEN 2 (NEWS) ================== --}}
            @case(2)
                <div class="splash-card bg-orange-600 text-white rounded-3xl flex w-[1100px] h-[650px] overflow-hidden animate-fadeIn">
                    <div class="flex flex-col justify-center w-1/2 px-12">
                        <h1 class="text-3xl font-medium text-yellow-300">What's</h1>
                        <p class="text-5xl font-extrabold mt-2">News Management</p>
                        <p class="text-lg mt-4 opacity-90">
                            Fitur untuk mengelola berita dan informasi sekolah.
                            Admin dapat membuat, mengedit, dan mempublikasikan pengumuman,
                            kegiatan, maupun prestasi siswa.
                        </p>

                        <!-- Progress -->
                        <div class="mt-8">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-semibold">Step 2/4</span>
                            </div>
                            <div class="h-3 bg-orange-300 rounded-full overflow-hidden">
                                <div class="h-full w-2/4 bg-yellow-400 transition-all duration-500 progress"></div>
                            </div>
                        </div>

                        <!-- Prev / Next -->
                        <div class="flex items-center gap-6 mt-12">
                            <a href="{{ url('/splash/1') }}"
                                class="bg-white text-orange-600 font-bold px-6 py-3 rounded-xl shadow-md flex items-center gap-2 group transition hover:scale-105 hover:shadow-lg">
                                <svg class="w-6 h-6 transition-transform duration-300 group-hover:-translate-x-1" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                                <span>Prev</span>
                            </a>
                            <a href="{{ url('/splash/3') }}"
                                class="bg-white text-orange-600 font-bold px-6 py-3 rounded-xl shadow-md flex items-center gap-2 group transition hover:scale-105 hover:shadow-lg">
                                <span>Next</span>
                                <svg class="w-6 h-6 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>

                  <div class="w-1/2 flex items-center justify-center">
    <img src="{{ asset('assets/images/news/splash2.png') }}"
         class="splash-img animate-slideInRight w-[460px] max-h-[600px] object-contain drop-shadow-xl">
</div>
                </div>
            @break

            {{-- ================== SCREEN 3 (GALLERY) ================== --}}
            @case(3)
                         <div class="splash-card bg-orange-600 text-white rounded-3xl flex w-[1100px] h-[650px] overflow-hidden animate-fadeIn">
                    <div class="flex flex-col justify-center w-1/2 px-12">
                        <h1 class="text-3xl font-medium text-yellow-300">What's</h1>
                        <p class="text-5xl font-extrabold mt-2">Gallery Management</p>
                        <p class="text-lg mt-4 opacity-90">
                            Fitur galeri memudahkan admin dalam mengelola foto & dokumentasi kegiatan.
                            Semua momen berharga sekolah dapat diunggah, dikategorikan,
                            dan ditampilkan dengan rapi.
                        </p>

                        <!-- Progress -->
                        <div class="mt-8">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-semibold">Step 3/4</span>
                            </div>
                            <div class="h-3 bg-orange-300 rounded-full overflow-hidden">
                                <div class="h-full w-3/4 bg-yellow-400 transition-all duration-500 progress"></div>
                            </div>
                        </div>

                        <!-- Prev / Next -->
                        <div class="flex items-center gap-6 mt-12">
                            <a href="{{ url('/splash/2') }}"
                                class="bg-white text-orange-600 font-bold px-6 py-3 rounded-xl shadow-md flex items-center gap-2 group transition hover:scale-105 hover:shadow-lg">
                                <svg class="w-6 h-6 transition-transform duration-300 group-hover:-translate-x-1" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                                <span>Prev</span>
                            </a>
                            <a href="{{ url('/splash/4') }}"
                                class="bg-white text-orange-600 font-bold px-6 py-3 rounded-xl shadow-md flex items-center gap-2 group transition hover:scale-105 hover:shadow-lg">
                                <span>Next</span>
                                <svg class="w-6 h-6 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>

                 <div class="w-1/2 flex items-center justify-center">
    <img src="{{ asset('assets/images/news/splash3.png') }}"
         class="splash-img animate-slideInRight w-[460px] max-h-[600px] object-contain drop-shadow-xl">
</div>
                </div>
            @break

            {{-- ================== SCREEN 4 (ROLE) ================== --}}
            @case(4)
                <div class="w-[1100px] h-[650px] bg-orange-500 rounded-3xl  flex flex-col items-center justify-center px-16 py-12 animate-fadeIn">
                    <h1 class="text-5xl font-extrabold text-white mb-12">What’s your Role?</h1>

                    <div class="flex gap-12">
                        <a href="{{ url('/splash/login/teacher') }}"
                            class="role-card w-80 h-96 bg-white rounded-3xl shadow-md flex flex-col items-center justify-center
                            transition-all duration-500 transform hover:scale-105 hover:shadow-xl hover:-translate-y-2">
                            <img src="{{ asset('assets/images/news/teacher.svg') }}" alt="Teacher Icon"
                                class="w-32 h-32 mb-6 transition-transform duration-500 group-hover:scale-110">
                            <p class="text-3xl font-bold text-orange-600 text-center">Teacher<br>Admin</p>
                        </a>

                        <a href="{{ url('/splash/login/student') }}"
                            class="role-card w-80 h-96 bg-white rounded-3xl shadow-md flex flex-col items-center justify-center
                            transition-all duration-500 transform hover:scale-105 hover:shadow-xl hover:-translate-y-2">
                            <img src="{{ asset('assets/images/news/student.svg') }}" alt="Student Icon"
                                class="w-32 h-32 mb-6 transition-transform duration-500 group-hover:scale-110">
                            <p class="text-3xl font-bold text-orange-600 text-center">Student<br>Admin</p>
                        </a>
                    </div>
                </div>
            @break

            {{-- ================== LOGIN SCREEN ================== --}}
            @case('login')
                <div class="w-[1100px] h-[650px] bg-orange-500 rounded-3xl  flex overflow-hidden animate-fadeIn">

                    <!-- Left Side -->
                    <div class="w-1/2 flex flex-col justify-center items-center text-left px-12">
                        <h2 class="text-4xl font-bold text-white leading-snug">
                            <span class="text-yellow-200 font-medium">Welcome to</span><br>
                            News Management
                        </h2>
                    </div>

                    <!-- Right Side -->
                    <div class="w-1/2 bg-white rounded-l-3xl flex flex-col items-center justify-center p-12">
                        <img src="{{ $role === 'teacher' ? asset('assets/images/news/teacher.svg') : asset('assets/images/news/student.svg') }}"
                            alt="Role Icon" class="w-28 h-28 mb-8">

                        <form action="{{ url('/login') }}" method="POST" class="w-full max-w-sm">
                            @csrf

                            <!-- Email -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-orange-600 mb-2">
                                    Email | Username
                                </label>
                                <div
                                    class="flex items-center border-2 border-orange-500 rounded-lg px-3 py-3
                                    transition-all duration-300 hover:shadow-lg hover:shadow-orange-200
                                    focus-within:shadow-lg focus-within:shadow-orange-300">
                                    <input type="text" name="email" placeholder="your email or username"
                                        class="flex-1 outline-none text-gray-700 text-base">
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="mb-8">
                                <label class="block text-sm font-semibold text-orange-600 mb-2">
                                    Password
                                </label>
                                <div
                                    class="flex items-center border-2 border-orange-500 rounded-lg px-3 py-3
                                    transition-all duration-300 hover:shadow-lg hover:shadow-orange-200
                                    focus-within:shadow-lg focus-within:shadow-orange-300">
                                    <input type="password" name="password" placeholder="your password"
                                        class="flex-1 outline-none text-gray-700 text-base">
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="flex justify-between gap-4">
                                <!-- Prev -->
                                <a href="{{ url('/splash/4') }}"
                                    class="w-1/2 bg-gray-100 text-orange-600 font-bold px-6 py-3 rounded-xl shadow-md flex items-center justify-center gap-2 group transition hover:scale-105 hover:shadow-lg">
                                    <svg class="w-6 h-6 transition-transform duration-300 group-hover:-translate-x-1"
                                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                    </svg>
                                    <span>Prev</span>
                                </a>

                                <!-- Login -->
                                <a href="{{ route('news.index') }}"
                                    class="w-1/2 bg-orange-600 text-white font-bold px-6 py-3 rounded-xl shadow-md flex items-center justify-center gap-2 group transition hover:scale-105 hover:shadow-lg">
                                    <span>Login</span>
                                    <svg class="w-6 h-6 transition-transform duration-300 group-hover:translate-x-1"
                                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            @break
        @endswitch

        {{-- Animations --}}
 <style>
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            @keyframes slideInRight {
                from { opacity: 0; transform: translateX(40px); }
                to { opacity: 1; transform: translateX(0); }
            }

            .animate-fadeIn {
                animation: fadeIn 0.6s ease-out;
            }

            .animate-slideInRight {
                animation: slideInRight 0.6s ease-out;
            }

@keyframes shimmer {
    0% { background-position: -200px 0; }
    100% { background-position: 200px 0; }
}

/* Efek berdenyut lembut */
@keyframes shimmer {
   0% { background-position: 0 0; }
  100% { background-position: 40px 0; }
}

.progress {
  background: linear-gradient(
    90deg,
    #fbbf24 25%,
    #fde68a 50%,
    #fbbf24 75%
  );
  background-size: 200px 100%;
  border-radius: 9999px;
  animation: shimmer 2s linear infinite;
  transition: width 0.8s ease-in-out;
}


        </style>
        
    </div>
@endsection
