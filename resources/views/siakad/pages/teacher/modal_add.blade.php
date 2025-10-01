<!-- Modal Tambah Guru -->
<div id="modal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div id="modalBox" class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 transform transition-all scale-95 opacity-0">
        
        <!-- Header -->
        <h2 class="text-xl font-bold text-gray-800 mb-6">Tambah Guru Baru</h2>

        <!-- Form -->
        <form id="teacherForm" action="{{ route('siakad.teacher.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- NIP & Nama -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">NIP</label>
                    <input type="text" name="teacher_id" placeholder="Input nomor induk guru" 
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" placeholder="Input nama lengkap"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
            </div>

            <!-- Mata Pelajaran & Jabatan -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Mata Pelajaran</label>
                    <input type="text" name="subject" placeholder="Mata pelajaran yang diajar"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Jabatan</label>
                    <input type="text" name="position" placeholder="Jabatan"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                <select name="status" 
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                    <option value="Active">Aktif</option>
                    <option value="Inactive">Tidak Aktif</option>
                </select>
            </div>

            <!-- Email & Nomor HP -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                    <input type="email" name="email" placeholder="Email"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nomor HP</label>
                    <input type="text" name="phone" placeholder="Nomor HP"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeModal()" 
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
