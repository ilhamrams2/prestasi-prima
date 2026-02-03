@extends('layouts.admin')

@section('title', 'Detail Prestasi')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('prestasiprima.admin.prestasi.index') }}" 
           class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all">
            <i class="ri-arrow-left-line text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Detail Pencapaian</h1>
            <p class="text-sm text-slate-500 font-medium">Informasi mendalam mengenai prestasi yang diraih oleh siswa.</p>
        </div>
    </div>

    {{-- ================= CONTENT CARD ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        {{-- Visual Hero --}}
        @if($prestasi->gambar)
            <div class="relative h-96 overflow-hidden">
                <img src="{{ asset('storage/' . $prestasi->gambar) }}" alt="{{ $prestasi->judul }}" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-6 left-8">
                    <span class="px-4 py-1.5 rounded-full bg-amber-500 text-white text-[10px] font-extrabold uppercase tracking-[0.2em] shadow-lg">
                        Pencapaian Siswa
                    </span>
                </div>
            </div>
        @endif
        
        <div class="p-8 md:p-12">
            <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight mb-6 leading-tight">
                {{ $prestasi->judul }}
            </h2>

            {{-- Metadata --}}
            <div class="flex flex-wrap gap-6 mb-10 py-6 border-y border-slate-50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400">
                        <i class="ri-calendar-line text-lg"></i>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase font-extrabold text-slate-400 tracking-widest">Waktu Input</p>
                        <p class="text-sm font-bold text-slate-700">{{ $prestasi->created_at->translatedFormat('d F Y') }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400">
                        <i class="ri-hashtag text-lg"></i>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase font-extrabold text-slate-400 tracking-widest">ID Referensi</p>
                        <p class="text-sm font-bold text-slate-700">ACHV-{{ str_pad($prestasi->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>
            </div>

            {{-- Description --}}
            <div class="prose prose-slate max-w-none">
                <p class="text-slate-600 leading-relaxed text-lg font-medium">
                    {{ $prestasi->deskripsi }}
                </p>
            </div>

            {{-- Action Bottom --}}
            <div class="mt-12 pt-8 border-t border-slate-50 flex flex-col md:flex-row gap-3">
                <a href="{{ route('prestasiprima.admin.prestasi.edit', $prestasi->id) }}" 
                   class="flex-1 md:flex-none px-8 py-3.5 rounded-2xl bg-[#FF6B00] text-white font-bold text-sm hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 text-center">
                   Edit Informasi
                </a>
                <a href="{{ route('prestasiprima.admin.prestasi.index') }}" 
                   class="flex-1 md:flex-none px-8 py-3.5 rounded-2xl bg-slate-50 text-slate-600 font-bold text-sm hover:bg-slate-100 transition-all text-center">
                   Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
