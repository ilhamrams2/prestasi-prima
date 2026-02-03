@extends('layouts.admin')

@section('title', 'Tambah Staff')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('prestasiprima.admin.staff.index') }}" 
           class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all">
            <i class="ri-arrow-left-line text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Tambah Staff Baru</h1>
            <p class="text-sm text-slate-500 font-medium">Lengkapi data tenaga pendidik atau kependidikan untuk profil sekolah.</p>
        </div>
    </div>

    {{-- ================= FORM CARD ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <form action="{{ route('prestasiprima.admin.staff.store') }}" method="POST" enctype="multipart/form-data" class="divide-y divide-slate-50">
            @csrf

            <div class="p-8 space-y-8">
                {{-- Nama & Jabatan Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Nama Lengkap</label>
                        <input type="text" name="nama" 
                               placeholder="Contoh: Budi Santoso, S.Pd."
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Jabatan / Peran</label>
                        <input type="text" name="jabatan" 
                               placeholder="Contoh: Wakasek Kesiswaan"
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                    </div>
                </div>

                {{-- Kategori --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Kategori Staff</label>
                    <div class="relative">
                        <select name="kategori" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800 appearance-none" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="kepala">Kepala Sekolah</option>
                            <option value="kaprog">Kaprog (Kepala Program)</option>
                            <option value="kesiswaan">Kesiswaan</option>
                            <option value="guru_mapel">Guru Mata Pelajaran</option>
                            <option value="tendik">Tenaga Kependidikan</option>
                        </select>
                        <i class="ri-arrow-down-s-line absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-xl"></i>
                    </div>
                </div>

                {{-- Portrait Upload --}}
                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Potret Profil</label>
                    <div class="flex flex-col md:flex-row items-center gap-6 p-6 bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2rem] hover:border-orange-400 transition-colors group">
                        <div class="w-24 h-32 bg-white rounded-2xl flex-shrink-0 flex items-center justify-center shadow-sm overflow-hidden border border-slate-100 flex-col gap-1 relative">
                            {{-- Icon Removed --}}
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h4 class="text-sm font-bold text-slate-800 mb-1">Upload Pas Foto</h4>
                            <p class="text-xs text-slate-500 font-medium mb-4 leading-relaxed">Disarankan rasio 3:4 atau 4:5.<br>Format: JPG, PNG, WEBP (Maks. 1MB).</p>
                            <input type="file" name="foto" required
                                   class="block w-full text-[11px] text-slate-500 file:mr-4 file:py-2.5 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#FF6B00] file:text-white hover:file:bg-[#e66000] transition-all cursor-pointer">
                        </div>
                    </div>
                </div>

                {{-- Kutipan --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Kutipan / Motto (Opsional)</label>
                    <textarea name="kutipan" rows="3" 
                              placeholder="Tuliskan kata mutiara atau motto dari staff..."
                              class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800"></textarea>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="p-8 bg-slate-50/50 flex flex-col md:flex-row justify-end gap-3">
                <a href="{{ route('prestasiprima.admin.staff.index') }}" 
                   class="px-8 py-3.5 rounded-2xl bg-white border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-all text-center text-decoration-none">Batal</a>
                <button type="submit" 
                        class="px-8 py-3.5 rounded-2xl bg-[#FF6B00] border border-orange-600 text-white font-bold text-sm hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 active:scale-95">
                    Simpan Data Staff
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
