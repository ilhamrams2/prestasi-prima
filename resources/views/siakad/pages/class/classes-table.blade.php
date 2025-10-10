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
    </div>

    {{-- ==================== MOBILE CARD LIST ==================== --}}
    <div id="cardList" class="md:hidden p-4 space-y-3"></div>

    {{-- Empty State --}}
    <div id="emptyState" class="hidden py-20 text-center text-gray-400">
        <div class="flex flex-col items-center justify-center">
            <i class="fa-regular fa-folder-open text-5xl mb-3"></i>
            <p class="font-semibold mb-1">Belum ada data kelas</p>
            <p class="text-sm text-gray-400">
                Klik tombol
                <span class="text-orange-500 font-semibold">Tambah Kelas</span>
                untuk menambahkan data baru.
            </p>
        </div>
    </div>
</div>

{{-- Pagination --}}
<div class="flex items-center justify-between mt-4">
    <div id="summaryText" class="text-sm text-gray-500"></div>
    <div id="pagination" class="flex items-center gap-2"></div>
</div>
