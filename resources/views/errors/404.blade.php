<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Not Found</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
  
  <section class="text-center px-6">
    <div class="flex flex-col justify-center items-center mb-12">
      <!-- Maskot -->
      <img src="{{ asset('assets/images/maskot.svg') }}" 
           alt="404 Mascot" 
           class="w-64 max-w-[70%] h-auto mb-6">

      <!-- Judul -->
      <h1 class="text-5xl md:text-6xl font-bold text-orange-600">404</h1>
      <p class="mt-4 text-lg md:text-xl text-gray-700">Halaman yang kamu cari tidak ditemukan.</p>
    </div>

    <!-- Tombol kembali -->
    <a href="{{ url('/') }}" 
       class="inline-block px-6 py-3 bg-orange-600 text-white rounded-lg shadow hover:bg-orange-700 transition">
      Kembali ke Beranda
    </a>
  </section>

</body>
</html>
