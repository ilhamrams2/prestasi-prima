@extends('siakad.index')

@section('content')
<div class="p-6 space-y-6">
    {{-- HEADER --}}
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

        <!-- Title -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                    <i class="ri-presentation-line text-3xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Guru</h1>
                    <p class="text-gray-600 text-sm mt-1">Kelola data guru, mata pelajaran, jadwal, dan informasi akademik</p>
                </div>
            </div>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
            <div class="bg-orange-100 text-orange-600 p-3 rounded-lg"><i class="ri-graduation-cap-line text-2xl"></i></div>
            <div>
                <p class="text-sm text-gray-500">Total Guru</p>
                <h2 class="text-xl font-bold">{{ $totalTeachers }}</h2>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
            <div class="bg-orange-100 text-orange-600 p-3 rounded-lg"><i class="ri-graduation-cap-line text-2xl"></i></div>
            <div>
                <p class="text-sm text-gray-500">Guru Aktif</p>
                <h2 class="text-xl font-bold">{{ $activeTeachers }}</h2>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
            <div class="bg-orange-100 text-orange-600 p-3 rounded-lg"><i class="ri-graduation-cap-line text-2xl"></i></div>
            <div>
                <p class="text-sm text-gray-500">Kepala Jurusan</p>
                <h2 class="text-xl font-bold">{{ $headOfDepartment }}</h2>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
            <div class="bg-orange-100 text-orange-600 p-3 rounded-lg"><i class="ri-graduation-cap-line text-2xl"></i></div>
            <div>
                <p class="text-sm text-gray-500">Wali Kelas</p>
                <h2 class="text-xl font-bold">{{ $homeroomTeachers }}</h2>
            </div>
        </div>
    </div>

    {{-- AKSI --}}
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

    {{-- TABEL GURU --}}
    <div class="bg-white rounded-lg shadow overflow-x-auto mt-4">
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

    {{-- PAGINASI --}}
    @if ($teachers->count())
    <div class="flex justify-between items-center mt-4">
        <p class="text-sm text-gray-500">
            Menampilkan {{ $teachers->firstItem() }} - {{ $teachers->lastItem() }} dari {{ $teachers->total() }} guru
        </p>
        {{ $teachers->links() }}
    </div>
    @endif
</div>

{{-- MODAL TAMBAH --}}
@include('siakad.pages.teacher.modal_add')

{{-- MODAL DETAIL --}}
<div id="teacherDetailModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
  <div class="bg-white rounded-2xl w-full max-w-3xl shadow-2xl overflow-hidden animate-fadeIn">
    <!-- Header -->
    <div class="flex justify-between items-center px-6 py-4 border-b">
      <h2 class="text-xl font-bold text-gray-900">Detail Guru</h2>
      <button onclick="closeTeacherModal()" class="text-gray-400 hover:text-gray-600 transition">
        <i class="ri-close-line text-2xl"></i>
      </button>
    </div>
    <!-- Body -->
    <div class="grid grid-cols-3 divide-x">
      <!-- Profile (Kiri) -->
      <div class="col-span-1 p-6 flex flex-col items-center text-center">
        <div id="teacher-avatar" class="w-20 h-20 rounded-full bg-orange-500 flex items-center justify-center text-white text-3xl font-bold shadow-md">R</div>
        <h3 id="teacher-name" class="mt-4 text-lg font-semibold text-gray-900">Nama Guru</h3>
        <p id="teacher-nip" class="text-sm text-gray-500">NIP001</p>
        <span id="teacher-status" class="mt-2 inline-block px-3 py-0.5 text-xs font-medium rounded-full bg-green-100 text-green-600">Aktif</span>
      </div>
      <!-- Detail (Kanan) -->
      <div class="col-span-2 p-6 text-sm space-y-5">
        <!-- Email & HP -->
        <div class="grid grid-cols-2 gap-6">
          <div class="flex items-start gap-3">
            <i class="ri-mail-line text-gray-400 text-lg"></i>
            <div>
              <p class="font-semibold text-gray-700">Email</p>
              <p id="teacher-email" class="text-gray-800 break-all">-</p>
            </div>
          </div>
          <div class="flex items-start gap-3">
            <i class="ri-phone-line text-gray-400 text-lg"></i>
            <div>
              <p class="font-semibold text-gray-700">No. HP</p>
              <p id="teacher-phone" class="text-gray-800">-</p>
            </div>
          </div>
        </div>
        <!-- Mata Pelajaran -->
        <div class="flex items-start gap-3">
          <i class="ri-book-open-line text-gray-400 text-lg"></i>
          <div>
            <p class="font-semibold text-gray-700 mb-2">Mata Pelajaran</p>
            <div id="teacher-subjects" class="flex flex-wrap gap-2">
              <span class="chip">-</span>
            </div>
          </div>
        </div>
        <!-- Jabatan -->
        <div class="flex items-start gap-3">
          <i class="ri-briefcase-3-line text-gray-400 text-lg"></i>
          <div>
            <p class="font-semibold text-gray-700 mb-1">Jabatan</p>
            <span id="teacher-position" class="chip-gray">-</span>
          </div>
        </div>
        <!-- Alamat -->
        <div class="flex items-start gap-3">
          <i class="ri-map-pin-line text-gray-400 text-lg"></i>
          <div>
            <p class="font-semibold text-gray-700">Alamat</p>
            <p id="teacher-address" class="text-gray-800">-</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- MODAL EDIT --}}
@include('siakad.pages.teacher.modal_edit')

{{-- CUSTOM STYLE --}}
<style>
  .chip {
    @apply px-3 py-1 text-xs font-medium rounded-full border text-gray-700 bg-gray-50 cursor-pointer transition transform;
  }
  .chip:hover {
    @apply bg-orange-100 border-orange-300 text-orange-700 shadow-md scale-105;
  }
  .chip-gray {
    @apply px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-700 cursor-pointer transition;
  }
  .chip-gray:hover {
    @apply bg-gray-200 shadow-sm scale-105;
  }
</style>

{{-- SCRIPT --}}
<script>
    const modal = document.getElementById('modal');
    const modalBox = document.getElementById('modalBox');
    const editModal = document.getElementById('editModal');
    const editBox = document.getElementById('editBox');
    const detailModal = document.getElementById('teacherDetailModal');

    // OPEN ADD MODAL
    function openModal() {
        modal.classList.remove('hidden');
        setTimeout(() => modalBox.classList.remove('scale-95','opacity-0'), 50);
    }
    function closeModal() {
        modalBox.classList.add('scale-95','opacity-0');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }

    // OPEN EDIT MODAL
    async function openEditModal(id) {
        try {
            const res = await fetch(`/siakad/teacher/${id}`);
            if (!res.ok) throw new Error('Gagal ambil data guru');
            const data = await res.json();
            document.getElementById('editForm').action = `/siakad/teacher/${id}`;
            document.getElementById('editTeacherId').value = data.teacher_id ?? '';
            document.getElementById('editName').value = data.name ?? '';
            document.getElementById('editSubject').value = data.subject ?? '';
            document.getElementById('editPosition').value = data.position ?? '';
            document.getElementById('editStatus').value = data.status ?? 'Inactive';
            document.getElementById('editEmail').value = data.email ?? '';
            document.getElementById('editPhone').value = data.phone ?? '';
            editModal.classList.remove('hidden');
            setTimeout(() => editBox.classList.remove('scale-95','opacity-0'), 50);
        } catch (error) {
            alert('Gagal memuat data guru untuk edit.');
            console.error(error);
        }
    }
    function closeEditModal() {
        editBox.classList.add('scale-95','opacity-0');
        setTimeout(() => editModal.classList.add('hidden'), 200);
    }

    // DETAIL MODAL
    async function showTeacherDetail(id) {
        try {
            const res = await fetch(`/siakad/teacher/${id}`);
            if (!res.ok) throw new Error('Gagal ambil detail guru');
            const data = await res.json();

            // Set data
            document.getElementById('teacher-name').innerText = data.name ?? '-';
            document.getElementById('teacher-nip').innerText = data.teacher_id ?? '-';
            document.getElementById('teacher-email').innerText = data.email ?? '-';
            document.getElementById('teacher-phone').innerText = data.phone ?? '-';
            document.getElementById('teacher-position').innerText = data.position ?? '-';
            document.getElementById('teacher-address').innerText = data.address ?? '-';
            document.getElementById('teacher-status').innerText = data.status === 'Active' ? 'Aktif' : 'Tidak Aktif';
            document.getElementById('teacher-status').className = data.status === 'Active'
                ? "mt-2 inline-block px-3 py-0.5 text-xs font-medium rounded-full bg-green-100 text-green-600"
                : "mt-2 inline-block px-3 py-0.5 text-xs font-medium rounded-full bg-red-100 text-red-600";

            // Avatar
            const avatar = document.getElementById('teacher-avatar');
            avatar.innerText = data.name ? data.name.charAt(0).toUpperCase() : 'R';

            // Subjects
            const subjectContainer = document.getElementById('teacher-subjects');
            subjectContainer.innerHTML = '';
            if (data.subjects && data.subjects.length > 0) {
                data.subjects.forEach(sub => {
                    const span = document.createElement('span');
                    span.className = 'chip';
                    span.innerText = sub;
                    subjectContainer.appendChild(span);
                });
            } else {
                subjectContainer.innerHTML = '<span class="chip">-</span>';
            }

            detailModal.classList.remove('hidden');
        } catch (error) {
            alert('Gagal memuat detail guru.');
            console.error(error);
        }
    }
    function closeTeacherModal() {
        detailModal.classList.add('hidden');
    }

    // UPDATE FORM
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
