@extends('siakad.index')

@section('title', 'Manajemen Jurusan')

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
                <i class="ri-graduation-cap-line text-lg text-orange-500"></i> Manajemen Jurusan
            </span>
        </nav>

        <div class="flex items-center gap-3">
            <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                <i class="ri-building-4-line text-3xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Jurusan</h1>
                <p class="text-gray-600 text-sm mt-1">
                    Kelola data jurusan, angkatan, jumlah kelas, siswa, dan kepala jurusan
                </p>
            </div>
        </div>
    </div>

    {{-- ================= STATISTIK ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-xl p-4 shadow flex items-center gap-4">
            <div class="p-3 rounded-lg bg-orange-50 text-orange-600">
                <i class="ri-folder-3-line text-2xl"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500">Total Jurusan</p>
                <div id="statJurusan" class="text-lg font-bold">0</div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow flex items-center gap-4">
            <div class="p-3 rounded-lg bg-yellow-50 text-yellow-600">
                <i class="ri-stack-line text-2xl"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500">Total Kelas</p>
                <div id="statKelas" class="text-lg font-bold">0</div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow flex items-center gap-4">
            <div class="p-3 rounded-lg bg-emerald-50 text-emerald-600">
                <i class="ri-user-line text-2xl"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500">Total Siswa</p>
                <div id="statSiswa" class="text-lg font-bold">0</div>
            </div>
        </div>
    </div>

    {{-- ================= CTA ================= --}}
    <div class="flex items-center justify-between gap-4">
        <button onclick="openModal('add')" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow">
            + Tambah Jurusan
        </button>

        {{-- Search & Filter --}}
        <div class="w-full md:w-1/2">
            <div class="bg-white p-3 rounded-lg shadow flex gap-3 items-center">
                <div class="relative flex-1">
                    <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input id="searchInput" type="text" placeholder="Cari nama jurusan / kode / kepala jurusan"
                           class="w-full border-none rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:outline-none"/>
                </div>
                <select id="statusFilter" class="border rounded-lg px-3 py-2 bg-white">
                    <option value="all">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
        </div>
    </div>

    {{-- ================= TABEL ================= --}}
    <div class="bg-white rounded-lg shadow overflow-hidden">
        {{-- Desktop --}}
        <div class="hidden md:block">
            <table class="w-full table-auto">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        @foreach(['nama' => 'Nama Jurusan', 'kode' => 'Kode', 'kepala' => 'Kepala Jurusan', 'kelas' => 'Jumlah Kelas', 'siswa' => 'Jumlah Siswa'] as $key => $label)
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

    {{-- ================= PAGINATION ================= --}}
    <div class="flex items-center justify-between mt-4">
        <div id="summaryText" class="text-sm text-gray-500"></div>
        <div id="pagination" class="flex items-center gap-2"></div>
    </div>
</div>

{{-- ================= MODAL (Tambah/Edit) ================= --}}
<div id="modal" class="fixed inset-0 bg-black/50 hidden z-40 flex items-center justify-center">
    <div id="modalBox" class="bg-white w-96 rounded-2xl shadow-2xl p-6 transform translate-y-6 opacity-0 transition">
        <h2 id="modalTitle" class="text-lg font-bold mb-3"></h2>
        <form id="formJurusan" class="space-y-3">
            <input type="hidden" name="id">
            <input name="nama" placeholder="Nama Jurusan" class="w-full border rounded px-3 py-2" required>
            <input name="kode" placeholder="Kode (contoh: RPL)" class="w-full border rounded px-3 py-2" required>
            <input name="kepala" placeholder="Kepala Jurusan" class="w-full border rounded px-3 py-2" required>
            <div class="flex gap-2">
                <input name="kelas" placeholder="Jumlah Kelas" class="w-1/2 border rounded px-3 py-2" required>
                <input name="siswa" placeholder="Jumlah Siswa" class="w-1/2 border rounded px-3 py-2" required>
            </div>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
            <div class="flex justify-end gap-2 mt-2">
                <button type="button" id="btnCancel" class="px-4 py-2 bg-gray-200 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded">Simpan</button>
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
        <p class="text-sm text-gray-500 mb-4" id="viewKepala"></p>
        <p class="text-gray-600 mb-4">Kode: <span id="viewKode"></span></p>
        <p class="text-gray-600 mb-4">Jumlah Kelas: <span id="viewKelas"></span> · Jumlah Siswa: <span id="viewSiswa"></span></p>
        <span id="viewStatus" class="px-2 py-1 rounded text-sm"></span>
    </div>
</div>

{{-- ================= SCRIPT ================= --}}
<script>
    let data = [
        { id: 1, nama: 'Rekayasa Perangkat Lunak', kode: 'RPL', kepala: 'Budi Santoso, S.Kom', kelas: 6, siswa: 120, status: 'aktif' },
        { id: 2, nama: 'Teknik Komputer & Jaringan', kode: 'TKJ', kepala: 'Ahmad Fauzi, M.Pd', kelas: 6, siswa: 90, status: 'aktif' },
        { id: 3, nama: 'Multimedia', kode: 'MM', kepala: 'Siti Aminah, S.Sn', kelas: 6, siswa: 60, status: 'aktif' },
        { id: 4, nama: 'Akuntansi', kode: 'AK', kepala: 'Dewi Lestari, S.E', kelas: 6, siswa: 50, status: 'nonaktif' }
    ];

    let currentPage = 1;
    const perPage = 5;
    let currentSort = { key: null, dir: 'asc' };

    const tableBody = document.getElementById('tableBody');
    const cardList = document.getElementById('cardList');
    const emptyState = document.getElementById('emptyState');
    const paginationEl = document.getElementById('pagination');
    const summaryText = document.getElementById('summaryText');
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const modal = document.getElementById('modal');
    const modalBox = document.getElementById('modalBox');
    const modalTitle = document.getElementById('modalTitle');
    const formJurusan = document.getElementById('formJurusan');
    const btnCancel = document.getElementById('btnCancel');

    const modalView = document.getElementById('modalView');
    const viewNama = document.getElementById('viewNama');
    const viewKepala = document.getElementById('viewKepala');
    const viewKode = document.getElementById('viewKode');
    const viewKelas = document.getElementById('viewKelas');
    const viewSiswa = document.getElementById('viewSiswa');
    const viewStatus = document.getElementById('viewStatus');

    function compare(a, b, key, dir='asc') {
        let va = typeof a[key] === 'string' ? a[key].toLowerCase() : a[key];
        let vb = typeof b[key] === 'string' ? b[key].toLowerCase() : b[key];
        if (va < vb) return dir === 'asc' ? -1 : 1;
        if (va > vb) return dir === 'asc' ? 1 : -1;
        return 0;
    }

    function render() {
        const q = searchInput.value.trim().toLowerCase();
        const filterVal = statusFilter.value;
        let filtered = data.filter(d => {
            const matchQ = [d.nama, d.kode, d.kepala].join(' ').toLowerCase().includes(q);
            const matchStatus = (filterVal === 'all') || (d.status === filterVal);
            return matchQ && matchStatus;
        });

        if (currentSort.key) filtered.sort((a,b) => compare(a,b,currentSort.key,currentSort.dir));

        const total = filtered.length;
        const totalPages = Math.max(1, Math.ceil(total / perPage));
        if (currentPage > totalPages) currentPage = totalPages;
        const start = (currentPage - 1) * perPage;
        const pageData = filtered.slice(start, start + perPage);

        summaryText.textContent = total
            ? `Menampilkan ${start+1}-${start+pageData.length} dari ${total} jurusan`
            : "Tidak ada data";

        renderTable(pageData);
        renderCards(pageData);
        renderPagination(totalPages);

        updateStats();
    }

    function renderTable(pageData) {
        tableBody.innerHTML = '';
        if (!pageData.length) return emptyState.classList.remove('hidden');
        emptyState.classList.add('hidden');

        pageData.forEach(row => {
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-gray-50';
            tr.innerHTML = `
                <td class="px-4 py-3">${row.nama}</td>
                <td class="px-4 py-3">${row.kode}</td>
                <td class="px-4 py-3">${row.kepala}</td>
                <td class="px-4 py-3">${row.kelas}</td>
                <td class="px-4 py-3">${row.siswa}</td>
                <td class="px-4 py-3">
                    <span class="px-2 py-1 rounded text-sm ${row.status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'}">
                        ${row.status}
                    </span>
                </td>
                <td class="px-4 py-3 flex gap-2">
                    <button onclick="viewJurusan(${row.id})" class="text-gray-500 hover:text-gray-800"><i class="ri-eye-line"></i></button>
                    <button onclick="openModal('edit', ${row.id})" class="text-orange-500 hover:text-orange-700"><i class="ri-edit-line"></i></button>
                    <button onclick="deleteJurusan(${row.id})" class="text-red-500 hover:text-red-700"><i class="ri-delete-bin-line"></i></button>
                </td>`;
            tableBody.appendChild(tr);
        });
    }

    function renderCards(pageData) {
        cardList.innerHTML = '';
        pageData.forEach(row => {
            const div = document.createElement('div');
            div.className = 'bg-white p-4 rounded-lg shadow';
            div.innerHTML = `
                <div class="flex justify-between items-start">
                    <div>
                        <div class="font-semibold">${row.nama}</div>
                        <div class="text-xs text-gray-500">${row.kode} • ${row.kepala}</div>
                    </div>
                    <div class="text-sm font-medium ${row.status === 'aktif' ? 'text-green-600' : 'text-red-600'}">${row.status}</div>
                </div>
                <div class="mt-3 text-sm text-gray-600">Kelas: ${row.kelas} • Siswa: ${row.siswa}</div>
                <div class="mt-3 flex gap-3">
                    <button onclick="viewJurusan(${row.id})" class="text-gray-500 hover:text-gray-800"><i class="ri-eye-line"></i></button>
                    <button onclick="openModal('edit', ${row.id})" class="text-orange-500 hover:text-orange-700"><i class="ri-edit-line"></i></button>
                    <button onclick="deleteJurusan(${row.id})" class="text-red-500 hover:text-red-700"><i class="ri-delete-bin-line"></i></button>
                </div>`;
            cardList.appendChild(div);
        });
    }

    function renderPagination(totalPages) {
        paginationEl.innerHTML = '';

        const prevBtn = createPageBtn('« Prev', currentPage > 1, () => { currentPage--; render(); });
        paginationEl.appendChild(prevBtn);

        for (let i = Math.max(1, currentPage - 2); i <= Math.min(totalPages, currentPage + 2); i++) {
            const btn = createPageBtn(i, true, () => { currentPage = i; render(); }, i === currentPage);
            paginationEl.appendChild(btn);
        }

        const nextBtn = createPageBtn('Next »', currentPage < totalPages, () => { currentPage++; render(); });
        paginationEl.appendChild(nextBtn);
    }

    function createPageBtn(label, enabled, onClick, active=false) {
        const btn = document.createElement('button');
        btn.textContent = label;
        btn.className = 'px-3 py-1 border rounded';
        if (active) btn.classList.add('bg-orange-500','text-white');
        btn.disabled = !enabled;
        btn.onclick = onClick;
        return btn;
    }

    function updateStats() {
        document.getElementById('statJurusan').textContent = data.length;
        document.getElementById('statKelas').textContent = data.reduce((sum,d) => sum+d.kelas,0);
        document.getElementById('statSiswa').textContent = data.reduce((sum,d) => sum+d.siswa,0);
    }

    // ---------------- Modal ----------------
    function openModal(mode, id=null) {
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalBox.classList.remove('translate-y-6','opacity-0');
            modalBox.classList.add('translate-y-0','opacity-100');
        }, 20);

        if (mode === 'add') {
            modalTitle.textContent = 'Tambah Jurusan';
            formJurusan.reset();
            formJurusan.id.value = '';
        } else if (mode === 'edit') {
            modalTitle.textContent = 'Edit Jurusan';
            const jurusan = data.find(d => d.id === id);
            formJurusan.id.value = jurusan.id;
            formJurusan.nama.value = jurusan.nama;
            formJurusan.kode.value = jurusan.kode;
            formJurusan.kepala.value = jurusan.kepala;
            formJurusan.kelas.value = jurusan.kelas;
            formJurusan.siswa.value = jurusan.siswa;
            formJurusan.status.value = jurusan.status;
        }
    }

    function closeModal(type='form') {
        if (type === 'form') {
            modalBox.classList.remove('translate-y-0','opacity-100');
            modalBox.classList.add('translate-y-6','opacity-0');
            setTimeout(() => modal.classList.add('hidden'), 180);
        } else if (type === 'view') {
            modalView.classList.add('hidden');
        }
    }

    btnCancel.addEventListener('click', () => closeModal('form'));
    modal.addEventListener('click', e => { if (e.target === modal) closeModal('form'); });

    formJurusan.addEventListener('submit', e => {
        e.preventDefault();
        const fd = new FormData(formJurusan);
        const id = fd.get('id');

        if (id) {
            const idx = data.findIndex(d => d.id == id);
            data[idx] = {
                id: Number(id),
                nama: fd.get('nama'),
                kode: fd.get('kode'),
                kepala: fd.get('kepala'),
                kelas: Number(fd.get('kelas')),
                siswa: Number(fd.get('siswa')),
                status: fd.get('status')
            };
        } else {
            data.unshift({
                id: Date.now(),
                nama: fd.get('nama'),
                kode: fd.get('kode'),
                kepala: fd.get('kepala'),
                kelas: Number(fd.get('kelas')),
                siswa: Number(fd.get('siswa')),
                status: fd.get('status')
            });
        }

        closeModal('form');
        currentPage = 1;
        render();
    });

    // ---------------- Actions ----------------
    function viewJurusan(id) {
        const jurusan = data.find(d => d.id === id);
        viewNama.textContent = jurusan.nama;
        viewKepala.textContent = `Kepala Jurusan: ${jurusan.kepala}`;
        viewKode.textContent = jurusan.kode;
        viewKelas.textContent = jurusan.kelas;
        viewSiswa.textContent = jurusan.siswa;
        viewStatus.textContent = jurusan.status;
        viewStatus.className = `px-2 py-1 rounded text-sm ${jurusan.status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'}`;
        modalView.classList.remove('hidden');
    }

    function deleteJurusan(id) {
        if (confirm('Hapus jurusan ini?')) {
            data = data.filter(d => d.id !== id);
            render();
        }
    }

    // ---------------- Init ----------------
    searchInput.addEventListener('input', () => { currentPage = 1; render(); });
    statusFilter.addEventListener('change', () => { currentPage = 1; render(); });
    document.querySelectorAll('th[data-sort]').forEach(th => {
        th.addEventListener('click', () => {
            const key = th.dataset.sort;
            currentSort = (currentSort.key === key)
                ? { key, dir: currentSort.dir === 'asc' ? 'desc' : 'asc' }
                : { key, dir: 'asc' };
            document.querySelectorAll('.sort-indicator').forEach(el => el.textContent = '');
            th.querySelector('.sort-indicator').textContent = currentSort.dir === 'asc' ? '↑' : '↓';
            render();
        });
    });

    render();
</script>
@endsection
