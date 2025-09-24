@include('HeaderLance')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

  <!-- Search Section -->
  <div class="p-4 bg-white shadow-md">
      <div class="flex flex-col md:flex-row gap-4">
          <input type="text" placeholder="Masukkan kata kunci" class="flex-1 border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
          <select class="border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
              <option>Jenis pekerjaan</option>
              <option>Full Time</option>
              <option>Part Time</option>
          </select>
          <input type="text" placeholder="Masukkan kota atau wilayah" class="flex-1 border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
          <button class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Cari</button>
      </div>

      <!-- Filter Tags -->
      <div class="mt-4 flex flex-wrap gap-2">
          <button class="bg-orange-500 text-white px-3 py-1 rounded">Backend developer . Indonesia</button>
          <button class="bg-orange-500 text-white px-3 py-1 rounded">Data Science . DKI Jakarta</button>
          <button class="bg-orange-500 text-white px-3 py-1 rounded">UI & UX . IKN</button>
      </div>
  </div>

  <!-- Main Content -->
  <div class="flex h-[calc(100vh-150px)]">
      
      <!-- LEFT: Job List -->
      <div class="w-1/3 bg-white border-r overflow-y-auto p-4" id="jobList">
          <div class="border-2 border-orange-500 rounded p-4 mb-4 cursor-pointer job-item active" 
               data-title="Junior Web Developer" 
               data-company="Pt Andira Dinamika Multi Finance Tbk" 
               data-location="Jakarta Selatan, DKI Jakarta" 
               data-category="Pengembangan Software" 
               data-type="Full Time" 
               data-skills="Vue.js, Laravel, PostgreSQL" 
               data-description="Membuat, mengembangkan, dan memelihara aplikasi web sesuai kebutuhan user atau klien. Menulis kode yang bersih, terstruktur, dan mudah dipahami dengan standar pengembangan.">
              <div class="flex justify-between items-start">
                  <div>
                      <h3 class="text-orange-500 font-bold text-lg">Junior Web Developer</h3>
                      <p class="text-gray-600 text-sm">Pt Andira Dinamika Multi Finance Tbk</p>
                      <span class="text-green-500 text-sm">Baru untuk kamu</span>
                      <p class="text-gray-500 text-xs mt-1">Jakarta Selatan • 1 Hari yang lalu</p>
                  </div>
                  <img src="https://via.placeholder.com/80x40?text=ADIRA" alt="logo" class="ml-2">
              </div>
          </div>

          <div class="border rounded p-4 mb-4 cursor-pointer job-item" 
               data-title="UI & UX" 
               data-company="Pt Jatelindo" 
               data-location="Jakarta Timur, DKI Jakarta" 
               data-category="Design" 
               data-type="Full Time" 
               data-skills="Figma, UX Research" 
               data-description="Deskripsi pekerjaan UI & UX di Jatelindo.">
              <div class="flex justify-between items-start">
                  <div>
                      <h3 class="font-bold text-lg">UI & UX</h3>
                      <p class="text-gray-600 text-sm">Pt Jatelindo</p>
                      <span class="text-green-500 text-sm">Baru untuk kamu</span>
                      <p class="text-gray-500 text-xs mt-1">Jakarta Timur • 3 Hari yang lalu</p>
                  </div>
                  <img src="https://via.placeholder.com/80x40?text=Jatelindo" alt="logo" class="ml-2">
              </div>
          </div>

          <div class="border rounded p-4 mb-4 cursor-pointer job-item" 
               data-title="Back End Developer" 
               data-company="Pt Panasonic" 
               data-location="Jakarta Pusat, DKI Jakarta" 
               data-category="Software" 
               data-type="Full Time" 
               data-skills="PHP, Laravel, MySQL" 
               data-description="Deskripsi pekerjaan Back End Developer di Panasonic.">
              <div class="flex justify-between items-start">
                  <div>
                      <h3 class="font-bold text-lg">Back End Developer</h3>
                      <p class="text-gray-600 text-sm">Pt Panasonic</p>
                      <span class="text-green-500 text-sm">Baru untuk kamu</span>
                      <p class="text-gray-500 text-xs mt-1">Jakarta Pusat • 3 Hari yang lalu</p>
                  </div>
                  <img src="https://via.placeholder.com/80x40?text=Panasonic" alt="logo" class="ml-2">
              </div>
          </div>

          <div class="border rounded p-4 mb-4 cursor-pointer job-item" 
               data-title="Full Stack Developer" 
               data-company="Pt Komatsu" 
               data-location="DKI Jakarta" 
               data-category="Software" 
               data-type="Full Time" 
               data-skills="Node.js, MongoDB" 
               data-description="Deskripsi pekerjaan Full Stack Developer di Komatsu.">
              <div class="flex justify-between items-start">
                  <div>
                      <h3 class="font-bold text-lg">Full Stack Developer</h3>
                      <p class="text-gray-600 text-sm">Pt Komatsu</p>
                      <span class="text-green-500 text-sm">Baru untuk kamu</span>
                      <p class="text-gray-500 text-xs mt-1">DKI Jakarta • 5 Hari yang lalu</p>
                  </div>
                  <img src="https://via.placeholder.com/80x40?text=Komatsu" alt="logo" class="ml-2">
              </div>
          </div>
      </div>

      <!-- RIGHT: Job Detail -->
      <div class="flex-1 bg-white overflow-y-auto p-6" id="jobDetail">
          <div class="text-center text-gray-400 mt-20">Pilih pekerjaan untuk melihat detailnya</div>
      </div>
  </div>
@include('ChatbotUI')
  <script>
      const jobItems = document.querySelectorAll('.job-item');
      const jobDetail = document.getElementById('jobDetail');

      jobItems.forEach(item => {
          item.addEventListener('click', () => {
              jobItems.forEach(i => i.classList.remove('border-2', 'border-orange-500'));
              item.classList.add('border-2', 'border-orange-500');

              jobDetail.innerHTML = `
                  <div class="mb-4">
                      <img src="https://via.placeholder.com/800x150?text=${item.dataset.company}" 
                           alt="Banner" class="w-full h-40 object-cover rounded mb-4">
                      <h2 class="text-2xl font-bold">${item.dataset.title}</h2>
                      <p class="text-gray-600 mb-2">${item.dataset.company} • 
                         <span class="text-yellow-500">⭐ 7.8</span> 435 Ulasan</p>
                      <p class="text-gray-500"><strong>Lokasi:</strong> ${item.dataset.location}</p>
                      <p class="text-gray-500"><strong>Kategori:</strong> ${item.dataset.category}</p>
                      <p class="text-gray-500"><strong>Jenis:</strong> ${item.dataset.type}</p>
                  </div>
                  <div class="mb-4">
                      <button class="bg-orange-500 text-white px-4 py-2 rounded mr-2 hover:bg-orange-600">Mulai Kariermu</button>
                      <button class="bg-orange-100 text-orange-500 px-4 py-2 rounded hover:bg-orange-200">Simpan</button>
                  </div>
                  <div class="mb-4 border border-orange-500 rounded p-4">
                      <h3 class="font-semibold mb-2">Skill yang dibutuhkan:</h3>
                      <p>${item.dataset.skills}</p>
                  </div>
                  <div>
                      <h3 class="font-semibold mb-2">Detail Pekerjaan:</h3>
                      <p>${item.dataset.description}</p>
                  </div>
              `;
          });
      });
  </script>
</body>
</html>
@include('footer')