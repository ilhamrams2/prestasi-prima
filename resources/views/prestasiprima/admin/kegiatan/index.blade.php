@extends('layouts.admin')

@section('title', 'Manajemen Kegiatan')

@section('content')
<div class="space-y-6">
    {{-- ================= HEADER SECTION ================= --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Agenda Kegiatan</h1>
            <p class="text-sm text-slate-500 font-medium">Atur dan kelola semua jadwal kegiatan sekolah di sini.</p>
        </div>

        <a href="{{ route('prestasiprima.admin.kegiatan.create') }}"
           class="inline-flex items-center gap-2 bg-[#E65100] hover:bg-[#BF4300] text-white px-6 py-3 rounded-2xl font-bold transition-all duration-300 shadow-lg shadow-orange-500/20 active:scale-95">
            <i class="ri-calendar-add-line text-lg"></i>
            Tambah Agenda Baru
        </a>
    </div>


    {{-- ================= TABLE CONTAINER ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-slate-500 uppercase text-[11px] font-bold tracking-widest">
                        <th class="px-8 py-5 w-20">No</th>
                        <th class="px-5 py-5">Judul Agenda</th>
                        <th class="px-5 py-5">Waktu & Lokasi</th>
                        <th class="px-5 py-5">Deskripsi</th>
                        <th class="px-8 py-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($kegiatan as $index => $item)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-8 py-5 font-bold text-slate-400">
                                {{ str_pad($kegiatan->firstItem() + $index, 2, '0', STR_PAD_LEFT) }}
                            </td>

                            <td class="px-5 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl overflow-hidden bg-slate-100 shrink-0 border border-slate-200">
                                        @if($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-300">
                                                <i class="ri-image-line text-2xl"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 group-hover:text-[#E65100] transition-colors leading-snug">
                                            {{ $item->judul }}
                                        </p>
                                        <div class="mt-1 flex items-center gap-2">
                                            <span class="text-[10px] font-extrabold text-[#E65100] bg-orange-50 px-2 py-0.5 rounded-lg uppercase tracking-widest">Agenda</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-5 py-5">
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2 text-slate-600 font-medium text-xs">
                                        <i class="ri-calendar-todo-line text-[#E65100]"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}
                                    </div>
                                    <div class="flex items-center gap-2 text-slate-400 font-medium text-[11px]">
                                        <i class="ri-time-line"></i> {{ $item->jam ?? '—' }}
                                        <span class="text-slate-200">|</span>
                                        <i class="ri-map-pin-2-line"></i> {{ $item->tempat ?? '—' }}
                                    </div>
                                </div>
                            </td>

                            <td class="px-5 py-5">
                                <p class="text-slate-500 leading-relaxed line-clamp-2 max-w-xs text-xs font-medium">
                                    {{ $item->deskripsi ?? 'Tidak ada deskripsi' }}
                                </p>
                            </td>

                            <td class="px-8 py-5 text-right whitespace-nowrap">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('prestasiprima.admin.kegiatan.edit', $item->id) }}"
                                       class="w-10 h-10 flex items-center justify-center rounded-xl bg-orange-50 text-[#E65100] hover:bg-[#E65100] hover:text-white transition-all duration-300 shadow-sm border border-orange-100"
                                       title="Edit">
                                        <i class="ri-edit-2-line text-lg"></i>
                                    </a>

                                    <form action="{{ route('prestasiprima.admin.kegiatan.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirmDelete(event)"
                                                class="w-10 h-10 flex items-center justify-center rounded-xl bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-300 shadow-sm border border-red-100"
                                                title="Hapus">
                                            <i class="ri-delete-bin-6-line text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-16 text-center">
                                <div class="flex flex-col items-center justify-center opacity-40">
                                    <i class="ri-calendar-line text-6xl mb-4"></i>
                                    <p class="text-sm font-bold italic">Belum ada agenda kegiatan yang tersedia.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ================= PAGINATION ================= --}}
        @if($kegiatan->hasPages())
            <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
                {{ $kegiatan->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
