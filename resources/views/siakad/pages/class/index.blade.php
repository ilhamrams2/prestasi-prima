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
                <i class="ri-stack-line text-lg text-orange-500"></i> Manajemen Kelas
            </span>
        </nav>

        <div class="flex items-center gap-3">
            <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                <i class="ri-stack-line text-3xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Kelas</h1>
                <p class="text-gray-600 text-sm mt-1">
                    Kelola data kelas, wali kelas, dan ruangan
                </p>
            </div>
        </div>
    </div>

    {{-- ================= STATISTIK ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <!-- Card: Total Kelas -->
        <div class="bg-white p-4 rounded-xl shadow hover:shadow-md transition flex items-center space-x-3">
            <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                <i class="ri-stack-line text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Kelas</p>
                <h2 class="text-xl font-bold">8</h2>
            </div>
        </div>
        <!-- Card: Guru Aktif -->
        <div class="bg-white p-4 rounded-xl shadow hover:shadow-md transition flex items-center space-x-3">
            <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                <i class="ri-user-line text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Guru Aktif</p>
                <h2 class="text-xl font-bold">7</h2>
            </div>
        </div>
        <!-- Card: Kepala Jurusan -->
        <div class="bg-white p-4 rounded-xl shadow hover:shadow-md transition flex items-center space-x-3">
            <div class="bg-yellow-100 text-yellow-600 p-3 rounded-lg">
                <i class="ri-vip-crown-line text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Kepala Jurusan</p>
                <h2 class="text-xl font-bold">3</h2>
            </div>
        </div>
        <!-- Card: Wali Kelas -->
        <div class="bg-white p-4 rounded-xl shadow hover:shadow-md transition flex items-center space-x-3">
            <div class="bg-green-100 text-green-600 p-3 rounded-lg">
                <i class="ri-id-card-line text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Wali Kelas</p>
                <h2 class="text-xl font-bold">3</h2>
            </div>
        </div>
    </div>

    {{-- ================= CTA + FILTER ================= --}}
    <div class="flex items-center justify-between flex-wrap gap-4">
        <button
            onclick="openModal()"
            class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg shadow transition">
            + Tambah Kelas
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
                        placeholder="Cari nama kelas / wali / ruangan"
                        class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400">
                </div>
            </div>
        </div>
    </div>

    {{-- ================= TABEL ================= --}}
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table id="kelasTable" class="w-full text-left border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3">Nama Kelas</th>
                    <th class="px-4 py-3">Jurusan</th>
                    <th class="px-4 py-3">Jumlah Siswa</th>
                    <th class="px-4 py-3">Wali Kelas</th>
                    <th class="px-4 py-3">Ruangan</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dummy Data -->
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="px-4 py-3">X PPLG 1</td>
                    <td class="px-4 py-3">
                        <span class="bg-gray-100 text-gray-700 text-sm px-2 py-1 rounded">PPLG</span>
                    </td>
                    <td class="px-4 py-3">32/35</td>
                    <td class="px-4 py-3">Siti Nurhaliza, S.Kom</td>
                    <td class="px-4 py-3">Ruang 14</td>
                    <td class="px-4 py-3">
                        <span class="bg-green-100 text-green-700 text-sm px-2 py-1 rounded">Aktif</span>
                    </td>
                    <td class="px-4 py-3 flex space-x-3">
                        <button title="Lihat" class="text-blue-500 hover:text-blue-700">
                            <i class="ri-eye-line"></i>
                        </button>
                        <button title="Edit" class="text-orange-500 hover:text-orange-700">
                            <i class="ri-edit-line"></i>
                        </button>
                        <button title="Hapus" onclick="confirmDelete(this)" class="text-red-500 hover:text-red-700">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </td>
                </tr>
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="px-4 py-3">XI TKJ 2</td>
                    <td class="px-4 py-3">
                        <span class="bg-gray-100 text-gray-700 text-sm px-2 py-1 rounded">TKJ</span>
                    </td>
                    <td class="px-4 py-3">28/30</td>
                    <td class="px-4 py-3">Ahmad Fauzi, M.Pd</td>
                    <td class="px-4 py-3">Ruang 08</td>
                    <td class="px-4 py-3">
                        <span class="bg-red-100 text-red-700 text-sm px-2 py-1 rounded">Nonaktif</span>
                    </td>
                    <td class="px-4 py-3 flex space-x-3">
                        <button title="Lihat" class="text-blue-500 hover:text-blue-700">
                            <i class="ri-eye-line"></i>
                        </button>
                        <button title="Edit" class="text-orange-500 hover:text-orange-700">
                            <i class="ri-edit-line"></i>
                        </button>
                        <button title="Hapus" onclick="confirmDelete(this)" class="text-red-500 hover:text-red-700">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- ================= PAGINATION ================= --}}
    <div class="flex justify-between items-center mt-4">
        <p class="text-sm text-gray-500">Menampilkan 1-2 dari 8 kelas</p>
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
        <h2 class="text-lg font-bold mb-4">Tambah Kelas</h2>
        <form id="kelasForm" class="space-y-4">
            <input type="text" name="nama_kelas" placeholder="Nama Kelas" class="w-full border rounded px-3 py-2">
            <input type="text" name="jurusan" placeholder="Jurusan" class="w-full border rounded px-3 py-2">
            <input type="text" name="jumlah_siswa" placeholder="Jumlah Siswa (contoh: 32/35)" class="w-full border rounded px-3 py-2">
            <input type="text" name="wali_kelas" placeholder="Wali Kelas" class="w-full border rounded px-3 py-2">
            <input type="text" name="ruangan" placeholder="Ruangan" class="w-full border rounded px-3 py-2">
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
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
    const form        = document.getElementById('kelasForm');
    const tableBody   = document.querySelector('#kelasTable tbody');
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

        row.innerHTML =
            <td class="px-4 py-3">${data.get('nama_kelas')}</td>
            <td class="px-4 py-3">
                <span class="bg-gray-100 text-gray-700 text-sm px-2 py-1 rounded">${data.get('jurusan')}</span>
            </td>
            <td class="px-4 py-3">${data.get('jumlah_siswa')}</td>
            <td class="px-4 py-3">${data.get('wali_kelas')}</td>
            <td class="px-4 py-3">${data.get('ruangan')}</td>
            <td class="px-4 py-3">
                <span class="${data.get('status') === 'Aktif'
                    ? 'bg-green-100 text-green-700'
                    : 'bg-red-100 text-red-700'} text-sm px-2 py-1 rounded">
                    ${data.get('status')}
                </span>
            </td>
            <td class="px-4 py-3 flex space-x-3">
                <button title="Lihat" class="text-blue-500 hover:text-blue-700">
                    <i class="ri-eye-line"></i>
                </button>
                <button title="Edit" class="text-orange-500 hover:text-orange-700">
                    <i class="ri-edit-line"></i>
                </button>
                <button title="Hapus" onclick="confirmDelete(this)" class="text-red-500 hover:text-red-700">
                    <i class="ri-delete-bin-line"></i>
                </button>
            </td>
        ;

        tableBody.appendChild(row);
        closeModal();
    });

    searchInput.addEventListener('keyup', function() {
        const value = this.value.toLowerCase();
        document.querySelectorAll('#kelasTable tbody tr').forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
        });
    });

    function confirmDelete(btn) {
        if (confirm("Apakah yakin ingin menghapus kelas ini?")) {
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
