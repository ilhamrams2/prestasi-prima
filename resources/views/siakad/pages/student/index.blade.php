@extends('siakad.index')

@section('content')
<div class="p-6 space-y-6">

    {{-- ================= HEADER ================= --}}
    <div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">
        <!-- Breadcrumb -->
        <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
            <a href="#" class="hover:text-orange-600 flex items-center gap-1 transition-colors">
                <i class="ri-home-4-line text-lg"></i> Dashboard
            </a>
            <span>/</span>
            <span class="text-gray-700 font-semibold flex items-center gap-1">
                <i class="ri-team-line text-lg text-orange-500"></i> Manajemen Siswa
            </span>
        </nav>

        <!-- Judul -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                    <i class="ri-team-line text-3xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Siswa</h1>
                    <p class="text-gray-600 text-sm mt-1">Kelola data siswa, kelas, jurusan, dan informasi akademik</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= STATISTIK ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @php
            $stats = [
                ['icon'=>'ri-team-line','bg'=>'bg-orange-100','text'=>'text-orange-600','label'=>'Total Siswa','value'=>'320'],
                ['icon'=>'ri-men-line','bg'=>'bg-blue-100','text'=>'text-blue-600','label'=>'Laki-laki','value'=>'180'],
                ['icon'=>'ri-women-line','bg'=>'bg-pink-100','text'=>'text-pink-600','label'=>'Perempuan','value'=>'140'],
                ['icon'=>'ri-book-line','bg'=>'bg-green-100','text'=>'text-green-600','label'=>'Jumlah Kelas','value'=>'12']
            ];
        @endphp
        @foreach ($stats as $s)
            <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
                <div class="{{ $s['bg'].' '.$s['text'] }} p-3 rounded-lg">
                    <i class="{{ $s['icon'] }} text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">{{ $s['label'] }}</p>
                    <h2 class="text-xl font-bold">{{ $s['value'] }}</h2>
                </div>
            </div>
        @endforeach
    </div>

    {{-- ================= FILTER ================= --}}
    <div class="bg-white p-4 rounded-lg shadow grid grid-cols-1 md:grid-cols-4 gap-4">
        <select class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            <option>Semua Jurusan</option>
        </select>
        <select class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            <option>Semua Kelas</option>
        </select>
        <select class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            <option>Jenis Kelamin</option>
        </select>
        <input id="searchInput" type="text" placeholder="Cari nama siswa / NIS"
               class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
    </div>

    {{-- ================= TABEL SISWA ================= --}}
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table id="siswaTable" class="w-full text-left border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3">NIS</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Kelas</th>
                    <th class="px-4 py-3">Jurusan</th>
                    <th class="px-4 py-3">Jenis Kelamin</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ([
                    ['2025001','Ahmad Fauzi','X PPLG 1','PPLG','Laki-laki','Aktif'],
                    ['2025002','Siti Nurhaliza','XI TKJ 2','TKJ','Perempuan','Aktif']
                ] as $s)
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="px-4 py-3">{{ $s[0] }}</td>
                    <td class="px-4 py-3 font-medium">{{ $s[1] }}</td>
                    <td class="px-4 py-3">{{ $s[2] }}</td>
                    <td class="px-4 py-3"><span class="bg-gray-100 px-2 py-1 rounded text-sm">{{ $s[3] }}</span></td>
                    <td class="px-4 py-3">{{ $s[4] }}</td>
                    <td class="px-4 py-3">
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">{{ $s[5] }}</span>
                    </td>
                    <td class="px-4 py-3 flex space-x-3">
                        <button class="text-blue-500 hover:text-blue-700" title="Lihat"><i class="ri-eye-line"></i></button>
                        <button class="text-orange-500 hover:text-orange-700" title="Edit"><i class="ri-edit-line"></i></button>
                        <button class="text-red-500 hover:text-red-700" onclick="confirmDelete(this)" title="Hapus"><i class="ri-delete-bin-line"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- ================= PAGINATION ================= --}}
    <div class="flex justify-between items-center mt-4">
        <p class="text-sm text-gray-500">Menampilkan 1-2 dari 320 siswa</p>
        <div class="space-x-2">
            <button class="px-3 py-1 border rounded hover:bg-gray-100">&laquo; Prev</button>
            <button class="px-3 py-1 border rounded bg-orange-500 text-white">1</button>
            <button class="px-3 py-1 border rounded hover:bg-gray-100">2</button>
            <button class="px-3 py-1 border rounded hover:bg-gray-100">Next &raquo;</button>
        </div>
    </div>
</div>

{{-- ================= MODAL TAMBAH ================= --}}
<div id="modal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center">
    <div id="modalBox" class="bg-white rounded-lg shadow-lg w-96 p-6 transform scale-95 opacity-0 transition">
        <h2 class="text-lg font-bold mb-4">Tambah Siswa</h2>
        <form id="siswaForm" class="space-y-4">
            @foreach (['nis'=>'NIS','nama'=>'Nama Lengkap','kelas'=>'Kelas','jurusan'=>'Jurusan'] as $name => $ph)
                <input type="text" name="{{ $name }}" placeholder="{{ $ph }}" class="w-full border rounded px-3 py-2">
            @endforeach
            <select name="gender" class="w-full border rounded px-3 py-2">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="Aktif">Aktif</option>
                <option value="Lulus">Lulus</option>
                <option value="Alumni">Alumni</option>
            </select>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= SCRIPT ================= --}}
<script>
const modal = document.getElementById('modal'),
      modalBox = document.getElementById('modalBox'),
      form = document.getElementById('siswaForm'),
      tableBody = document.querySelector('#siswaTable tbody'),
      searchInput = document.getElementById('searchInput');

function openModal() {
    modal.classList.remove('hidden');
    setTimeout(() => modalBox.classList.remove('scale-95','opacity-0'), 50);
}
function closeModal() {
    modalBox.classList.add('scale-95','opacity-0');
    setTimeout(() => { modal.classList.add('hidden'); form.reset(); }, 200);
}

// Tambah data ke tabel
form.addEventListener('submit', e => {
    e.preventDefault();
    const d = Object.fromEntries(new FormData(form));
    tableBody.insertAdjacentHTML('beforeend', `
        <tr class="border-t hover:bg-gray-50 transition">
            <td class="px-4 py-3">${d.nis}</td>
            <td class="px-4 py-3 font-medium">${d.nama}</td>
            <td class="px-4 py-3">${d.kelas}</td>
            <td class="px-4 py-3"><span class="bg-gray-100 px-2 py-1 rounded text-sm">${d.jurusan}</span></td>
            <td class="px-4 py-3">${d.gender}</td>
            <td class="px-4 py-3">
                <span class="${d.status === 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'} px-2 py-1 rounded text-sm">${d.status}</span>
            </td>
            <td class="px-4 py-3 flex space-x-3">
                <button class="text-blue-500 hover:text-blue-700" title="Lihat"><i class="ri-eye-line"></i></button>
                <button class="text-orange-500 hover:text-orange-700" title="Edit"><i class="ri-edit-line"></i></button>
                <button class="text-red-500 hover:text-red-700" onclick="confirmDelete(this)" title="Hapus"><i class="ri-delete-bin-line"></i></button>
            </td>
        </tr>`);
    closeModal();
});

// Pencarian real-time
searchInput.addEventListener('keyup', e => {
    const val = e.target.value.toLowerCase();
    document.querySelectorAll('#siswaTable tbody tr').forEach(r => {
        r.style.display = r.innerText.toLowerCase().includes(val) ? '' : 'none';
    });
});

// Hapus konfirmasi
function confirmDelete(btn) {
    if (confirm("Apakah yakin ingin menghapus siswa ini?")) btn.closest('tr').remove();
}
</script>
@endsection