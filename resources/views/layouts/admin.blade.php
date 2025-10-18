<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | Admin Prestasi Prima</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2d0d6b6aa.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100 min-h-screen flex">

  {{-- ================= SIDEBAR ================= --}}
  <aside class="w-64 bg-white shadow-lg flex flex-col fixed inset-y-0 left-0 z-20">
    <div class="p-6 border-b border-gray-200">
      <h1 class="text-2xl font-bold text-orange-600">
        Admin <span class="text-gray-800">PP</span>
      </h1>
    </div>

    <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-1">
      <a href="{{ route('prestasiprima.admin.berita.index') }}" 
         class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-orange-100 hover:text-orange-600 transition">
        <i class="fa-solid fa-newspaper"></i>
        <span>Manajemen Berita</span>
      </a>

      <a href="{{ route('prestasiprima.admin.gallery.index') }}" 
         class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-orange-100 hover:text-orange-600 transition">
        <i class="fa-solid fa-image"></i>
        <span>Manajemen Galeri</span>
      </a>

      <hr class="my-3 border-gray-200">

      <a href="/" target="_blank"
         class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-orange-500 transition">
        <i class="fa-solid fa-globe"></i>
        <span>Lihat Website</span>
      </a>
    </nav>

    <div class="p-4 border-t border-gray-200">
      <form action="#" method="POST">
        {{-- @csrf --}}
        <button type="button"
          onclick="alert('Logout belum diaktifkan');"
          class="w-full flex items-center justify-center gap-2 bg-orange-600 hover:bg-orange-500 text-white font-medium px-4 py-2 rounded-lg transition">
          <i class="fa-solid fa-right-from-bracket"></i>
          <span>Logout</span>
        </button>
      </form>
    </div>
  </aside>

  {{-- ================= MAIN CONTENT ================= --}}
  <main class="flex-1 ml-64">
    {{-- HEADER --}}
    <header class="bg-white shadow-sm sticky top-0 z-10">
      <div class="flex items-center justify-between px-6 py-4">
        <h2 class="text-xl font-semibold text-gray-800">@yield('title')</h2>
        <div class="flex items-center gap-3 text-gray-600">
          <i class="fa-solid fa-user-circle text-2xl text-orange-500"></i>
          <span>Admin</span>
        </div>
      </div>
    </header>

    {{-- PAGE CONTENT --}}
    <section class="p-6">
      @yield('content')
    </section>
  </main>

</body>
</html>
