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
    </div>
</div>
