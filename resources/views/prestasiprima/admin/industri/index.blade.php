@extends('layouts.admin')

@section('title', 'Kerjasama Industri')

@section('content')
<div class="space-y-6">
    {{-- ================= HEADER SECTION ================= --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Mitra Industri</h1>
            <p class="text-sm text-slate-500 font-medium">Kelola daftar perusahaan dan instansi yang bekerja sama dengan sekolah.</p>
        </div>

        <a href="{{ route('prestasiprima.admin.industri.create') }}"
           class="inline-flex items-center gap-2 bg-[#FF6B00] hover:bg-[#e66000] text-white px-6 py-3 rounded-2xl font-bold transition-all duration-300 shadow-lg shadow-orange-200 active:scale-95">
            <i class="ri-add-circle-line text-lg"></i>
            Tambah Mitra Baru
        </a>
    </div>

    {{-- ================= FLASH MESSAGE ================= --}}
    @if (session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-100 rounded-2xl flex items-center gap-3 text-emerald-700">
            <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white flex-shrink-0">
                <i class="ri-check-line text-lg font-bold"></i>
            </div>
            <p class="text-sm font-bold">{{ session('success') }}</p>
        </div>
    @endif

    {{-- ================= TABLE CONTAINER ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-slate-500 uppercase text-[11px] font-bold tracking-widest">
                        <th class="px-8 py-5 w-20">No</th>
                        <th class="px-5 py-5 w-32">Logo Mitra</th>
                        <th class="px-5 py-5">Nama Perusahaan</th>
                        <th class="px-5 py-5">Identitas (Slug)</th>
                        <th class="px-8 py-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($industris as $index => $industri)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-8 py-5 font-bold text-slate-400">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </td>

                            <td class="px-5 py-5">
                                <div class="w-20 h-10 bg-white rounded-lg flex items-center justify-center border border-slate-100 p-1 group-hover:shadow-sm transition-all shadow-none">
                                    @if($industri->logo)
                                        <img src="{{ asset('storage/' . $industri->logo) }}" alt="{{ $industri->nama }}" class="max-h-full max-w-full object-contain filter grayscale group-hover:grayscale-0 transition-all duration-500">
                                    @else
                                        <span class="text-[10px] font-bold text-slate-300 uppercase italic">No Logo</span>
                                    @endif
                                </div>
                            </td>

                            <td class="px-5 py-5">
                                <p class="font-bold text-slate-800 group-hover:text-[#FF6B00] transition-colors leading-snug">
                                    {{ $industri->nama }}
                                </p>
                            </td>

                            <td class="px-5 py-5">
                                <span class="bg-slate-100 text-slate-500 px-3 py-1 rounded-full text-[10px] font-bold font-mono">
                                    {{ $industri->slug }}
                                </span>
                            </td>

                            <td class="px-8 py-5 text-right whitespace-nowrap">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('prestasiprima.admin.industri.edit', $industri->id) }}"
                                       class="w-10 h-10 flex items-center justify-center rounded-xl bg-orange-50 text-[#FF6B00] hover:bg-[#FF6B00] hover:text-white transition-all duration-300 shadow-sm border border-orange-100"
                                       title="Edit">
                                        <i class="ri-edit-2-line text-lg"></i>
                                    </a>

                                    <form action="{{ route('prestasiprima.admin.industri.destroy', $industri->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data mitra industri ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
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
                                    <i class="ri-building-line text-6xl mb-4"></i>
                                    <p class="text-sm font-bold italic">Belum ada mita industri yang terdaftar.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
