<<<<<<< HEAD
<<<<<<< HEAD
{{-- ================= MODAL (Tambah/Edit Jurusan) ================= --}}
<div id="modal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div id="modalBox"
        class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 transform transition-all scale-95 opacity-0">

        <!-- Header -->
        <h2 id="modalTitle" class="text-xl font-bold text-gray-800 mb-6">Tambah Jurusan Baru</h2>
        
        <!-- Form -->
        <form id="formJurusan" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <input type="hidden" name="id">

            <!-- Nama Jurusan & Kode -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nama Jurusan</label>
                    <input type="text" name="name" placeholder="Contoh: Rekayasa Perangkat Lunak"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Kode Jurusan</label>
                    <input type="text" name="major_code" placeholder="Contoh: RPL"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                        required>
                </div>
            </div>

            <!-- Upload Gambar -->
            {{-- <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Gambar (Opsional)</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
            </div> --}}

            {{-- <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Deskripsi</label>
                <textarea name="description" rows="3" placeholder="Tuliskan deskripsi jurusan..."
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" required></textarea>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                <select name="status"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div> --}}

            <!-- Footer -->
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" id="btnCancel"
                    class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600 transition">
                    Simpan
                </button>
=======
{{-- resources/views/siakad/pages/majors/majors-modal.blade.php --}}
=======
{{-- ================= MODAL (Tambah/Edit Jurusan) ================= --}}
<div id="modal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div id="modalBox" class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 transform transition-all scale-95 opacity-0">
        
        <!-- Header -->
        <h2 id="modalTitle" class="text-xl font-bold text-gray-800 mb-6">Tambah Jurusan Baru</h2>
>>>>>>> 328e99e (update siakad belom kelar)

        <!-- Form -->
        <form id="formJurusan" method="POST" class="space-y-5">
            @csrf
            <input type="hidden" name="id">

            <!-- Nama Jurusan & Kode -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nama Jurusan</label>
                    <input type="text" name="nama" placeholder="Nama Jurusan"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Kode (contoh: RPL)</label>
                    <input type="text" name="kode" placeholder="Contoh: RPL"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" required>
                </div>
                </div>

            <!-- Kepala Jurusan & Status -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Kepala Jurusan</label>
                    <input type="text" name="kepala" placeholder="Nama Kepala Jurusan"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                    <select name="status" 
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>
            </div>
<<<<<<< HEAD
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
            <div class="flex justify-end gap-2 mt-2">
                <button type="button" id="btnCancel" class="px-4 py-2 bg-gray-200 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded">Simpan</button>
>>>>>>> e247cf6 (update siakad)
=======

            <!-- Jumlah Kelas & Jumlah Siswa -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah Kelas</label>
                    <input type="number" name="kelas" placeholder="Jumlah Kelas"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah Siswa</label
                    ><input type="number" name="siswa" placeholder="Jumlah Siswa"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" required>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" id="btnCancel"
                    class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600 transition">
                    Simpan
                </button>
>>>>>>> 328e99e (update siakad belom kelar)
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL VIEW ================= --}}
<<<<<<< HEAD
<<<<<<< HEAD
<div id="modalView" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg mx-4 p-6 relative">
        <button onclick="closeModal('view')" class="absolute top-3 right-3 text-gray-500 hover:text-red-500 transition">
            <i class="ri-close-line text-2xl"></i>
        </button>

        <!-- Gambar -->
        <div id="viewImage" class="mb-4">
            <img src="" alt="Gambar Jurusan" class="w-full h-48 object-cover rounded-lg hidden">
        </div>

        <h2 id="viewName" class="text-2xl font-bold text-gray-800 mb-2"></h2>
        <p id="viewCode" class="text-sm text-gray-500 mb-4"></p>

        <div class="space-y-2 text-gray-700">
            <p>Deskripsi:</p>
            <p id="viewDescription" class="text-gray-600"></p>
            <p>Status: <span id="viewStatus" class="px-2 py-1 rounded text-sm"></span></p>
        </div>
=======
<div id="modalView" class="fixed inset-0 bg-black/50 hidden z-40 flex items-center justify-center">
    <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6 relative">
        <button onclick="closeModal('view')" class="absolute top-3 right-3 text-gray-500 hover:text-red-500">
            <i class="ri-close-line text-2xl"></i>
        </button>
        <h2 id="viewNama" class="text-2xl font-bold text-gray-800 mb-3"></h2>
        <p class="text-sm text-gray-500 mb-4" id="viewKepala"></p>
        <p class="text-gray-600 mb-4">Kode: <span id="viewKode"></span></p>
        <p class="text-gray-600 mb-4">Jumlah Kelas: <span id="viewKelas"></span> · Jumlah Siswa: <span id="viewSiswa"></span></p>
        <span id="viewStatus" class="px-2 py-1 rounded text-sm"></span>
>>>>>>> e247cf6 (update siakad)
=======
<div id="modalView" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg mx-4 p-6 relative">
        <button onclick="closeModal('view')" class="absolute top-3 right-3 text-gray-500 hover:text-red-500 transition">
            <i class="ri-close-line text-2xl"></i>
        </button>

        <h2 id="viewNama" class="text-2xl font-bold text-gray-800 mb-2"></h2>
        <p id="viewKepala" class="text-sm text-gray-500 mb-4"></p>

        <div class="space-y-2 text-gray-700">
            <p>Kode: <span id="viewKode" class="font-medium"></span></p>
            <p>Jumlah Kelas: <span id="viewKelas" class="font-medium"></span> · Jumlah Siswa: <span id="viewSiswa" class="font-medium"></span></p>
            <p>Status: <span id="viewStatus" class="px-2 py-1 rounded text-sm"></span></p>
        </div>
>>>>>>> 328e99e (update siakad belom kelar)
    </div>
</div>
