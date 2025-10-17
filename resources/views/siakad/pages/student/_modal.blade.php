<div id="modal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center">
    <div id="modalBox"
        class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-6 transform scale-95 opacity-0 transition-all duration-200">
        <h2 class="text-2xl font-bold text-orange-600 mb-6">Tambah Siswa</h2>

        <form id="siswaForm" method="POST" action="{{ route('students.store') }}" class="space-y-4">
            @csrf

            {{-- NIS / Nomor Induk Siswa --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Nomor Induk Siswa (NIS)</label>
                <input type="text" name="student_number" required placeholder="Contoh: 12345678"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            </div>

            {{-- Nama Lengkap --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Nama Lengkap</label>
                <input type="text" name="name" required placeholder="Nama Lengkap"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            </div>

            {{-- Email --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Email</label>
                <input type="email" name="email" required placeholder="contoh@email.com"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            </div>

            {{-- Password --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" required placeholder="Minimal 6 karakter"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            </div>

            {{-- Jurusan --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Jurusan</label>
                <select name="major_id" required
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                    <option value="" disabled selected>Pilih Jurusan</option>
                    @foreach ($majors as $major)
                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Kelas --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Kelas</label>
                <select name="class_id" required
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                    <option value="" disabled selected>Pilih Kelas</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-2 pt-4 border-t">
                <button type="button" onclick="closeModal()"
                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">Batal</button>
                <button type="submit"
                    class="px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>
