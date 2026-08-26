@extends('layouts.admin')

@section('title', 'Manajemen Prestasi')

@section('content')
<div class="space-y-8">
    {{-- ================= HEADER SECTION ================= --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-orange-500/10 text-orange-600 flex items-center justify-center">
                    <i class="ri-trophy-line text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Manajemen Prestasi Siswa</h1>
                    <p class="text-sm text-slate-500 font-medium">Kelola foto poster penghargaan & prestasi siswa yang tampil di carousel landing page.</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full sm:w-auto">
            <a href="{{ route('landing') }}#prestasi" target="_blank"
               class="inline-flex items-center justify-center gap-2 bg-white border border-slate-200 hover:border-slate-300 text-slate-700 px-5 py-3 rounded-2xl font-bold transition-all shadow-sm hover:shadow active:scale-95 text-sm">
                <i class="ri-external-link-line text-lg text-slate-400"></i>
                Lihat di Landing Page
            </a>
            
            <a href="{{ route('prestasiprima.admin.prestasi.create') }}"
               class="inline-flex items-center justify-center gap-2 bg-[#FF6B00] hover:bg-[#e66000] text-white px-6 py-3 rounded-2xl font-bold transition-all duration-300 shadow-lg shadow-orange-500/20 active:scale-95 text-sm">
                <i class="ri-add-circle-line text-lg"></i>
                Tambah Prestasi
            </a>
        </div>
    </div>

    {{-- ================= STATS SUMMARY ================= --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-orange-50 text-[#FF6B00] flex items-center justify-center text-2xl font-bold">
                <i class="ri-award-fill"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Prestasi</p>
                <h3 class="text-2xl font-black text-slate-800">{{ $prestasis->total() }}</h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl font-bold">
                <i class="ri-slideshow-3-line"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Status Carousel</p>
                <h3 class="text-sm font-bold text-emerald-600">Aktif di Beranda</h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl font-bold">
                <i class="ri-image-line"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Format Optimal</p>
                <h3 class="text-sm font-bold text-slate-700">Poster Rasio 3:4 / 4:5</h3>
            </div>
        </div>
    </div>

    {{-- ================= PRESTASI GRID & TABLE ================= --}}
    <div class="bg-white rounded-3xl sm:rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-50 flex items-center justify-between">
            <h2 class="text-base font-extrabold text-slate-800 tracking-tight flex items-center gap-2">
                <i class="ri-list-check-2 text-orange-500"></i> Daftar Poster Prestasi
            </h2>
            <span class="text-xs font-bold text-slate-400">Menampilkan {{ $prestasis->count() }} dari {{ $prestasis->total() }} data</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-100 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                        <th class="px-6 py-4 w-16 text-center">No</th>
                        <th class="px-6 py-4 w-28">Poster</th>
                        <th class="px-6 py-4">Judul Prestasi</th>
                        <th class="px-6 py-4 hidden md:table-cell">Deskripsi</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($prestasis as $index => $prestasi)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-6 py-4 text-center font-bold text-slate-400 text-xs">
                                {{ $prestasis->firstItem() + $index }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="w-20 h-24 rounded-xl overflow-hidden bg-slate-100 border border-slate-200 shadow-sm relative group/img cursor-pointer">
                                    <img src="{{ $prestasi->gambar_url }}" alt="{{ $prestasi->judul }}" 
                                         class="w-full h-full object-cover group-hover/img:scale-110 transition-transform duration-300">
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="max-w-md">
                                    <h4 class="font-extrabold text-slate-800 text-sm group-hover:text-[#FF6B00] transition-colors leading-snug">
                                        {{ $prestasi->judul }}
                                    </h4>
                                    <div class="flex items-center gap-2 mt-1.5 flex-wrap">
                                        <span class="text-[10px] font-black text-[#FF6B00] bg-orange-50 px-2.5 py-0.5 rounded-full uppercase tracking-wider border border-orange-100">Prestasi</span>
                                        <span class="text-[11px] text-slate-400 font-medium">
                                            <i class="ri-calendar-line"></i> {{ $prestasi->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 hidden md:table-cell">
                                <p class="text-slate-500 line-clamp-2 text-xs leading-relaxed max-w-sm">
                                    {{ $prestasi->deskripsi ?: '-' }}
                                </p>
                            </td>

                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('prestasiprima.admin.prestasi.edit', $prestasi->id) }}"
                                       class="w-9 h-9 flex items-center justify-center rounded-xl bg-slate-100 hover:bg-orange-50 text-slate-600 hover:text-[#FF6B00] transition-all duration-300"
                                       title="Edit Data">
                                        <i class="ri-edit-2-line text-base"></i>
                                    </a>

                                    <form action="{{ route('prestasiprima.admin.prestasi.destroy', $prestasi->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data prestasi \'{{ addslashes($prestasi->judul) }}\'?');" 
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="w-9 h-9 flex items-center justify-center rounded-xl bg-slate-100 hover:bg-red-50 text-slate-600 hover:text-red-600 transition-all duration-300"
                                                title="Hapus Prestasi">
                                            <i class="ri-delete-bin-6-line text-base"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-16 text-center">
                                <div class="flex flex-col items-center justify-center opacity-40">
                                    <i class="ri-trophy-line text-6xl mb-3 text-slate-400"></i>
                                    <p class="text-sm font-bold text-slate-600">Belum ada data prestasi siswa.</p>
                                    <p class="text-xs text-slate-400 mt-1">Klik tombol 'Tambah Prestasi' untuk menambahkan poster pertama.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($prestasis->hasPages())
            <div class="p-6 border-t border-slate-50">
                {{ $prestasis->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
