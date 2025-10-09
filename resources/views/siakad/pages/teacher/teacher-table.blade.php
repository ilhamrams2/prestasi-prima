<<<<<<< HEAD
{{-- ==================== TABEL DATA GURU ==================== --}}
<div class="flex flex-wrap items-center justify-between gap-4 mb-4">
    <button onclick="openModal()"
=======
{{-- resources/views/siakad/pages/teacher/teacher-table.blade.php --}}
<div class="flex flex-wrap items-center justify-between gap-4 mb-4">
    <button onclick="openModal()" 
>>>>>>> 328e99e (update siakad belom kelar)
        class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg shadow transition">
        + Tambah Guru
    </button>

    <div class="w-full md:w-2/3">
        <div class="bg-white p-4 rounded-lg shadow grid grid-cols-1 md:grid-cols-4 gap-4">
<<<<<<< HEAD
            <div class="relative">
                <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
                <input id="searchInput" type="text" placeholder="Cari nama guru / mata pelajaran / jabatan"
                    class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400">
            </div>
=======
>>>>>>> 328e99e (update siakad belom kelar)
            <select class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                <option>Jabatan</option>
            </select>
            <select class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                <option>Status</option>
            </select>
            <select class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                <option>Mata Pelajaran</option>
            </select>
<<<<<<< HEAD
=======
            <div class="relative">
                <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
                <input id="searchInput" type="text" placeholder="Cari nama guru / mata pelajaran / jabatan"
                       class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400">
            </div>
>>>>>>> 328e99e (update siakad belom kelar)
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table id="teacherTable" class="w-full text-left border-collapse">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-3">NIP</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Mata Pelajaran</th>
                <th class="px-4 py-3">Jabatan</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Email / Telepon</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teachers as $teacher)
                <tr id="teacher-row-{{ $teacher->id }}" class="border-t hover:bg-gray-50 transition">
                    <td class="px-4 py-3">{{ $teacher->teacher_id }}</td>
                    <td class="px-4 py-3 font-medium">{{ $teacher->name }}</td>
                    <td class="px-4 py-3">{{ $teacher->subject }}</td>
                    <td class="px-4 py-3">{{ $teacher->position }}</td>
                    <td class="px-4 py-3">
<<<<<<< HEAD
                        <span
                            class="px-2 py-1 rounded text-sm {{ $teacher->status === 'Active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
=======
                        <span class="px-2 py-1 rounded text-sm {{ $teacher->status === 'Active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
>>>>>>> 328e99e (update siakad belom kelar)
                            {{ $teacher->status === 'Active' ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </td>
                    <td class="px-4 py-3">{{ $teacher->email ?? $teacher->phone ?? '-' }}</td>
                    <td class="px-4 py-3 flex space-x-3">
                        <button type="button" onclick="showTeacherDetail({{ $teacher->id }})"
<<<<<<< HEAD
                            class="text-blue-500 hover:text-blue-700" title="Detail">
                            <i class="ri-eye-line"></i>
                        </button>
                        <button type="button" onclick="openEditModal({{ $teacher->id }})"
                            class="text-orange-500 hover:text-orange-700" title="Edit">
                            <i class="ri-edit-line"></i>
                        </button>
                        <button type="button" onclick="openDeleteModal({{ $teacher->id }})"
                            class="text-red-500 hover:text-red-700" title="Hapus">
                            <i class="ri-delete-bin-line"></i>
                        </button>
=======
                                class="text-blue-500 hover:text-blue-700" title="Detail">
                            <i class="ri-eye-line"></i>
                        </button>
                        <button type="button" onclick="openEditModal({{ $teacher->id }})"
                                class="text-orange-500 hover:text-orange-700" title="Edit">
                            <i class="ri-edit-line"></i>
                        </button>
                        <form action="{{ route('siakad.teacher.destroy', $teacher->id) }}" method="POST"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus guru ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </form>
>>>>>>> 328e99e (update siakad belom kelar)
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">Belum ada data guru</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($teachers->count())
    <div class="flex justify-between items-center mt-4">
        <p class="text-sm text-gray-500">
            Menampilkan {{ $teachers->firstItem() }} - {{ $teachers->lastItem() }} dari {{ $teachers->total() }} guru
        </p>
        {{ $teachers->links() }}
    </div>
<<<<<<< HEAD
@endif
=======
@endif
>>>>>>> 328e99e (update siakad belom kelar)
