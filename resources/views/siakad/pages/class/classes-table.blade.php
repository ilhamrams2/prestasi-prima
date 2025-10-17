{{-- ================= TABLE DAFTAR KELAS ================= --}}
<div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
    {{-- Header --}}
    <div class="px-6 py-4 border-b bg-gray-50 flex items-center justify-between">
        <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
            <i class="ri-list-check text-orange-500"></i> Daftar Kelas
        </h2>
        <span class="text-sm text-gray-500">Menampilkan seluruh data kelas terdaftar</span>
    </div>

    {{-- Table --}}
    <div class="divide-y divide-gray-100">
        @forelse ($classes as $class)
            <div class="flex items-center justify-between px-6 py-4 hover:bg-orange-50 transition">

                {{-- Kiri: Info kelas --}}
                <div class="flex items-center gap-4 w-[40%]">
                    <div class="p-3 bg-orange-100 text-orange-600 rounded-lg">
                        <i class="ri-community-line text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 uppercase">{{ $class->name }}</h3>
                        <div class="text-xs text-gray-500 mt-0.5">{{ $class->class_code }}</div>
                    </div>
                </div>

                {{-- Jurusan --}}
                <div class="w-[10%]">
                    <span class="px-3 py-1 text-xs rounded-full bg-gray-100 text-gray-700 font-semibold">
                        {{ $class->major->major_code ?? '-' }}
                    </span>
                </div>

                {{-- Jumlah Siswa --}}
                {{-- <div class="w-[10%] text-gray-700 font-semibold text-center">
                    {{ $class->students_count ?? '0' }}/{{ $class->capacity ?? '-' }}
                </div> --}}

                {{-- Wali Kelas --}}
                <div class="w-[20%] text-gray-700">
                    {{ $class->teacher->name ?? '-' }}
                </div>

                {{-- Status --}}
                {{-- <div class="w-[10%] text-center">
                    <span
                        class="px-3 py-1 text-xs rounded-full font-semibold
                        {{ $class->status === 'Aktif' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                        {{ ucfirst($class->status ?? 'Nonaktif') }}
                    </span>
                </div> --}}

                {{-- Aksi --}}
                <div class="w-[10%] flex justify-end gap-3">
                    <button class="text-blue-500 hover:text-blue-700" title="Lihat">
                        <i class="ri-eye-line text-lg"></i>
                    </button>
                    {{-- <button onclick='openEditModal(@json($class))'
                        class="text-yellow-500 hover:text-yellow-600" title="Edit">
                        <i class="ri-edit-2-line text-lg"></i>
                    </button> --}}
                    <button class="btnEdit text-yellow-500 hover:text-yellow-600 px-3 py-1 rounded-md text-sm"
                        data-id="{{ $class->id }}" data-major="{{ $class->major_id }}"
                        data-teacher="{{ $class->teacher_id }}" data-grade="{{ $class->grade }}"
                        data-group="{{ $class->group_number }}">
                        <i class="ri-edit-2-line"></i> Edit
                    </button>

                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus kelas ini?')"
                            class="text-red-500 hover:text-red-700" title="Hapus">
                            <i class="ri-delete-bin-line text-lg"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="p-8 text-center text-gray-500 italic">
                Belum ada data kelas yang terdaftar.
            </div>
        @endforelse
    </div>

    {{-- Footer --}}
    @if ($classes instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="px-6 py-3 bg-gray-50 text-sm text-gray-500 flex items-center justify-between">
            <p>Menampilkan
                <span class="font-semibold text-gray-700">{{ $classes->firstItem() }}</span>
                -
                <span class="font-semibold text-gray-700">{{ $classes->lastItem() }}</span>
                dari
                <span class="font-semibold text-gray-700">{{ $classes->total() }}</span> kelas
            </p>
            <div>{{ $classes->links() }}</div>
        </div>
    @endif
</div>
