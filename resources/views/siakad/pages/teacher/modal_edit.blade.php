{{-- MODAL EDIT --}}
<div id="editModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div id="editBox" class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 transform transition-all scale-95 opacity-0">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Edit Data Guru</h2>
        
        <form id="editForm" method="POST" class="space-y-5">
            @csrf
            @method('PUT') {{-- Method PUT untuk update --}}
            
            {{-- NIP & Nama --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="editTeacherId" class="block text-sm font-medium text-gray-600 mb-1">NIP</label>
                    <input type="text" name="teacher_id" id="editTeacherId" required
                           class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
                <div>
                    <label for="editName" class="block text-sm font-medium text-gray-600 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" id="editName" required
                           class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
            </div>

            {{-- Mata Pelajaran & Jabatan --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="editSubject" class="block text-sm font-medium text-gray-600 mb-1">Mata Pelajaran</label>
                    <input type="text" name="subject" id="editSubject" required
                           class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
                <div>
                    <label for="editPosition" class="block text-sm font-medium text-gray-600 mb-1">Jabatan</label>
                    <input type="text" name="position" id="editPosition" required
                           class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
            </div>

            {{-- Status --}}
            <div>
                <label for="editStatus" class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                <select name="status" id="editStatus" required
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                    <option value="Active">Aktif</option>
                    <option value="Inactive">Tidak Aktif</option>
                </select>
            </div>

            {{-- Email & HP --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="editEmail" class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                    <input type="email" name="email" id="editEmail"
                           class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
                <div>
                    <label for="editPhone" class="block text-sm font-medium text-gray-600 mb-1">Nomor HP</label>
                    <input type="text" name="phone" id="editPhone"
                           class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
            </div>

            {{-- FOOTER --}}
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">Batal</button>
                <button type="submit"
                        class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600 transition">Perbarui</button>
            </div>
        </form>
    </div>
</div>
