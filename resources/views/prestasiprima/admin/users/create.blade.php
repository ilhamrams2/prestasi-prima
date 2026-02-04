@extends('layouts.admin')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('prestasiprima.admin.users.index') }}" 
           class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all shadow-sm">
            <i class="ri-arrow-left-line text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Tambah Pengguna Baru</h1>
            <p class="text-sm text-slate-500 font-medium">Buat kredensial admin dan tentukan perannya.</p>
        </div>
    </div>

    {{-- ================= FORM CARD ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <form action="{{ route('prestasiprima.admin.users.store') }}" method="POST" class="divide-y divide-slate-50">
            @csrf
            
            @if (session('error'))
                <div class="p-6 bg-red-50 border-b border-red-100">
                    <div class="flex gap-3 text-red-700">
                        <i class="ri-error-warning-fill text-xl"></i>
                        <p class="text-sm font-bold">{{ session('error') }}</p>
                    </div>
                </div>
            @endif
            @if ($errors->any())
                <div class="p-6 bg-red-50 border-b border-red-100">
                    <div class="flex gap-3">
                        <i class="ri-error-warning-fill text-red-500 text-xl flex-shrink-0"></i>
                        <div>
                            <h4 class="text-sm font-black text-red-800 uppercase tracking-widest mb-2">Terjadi Kesalahan!</h4>
                            <ul class="space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li class="text-xs text-red-700 font-bold">• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="p-8 space-y-8">
                {{-- Data Pribadi --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               placeholder="Contoh: Ahmad Subardjo"
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                        @error('name') <p class="text-xs text-red-500 font-bold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               placeholder="contoh@smkprestasiprima.sch.id"
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                        @error('email') <p class="text-xs text-red-500 font-bold mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Role & Status --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Peran (Role)</label>
                        <select name="role" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800 cursor-pointer appearance-none">
                            @foreach($roles as $value => $label)
                                <option value="{{ $value }}" {{ old('role') == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('role') <p class="text-xs text-red-500 font-bold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Status Akun</label>
                        <div class="flex gap-4 p-1.5 bg-slate-50 rounded-2xl border border-slate-200">
                            <label class="flex-1">
                                <input type="radio" name="status" value="active" class="sr-only peer" checked>
                                <div class="w-full text-center py-2.5 rounded-xl text-xs font-black uppercase tracking-widest cursor-pointer transition-all peer-checked:bg-emerald-500 peer-checked:text-white text-slate-400">
                                    Aktif
                                </div>
                            </label>
                            <label class="flex-1">
                                <input type="radio" name="status" value="inactive" class="sr-only peer">
                                <div class="w-full text-center py-2.5 rounded-xl text-xs font-black uppercase tracking-widest cursor-pointer transition-all peer-checked:bg-red-500 peer-checked:text-white text-slate-400">
                                    Nonaktif
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Password Section --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Kata Sandi</label>
                        <div class="relative group">
                            <input type="password" name="password" id="password"
                                   placeholder="Minimal 8 karakter"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                            <button type="button" onclick="togglePass('password')" class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 pr-1">
                                <i class="ri-eye-line text-lg" id="icon-password"></i>
                            </button>
                        </div>
                        @error('password') <p class="text-xs text-red-500 font-bold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Konfirmasi Kata Sandi</label>
                        <div class="relative group">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   placeholder="Ulangi kata sandi"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                            <button type="button" onclick="togglePass('password_confirmation')" class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 pr-1">
                                <i class="ri-eye-line text-lg" id="icon-password_confirmation"></i>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Permissions Info --}}
                <div class="p-6 bg-orange-50 rounded-3xl border border-orange-100 flex gap-4">
                    <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center text-orange-600 flex-shrink-0">
                        <i class="ri-information-line text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-black text-orange-800 uppercase tracking-widest mb-1">Informasi Peran</h4>
                        <ul class="text-[11px] text-orange-700/80 font-bold space-y-1 uppercase tracking-tight">
                            <li>• Super Admin: Akses penuh fitur & manajemen pengguna</li>
                            <li>• Editor: Manajemen konten (Berita, Galeri, dll)</li>
                            <li>• Moderator: Persetujuan konten & manajemen inbox</li>
                            <li>• Viewer: Hanya baca data dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="p-8 bg-slate-50/50 flex flex-col md:flex-row justify-end gap-3">
                <a href="{{ route('prestasiprima.admin.users.index') }}" 
                   class="px-8 py-3.5 rounded-2xl bg-white border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-all text-center">Batal</a>
                <button type="submit" 
                        class="px-8 py-3.5 rounded-2xl bg-[#FF6B00] border border-[#FF6B00] text-white font-bold text-sm hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 active:scale-95">
                    Buat Pengguna
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePass(id) {
        const input = document.getElementById(id);
        const icon = document.getElementById('icon-' + id);
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('ri-eye-line', 'ri-eye-off-line');
        } else {
            input.type = 'password';
            icon.classList.replace('ri-eye-off-line', 'ri-eye-line');
        }
    }
</script>
@endsection
