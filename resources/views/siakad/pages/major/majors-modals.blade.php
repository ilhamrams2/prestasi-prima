{{-- ================= MODAL (Tambah/Edit Jurusan) ================= --}}
<div id="modal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div id="modalBox" class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 transform transition-all scale-95 opacity-0">
        
        <!-- Header -->
        <h2 id="modalTitle" class="text-xl font-bold text-gray-800 mb-6">Tambah Jurusan Baru</h2>

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
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL VIEW ================= --}}
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
    </div>
</div>