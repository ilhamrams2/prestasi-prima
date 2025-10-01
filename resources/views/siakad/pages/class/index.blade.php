@extends('siakad.index')

@section('title', 'Manajemen Kelas')

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
                <i class="ri-building-4-line text-lg text-orange-500"></i> Manajemen Kelas
            </span>
        </nav>

        <div class="flex items-center gap-3">
            <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                <i class="ri-building-4-line text-3xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Kelas</h1>
                <p class="text-gray-600 text-sm mt-1">
                    Kelola data kelas, jurusan, wali kelas, dan informasi akademik
                </p>
            </div>
        </div>
    </div>

    {{-- ================= CTA + FILTER ================= --}}
    <div class="flex items-center justify-between flex-wrap gap-4">
        <button onclick="openModalTambah()" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg shadow transition">
            + Tambah Kelas
        </button>

        <div class="w-full md:w-2/3">
            <div class="bg-white p-4 rounded-lg shadow grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="relative">
                    <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
                    <input id="searchInput" type="text" placeholder="Cari kode/nama kelas"
                        class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400">
                </div>
                <select class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                    <option>Semua Jurusan</option>
                </select>
            </div>
        </div>
    </div>

    {{-- ================= TABEL ================= --}}
    <div class="bg-white rounded-lg shadow overflow-x-auto mt-4">
        <table id="kelasTable" class="w-full text-left border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3">Kode Kelas</th>
                    <th class="px-4 py-3">Nama Kelas</th>
                    <th class="px-4 py-3">Jurusan</th>
                    <th class="px-4 py-3">Wali Kelas</th>
                    <th class="px-4 py-3">Jumlah Siswa</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh Data -->
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="px-4 py-3">KLS-001</td>
                    <td class="px-4 py-3 font-medium">X PPLG 1</td>
                    <td class="px-4 py-3"><span class="bg-gray-100 px-2 py-1 rounded text-sm">PPLG</span></td>
                    <td class="px-4 py-3">Budi Santoso</td>
                    <td class="px-4 py-3">32</td>
                    <td class="px-4 py-3 flex space-x-3">
                        <button title="Detail" class="text-blue-500 hover:text-blue-700" onclick="openModalDetail(this.closest('tr'))"><i class="ri-eye-line"></i></button>
                        <button title="Edit" class="text-orange-500 hover:text-orange-700" onclick="openModalEdit(this.closest('tr'))"><i class="ri-edit-line"></i></button>
                        <button title="Hapus" onclick="confirmDelete(this)" class="text-red-500 hover:text-red-700"><i class="ri-delete-bin-line"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- ================= MODAL TAMBAH ================= --}}
<div id="modalTambah" class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 transform transition-all scale-95 opacity-0">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Tambah Kelas Baru</h2>
        <form id="kelasForm" class="space-y-5">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Kode Kelas</label>
                    <input type="text" name="kode" placeholder="Contoh: KLS-001" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nama Kelas</label>
                    <input type="text" name="nama" placeholder="Nama Kelas" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Jurusan</label>
                    <input type="text" name="jurusan" placeholder="Jurusan" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Wali Kelas</label>
                    <input type="text" name="wali" placeholder="Wali Kelas" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah Siswa</label>
                <input type="number" name="jumlah" placeholder="Jumlah Siswa" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeModalTambah()" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300">Batal</button>
                <button type="submit" class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL EDIT ================= --}}
<div id="modalEdit" class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 transform transition-all scale-95 opacity-0">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Edit Kelas</h2>
        <form id="kelasEditForm" class="space-y-5">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Kode Kelas</label>
                    <input type="text" name="kode" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nama Kelas</label>
                    <input type="text" name="nama" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Jurusan</label>
                    <input type="text" name="jurusan" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Wali Kelas</label>
                    <input type="text" name="wali" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah Siswa</label>
                <input type="number" name="jumlah" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeModalEdit()" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300">Batal</button>
                <button type="submit" class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600">Update</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL DETAIL MODERN ================= --}}
<div id="modalDetail" class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-4xl overflow-hidden transform transition-all scale-95 opacity-0" id="modalDetailBox">
        <div class="flex justify-between items-center px-8 py-5 border-b">
            <h2 class="text-2xl font-bold text-gray-900">Detail Kelas</h2>
            <button onclick="closeModalDetail()" class="text-gray-400 hover:text-gray-600 transition">
                <i class="ri-close-line text-3xl"></i>
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 divide-x">
            <div class="col-span-1 p-6 flex flex-col items-center text-center space-y-4">
                <div class="w-24 h-24 rounded-full bg-orange-500 flex items-center justify-center text-white text-4xl font-extrabold shadow-lg" id="detail-initial">X</div>
                <h3 id="detail-nama" class="text-xl font-semibold text-gray-900">Nama Kelas</h3>
                <span id="detail-status" class="mt-1 inline-block px-3 py-1 text-sm font-medium rounded-full bg-green-100 text-green-700">Aktif</span>
            </div>
            <div class="col-span-2 p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg shadow-sm">
                    <i class="ri-bar-chart-line text-orange-500 text-2xl"></i>
                    <div>
                        <p class="text-sm font-semibold text-gray-600">Kode Kelas</p>
                        <p id="detail-kode" class="text-gray-800 text-lg">-</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg shadow-sm">
                    <i class="ri-book-line text-orange-500 text-2xl"></i>
                    <div>
                        <p class="text-sm font-semibold text-gray-600">Jurusan</p>
                        <p id="detail-jurusan" class="text-gray-800 text-lg">-</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg shadow-sm">
                    <i class="ri-user-3-line text-orange-500 text-2xl"></i>
                    <div>
                        <p class="text-sm font-semibold text-gray-600">Wali Kelas</p>
                        <p id="detail-wali" class="text-gray-800 text-lg">-</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg shadow-sm">
                    <i class="ri-group-line text-orange-500 text-2xl"></i>
                    <div>
                        <p class="text-sm font-semibold text-gray-600">Jumlah Siswa</p>
                        <p id="detail-jumlah" class="text-gray-800 text-lg">-</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end px-8 py-4 border-t">
            <button onclick="closeModalDetail()" class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">Tutup</button>
        </div>
    </div>
</div>

{{-- ================= SCRIPT ================= --}}
<script>
const modalTambah = document.getElementById('modalTambah');
const modalEdit = document.getElementById('modalEdit');
const modalDetail = document.getElementById('modalDetail');
const modalBoxTambah = modalTambah.querySelector('div');
const modalBoxEdit = modalEdit.querySelector('div');
const modalDetailBox = document.getElementById('modalDetailBox');
const formTambah = document.getElementById('kelasForm');
const formEdit = document.getElementById('kelasEditForm');
const tableBody = document.querySelector('#kelasTable tbody');

function openModalTambah() { modalTambah.classList.remove('hidden'); setTimeout(()=>modalBoxTambah.classList.remove('scale-95','opacity-0'),50); }
function closeModalTambah() { modalBoxTambah.classList.add('scale-95','opacity-0'); setTimeout(()=>{modalTambah.classList.add('hidden'); formTambah.reset();},200); }

function openModalEdit(row) {
    const cells = row.children;
    formEdit.kode.value = cells[0].innerText;
    formEdit.nama.value = cells[1].innerText;
    formEdit.jurusan.value = cells[2].innerText.replace(/<[^>]*>?/gm,'');
    formEdit.wali.value = cells[3].innerText;
    formEdit.jumlah.value = cells[4].innerText;
    modalEdit.classList.remove('hidden'); setTimeout(()=>modalBoxEdit.classList.remove('scale-95','opacity-0'),50);
    formEdit.onsubmit = function(e){ 
        e.preventDefault();
        cells[0].innerText = formEdit.kode.value;
        cells[1].innerText = formEdit.nama.value;
        cells[2].innerHTML = `<span class="bg-gray-100 px-2 py-1 rounded text-sm">${formEdit.jurusan.value}</span>`;
        cells[3].innerText = formEdit.wali.value;
        cells[4].innerText = formEdit.jumlah.value;
        closeModalEdit();
    }
}
function closeModalEdit() { modalBoxEdit.classList.add('scale-95','opacity-0'); setTimeout(()=>{ modalEdit.classList.add('hidden'); formEdit.reset();},200); }

function openModalDetail(row) {
    const cells = row.children;
    document.getElementById('detail-nama').innerText = cells[1].innerText;
    document.getElementById('detail-initial').innerText = cells[1].innerText.charAt(0).toUpperCase();
    document.getElementById('detail-kode').innerText = cells[0].innerText;
    document.getElementById('detail-jurusan').innerText = cells[2].innerText.replace(/<[^>]*>?/gm,'');
    document.getElementById('detail-wali').innerText = cells[3].innerText;
    document.getElementById('detail-jumlah').innerText = cells[4].innerText;
    modalDetail.classList.remove('hidden');
    setTimeout(()=> modalDetailBox.classList.remove('scale-95','opacity-0'),50);
}
function closeModalDetail() { modalDetailBox.classList.add('scale-95','opacity-0'); setTimeout(()=> modalDetail.classList.add('hidden'),200); }

formTambah.addEventListener('submit', function(e){
    e.preventDefault();
    const data = new FormData(formTambah);
    const row = document.createElement('tr');
    row.classList.add('border-t','hover:bg-gray-50','transition');
    row.innerHTML = `
        <td class="px-4 py-3">${data.get('kode')}</td>
        <td class="px-4 py-3 font-medium">${data.get('nama')}</td>
        <td class="px-4 py-3"><span class="bg-gray-100 px-2 py-1 rounded text-sm">${data.get('jurusan')}</span></td>
        <td class="px-4 py-3">${data.get('wali')}</td>
        <td class="px-4 py-3">${data.get('jumlah')}</td>
        <td class="px-4 py-3 flex space-x-3">
            <button title="Detail" class="text-blue-500 hover:text-blue-700" onclick="openModalDetail(this.closest('tr'))"><i class="ri-eye-line"></i></button>
            <button title="Edit" class="text-orange-500 hover:text-orange-700" onclick="openModalEdit(this.closest('tr'))"><i class="ri-edit-line"></i></button>
            <button title="Hapus" onclick="confirmDelete(this)" class="text-red-500 hover:text-red-700"><i class="ri-delete-bin-line"></i></button>
        </td>`;
    tableBody.appendChild(row);
    closeModalTambah();
});

function confirmDelete(btn) { if(confirm("Apakah yakin ingin menghapus kelas ini?")) btn.closest('tr').remove(); }

[modalTambah, modalEdit, modalDetail].forEach(modal => {
    modal.addEventListener('click', e => { if(e.target === modal){ modal.classList.add('hidden'); } });
});
</script>
@endsection
