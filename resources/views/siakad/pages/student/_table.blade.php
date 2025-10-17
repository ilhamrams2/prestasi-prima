<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table id="siswaTable" class="w-full text-left border-collapse">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-3">NIS</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Kelas</th>
                <th class="px-4 py-3">Jurusan</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="px-4 py-3">{{ $student->student_number }}</td>
                    <td class="px-4 py-3 font-medium">{{ $student->name }}</td>
                    <td class="px-4 py-3">{{ $student->email }}</td>
                    <td class="px-4 py-3">
                        {{ $student->class ? $student->class->name : '-' }}
                    </td>
                    <td class="px-4 py-3">
                        {{ $student->major ? $student->major->name : '-' }}
                    </td>
                    <td class="px-4 py-3 flex space-x-3">
                        <button class="text-blue-500 hover:text-blue-700" title="Lihat">
                            <i class="ri-eye-line"></i>
                        </button>
                        <button class="text-orange-500 hover:text-orange-700" title="Edit">
                            <i class="ri-edit-line"></i>
                        </button>
                        <form action="{{ route('siakad.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus siswa ini?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            {{-- @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data siswa</td>
                </tr>
            @endforelse --}}
        </tbody>
    </table>
</div>
