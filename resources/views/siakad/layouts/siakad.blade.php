<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'SIAKAD - Prestasi Prima')</title>
  @vite('resources/css/app.css')
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 flex font-sans">

  <!-- Sidebar -->
  <aside class="w-64 min-h-screen bg-white shadow-lg flex flex-col">
    <!-- Logo -->
    <div class="p-6 border-b">
      <h1 class="font-bold text-lg flex items-center space-x-2 text-orange-600">
        <i class="ri-graduation-cap-line text-2xl"></i>
        <span>SIAKAD</span>
      </h1>
      <p class="text-sm text-gray-600">Prestasi Prima</p>
    </div>

    <!-- Profil User -->
<div class="p-4 border-b hover:bg-orange-50 transition cursor-pointer">
  <div class="flex items-center gap-4"> <!-- perhatikan: pakai gap-4, bukan space-x -->
    
    <!-- Avatar -->
    <div class="relative flex-shrink-0">
      <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center 
                  text-white font-bold text-lg shadow-md">
        A
      </div>
      <!-- Status online -->
      <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
    </div>

    <!-- Nama + Role -->
    <div class="flex flex-col">
      <p class="font-semibold text-gray-800">Ardy Albanna</p>
      <span class="inline-block text-xs px-2 py-0.5 bg-green-100 text-green-600 rounded-full mt-1">
        Siswa
      </span>
    </div>

  </div>
</div>


    <!-- Navigasi -->
    <nav class="p-4 flex-1 space-y-1">
      @php
        $menus = [
          ['Dashboard', 'siakad.dashboard', 'ri-dashboard-line'],
          ['Jadwal', 'siakad.jadwal', 'ri-calendar-line'],
          ['Absensi', 'siakad.absensi', 'ri-checkbox-circle-line'],
          ['Nilai & Rapor', 'siakad.nilai', 'ri-award-line'],
          ['PKL', 'siakad.pkl', 'ri-briefcase-line'],
          ['Pengumuman', 'siakad.pengumuman', 'ri-notification-3-line'],
          ['Pesan', 'siakad.pesan', 'ri-message-2-line'],
          ['Pengaturan Profil', 'siakad.profile', 'ri-user-line'],
        ];
      @endphp
      @foreach($menus as $menu)
        <a href="{{ route($menu[1]) }}"
           class="flex items-center space-x-2 px-3 py-2 rounded-lg transition-all
           {{ request()->routeIs($menu[1]) 
              ? 'bg-orange-500 text-white font-semibold' 
              : 'hover:bg-orange-100 text-gray-700' }}">
          <i class="{{ $menu[2] }}"></i>
          <span>{{ $menu[0] }}</span>
        </a>
      @endforeach
    </nav>

    <!-- Logout -->
    <div class="p-4 border-t">
      <a href="#"
         class="flex items-center space-x-2 text-red-600 hover:bg-red-50 px-3 py-2 rounded-lg transition-all duration-300">
        <i class="ri-logout-box-line"></i> <span>Logout</span>
      </a>
    </div>
  </aside>

  <!-- Konten -->
  <main class="flex-1 p-6 overflow-y-auto">
    @yield('content')
  </main>

</body>
</html>
