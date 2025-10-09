<!-- Modal Detail Guru -->
<div id="detailModal" class="hidden fixed inset-0 z-50 bg-black/30 backdrop-blur-sm flex items-center justify-center transition-all duration-300">
  <div id="detailBox" class="bg-white w-full max-w-3xl mx-4 rounded-2xl shadow-2xl transform transition-all scale-95 opacity-0 overflow-hidden duration-300">

    <!-- Header -->
    <div class="flex items-center justify-between border-b px-6 py-4 bg-white/90 backdrop-blur-sm">
      <h2 class="text-lg font-semibold text-gray-800">Detail Guru</h2>
      <button onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-600 transition">
        <i class="ri-close-line text-xl"></i>
      </button>
    </div>

    <!-- Body -->
    <div class="grid grid-cols-1 md:grid-cols-3">
      
      <!-- Sisi kiri -->
      <div class="flex flex-col items-center justify-center bg-gradient-to-br from-orange-500 to-orange-400 text-white p-8">
        <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center text-3xl font-bold shadow-inner overflow-hidden mb-3 transition">
          <img id="detailPhoto" src="" alt="Foto Guru" class="hidden w-full h-full object-cover">
          <span id="detailInitial">G</span>
        </div>
        <h3 id="detailName" class="text-xl font-semibold mb-1">Nama Guru</h3>
        <p id="detailPosition" class="text-sm text-white/80 mb-3">Posisi</p>
        <span id="detailStatus"
              class="px-3 py-1 text-xs rounded-full bg-white/20 backdrop-blur-sm">Aktif</span>
      </div>

      <!-- Sisi kanan -->
      <div class="col-span-2 p-8 grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-5 text-gray-700">
        <div>
          <p class="text-sm text-gray-500 mb-1 flex items-center gap-2">
            <i class="ri-id-card-line text-orange-500"></i> NIP
          </p>
          <p id="detailTeacherId" class="font-medium">-</p>
        </div>
        <div>
          <p class="text-sm text-gray-500 mb-1 flex items-center gap-2">
            <i class="ri-book-open-line text-orange-500"></i> Mata Pelajaran
          </p>
          <p id="detailSubject" class="font-medium">-</p>
        </div>
        <div>
          <p class="text-sm text-gray-500 mb-1 flex items-center gap-2">
            <i class="ri-mail-line text-orange-500"></i> Email
          </p>
          <p id="detailEmail" class="font-medium break-words">-</p>
        </div>
        <div>
          <p class="text-sm text-gray-500 mb-1 flex items-center gap-2">
            <i class="ri-phone-line text-orange-500"></i> Nomor HP
          </p>
          <p id="detailPhone" class="font-medium">-</p>
        </div>
        <div>
          <p class="text-sm text-gray-500 mb-1 flex items-center gap-2">
            <i class="ri-map-pin-line text-orange-500"></i> Alamat
          </p>
          <p id="detailAddress" class="font-medium break-words">-</p>
        </div>
        <div>
          <p class="text-sm text-gray-500 mb-1 flex items-center gap-2">
            <i class="ri-calendar-line text-orange-500"></i> Bergabung Sejak
          </p>
          <p id="detailJoinDate" class="font-medium">-</p>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="border-t bg-gray-50 flex justify-end px-6 py-3">
      <button onclick="closeDetailModal()"
              class="px-5 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg font-medium transition">
        Tutup
      </button>
    </div>

  </div>
</div>
