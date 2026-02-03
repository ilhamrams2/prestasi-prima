@extends('layouts.admin')

@section('title', 'Detail Staff')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('prestasiprima.admin.staff.index') }}" 
           class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all">
            <i class="ri-arrow-left-line text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Detail Profil Staff</h1>
            <p class="text-sm text-slate-500 font-medium">Informasi lengkap mengenai tenaga pendidik dan kependidikan.</p>
        </div>
    </div>

    {{-- ================= PROFILE CARD ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <div class="relative h-32 bg-gradient-to-r from-indigo-600 to-blue-500">
            {{-- Decorative pattern --}}
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
        </div>
        
        <div class="px-8 pb-10">
            <div class="flex flex-col md:flex-row gap-8 -mt-16 relative z-10">
                {{-- Portrait --}}
                <div class="w-48 h-60 shrink-0 mx-auto md:mx-0">
                    <img src="{{ asset('storage/staff/' . $staff->foto) }}" alt="{{ $staff->nama }}" 
                         class="w-full h-full object-cover rounded-[2rem] border-8 border-white shadow-xl bg-white">
                </div>

                {{-- Basic Info --}}
                <div class="flex-1 pt-20 md:pt-20">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                        <div>
                            <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight mb-1">{{ $staff->nama }}</h2>
                            <p class="text-lg font-bold text-[#FF6B00]">{{ $staff->jabatan }}</p>
                        </div>
                        <span class="inline-flex px-4 py-2 rounded-xl bg-orange-50 text-[#FF6B00] text-xs font-extrabold uppercase tracking-widest self-start md:self-center">
                            {{ ucfirst($staff->kategori) }}
                        </span>
                    </div>

                    {{-- Stats / Quick Info --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-6 border-y border-slate-50">
                        <div class="space-y-1">
                            <p class="text-[10px] uppercase font-extrabold text-slate-400 tracking-widest">Status Kepegawaian</p>
                            <p class="text-sm font-bold text-slate-700">Aktif / Terdaftar</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] uppercase font-extrabold text-slate-400 tracking-widest">ID Internal</p>
                            <p class="text-sm font-bold text-slate-700">PRIMA-{{ str_pad($staff->id, 4, '0', STR_PAD_LEFT) }}</p>
                        </div>
                    </div>

                    {{-- Kutipan --}}
                    <div class="mt-8">
                        <p class="text-[10px] uppercase font-extrabold text-slate-400 tracking-widest mb-3">Motto / Kutipan</p>
                        <div class="relative pl-8 italic text-slate-600 font-medium leading-relaxed">
                            <i class="ri-double-quotes-l absolute left-0 top-0 text-orange-200 text-3xl"></i>
                            {{ $staff->kutipan ?? 'Memberikan pelayanan pendidikan terbaik untuk masa depan bangsa.' }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Action Bottom --}}
            <div class="mt-12 pt-8 border-t border-slate-50 flex flex-col md:flex-row gap-3">
                <a href="{{ route('prestasiprima.admin.staff.edit', $staff->id) }}" 
                   class="flex-1 md:flex-none px-8 py-3.5 rounded-2xl bg-amber-500 text-white font-bold text-sm hover:bg-amber-600 transition-all shadow-lg shadow-amber-500/20 text-center">
                   Lakukan Perubahan Data
                </a>
                <a href="{{ route('prestasiprima.admin.staff.index') }}" 
                   class="flex-1 md:flex-none px-8 py-3.5 rounded-2xl bg-slate-50 text-slate-600 font-bold text-sm hover:bg-slate-100 transition-all text-center">
                   Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
