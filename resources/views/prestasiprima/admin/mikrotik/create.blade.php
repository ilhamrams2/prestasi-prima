@extends('layouts.admin')

@section('title', 'Tambah Trainer MikroTik')

@section('content')
<div class="max-w-5xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('prestasiprima.admin.mikrotik.index') }}" 
           class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all">
            <iconify-icon icon="lucide:arrow-left" class="text-xl"></iconify-icon>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Tambah Trainer MikroTik</h1>
            <p class="text-sm text-slate-500 font-medium">Input data instruktur ahli untuk MikroTik Academy SMK Prestasi Prima.</p>
        </div>
    </div>

    {{-- ================= FORM CARD ================= --}}
    <form action="{{ route('prestasiprima.admin.mikrotik.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        {{-- Section 1: Trainer Profile --}}
        <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-8 border-b border-slate-50">
                <h3 class="text-lg font-bold text-slate-800 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-orange-50 text-[#E65100] flex items-center justify-center">01</span>
                    Profil Instruktur
                </h3>
            </div>
            
            <div class="p-8 space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Achmad Maulana"
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all font-medium text-slate-800" required>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700">Gelar / Pendidikan</label>
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: S.Kom., M.T."
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all font-medium text-slate-800" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700">Peran / Jabatan Khusus</label>
                    <input type="text" name="role" value="{{ old('role') }}" placeholder="Contoh: Certified Pro Instructor"
                           class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all font-medium text-slate-800" required>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700">Deskripsi Singkat / Slogan</label>
                    <textarea name="description" rows="3" placeholder="Contoh: Membimbing generasi muda menguasai Network Engineering Internasional."
                              class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all font-medium text-slate-800" required>{{ old('description') }}</textarea>
                </div>

                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700">Foto Profil Trainer</label>
                    <div class="p-6 bg-slate-50 border-2 border-dashed border-slate-200 rounded-3xl hover:border-orange-400 transition-colors">
                        <input type="file" name="photo" class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#E65100] file:text-white hover:file:bg-[#BF4300]" required>
                    </div>
                </div>
            </div>
        </div>

        {{-- Section 2: Certificates --}}
        <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                <h3 class="text-lg font-bold text-slate-800 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-orange-50 text-[#E65100] flex items-center justify-center">02</span>
                    Daftar Sertifikat
                </h3>
                <button type="button" onclick="addCertificate()" 
                        class="px-4 py-2 bg-slate-800 hover:bg-black text-white rounded-xl text-xs font-bold transition-all flex items-center gap-2">
                    <iconify-icon icon="lucide:plus" class="text-base"></iconify-icon>
                    Tambah Sertifikat
                </button>
            </div>

            <div class="p-8">
                <div id="certificate-list" class="space-y-6">
                    {{-- Rows will be injected by JS --}}
                </div>

                <div id="empty-state" class="py-12 text-center">
                    <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center mx-auto mb-4 text-slate-300">
                        <iconify-icon icon="ri:medal-line" class="text-3xl"></iconify-icon>
                    </div>
                    <p class="text-sm font-bold text-slate-400 italic">Belum ada sertifikat ditambahkan.</p>
                    <button type="button" onclick="addCertificate()" class="mt-4 text-[#E65100] text-xs font-black uppercase tracking-widest hover:underline">Klik untuk menambah</button>
                </div>
            </div>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end gap-3 pb-20">
            <a href="{{ route('prestasiprima.admin.mikrotik.index') }}" 
               class="px-8 py-4 bg-white border border-slate-200 text-slate-600 font-bold rounded-2xl hover:bg-slate-50 transition-all">Batal</a>
            <button type="submit" 
                    class="px-8 py-4 bg-[#E65100] text-white font-bold rounded-2xl shadow-xl shadow-orange-500/20 hover:bg-[#BF4300] transition-all">
                Simpan Data Trainer
            </button>
        </div>
    </form>
</div>

<template id="cert-template">
    <div class="cert-item p-6 bg-slate-50 border border-slate-100 rounded-3xl relative group">
        <button type="button" onclick="this.closest('.cert-item').remove(); checkEmpty();" 
                class="absolute -top-3 -right-3 w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center shadow-lg transform hover:scale-110 transition-all z-10">
            <iconify-icon icon="lucide:x" class="text-base"></iconify-icon>
        </button>
        
        <div class="grid md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div class="space-y-1">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Judul Sertifikat</label>
                    <input type="text" name="certificates[]" placeholder="Contoh: MTCNA Certified"
                           class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all font-bold text-slate-800" required>
                </div>
                <div class="space-y-1">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Verify ID (Opsional)</label>
                    <input type="text" name="certificates_verify[]" placeholder="Contoh: PP-MTCNA-2024"
                           class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all font-bold text-slate-800">
                </div>
            </div>
            <div class="space-y-4">
                <div class="space-y-1">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Upload Bukti Sertifikat</label>
                    <div class="relative bg-white border border-slate-200 rounded-xl p-3 h-[92px] flex items-center justify-center">
                        <input type="file" name="certificates_image[]" class="block w-full text-xs text-slate-500 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-[10px] file:font-black file:bg-gray-100 file:text-gray-600 hover:file:bg-orange-50 hover:file:text-orange-600" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    let certCount = 0;

    function addCertificate() {
        const list = document.getElementById('certificate-list');
        const empty = document.getElementById('empty-state');
        const template = document.getElementById('cert-template').content.cloneNode(true);
        
        // Fix names for backend array handling
        template.querySelector('input[name="certificates[]"]').name = `certificates[${certCount}][title]`;
        template.querySelector('input[name="certificates_verify[]"]').name = `certificates[${certCount}][verify_id]`;
        template.querySelector('input[name="certificates_image[]"]').name = `certificates[${certCount}][image]`;
        
        list.appendChild(template);
        certCount++;
        checkEmpty();
    }

    function checkEmpty() {
        const list = document.getElementById('certificate-list');
        const empty = document.getElementById('empty-state');
        if (list.children.length > 0) {
            empty.classList.add('hidden');
        } else {
            empty.classList.remove('hidden');
        }
    }

    // Add first item by default
    document.addEventListener('DOMContentLoaded', () => {
        // addCertificate();
    });
</script>
@endsection
