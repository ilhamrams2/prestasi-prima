@extends('siakad.index')

@section('content')
<div class="p-6 space-y-6">
    {{-- ================= HEADER ================= --}}
    <div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">
        <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
            <a href="#" class="hover:text-orange-600 transition-colors flex items-center gap-1">
                <i class="ri-home-4-line text-lg"></i> Dashboard
            </a>
            <span>/</span>
            <span class="text-gray-700 font-semibold flex items-center gap-1">
                <i class="ri-team-line text-lg text-orange-500"></i> Manajemen Siswa
            </span>
        </nav>

        <div class="flex items-center gap-3">
            <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                <i class="ri-team-line text-3xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Siswa</h1>
                <p class="text-gray-600 text-sm mt-1">
                    Kelola data siswa, kelas, jurusan, dan informasi akademik
                </p>
            </div>
        </div>
    </div>

    {{-- ================= STATISTIK ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
            <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                <i class="ri-team-line text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Siswa</p>
                <h2 class="text-xl font-bold">320</h2>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
            <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                <i class="ri-men-line text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Laki-laki</p>
                <h2 class="text-xl font-bold">180</h2>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
            <div class="bg-pink-100 text-pink-600 p-3 rounded-lg">
                <i class="ri-women-line text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Perempuan</p>
                <h2 class="text-xl font-bold">140</h2>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
            <div class="bg-green-100 text-green-600 p-3 rounded-lg">
                <i class="ri-book-line text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Jumlah Kelas</p>
                <h2 class="text-xl font-bold">12</h2>
            </div>
        </div>
    </div>

    {{-- ================= CTA + FILTER ================= --}}
    <div class="flex items-center justify-between flex-wrap gap-4">
        <button 
            onclick="openModal()" 
            class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg shadow transition">
            + Tambah Siswa
        </button>

        <div class="w-full md:w-2/3">
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
                <div class="relative">
                    <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
                    <input 
                        id="searchInput" 
                        type="text" 
                        placeholder="Cari nama siswa / NIS"
                        class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400">
                </div>
            </div>
        </div>
    </div>

    {{-- ================= TABEL ================= --}}
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
                <!-- Dummy Data -->
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="px-4 py-3">2025001</td>
                    <td class="px-4 py-3 font-medium">Ahmad Fauzi</td>
                    <td class="px-4 py-3">X PPLG 1</td>
                    <td class="px-4 py-3"><span class="bg-gray-100 px-2 py-1 rounded text-sm">PPLG</span></td>
                    <td class="px-4 py-3">Laki-laki</td>
                    <td class="px-4 py-3"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">Aktif</span></td>
                    <td class="px-4 py-3 flex space-x-3">
                        <button title="Lihat" class="text-blue-500 hover:text-blue-700"><i class="ri-eye-line"></i></button>
                        <button title="Edit" class="text-orange-500 hover:text-orange-700"><i class="ri-edit-line"></i></button>
                        <button title="Hapus" onclick="confirmDelete(this)" class="text-red-500 hover:text-red-700"><i class="ri-delete-bin-line"></i></button>
                    </td>
                </tr>
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

{{-- ================= MODAL ================= --}}
<div id="modal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center">
    <div id="modalBox" class="bg-white rounded-2xl shadow-2xl w-96 p-6 transform translate-y-10 opacity-0 transition">
        <h2 class="text-lg font-bold mb-4">Tambah Siswa</h2>
        <form id="siswaForm" class="space-y-4">
            <input type="text" name="nis" placeholder="NIS" class="w-full border rounded px-3 py-2">
            <input type="text" name="nama" placeholder="Nama Lengkap" class="w-full border rounded px-3 py-2">
            <input type="text" name="kelas" placeholder="Kelas" class="w-full border rounded px-3 py-2">
            <input type="text" name="jurusan" placeholder="Jurusan" class="w-full border rounded px-3 py-2">
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
    const modal       = document.getElementById('modal');
    const modalBox    = document.getElementById('modalBox');
    const form        = document.getElementById('siswaForm');
    const tableBody   = document.querySelector('#siswaTable tbody');
    const searchInput = document.getElementById('searchInput');

    function openModal() {
        modal.classList.remove('hidden');
        setTimeout(() => modalBox.classList.remove('translate-y-10', 'opacity-0'), 50);
    }

    function closeModal() {
        modalBox.classList.add('translate-y-10', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
            form.reset();
        }, 200);
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const data = new FormData(form);
        const row  = document.createElement('tr');
        row.classList.add('border-t', 'hover:bg-gray-50', 'transition');

        row.innerHTML = `
            <td class="px-4 py-3">${data.get('nis')}</td>
            <td class="px-4 py-3 font-medium">${data.get('nama')}</td>
            <td class="px-4 py-3">${data.get('kelas')}</td>
            <td class="px-4 py-3"><span class="bg-gray-100 px-2 py-1 rounded text-sm">${data.get('jurusan')}</span></td>
            <td class="px-4 py-3">${data.get('gender')}</td>
            <td class="px-4 py-3">
                <span class="${data.get('status') === 'Aktif'
                    ? 'bg-green-100 text-green-700'
                    : 'bg-red-100 text-red-700'} px-2 py-1 rounded text-sm">
                    ${data.get('status')}
                </span>
            </td>
            <td class="px-4 py-3 flex space-x-3">
                <button title="Lihat" class="text-blue-500 hover:text-blue-700"><i class="ri-eye-line"></i></button>
                <button title="Edit" class="text-orange-500 hover:text-orange-700"><i class="ri-edit-line"></i></button>
                <button title="Hapus" onclick="confirmDelete(this)" class="text-red-500 hover:text-red-700"><i class="ri-delete-bin-line"></i></button>
            </td>
        `;

        tableBody.appendChild(row);
        closeModal();
    });

    searchInput.addEventListener('keyup', function() {
        const value = this.value.toLowerCase();
        document.querySelectorAll('#siswaTable tbody tr').forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
        });
    });

    function confirmDelete(btn) {
        if (confirm("Apakah yakin ingin menghapus siswa ini?")) {
            btn.closest('tr').remove();
        }
    }

    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });
</script>
@endsection
