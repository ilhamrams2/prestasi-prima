@extends('layouts.admin')

@section('title', 'Ganti Password')

@section('content')
<div class="max-w-xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('prestasiprima.admin.dashboard') }}" 
           class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all">
            <i class="ri-arrow-left-line text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Ganti Password</h1>
            <p class="text-sm text-slate-500 font-medium">Amankan akun Anda dengan password yang kuat.</p>
        </div>
    </div>

    {{-- ================= FORM CARD ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <form action="{{ route('prestasiprima.admin.password.update') }}" method="POST" class="divide-y divide-slate-50">
            @csrf
            @method('PUT')

            <div class="p-8 space-y-6">
                {{-- Password Lama --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Password Lama</label>
                    <div class="relative group">
                        <input type="password" name="current_password" 
                               placeholder="Masukkan password saat ini"
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 pl-12 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                        <i class="ri-lock-unlock-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl transition-colors group-focus-within:text-[#FF6B00]"></i>
                    </div>
                    @error('current_password') <span class="text-xs text-red-500 font-bold ml-1">{{ $message }}</span> @enderror
                </div>

                <div class="pt-2"></div> {{-- Spacer --}}

                {{-- Password Baru --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Password Baru</label>
                    <div class="relative group">
                        <input type="password" name="new_password" 
                               placeholder="Minimal 8 karakter"
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 pl-12 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                        <i class="ri-key-2-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl transition-colors group-focus-within:text-[#FF6B00]"></i>
                    </div>
                    @error('new_password') <span class="text-xs text-red-500 font-bold ml-1">{{ $message }}</span> @enderror
                </div>

                {{-- Konfirmasi Password Baru --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Konfirmasi Password Baru</label>
                    <div class="relative group">
                        <input type="password" name="new_password_confirmation" 
                               placeholder="Ulangi password baru"
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 pl-12 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                        <i class="ri-checkbox-circle-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl transition-colors group-focus-within:text-[#FF6B00]"></i>
                    </div>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="p-8 bg-slate-50/50 flex flex-col md:flex-row justify-end gap-3">
                <a href="{{ route('prestasiprima.admin.dashboard') }}" 
                   class="px-8 py-3.5 rounded-2xl bg-white border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-all text-center">Batal</a>
                <button type="submit" 
                        class="px-8 py-3.5 rounded-2xl bg-[#FF6B00] border border-[#FF6B00] text-white font-bold text-sm hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 active:scale-95 flex items-center justify-center gap-2">
                    <i class="ri-save-3-line text-lg"></i>
                    Simpan Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
