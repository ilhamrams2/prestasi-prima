@extends('news.backend.index')

@section('title', "Splash $screen - News Management")

@section('content')
<div class="flex items-center justify-center min-h-screen bg-white">
  @switch($screen)


  @case(1)
  <div class="splash-card bg-orange-600 text-white animate-fadeIn">
    <div class="flex flex-col justify-center w-1/2">
      <h1 class="splash-title text-yellow-300">Welcome to</h1>
      <p class="splash-subtitle">News Management</p>

      <div class="splash-progress mt-6">
        <div class="h-full bg-yellow-400 w-1/4 transition-all duration-500"></div>
      </div>

      <div class="flex items-center gap-6 mt-10">
        <a href="{{ url('/splash/2') }}"
           class="splash-btn bg-white text-orange-600 flex items-center gap-2 group transition hover:scale-105">
          <span>Next</span>
          <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
          </svg>
        </a>
      </div>
    </div>

    <div class="w-1/2 flex items-center justify-center">
      <img src="{{ asset('assets/images/news/splash1.png') }}" class="splash-img animate-slideInRight">
    </div>
  </div>
  @break


  @case(2)
  <div class="splash-card bg-orange-600 text-white animate-fadeIn">
    <div class="flex flex-col justify-center w-1/2">
      <h1 class="splash-title text-yellow-300">What's</h1>
      <p class="splash-subtitle">News Management</p>
      <p class="splash-text">News Management adalah fitur untuk mengelola berita dan informasi sekolah. Admin dapat membuat, mengedit, dan mempublikasikan pengumuman, kegiatan, maupun prestasi siswa, sehingga informasi tersaji lebih rapi, cepat, dan selalu up-to-date bagi seluruh warga sekolah.</p>
      <div class="splash-progress mt-10">
        <div class="h-full bg-yellow-400 w-2/4 transition-all duration-500"></div>
      </div>
      <div class="flex items-center gap-6 mt-10">
        <a href="{{ url('/splash/1') }}"
           class="splash-btn bg-white text-orange-600 flex items-center gap-2 group transition hover:scale-105">
          <svg class="w-5 h-5 transition-transform duration-300 group-hover:-translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
          </svg>
          <span>Prev</span>
        </a>
        <a href="{{ url('/splash/3') }}"
           class="splash-btn bg-white text-orange-600 flex items-center gap-2 group transition hover:scale-105">
          <span>Next</span>
          <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
          </svg>
        </a>
      </div>
    </div>
    <div class="w-1/2 flex items-center justify-center">
      <img src="{{ asset('assets/images/news/splash2.png') }}" class="splash-img animate-slideInRight">
    </div>
  </div>
  @break


  @case(3)
  <div class="splash-card bg-orange-600 text-white animate-fadeIn">
    <div class="flex flex-col justify-center w-1/2">
      <h1 class="splash-title text-yellow-300">How to use</h1>
      <p class="splash-subtitle">News Management</p>
      <p class="splash-text">Menggunakan Fitur CRUD Untuk admin panel yang memudahkan pengelolaan Berita. Melalui fitur ini, admin dapat menambahkan, menampilkan, memperbarui, hingga menghapus data dengan mudah. Dengan adanya CRUD, setiap konten seperti berita, pengumuman, atau informasi sekolah dapat diatur secara lebih rapi, cepat, dan efisien.</p>
      <div class="splash-progress mt-10">
        <div class="h-full bg-yellow-400 w-3/4 transition-all duration-500"></div>
      </div>
      <div class="flex items-center gap-6 mt-10">
        <a href="{{ url('/splash/2') }}"
           class="splash-btn bg-white text-orange-600 flex items-center gap-2 group transition hover:scale-105">
          <svg class="w-5 h-5 transition-transform duration-300 group-hover:-translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
          </svg>
          <span>Prev</span>
        </a>
        <a href="{{ url('/splash/4') }}"
           class="splash-btn bg-white text-orange-600 flex items-center gap-2 group transition hover:scale-105">
          <span>Next</span>
          <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
          </svg>
        </a>
      </div>
    </div>
    <div class="w-1/2 flex items-center justify-center">
      <img src="{{ asset('assets/images/news/splash3.png') }}" class="splash-img animate-slideInRight">
    </div>
  </div>
  @break



  @case(4)
  <div class="w-[960px] h-[650px] bg-orange-500 rounded-3xl shadow-lg flex flex-col items-center justify-center px-16 py-12 animate-fadeIn">
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


 @case('login')
    <div class="w-[960px] h-[650px] bg-orange-500 rounded-3xl shadow-lg flex overflow-hidden">

      <!-- Left Side -->
      <div class="w-1/2 flex flex-col justify-center items-center text-left px-12">
        <h2 class="text-4xl font-bold text-white leading-snug">
          <span class="text-yellow-200 font-medium">Welcome to</span><br>
          News Management
        </h2>
      </div>

      <!-- Right Side -->
      <div class="w-1/2 bg-white rounded-l-3xl flex flex-col items-center justify-center p-12">

        <img src="{{ $role === 'teacher'
                    ? asset('assets/images/news/teacher.svg')
                    : asset('assets/images/news/student.svg') }}"
             alt="Role Icon"
             class="w-28 h-28 mb-8">

        <form action="{{ url('/login') }}" method="POST" class="w-full max-w-sm">
          @csrf

          <!-- Email -->
          <div class="mb-6">
            <label class="block text-sm font-semibold text-orange-600 mb-2">
              Email | Username
            </label>
            <div class="flex items-center border-2 border-orange-500 rounded-lg px-3 py-3
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
            <div class="flex items-center border-2 border-orange-500 rounded-lg px-3 py-3
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
               class="w-1/2 splash-btn bg-gray-100 text-orange-600 flex items-center justify-center gap-2 group transition hover:scale-105">
              <svg class="w-5 h-5 transition-transform duration-300 group-hover:-translate-x-1"
                   fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
              </svg>
              <span>Prev</span>
            </a>

            <!-- Login -->
            <a href="{{ route('news.index') }}"
               class="w-1/2 splash-btn bg-orange-500 text-white flex items-center justify-center gap-2 group transition hover:scale-105">
              <span>Login</span>
              <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"
                   fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
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
.animate-fadeIn { animation: fadeIn 0.6s ease-out; }
.animate-slideInRight { animation: slideInRight 0.6s ease-out; }
</style>
@endsection
