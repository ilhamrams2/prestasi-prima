@extends('siakad.index')

@section('title', 'Pengumuman')

@section('content')
<div class="p-6 space-y-8">

    {{-- ================= HEADER ================= --}}
    <div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">
        <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
            <a href="{{ route('siakad.dashboard') }}" class="hover:text-orange-600 transition-colors flex items-center gap-1">
                <i class="ri-home-4-line text-lg"></i> Dashboard
            </a>
            <span>/</span>
            <span class="text-gray-700 font-semibold flex items-center gap-1">
                <i class="ri-megaphone-line text-lg text-orange-500"></i> Pengumuman
            </span>
        </nav>

        <div class="flex items-center gap-3 justify-between flex-wrap">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                    <i class="ri-megaphone-fill text-3xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold text-orange-600">Pengumuman Sekolah</h1>
                    <p class="text-gray-600 text-sm mt-1">Informasi terbaru, penting, dan acara dari sekolah</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= SEARCH & FILTER ================= --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <!-- Search -->
        <div class="relative w-full md:max-w-sm">
            <input id="searchInput" type="text" placeholder="Cari pengumuman..."
                class="w-full rounded-xl border-gray-300 shadow-sm pl-10 pr-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition">
            <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
        </div>

        <!-- Filter -->
        <div class="flex flex-wrap gap-2">
            <button class="filter-btn active bg-orange-100 text-orange-600 px-4 py-1 rounded-full text-sm hover:bg-orange-200" data-filter="semua">Semua</button>
            <button class="filter-btn bg-red-100 text-red-600 px-4 py-1 rounded-full text-sm hover:bg-red-200" data-filter="penting">Penting</button>
            <button class="filter-btn bg-yellow-100 text-yellow-600 px-4 py-1 rounded-full text-sm hover:bg-yellow-200" data-filter="acara">Acara</button>
            <button class="filter-btn bg-indigo-100 text-indigo-600 px-4 py-1 rounded-full text-sm hover:bg-indigo-200" data-filter="jadwal">Jadwal</button>
            <button class="filter-btn bg-blue-100 text-blue-600 px-4 py-1 rounded-full text-sm hover:bg-blue-200" data-filter="akademik">Akademik</button>
        </div>
    </div>

    {{-- ================= DAFTAR PENGUMUMAN ================= --}}
    <div id="announcementList" class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 mt-6">

        {{-- Dummy Cards --}}
        @foreach ([
            ['judul' => 'Libur Semester Ganjil 2024', 'kategori' => 'penting', 'warna' => 'red', 'tanggal' => '2024-01-10', 'penulis' => 'Admin Sekolah', 'isi' => 'Libur semester ganjil dimulai 15 Desember 2024 hingga 8 Januari 2025. Seluruh siswa diharapkan menggunakan waktu libur dengan baik untuk beristirahat dan mempersiapkan semester berikutnya.'],
            ['judul' => 'Workshop Web Development', 'kategori' => 'acara', 'warna' => 'yellow', 'tanggal' => '2024-01-05', 'penulis' => 'Guru RPL', 'isi' => 'Workshop pengembangan web akan diadakan setiap Sabtu mulai 25 Januari 2024 di Lab Komputer. Gratis untuk seluruh siswa RPL, dengan topik HTML, CSS, dan JavaScript interaktif.'],
            ['judul' => 'Perubahan Jadwal Pelajaran', 'kategori' => 'jadwal', 'warna' => 'indigo', 'tanggal' => '2023-12-28', 'penulis' => 'Wali Kelas X RPL 1', 'isi' => 'Jadwal pelajaran baru berlaku mulai minggu depan. Harap seluruh siswa memperhatikan perubahan jadwal agar tidak salah masuk kelas.'],
            ['judul' => 'Pengumuman Nilai Semester', 'kategori' => 'akademik', 'warna' => 'blue', 'tanggal' => '2024-01-15', 'penulis' => 'Bagian Akademik', 'isi' => 'Nilai semester ganjil akan diumumkan secara online melalui portal siswa mulai tanggal 20 Januari 2024. Pastikan akun portal aktif.'],
            ['judul' => 'Kegiatan Bakti Sosial', 'kategori' => 'acara', 'warna' => 'green', 'tanggal' => '2024-02-02', 'penulis' => 'OSIS Sekolah', 'isi' => 'Kegiatan bakti sosial akan dilaksanakan di panti asuhan Sukamaju. Diharapkan partisipasi dari seluruh siswa. Setiap kelas diharapkan membawa donasi sesuai koordinasi wali kelas.'],
        ] as $i => $pengumuman)
        <div class="announcement-card bg-white/90 backdrop-blur-sm rounded-xl border-l-4 border-{{ $pengumuman['warna'] }}-500 shadow-md p-6 hover:shadow-2xl hover:-translate-y-1 transition transform duration-300"
             data-kategori="{{ $pengumuman['kategori'] }}" data-judul="{{ $pengumuman['judul'] }}" data-isi="{{ $pengumuman['isi'] }}" data-tanggal="{{ $pengumuman['tanggal'] }}" data-penulis="{{ $pengumuman['penulis'] }}" data-warna="{{ $pengumuman['warna'] }}">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="font-semibold text-lg text-gray-800 flex items-center gap-2">
                        <i class="ri-megaphone-line text-{{ $pengumuman['warna'] }}-500"></i>
                        {{ $pengumuman['judul'] }}
                    </h2>
                    <p class="text-sm text-gray-500">oleh {{ $pengumuman['penulis'] }} · {{ $pengumuman['tanggal'] }}</p>
                </div>
                <span class="bg-{{ $pengumuman['warna'] }}-100 text-{{ $pengumuman['warna'] }}-600 text-xs px-3 py-1 rounded-full capitalize">{{ $pengumuman['kategori'] }}</span>
            </div>
            <p class="mt-3 text-gray-600 leading-relaxed">
                {{ Str::limit($pengumuman['isi'], 100, '...') }}
            </p>
            <button class="baca-btn mt-4 text-orange-600 font-medium text-sm hover:underline" data-index="{{ $i }}">
                Baca Selengkapnya →
            </button>
        </div>
        @endforeach

    </div>
</div>

{{-- ================= MODAL DETAIL PENGUMUMAN ================= --}}
<div id="detailModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full overflow-hidden animate-fadeIn relative">
        <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-red-500 transition text-xl">✕</button>
        <div id="modalContent" class="p-8">
            <!-- Konten akan diisi oleh JS -->
        </div>
    </div>
</div>

{{-- ================= SCRIPT INTERAKTIF ================= --}}
<script>
    const buttons = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.announcement-card');
    const searchInput = document.getElementById('searchInput');
    const modal = document.getElementById('detailModal');
    const modalContent = document.getElementById('modalContent');

    // === Filter kategori ===
    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            buttons.forEach(b => b.classList.remove('active', 'ring-2', 'ring-orange-400'));
            btn.classList.add('active', 'ring-2', 'ring-orange-400');

            const filter = btn.dataset.filter;
            cards.forEach(card => {
                card.classList.toggle('hidden', filter !== 'semua' && card.dataset.kategori !== filter);
            });
        });
    });

    // === Search pengumuman ===
    searchInput.addEventListener('input', function () {
        const query = this.value.toLowerCase();
        cards.forEach(card => {
            const text = card.innerText.toLowerCase();
            card.classList.toggle('hidden', !text.includes(query));
        });
    });

    // === Modal Baca Selengkapnya ===
    document.querySelectorAll('.baca-btn').forEach(button => {
        button.addEventListener('click', () => {
            const card = button.closest('.announcement-card');
            const judul = card.dataset.judul;
            const isi = card.dataset.isi;
            const tanggal = card.dataset.tanggal;
            const penulis = card.dataset.penulis;
            const warna = card.dataset.warna;

            modalContent.innerHTML = `
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-3 bg-${warna}-100 text-${warna}-600 rounded-xl">
                        <i class="ri-megaphone-fill text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">${judul}</h2>
                        <p class="text-sm text-gray-500">oleh ${penulis} · ${tanggal}</p>
                    </div>
                </div>
                <p class="text-gray-700 leading-relaxed mb-6">${isi}</p>
                <div class="flex justify-end">
                    <button onclick="closeModal()" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg shadow transition">
                        Tutup
                    </button>
                </div>
            `;

            modal.classList.remove('hidden');
        });
    });

    // === Tutup modal ===
    function closeModal() {
        modal.classList.add('hidden');
    }
</script>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}
.animate-fadeIn {
    animation: fadeIn 0.3s ease-out;
}
</style>
@endsection
