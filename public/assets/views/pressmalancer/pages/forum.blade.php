@include('HeaderLance')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum PresmaLancer</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Banner Orange -->
  <div class="bg-orange-500 mt-16">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-6 py-6 text-white">
      <div class="md:w-2/3">
        <h1 class="text-2xl font-bold mb-2">Yuk ngobrolin masa depan bareng PresmaLancer!</h1>
        <p class="text-sm">Gabung sekarang dan dapetin review CV gratis buat persiapan kerja atau magang</p>
      </div>
      <div class="md:w-1/3 flex justify-center mt-4 md:mt-0">
        <img src="../assets/images/section/presmalancer/presmalancerbanner.png" alt="Banner Image" class="w-40 md:w-56">
      </div>
    </div>
  </div>

  <!-- Layout Grid -->
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6 mt-6 px-4">

    <!-- Sidebar -->
    <aside class="bg-white p-4 rounded shadow space-y-6">
      <button class="w-full bg-gray-100 py-2 rounded font-semibold flex items-center justify-center gap-2">
        ⭐ Paling Banyak Dibaca
      </button>
      <a href="#" class="block text-gray-700 hover:text-orange-600 font-medium">📖 Jelajahi semua grup</a>
      <button class="w-full bg-orange-500 text-white py-2 rounded font-semibold">Ajukan Pertanyaan</button>

      <h2 class="text-gray-700 font-bold">👥 Grup Saya</h2>

      <h2 class="text-gray-700 font-bold">🔥 Grup Teratas Indonesia</h2>
      <ul class="space-y-2 text-sm text-gray-600">
        <li>Program Workshop <span class="text-gray-400">235k Pengikut</span></li>
        <li>Info Loker <span class="text-gray-400">35k Pengikut</span></li>
        <li>Tips Interview <span class="text-gray-400">325k Pengikut</span></li>
        <li>Panduan Karier <span class="text-gray-400">225k Pengikut</span></li>
        <li>Forum HRD <span class="text-gray-400">15k Pengikut</span></li>
        <li>Loker Jakarta <span class="text-gray-400">135k Pengikut</span></li>
      </ul>
      <a href="#" class="block mt-3 text-orange-600 font-bold hover:underline">Jelajahi Semua grup teratas</a>
    </aside>


<main class="md:col-span-3">
  <!-- Scroll container -->
  <div class="space-y-6 max-h-[600px] overflow-y-auto pr-2">
    
    <!-- Post Card -->
    <div class="bg-white p-5 rounded-lg shadow">
      <div class="flex items-center gap-3 mb-3">
        <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full">
        <div>
          <p class="font-bold">Deden Santoso</p>
          <span class="text-gray-500 text-xs">1 menit lalu • Curhat</span>
        </div>
      </div>
      <p class="text-gray-700 mb-3">
        Junior Programmer (Entry Level) – Minimal pengalaman 3 tahun bikin aplikasi skala nasional.
        Lah, katanya entry level, kok yang diminta malah level developer senior? Anak PPLG baru lulus bikin aplikasi … 
      </p>
      <div class="flex items-center space-x-6 text-gray-600 text-sm">
        <button onclick="likePost(this)" class="hover:text-red-500">❤️ <span>289</span></button>
        <button onclick="toggleComments(this)" class="hover:text-blue-500">💬 <span>36</span></button>
        <button class="hover:text-green-500">🔗 Share</button>
      </div>
      <!-- Comments -->
      <div class="comments hidden mt-3 space-y-2">
        <input type="text" placeholder="Tulis komentar..." class="w-full border rounded p-2 text-sm">
        <div class="text-sm text-gray-600">💬 Belum ada komentar baru</div>
      </div>
    </div>

    <!-- Post Lain -->
    <div class="bg-white p-5 rounded-lg shadow">
      <div class="flex items-center gap-3 mb-3">
        <img src="https://i.pravatar.cc/41" class="w-10 h-10 rounded-full">
        <div>
          <p class="font-bold">Panjul Setiawan</p>
          <span class="text-gray-500 text-xs">20 menit lalu • Tips Interview</span>
        </div>
      </div>
      <p class="text-gray-700 mb-3">
        Frontend Intern – Persyaratannya pernah jadi lead developer di Silicon Valley.
        Gila, fresh graduate PPLG aja masih belajar debug error semicolon …  
      </p>
      <div class="flex items-center space-x-6 text-gray-600 text-sm">
        <button onclick="likePost(this)" class="hover:text-red-500">❤️ <span>489</span></button>
        <button onclick="toggleComments(this)" class="hover:text-blue-500">💬 <span>146</span></button>
        <button class="hover:text-green-500">🔗 Share</button>
      </div>
      <!-- Comments -->
      <div class="comments hidden mt-3 space-y-2">
        <input type="text" placeholder="Tulis komentar..." class="w-full border rounded p-2 text-sm">
      </div>
    </div>

    <div class="bg-white p-5 rounded-lg shadow">
      <div class="flex items-center gap-3 mb-3">
        <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full">
        <div>
          <p class="font-bold">Rafael Abimanyu</p>
          <span class="text-gray-500 text-xs">1 menit lalu • Curhat</span>
        </div>
      </div>
      <p class="text-gray-700 mb-3">
        Junior Programmer (Entry Level) – Minimal pengalaman 3 tahun bikin aplikasi skala nasional.
        Lah, katanya entry level, kok yang diminta malah level developer senior? Anak PPLG baru lulus bikin aplikasi … 
      </p>
      <div class="flex items-center space-x-6 text-gray-600 text-sm">
        <button onclick="likePost(this)" class="hover:text-red-500">❤️ <span>289</span></button>
        <button onclick="toggleComments(this)" class="hover:text-blue-500">💬 <span>36</span></button>
        <button class="hover:text-green-500">🔗 Share</button>
      </div>
      <!-- Comments -->
      <div class="comments hidden mt-3 space-y-2">
        <input type="text" placeholder="Tulis komentar..." class="w-full border rounded p-2 text-sm">
        <div class="text-sm text-gray-600">💬 Belum ada komentar baru</div>
      </div>
    </div>

    <div class="bg-white p-5 rounded-lg shadow">
      <div class="flex items-center gap-3 mb-3">
        <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full">
        <div>
          <p class="font-bold">Andi Gibrania</p>
          <span class="text-gray-500 text-xs">1 menit lalu • Curhat</span>
        </div>
      </div>
      <p class="text-gray-700 mb-3">
        Junior Programmer (Entry Level) – Minimal pengalaman 3 tahun bikin aplikasi skala nasional.
        Lah, katanya entry level, kok yang diminta malah level developer senior? Anak PPLG baru lulus bikin aplikasi … 
      </p>
      <div class="flex items-center space-x-6 text-gray-600 text-sm">
        <button onclick="likePost(this)" class="hover:text-red-500">❤️ <span>289</span></button>
        <button onclick="toggleComments(this)" class="hover:text-blue-500">💬 <span>36</span></button>
        <button class="hover:text-green-500">🔗 Share</button>
      </div>
      <!-- Comments -->
      <div class="comments hidden mt-3 space-y-2">
        <input type="text" placeholder="Tulis komentar..." class="w-full border rounded p-2 text-sm">
        <div class="text-sm text-gray-600">💬 Belum ada komentar baru</div>
      </div>
    </div>

    <div class="bg-white p-5 rounded-lg shadow">
      <div class="flex items-center gap-3 mb-3">
        <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full">
        <div>
          <p class="font-bold">Ilham Ramadhan</p>
          <span class="text-gray-500 text-xs">1 menit lalu • Curhat</span>
        </div>
      </div>
      <p class="text-gray-700 mb-3">
        Junior Programmer (Entry Level) – Minimal pengalaman 3 tahun bikin aplikasi skala nasional.
        Lah, katanya entry level, kok yang diminta malah level developer senior? Anak PPLG baru lulus bikin aplikasi … 
      </p>
      <div class="flex items-center space-x-6 text-gray-600 text-sm">
        <button onclick="likePost(this)" class="hover:text-red-500">❤️ <span>289</span></button>
        <button onclick="toggleComments(this)" class="hover:text-blue-500">💬 <span>36</span></button>
        <button class="hover:text-green-500">🔗 Share</button>
      </div>
      <!-- Comments -->
      <div class="comments hidden mt-3 space-y-2">
        <input type="text" placeholder="Tulis komentar..." class="w-full border rounded p-2 text-sm">
        <div class="text-sm text-gray-600">💬 Belum ada komentar baru</div>
      </div>
    </div>

    <div class="bg-white p-5 rounded-lg shadow">
      <div class="flex items-center gap-3 mb-3">
        <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full">
        <div>
          <p class="font-bold">Deden Santoso</p>
          <span class="text-gray-500 text-xs">1 menit lalu • Curhat</span>
        </div>
      </div>
      <p class="text-gray-700 mb-3">
        Junior Programmer (Entry Level) – Minimal pengalaman 3 tahun bikin aplikasi skala nasional.
        Lah, katanya entry level, kok yang diminta malah level developer senior? Anak PPLG baru lulus bikin aplikasi … 
      </p>
      <div class="flex items-center space-x-6 text-gray-600 text-sm">
        <button onclick="likePost(this)" class="hover:text-red-500">❤️ <span>289</span></button>
        <button onclick="toggleComments(this)" class="hover:text-blue-500">💬 <span>36</span></button>
        <button class="hover:text-green-500">🔗 Share</button>
      </div>
      <!-- Comments -->
      <div class="comments hidden mt-3 space-y-2">
        <input type="text" placeholder="Tulis komentar..." class="w-full border rounded p-2 text-sm">
        <div class="text-sm text-gray-600">💬 Belum ada komentar baru</div>
      </div>
    </div>

    <div class="bg-white p-5 rounded-lg shadow">
      <div class="flex items-center gap-3 mb-3">
        <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full">
        <div>
          <p class="font-bold">Ardi</p>
          <span class="text-gray-500 text-xs">1 menit lalu • Curhat</span>
        </div>
      </div>
      <p class="text-gray-700 mb-3">
        Junior Programmer (Entry Level) – Minimal pengalaman 3 tahun bikin aplikasi skala nasional.
        Lah, katanya entry level, kok yang diminta malah level developer senior? Anak PPLG baru lulus bikin aplikasi … 
      </p>
      <div class="flex items-center space-x-6 text-gray-600 text-sm">
        <button onclick="likePost(this)" class="hover:text-red-500">❤️ <span>289</span></button>
        <button onclick="toggleComments(this)" class="hover:text-blue-500">💬 <span>36</span></button>
        <button class="hover:text-green-500">🔗 Share</button>
      </div>
      <!-- Comments -->
      <div class="comments hidden mt-3 space-y-2">
        <input type="text" placeholder="Tulis komentar..." class="w-full border rounded p-2 text-sm">
        <div class="text-sm text-gray-600">💬 Belum ada komentar baru</div>
      </div>
    </div>
    @include('ChatbotUI')
  </div>
</main>
  </div>

  <!-- Script Like & Comment -->
  <script>
    function likePost(btn) {
      let count = btn.querySelector("span");
      count.textContent = parseInt(count.textContent) + 1;
    }

    function toggleComments(btn) {
      let post = btn.closest(".bg-white");
      let comments = post.querySelector(".comments");
      comments.classList.toggle("hidden");
    }
  </script>
</body>
</html>
@include('footer')