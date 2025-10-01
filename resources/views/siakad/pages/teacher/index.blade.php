@extends('siakad.index')

@section('content')
<div class="p-6 space-y-6">
    <div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">
        <!-- Breadcrumb -->
        <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
            <a href="#" class="hover:text-orange-600 transition-colors flex items-center gap-1">
                <i class="ri-home-4-line text-lg"></i> Dasbor
            </a>
            <span>/</span>
            <span class="text-gray-700 font-semibold flex items-center gap-1">
                <i class="ri-presentation-line text-lg text-orange-500"></i> Manajemen Guru
            </span>
        </nav>

        <!-- Title + Actions -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                    <i class="ri-presentation-line text-3xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Guru</h1>
                    <p class="text-gray-600 text-sm mt-1">
                        Kelola data guru, mata pelajaran, jadwal, dan informasi akademik
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
            <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                <i class="ri-graduation-cap-line text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Guru</p>
                <h2 class="text-xl font-bold">{{ $totalTeachers }}</h2>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
            <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                <i class="ri-graduation-cap-line text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Guru Aktif</p>
                <h2 class="text-xl font-bold">{{ $activeTeachers }}</h2>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
            <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                <i class="ri-graduation-cap-line text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Kepala Jurusan</p>
                <h2 class="text-xl font-bold">{{ $headOfDepartment }}</h2>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
            <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                <i class="ri-graduation-cap-line text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Wali Kelas</p>
                <h2 class="text-xl font-bold">{{ $homeroomTeachers }}</h2>
            </div>
        </div>
    </div>

    <!-- Aksi -->
    <div class="flex items-center justify-between flex-wrap gap-4">
        <button onclick="openModal()" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg shadow transition">
            + Tambah Guru
        </button>

        <div class="w-full md:w-2/3">
            <div class="bg-white p-4 rounded-lg shadow grid grid-cols-1 md:grid-cols-4 gap-4">
                <select class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                    <option>Jabatan</option>
                </select>
                <select class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                    <option>Status</option>
                </select>
                <select class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                    <option>Mata Pelajaran</option>
                </select>
                <div class="relative">
                    <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
                    <input id="searchInput" type="text" placeholder="Cari nama guru / mata pelajaran / jabatan"
                           class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400">
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Guru -->
   <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table id="teacherTable" class="w-full text-left border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3">NIP</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Mata Pelajaran</th>
                    <th class="px-4 py-3">Jabatan</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Email / Telepon</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $teacher)
                <tr id="teacher-row-{{ $teacher->id }}" class="border-t hover:bg-gray-50 transition">
                    <td class="px-4 py-3">{{ $teacher->teacher_id }}</td>
                    <td class="px-4 py-3 font-medium">{{ $teacher->name }}</td>
                    <td class="px-4 py-3">{{ $teacher->subject }}</td>
                    <td class="px-4 py-3">{{ $teacher->position }}</td>
                    <td class="px-4 py-3">
                        <span id="status-{{ $teacher->id }}"
                            class="{{ $teacher->status === 'Active' ? 'bg-green-100 text-green-700':'bg-red-100 text-red-700' }} px-2 py-1 rounded text-sm">
                            {{ $teacher->status === 'Active' ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </td>
                    <td class="px-4 py-3">{{ $teacher->email ?? $teacher->phone }}</td>
                    <td class="px-4 py-3 flex space-x-3">
                        <a href="javascript:void(0)" onclick="showTeacherDetail({{ $teacher->id }})"
                           class="text-blue-500 hover:text-blue-700" title="Detail">
                           <i class="ri-eye-line"></i>
                        </a>
                        <a href="javascript:void(0)" onclick="openEditModal({{ $teacher->id }})"
                           title="Edit" class="text-orange-500 hover:text-orange-700">
                           <i class="ri-edit-line"></i>
                        </a>
                        <form action="{{ route('siakad.teacher.destroy',$teacher->id) }}" method="POST"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus guru ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Hapus" class="text-red-500 hover:text-red-700">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">Belum ada data guru</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginasi -->
    @if ($teachers->count())
    <div class="flex justify-between items-center mt-4">
        <p class="text-sm text-gray-500">
            Menampilkan {{ $teachers->firstItem() }} - {{ $teachers->lastItem() }} dari {{ $teachers->total() }} guru
        </p>
        {{ $teachers->links() }}
    </div>
    @endif
</div>

<!-- Modal Tambah Guru -->
<div id="modal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-96 p-6 transform scale-95 opacity-0 transition" id="modalBox">
        <h2 class="text-lg font-bold mb-4">Tambah Guru</h2>
        <form id="teacherForm" action="{{ route('siakad.teacher.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="teacher_id" placeholder="NIP" class="w-full border rounded px-3 py-2">
            <input type="text" name="name" placeholder="Nama Lengkap" class="w-full border rounded px-3 py-2">
            <input type="text" name="subject" placeholder="Mata Pelajaran" class="w-full border rounded px-3 py-2">
            <input type="text" name="position" placeholder="Jabatan" class="w-full border rounded px-3 py-2">

            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="Active">Aktif</option>
                <option value="Inactive">Tidak Aktif</option>
            </select>

            <input type="text" name="email" placeholder="Email" class="w-full border rounded px-3 py-2">
            <input type="text" name="phone" placeholder="Nomor HP" class="w-full border rounded px-3 py-2">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detail Guru -->
<div id="teacherDetailModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
  <div class="bg-white rounded-2xl w-[450px] shadow-lg p-6 relative">
    <button onclick="closeTeacherModal()" class="absolute top-3 right-3 text-gray-400 hover:text-black">✕</button>
    <div class="flex flex-col items-center text-center">
      <div id="teacher-avatar" class="w-20 h-20 rounded-full bg-orange-500 flex items-center justify-center text-white text-3xl font-bold">
        A
      </div>
      <h2 id="teacher-name" class="text-lg font-semibold mt-3">Nama Guru</h2>
      <p id="teacher-nip" class="text-sm text-gray-600">NIP001</p>
      <span id="teacher-status" class="mt-1 inline-block bg-green-100 text-green-600 text-xs px-2 py-1 rounded-lg">Aktif</span>
    </div>

    <div class="mt-6 space-y-3 text-sm">
      <div class="flex justify-between">
        <span class="font-semibold text-gray-700">Email</span>
        <span id="teacher-email" class="text-gray-800">-</span>
      </div>
      <div class="flex justify-between">
        <span class="font-semibold text-gray-700">No. HP</span>
        <span id="teacher-phone" class="text-gray-800">-</span>
      </div>
      <div>
        <span class="font-semibold text-gray-700">Mata Pelajaran</span>
        <div id="teacher-subjects" class="flex flex-wrap gap-2 mt-1">
          <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full">Matematika</span>
        </div>
      </div>
      <div class="flex justify-between">
        <span class="font-semibold text-gray-700">Jabatan</span>
        <span id="teacher-position" class="text-gray-800">-</span>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Guru -->
<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-96 p-6 transform scale-95 opacity-0 transition" id="editBox">
        <h2 class="text-lg font-bold mb-4">Edit Guru</h2>
        <form id="editForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="text" name="teacher_id" id="editTeacherId" placeholder="NIP" class="w-full border rounded px-3 py-2">
            <input type="text" name="name" id="editName" placeholder="Nama Lengkap" class="w-full border rounded px-3 py-2">
            <input type="text" name="subject" id="editSubject" placeholder="Mata Pelajaran" class="w-full border rounded px-3 py-2">
            <input type="text" name="position" id="editPosition" placeholder="Jabatan" class="w-full border rounded px-3 py-2">

            <select name="status" id="editStatus" class="w-full border rounded px-3 py-2">
                <option value="Active">Aktif</option>
                <option value="Inactive">Tidak Aktif</option>
            </select>

            <input type="text" name="email" id="editEmail" placeholder="Email" class="w-full border rounded px-3 py-2">
            <input type="text" name="phone" id="editPhone" placeholder="Nomor HP" class="w-full border rounded px-3 py-2">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-200 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded">Perbarui</button>
            </div>
        </form>
    </div>
</div>
<script>
    const modal = document.getElementById('modal');
    const modalBox = document.getElementById('modalBox');
    const editModal = document.getElementById('editModal');
    const editBox = document.getElementById('editBox');

    // OPEN & CLOSE ADD MODAL
    function openModal() {
        modal.classList.remove('hidden');
        setTimeout(() => modalBox.classList.remove('scale-95','opacity-0'), 50);
    }

    function closeModal() {
        modalBox.classList.add('scale-95','opacity-0');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }

    // SHOW DETAIL GURU
    async function showTeacherDetail(id) {
        try {
            const res = await fetch(`/siakad/teacher/${id}`);
            if (!res.ok) throw new Error('Gagal memuat data guru');
            const teacher = await res.json();

            // Avatar & Info Dasar
            document.getElementById('teacher-avatar').innerText = teacher.name ? teacher.name.charAt(0).toUpperCase() : '-';
            document.getElementById('teacher-name').innerText = teacher.name ?? '-';
            document.getElementById('teacher-nip').innerText = teacher.teacher_id ?? '-';
            document.getElementById('teacher-email').innerText = teacher.email ?? '-';
            document.getElementById('teacher-phone').innerText = teacher.phone ?? '-';
            document.getElementById('teacher-position').innerText = teacher.position ?? '-';

            // Status (ubah warna Active/Inactive)
const statusEl = document.getElementById('teacher-status');
const isActive = teacher.status === 'Active';

statusEl.innerText = isActive ? 'Active' : 'Inactive';
statusEl.className = isActive
  ? 'mt-1 inline-block bg-green-100 text-green-600 text-xs px-2 py-1 rounded-lg'
  : 'mt-1 inline-block bg-red-100 text-red-600 text-xs px-2 py-1 rounded-lg';


            // Subject
            const subjectsContainer = document.getElementById('teacher-subjects');
            subjectsContainer.innerHTML = '';
            if (teacher.subjects && teacher.subjects.length > 0) {
    teacher.subjects.forEach(sub => {
        const span = document.createElement('span');
        span.className = 'bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full';
        span.innerText = sub;
        subjectsContainer.appendChild(span);
    });
} else {
    subjectsContainer.innerHTML = '<span class="text-gray-400 text-xs">No subjects</span>';
}


            document.getElementById('teacherDetailModal').classList.remove('hidden');
        } catch (error) {
            alert('Gagal memuat data guru. Silakan cek console.');
            console.error(error);
        }
    }

    function closeTeacherModal() {
        document.getElementById('teacherDetailModal').classList.add('hidden');
    }

    // OPEN EDIT MODAL
    async function openEditModal(id) {
        try {
            const res = await fetch(`/siakad/teacher/${id}`);
            if (!res.ok) throw new Error('Gagal ambil data guru');
            const data = await res.json();

            // Set value form
            document.getElementById('editForm').action = `/siakad/teacher/${id}`;
            document.getElementById('editTeacherId').value = data.teacher_id ?? '';
            document.getElementById('editName').value = data.name ?? '';
            document.getElementById('editSubject').value = data.subject ?? '';
            document.getElementById('editPosition').value = data.position ?? '';
            document.getElementById('editStatus').value = data.status ?? 'Inactive';
            document.getElementById('editEmail').value = data.email ?? '';
            document.getElementById('editPhone').value = data.phone ?? '';

            editModal.classList.remove('hidden');
            setTimeout(() => editBox.classList.remove('scale-95', 'opacity-0'), 50);
        } catch (error) {
            alert('Gagal memuat data guru untuk edit.');
            console.error(error);
        }
    }

    function closeEditModal() {
        editBox.classList.add('scale-95', 'opacity-0');
        setTimeout(() => editModal.classList.add('hidden'), 200);
    }

    // FORM UPDATE AJAX (Biar langsung refresh status di tabel tanpa reload manual)
    document.getElementById('editForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);
        const id = form.action.split('/').pop();

        try {
            const res = await fetch(`/siakad/teacher/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: formData
            });

            if (!res.ok) throw new Error('Gagal update data guru');
            closeEditModal();

            // Reload halaman agar status di tabel & detail ikut berubah
            location.reload();
        } catch (error) {
            alert('Terjadi kesalahan saat update guru.');
            console.error(error);
        }
    });

    // SEARCH FILTER
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const value = this.value.toLowerCase();
        document.querySelectorAll('#teacherTable tbody tr').forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
        });
    });





</script>

@endsection
