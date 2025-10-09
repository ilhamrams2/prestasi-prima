{{-- resources/views/siakad/pages/majors/majors-table.blade.php --}}
<div class="bg-white rounded-lg shadow overflow-hidden">

    {{-- Desktop --}}
    <div class="hidden md:block">
        <table class="w-full table-auto">
            <thead class="bg-gray-50 text-gray-700">
                <tr>
                    @foreach (['nama' => 'Nama Jurusan', 'kode' => 'Kode', 'kepala' => 'Kepala Jurusan', 'kelas' => 'Jumlah Kelas', 'siswa' => 'Jumlah Siswa'] as $key => $label)
                        <th class="px-4 py-3 text-left cursor-pointer" data-sort="{{ $key }}">
                            {{ $label }} <span class="sort-indicator text-xs"></span>
                        </th>
                    @endforeach
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody" class="divide-y"></tbody>
        </table>
    </div>

    {{-- Mobile --}}
    <div id="cardList" class="md:hidden p-4 space-y-3"></div>

    {{-- Empty State --}}
    <div id="emptyState" class="hidden p-8 text-center text-gray-400">
        <div class="text-3xl mb-2"><i class="ri-folder-open-line"></i></div>
        <div class="font-semibold mb-1">Belum ada data jurusan</div>
        <div class="text-sm">Klik tombol <span class="font-medium">Tambah Jurusan</span> untuk menambahkan data baru.</div>
    </div>
</div>

{{-- Pagination --}}
<div class="flex items-center justify-between mt-4">
    <div id="summaryText" class="text-sm text-gray-500"></div>
    <div id="pagination" class="flex items-center gap-2"></div>
</div>
