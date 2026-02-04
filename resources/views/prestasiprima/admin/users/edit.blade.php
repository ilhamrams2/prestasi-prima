@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('prestasiprima.admin.users.index') }}" 
           class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all shadow-sm">
            <i class="ri-arrow-left-line text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Perbarui Pengguna</h1>
            <p class="text-sm text-slate-500 font-medium">Ubah informasi akun atau reset kata sandi.</p>
        </div>
    </div>

    {{-- ================= FORM CARD ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <form action="{{ route('prestasiprima.admin.users.update', $user->id) }}" method="POST" class="divide-y divide-slate-50">
            @csrf
            @method('PUT')

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
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                               placeholder="Contoh: Ahmad Subardjo"
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                        @error('name') <p class="text-xs text-red-500 font-bold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
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
                                <option value="{{ $value }}" {{ old('role', $user->role) == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('role') <p class="text-xs text-red-500 font-bold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Status Akun</label>
                        <div class="flex gap-4 p-1.5 bg-slate-50 rounded-2xl border border-slate-200">
                            <label class="flex-1">
                                <input type="radio" name="status" value="active" class="sr-only peer" {{ $user->status === 'active' ? 'checked' : '' }}>
                                <div class="w-full text-center py-2.5 rounded-xl text-xs font-black uppercase tracking-widest cursor-pointer transition-all peer-checked:bg-emerald-500 peer-checked:text-white text-slate-400">
                                    Aktif
                                </div>
                            </label>
                            <label class="flex-1">
                                <input type="radio" name="status" value="inactive" class="sr-only peer" {{ $user->status === 'inactive' ? 'checked' : '' }}>
                                <div class="w-full text-center py-2.5 rounded-xl text-xs font-black uppercase tracking-widest cursor-pointer transition-all peer-checked:bg-red-500 peer-checked:text-white text-slate-400">
                                    Nonaktif
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Password Section --}}
                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <i class="ri-lock-2-line text-orange-500"></i>
                        <h4 class="text-sm font-bold text-slate-800">Ubah Kata Sandi (Opsional)</h4>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-2">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-slate-700 tracking-tight text-[11px] uppercase opacity-70">Sandi Baru</label>
                            <div class="relative group">
                                <input type="password" name="password" id="password"
                                       placeholder="Kosongkan jika tidak diubah"
                                       class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800">
                                <button type="button" onclick="togglePass('password')" class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 pr-1">
                                    <i class="ri-eye-line text-lg" id="icon-password"></i>
                                </button>
                            </div>
                            @error('password') <p class="text-xs text-red-500 font-bold mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-slate-700 tracking-tight text-[11px] uppercase opacity-70">Konfirmasi Sandi Baru</label>
                            <div class="relative group">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       placeholder="Ulangi sandi baru"
                                       class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800">
                                <button type="button" onclick="togglePass('password_confirmation')" class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 pr-1">
                                    <i class="ri-eye-line text-lg" id="icon-password_confirmation"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Activity Info --}}
                <div class="p-6 bg-slate-50 rounded-3xl border border-slate-200 flex flex-col md:flex-row gap-8">
                    <div class="flex-1">
                        <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Statistik Akun</h4>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-500">Dibuat pada</span>
                                <span class="text-xs font-black text-slate-700">{{ $user->created_at->format('d M Y, H:i') }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-500">Terakhir Login</span>
                                <span class="text-xs font-black text-slate-700">{{ $user->last_login_at ? $user->last_login_at->format('d M Y, H:i') : 'Belum pernah' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block w-px bg-slate-200"></div>
                    <div class="flex-1 text-center md:text-left">
                        <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Informasi Izin</h4>
                        <p class="text-xs font-bold text-slate-600 leading-relaxed uppercase tracking-tight">
                            Pengguna ini memiliki akses sebagai <span class="text-orange-600 font-black">{{ $user->role_label }}</span>.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="p-8 bg-slate-50/50 flex flex-col md:flex-row justify-end gap-3">
                <a href="{{ route('prestasiprima.admin.users.index') }}" 
                   class="px-8 py-3.5 rounded-2xl bg-white border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-all text-center">Batal</a>
                <button type="submit" 
                        class="px-8 py-3.5 rounded-2xl bg-[#FF6B00] border border-[#FF6B00] text-white font-bold text-sm hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 active:scale-95">
                    Simpan Perubahan
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
