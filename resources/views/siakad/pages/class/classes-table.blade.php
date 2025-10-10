<<<<<<< HEAD
<<<<<<< HEAD
{{-- ================= TABLE DAFTAR KELAS ================= --}}
<div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">

=======
{{-- ================= TABLE DAFTAR KELAS ================= --}}
<div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
>>>>>>> ae60cab (update siakad kelas (belum final))
    {{-- Header --}}
    <div class="px-6 py-4 border-b bg-gray-50 flex items-center justify-between">
        <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
            <i class="ri-list-check text-orange-500"></i> Daftar Kelas
        </h2>
        <span class="text-sm text-gray-500">Menampilkan seluruh data kelas terdaftar</span>
<<<<<<< HEAD
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
=======
<div class="bg-white rounded-lg shadow overflow-hidden">

    {{-- ==================== DESKTOP TABLE ==================== --}}
    <div class="hidden md:block">
        <table class="w-full table-auto">
            <thead class="bg-gray-50 text-gray-700">
                <tr>
                    @foreach (['kode' => 'Kode', 'nama' => 'Nama Kelas', 'jurusan' => 'Jurusan', 'wali' => 'Wali Kelas', 'siswa' => 'Jumlah Siswa'] as $key => $label)
                        <th class="px-4 py-3 text-left">{{ $label }}</th>
                    @endforeach
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody" class="divide-y"></tbody>
        </table>
=======
>>>>>>> ae60cab (update siakad kelas (belum final))
    </div>

    {{-- Table --}}
    <div class="divide-y divide-gray-100">
        {{-- Item Baris --}}
        @foreach ([
            ['kelas' => 'X PPLG 1', 'jurusan' => 'PPLG', 'siswa' => '32/35', 'wali' => 'Siti Nurhaliza, S.Kom', 'ruang' => 'Ruang 14', 'status' => 'Aktif'],
            ['kelas' => 'X PPLG 2', 'jurusan' => 'PPLG', 'siswa' => '32/35', 'wali' => 'Ahmad Susanto, M.Pd', 'ruang' => 'Ruang 15', 'status' => 'Aktif'],
            ['kelas' => 'XI TKJ 1', 'jurusan' => 'TKJ', 'siswa' => '32/35', 'wali' => 'Gunawan Wibisono, S.Pd', 'ruang' => 'Ruang 16', 'status' => 'Aktif'],
            ['kelas' => 'XI TKJ 2', 'jurusan' => 'TKJ', 'siswa' => '32/35', 'wali' => 'Eko Prasetyo, M.M', 'ruang' => 'Ruang 17', 'status' => 'Aktif'],
        ] as $item)
            <div class="flex items-center justify-between px-6 py-4 hover:bg-orange-50 transition">
                {{-- Kiri: Info kelas --}}
                <div class="flex items-center gap-4 w-[40%]">
                    <div class="p-3 bg-orange-100 text-orange-600 rounded-lg">
                        <i class="ri-community-line text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $item['kelas'] }}</h3>
                        <div class="text-xs text-gray-500 mt-0.5">{{ $item['ruang'] }}</div>
                    </div>
                </div>

                {{-- Jurusan --}}
                <div class="w-[10%]">
                    <span class="px-3 py-1 text-xs rounded-full bg-gray-100 text-gray-700 font-semibold">
                        {{ $item['jurusan'] }}
                    </span>
                </div>

                {{-- Jumlah Siswa --}}
                <div class="w-[10%] text-gray-700 font-semibold text-center">
                    {{ $item['siswa'] }}
                </div>

                {{-- Wali Kelas --}}
                <div class="w-[20%] text-gray-700">
                    {{ $item['wali'] }}
                </div>

                {{-- Status --}}
                <div class="w-[10%] text-center">
                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-600 font-semibold">
                        {{ $item['status'] }}
                    </span>
                </div>

                {{-- Aksi --}}
                <div class="w-[10%] flex justify-end gap-3">
                    <button class="text-blue-500 hover:text-blue-700" title="Lihat">
                        <i class="ri-eye-line text-lg"></i>
                    </button>
                    <button class="text-yellow-500 hover:text-yellow-600" title="Edit">
                        <i class="ri-edit-2-line text-lg"></i>
                    </button>
                    <button class="text-red-500 hover:text-red-700" title="Hapus">
                        <i class="ri-delete-bin-line text-lg"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Footer --}}
    <div class="px-6 py-3 bg-gray-50 text-sm text-gray-500 flex items-center justify-between">
        <p>Menampilkan <span class="font-semibold text-gray-700">4</span> dari <span class="font-semibold text-gray-700">10</span> kelas</p>

        <div class="flex items-center gap-1">
            <button class="px-3 py-1 border rounded-lg text-gray-600 hover:bg-orange-50 hover:text-orange-600 transition">
                <i class="ri-arrow-left-s-line"></i>
            </button>
            <button class="px-3 py-1 border rounded-lg bg-orange-500 text-white font-semibold">1</button>
            <button class="px-3 py-1 border rounded-lg text-gray-600 hover:bg-orange-50 hover:text-orange-600 transition">2</button>
            <button class="px-3 py-1 border rounded-lg text-gray-600 hover:bg-orange-50 hover:text-orange-600 transition">
                <i class="ri-arrow-right-s-line"></i>
            </button>
        </div>
    </div>
</div>
<<<<<<< HEAD

{{-- Pagination --}}
<div class="flex items-center justify-between mt-4">
    <div id="summaryText" class="text-sm text-gray-500"></div>
    <div id="pagination" class="flex items-center gap-2"></div>
>>>>>>> 9995902 (majors and class)
</div>
=======
>>>>>>> ae60cab (update siakad kelas (belum final))
