@extends('layouts.admin')

@section('title', 'Manajemen Karya & Proyek')

@section('content')
<div class="max-w-7xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Karya & Proyek Siswa</h1>
            <p class="text-sm text-slate-500 font-medium">Showcase hasil kreativitas dan inovasi digital siswa SMK Prestasi Prima.</p>
        </div>
        <a href="{{ route('prestasiprima.admin.karya.create') }}" 
           class="inline-flex items-center gap-2 bg-[#FF6B00] hover:bg-[#e66000] text-white px-6 py-3.5 rounded-2xl font-bold text-sm transition-all shadow-lg shadow-orange-200 active:scale-95">
            <i class="ri-lightbulb-flash-line text-lg"></i>
            Tambah Karya
        </a>
    </div>

    {{-- ================= ALERT ================= --}}
    @if(session('success'))
        <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 rounded-2xl flex items-center gap-3 text-emerald-700 shadow-sm animate-fade-in">
            <i class="ri-checkbox-circle-fill text-xl"></i>
            <p class="text-sm font-bold">{{ session('success') }}</p>
        </div>
    @endif

    {{-- ================= TABLE CARD ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-[0.2em]">Karya / Proyek</th>
                        <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-[0.2em]">Kategori</th>
                        <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-[0.2em]">Deskripsi Ringkas</th>
                        <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-[0.2em] text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($projects as $item)
                        <tr class="group hover:bg-slate-50/10 transition-colors">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-20 h-14 rounded-xl bg-slate-100 border border-slate-200 overflow-hidden flex-shrink-0">
                                        @if($item->gambar)
                                            <img src="{{ asset('assets/images/karya-proyek/' . $item->gambar) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-orange-50 text-orange-500">
                                                <i class="ri-image-line text-xl"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 tracking-tight leading-tight mb-1">{{ $item->judul }}</p>
                                        <div class="flex items-center gap-2">
                                            @if($item->link)
                                                <a href="{{ $item->link }}" target="_blank" class="text-[10px] font-bold text-[#FF6B00] hover:underline flex items-center gap-0.5">
                                                    <i class="ri-external-link-line"></i> View Link
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="px-3 py-1 rounded-lg bg-orange-50 text-[#FF6B00] text-[10px] font-extrabold uppercase tracking-wider border border-orange-100">
                                    {{ $item->kategori }}
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-sm text-slate-500 font-medium line-clamp-2 max-w-xs">
                                    {{ $item->deskripsi }}
                                </p>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end gap-2 outline-none">
                                    <a href="{{ route('prestasiprima.admin.karya.edit', $item->id) }}" 
                                       class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:bg-orange-50 hover:text-[#FF6B00] transition-all shadow-sm"
                                       title="Edit">
                                        <i class="ri-edit-line text-lg"></i>
                                    </a>
                                    <form action="{{ route('prestasiprima.admin.karya.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Hapus karya ini?')"
                                                class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:bg-red-50 hover:text-red-600 transition-all shadow-sm"
                                                title="Hapus">
                                            <i class="ri-delete-bin-line text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-24 text-center">
                                <div class="flex flex-col items-center justify-center opacity-30">
                                    <i class="ri-lightbulb-flash-line text-7xl mb-4 text-slate-400"></i>
                                    <p class="text-sm font-bold italic text-slate-500 tracking-widest uppercase">Belum ada karya ditambahkan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ================= PAGINATION ================= --}}
        @if($projects->hasPages())
            <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
                {{ $projects->links('pagination::tailwind') }}
            </div>
        @endif
    </div>
</div>
@endsection
