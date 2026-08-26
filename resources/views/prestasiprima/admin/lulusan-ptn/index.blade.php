@extends('layouts.admin')

@section('title', 'Manajemen Lulusan PTN')

@section('content')
<div class="space-y-8">
    {{-- ================= HEADER SECTION ================= --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-orange-500/10 text-orange-600 flex items-center justify-center">
                    <i class="ri-government-line text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Mitra & Lulusan PTN</h1>
                    <p class="text-sm text-slate-500 font-medium">Kelola logo perguruan tinggi negeri & swasta tempat alumni melanjutkan studi yang tampil di landing page.</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full sm:w-auto">
            <a href="{{ route('landing') }}#ptn" target="_blank"
               class="inline-flex items-center justify-center gap-2 bg-white border border-slate-200 hover:border-slate-300 text-slate-700 px-5 py-3 rounded-2xl font-bold transition-all shadow-sm hover:shadow active:scale-95 text-sm">
                <i class="ri-external-link-line text-lg text-slate-400"></i>
                Lihat di Landing Page
            </a>
            
            <a href="{{ route('prestasiprima.admin.lulusan-ptn.create') }}"
               class="inline-flex items-center justify-center gap-2 bg-[#FF6B00] hover:bg-[#e66000] text-white px-6 py-3 rounded-2xl font-bold transition-all duration-300 shadow-lg shadow-orange-500/20 active:scale-95 text-sm">
                <i class="ri-add-circle-line text-lg"></i>
                Tambah Kampus PTN
            </a>
        </div>
    </div>

    {{-- ================= STATS SUMMARY ================= --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-orange-50 text-[#FF6B00] flex items-center justify-center text-2xl font-bold">
                <i class="ri-building-line"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Kampus Mitra</p>
                <h3 class="text-2xl font-black text-slate-800">{{ $ptns->total() }}</h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl font-bold">
                <i class="ri-checkbox-circle-line"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Status Tampil</p>
                <h3 class="text-sm font-bold text-emerald-600">Aktif di Beranda</h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl font-bold">
                <i class="ri-layout-grid-line"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Format Tampilan</p>
                <h3 class="text-sm font-bold text-slate-700">Grid Card 4 Kolom</h3>
            </div>
        </div>
    </div>

    {{-- ================= PTN TABLE LIST ================= --}}
    <div class="bg-white rounded-3xl sm:rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-50 flex items-center justify-between">
            <h2 class="text-base font-extrabold text-slate-800 tracking-tight flex items-center gap-2">
                <i class="ri-list-check-2 text-orange-500"></i> Daftar Kampus Lulusan PTN
            </h2>
            <span class="text-xs font-bold text-slate-400">Menampilkan {{ $ptns->count() }} dari {{ $ptns->total() }} kampus</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-100 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                        <th class="px-6 py-4 w-16 text-center">Urutan</th>
                        <th class="px-6 py-4 w-24">Logo</th>
                        <th class="px-6 py-4">Nama Kampus / Universitas</th>
                        <th class="px-6 py-4 hidden sm:table-cell">Singkatan</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($ptns as $index => $ptn)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-6 py-4 text-center font-bold text-slate-500 text-xs">
                                <span class="w-7 h-7 rounded-lg bg-slate-100 flex items-center justify-center mx-auto text-slate-700 font-bold">
                                    {{ $ptn->urutan ?? ($index + 1) }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <div class="w-14 h-14 rounded-2xl bg-white border border-slate-100 p-2 shadow-sm flex items-center justify-center group-hover:border-orange-200 transition-colors">
                                    <img src="{{ $ptn->logo_url }}" alt="{{ $ptn->nama_kampus }}" class="max-w-full max-h-full object-contain">
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div>
                                    <h4 class="font-extrabold text-slate-800 text-sm group-hover:text-[#FF6B00] transition-colors leading-snug">
                                        {{ $ptn->nama_kampus }}
                                    </h4>
                                    @if($ptn->link_website)
                                        <a href="{{ $ptn->link_website }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] text-slate-400 hover:text-orange-500 mt-1 font-medium">
                                            <i class="ri-global-line"></i> {{ parse_url($ptn->link_website, PHP_URL_HOST) ?? $ptn->link_website }}
                                        </a>
                                    @endif
                                </div>
                            </td>

                            <td class="px-6 py-4 hidden sm:table-cell">
                                <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-xs font-bold font-mono">
                                    {{ $ptn->singkatan ?: '-' }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('prestasiprima.admin.lulusan-ptn.toggle-status', $ptn->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" 
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold transition-all {{ $ptn->is_active ? 'bg-emerald-50 text-emerald-600 hover:bg-emerald-100' : 'bg-slate-100 text-slate-400 hover:bg-slate-200' }}"
                                            title="Klik untuk mengubah status aktif">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $ptn->is_active ? 'bg-emerald-500 animate-pulse' : 'bg-slate-400' }}"></span>
                                        {{ $ptn->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </button>
                                </form>
                            </td>

                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('prestasiprima.admin.lulusan-ptn.edit', $ptn->id) }}"
                                       class="w-9 h-9 flex items-center justify-center rounded-xl bg-slate-100 hover:bg-orange-50 text-slate-600 hover:text-[#FF6B00] transition-all duration-300"
                                       title="Edit Data">
                                        <i class="ri-edit-2-line text-base"></i>
                                    </a>

                                    <form action="{{ route('prestasiprima.admin.lulusan-ptn.destroy', $ptn->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus kampus \'{{ addslashes($ptn->nama_kampus) }}\'?');" 
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="w-9 h-9 flex items-center justify-center rounded-xl bg-slate-100 hover:bg-red-50 text-slate-600 hover:text-red-600 transition-all duration-300"
                                                title="Hapus Kampus">
                                            <i class="ri-delete-bin-6-line text-base"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-8 py-16 text-center">
                                <div class="flex flex-col items-center justify-center opacity-40">
                                    <i class="ri-government-line text-6xl mb-3 text-slate-400"></i>
                                    <p class="text-sm font-bold text-slate-600">Belum ada data kampus lulusan PTN.</p>
                                    <p class="text-xs text-slate-400 mt-1">Klik tombol 'Tambah Kampus PTN' untuk menambahkan data baru.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($ptns->hasPages())
            <div class="p-6 border-t border-slate-50">
                {{ $ptns->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
