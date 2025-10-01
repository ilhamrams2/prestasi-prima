@extends('siakad.index')

@section('title', 'Manajemen Mata Pelajaran')

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
                <i class="ri-book-2-line text-lg text-orange-500"></i> Manajemen Mata Pelajaran
            </span>
        </nav>

        <div class="flex items-center gap-3">
            <div class="p-3 bg-orange-100 text-orange-600 rounded-xl shadow-inner">
                <i class="ri-book-open-line text-3xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Mata Pelajaran</h1>
                <p class="text-gray-600 text-sm mt-1">
                    Kelola data mata pelajaran, kode mapel, guru pengampu, dan status aktif
                </p>
            </div>
        </div>
    </div>

    {{-- ================= CTA ================= --}}
    <div class="flex items-center justify-between gap-4">
        <button onclick="openModal('add')" 
                class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-lg shadow-md hover:shadow-lg transition font-semibold">
            + Tambah Mata Pelajaran
        </button>

        {{-- Search & Filter --}}
        <div class="w-full md:w-1/2">
            <div class="bg-white p-3 rounded-lg shadow flex gap-3 items-center">
                <div class="relative flex-1">
                    <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input id="searchInput" type="text" 
                           placeholder="Cari nama mapel / kode / guru pengampu"
                           class="w-full border-none rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-orange-400"
                           onkeyup="renderTable()"/>
                </div>
                <select id="statusFilter" class="border rounded-lg px-3 py-2 bg-white focus:ring-2 focus:ring-orange-400" onchange="renderTable()">
                    <option value="all">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
        </div>
    </div>

    {{-- ================= TABEL ================= --}}
    <div class="bg-white rounded-xl shadow mt-6 overflow-hidden border border-gray-100">
        <table class="w-full text-sm text-gray-700">
            <thead class="bg-gray-50 text-gray-700 text-sm font-semibold">
                <tr>
                    <th class="px-6 py-3 text-left">Nama Mapel</th>
                    <th class="px-6 py-3 text-left">Kode</th>
                    <th class="px-6 py-3 text-left">Guru Pengampu</th>
                    <th class="px-6 py-3 text-left">Jam</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody" class="divide-y divide-gray-100"></tbody>
        </table>

        {{-- Empty State --}}
        <div id="emptyState" class="hidden p-8 text-center text-gray-400">
            <div class="text-4xl mb-2 text-orange-500"><i class="ri-book-3-line"></i></div>
            <div class="font-semibold mb-1">Belum ada data mata pelajaran</div>
            <div class="text-sm">Klik tombol <span class="font-medium text-orange-600">Tambah Mata Pelajaran</span> untuk menambahkan data baru.</div>
        </div>
    </div>
</div>

{{-- ================= MODAL FORM ================= --}}
<div id="modal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div id="modalBox" class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 transform transition-all scale-95 opacity-0">
        <h2 id="modalTitle" class="text-xl font-bold text-gray-800 mb-6"></h2>
        <form id="formMapel" class="space-y-5">
            <input type="hidden" name="id">

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nama Mapel</label>
                    <input type="text" name="nama" placeholder="Nama Mata Pelajaran" required
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Kode Mapel</label>
                    <input type="text" name="kode" placeholder="Contoh: MTK01" required
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Guru Pengampu</label>
                    <input type="text" name="guru" placeholder="Nama Guru" required
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah Jam</label>
                    <input type="number" name="jam" placeholder="Contoh: 3" required
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                <select name="status" 
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeModal('form')" 
                        class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL VIEW ================= --}}
<div id="modalView" class="fixed inset-0 bg-black/50 hidden z-40 flex items-center justify-center">
    <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6 relative">
        <button onclick="closeModal('view')" class="absolute top-3 right-3 text-gray-500 hover:text-red-500">
            <i class="ri-close-line text-2xl"></i>
        </button>
        <h2 id="viewNama" class="text-2xl font-bold text-gray-800 mb-3"></h2>
        <p class="text-sm text-gray-500 mb-4" id="viewGuru"></p>
        <p class="text-gray-600 mb-4">Kode: <span id="viewKode"></span></p>
        <p class="text-gray-600 mb-4">Jumlah Jam: <span id="viewJam"></span></p>
        <span id="viewStatus" class="px-2 py-1 rounded text-sm"></span>
    </div>
</div>

<script>
let mapels = [
    {id:1, nama:"Matematika", kode:"MTK01", guru:"Budi Santoso", jam:4, status:"aktif"},
    {id:2, nama:"Bahasa Indonesia", kode:"IND01", guru:"Siti Aminah", jam:3, status:"aktif"},
    {id:3, nama:"Fisika", kode:"FIS01", guru:"Agus Prasetyo", jam:2, status:"nonaktif"},
];
let editingId = null;

function renderTable() {
    const tbody = document.getElementById('tableBody');
    tbody.innerHTML = "";
    const keyword = document.getElementById('searchInput').value.toLowerCase();
    const filter = document.getElementById('statusFilter').value;

    const filtered = mapels.filter(m => {
        const matchKeyword = m.nama.toLowerCase().includes(keyword) || m.kode.toLowerCase().includes(keyword) || m.guru.toLowerCase().includes(keyword);
        const matchStatus = (filter === "all" || m.status === filter);
        return matchKeyword && matchStatus;
    });

    if(filtered.length === 0){
        document.getElementById("emptyState").classList.remove("hidden");
        return;
    } else {
        document.getElementById("emptyState").classList.add("hidden");
    }

    filtered.forEach(m => {
        const tr = document.createElement("tr");
        tr.classList.add("hover:bg-gray-50");

        tr.innerHTML = `
            <td class="px-6 py-3 font-medium text-gray-800">${m.nama}</td>
            <td class="px-6 py-3">${m.kode}</td>
            <td class="px-6 py-3">${m.guru}</td>
            <td class="px-6 py-3">${m.jam}</td>
            <td class="px-6 py-3">
                <span class="px-2 py-1 rounded text-xs font-medium ${m.status==='aktif'?'bg-green-100 text-green-600':'bg-red-100 text-red-600'}">${m.status}</span>
            </td>
            <td class="px-6 py-3 flex items-center gap-3 justify-center">
                <button onclick="openModal('view', ${m.id})" class="text-blue-500 hover:text-blue-700"><i class="ri-eye-line text-lg"></i></button>
                <button onclick="openModal('edit', ${m.id})" class="text-yellow-500 hover:text-yellow-700"><i class="ri-pencil-line text-lg"></i></button>
                <button onclick="deleteMapel(${m.id})" class="text-red-500 hover:text-red-700"><i class="ri-delete-bin-line text-lg"></i></button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

function openModal(type, id=null){
    const modal = document.getElementById('modal');
    const modalBox = document.getElementById('modalBox');
    const title = document.getElementById('modalTitle');
    const form = document.getElementById('formMapel');

    if(type==="add"){
        editingId=null;
        form.reset();
        title.textContent="Tambah Mata Pelajaran";
        modal.classList.remove("hidden");
    } else if(type==="edit"){
        editingId=id;
        const data = mapels.find(m=>m.id===id);
        form.nama.value=data.nama;
        form.kode.value=data.kode;
        form.guru.value=data.guru;
        form.jam.value=data.jam;
        form.status.value=data.status;
        title.textContent="Edit Mata Pelajaran";
        modal.classList.remove("hidden");
    } else if(type==="view"){
        const data = mapels.find(m=>m.id===id);
        document.getElementById('viewNama').textContent=data.nama;
        document.getElementById('viewGuru').textContent=data.guru;
        document.getElementById('viewKode').textContent=data.kode;
        document.getElementById('viewJam').textContent=data.jam;
        const statusEl=document.getElementById('viewStatus');
        statusEl.textContent=data.status;
        statusEl.className = "px-2 py-1 rounded text-sm "+(data.status==='aktif'?'bg-green-100 text-green-600':'bg-red-100 text-red-600');
        document.getElementById('modalView').classList.remove("hidden");
    }
    setTimeout(()=>modalBox.classList.remove("scale-95","opacity-0"),50);
}

function closeModal(type){
    if(type==='form') document.getElementById('modal').classList.add('hidden');
    if(type==='view') document.getElementById('modalView').classList.add('hidden');
}

document.getElementById('formMapel').addEventListener('submit', function(e){
    e.preventDefault();
    const form = e.target;
    const data = {
        id: editingId || Date.now(),
        nama: form.nama.value,
        kode: form.kode.value,
        guru: form.guru.value,
        jam: form.jam.value,
        status: form.status.value
    };
    if(editingId){
        const idx = mapels.findIndex(m=>m.id===editingId);
        mapels[idx]=data;
    } else {
        mapels.push(data);
    }
    closeModal('form');
    renderTable();
});

function deleteMapel(id){
    if(confirm("Yakin ingin menghapus data ini?")){
        mapels = mapels.filter(m=>m.id!==id);
        renderTable();
    }
}

renderTable();
</script>
@endsection
