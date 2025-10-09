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
            <div class="bg-white p-4 rounded-lg shadow grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="relative">
                    <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
                    <input id="searchInput" type="text" placeholder="Cari kode/nama kelas"
                        class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400">
                </div>
                <select id="filterJurusan" class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                    <option value="">Semua Jurusan</option>
                </select>
            </div>
        </div>
    </div>

    {{-- ================= TABEL ================= --}}
    @include('siakad.pages.class.kelas-table')

</div>

{{-- ================= MODALS ================= --}}
@include('siakad.pages.class.kelas-modal')

@push('scripts')
<script src="{{ asset('assets/js/siakad/kelas.js') }}"></script>
@endpush
@endsection
