@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')

@section('content')
<div class="space-y-6">
    {{-- ================= HEADER SECTION ================= --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Manajemen Pengguna</h1>
            <p class="text-sm text-slate-500 font-medium">Kelola akses admin dan peran pengguna sistem.</p>
        </div>

        <a href="{{ route('prestasiprima.admin.users.create') }}"
           class="inline-flex items-center gap-2 bg-[#FF6B00] hover:bg-[#e66000] text-white px-6 py-3 rounded-2xl font-bold transition-all duration-300 shadow-lg shadow-orange-500/20 active:scale-95">
            <i class="ri-user-add-line text-lg"></i>
            Tambah Pengguna
        </a>
    </div>

    {{-- ================= FLASH MESSAGE ================= --}}
    @if (session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-100 rounded-2xl flex items-center gap-3 text-emerald-700 animate-fade-in-down">
            <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white flex-shrink-0">
                <i class="ri-check-line text-lg font-bold"></i>
            </div>
            <p class="text-sm font-bold">{{ session('success') }}</p>
        </div>
    @endif
    
    @if (session('error'))
        <div class="p-4 bg-red-50 border border-red-100 rounded-2xl flex items-center gap-3 text-red-700 animate-fade-in-down">
            <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center text-white flex-shrink-0">
                <i class="ri-error-warning-line text-lg font-bold"></i>
            </div>
            <p class="text-sm font-bold">{{ session('error') }}</p>
        </div>
    @endif

    {{-- ================= TABLE CONTAINER ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-slate-500 uppercase text-[11px] font-bold tracking-widest">
                        <th class="px-8 py-5">Pengguna</th>
                        <th class="px-5 py-5">Role</th>
                        <th class="px-5 py-5">Status</th>
                        <th class="px-5 py-5">Terakhir Login</th>
                        <th class="px-8 py-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($users as $user)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold uppercase">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800">{{ $user->name }}</p>
                                        <p class="text-[10px] text-slate-400 font-medium">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-5 py-5">
                                @php
                                    $roleColor = match($user->role) {
                                        'super_admin' => 'bg-purple-50 text-purple-600 border-purple-100',
                                        'editor' => 'bg-blue-50 text-blue-600 border-blue-100',
                                        'moderator' => 'bg-amber-50 text-amber-600 border-amber-100',
                                        default => 'bg-slate-50 text-slate-600 border-slate-100',
                                    };
                                @endphp
                                <span class="px-3 py-1 rounded-lg border {{ $roleColor }} text-[10px] font-black uppercase tracking-wider">
                                    {{ $user->role_label }}
                                </span>
                            </td>

                            <td class="px-5 py-5">
                                @if($user->status === 'active')
                                    <span class="flex items-center gap-1.5 text-emerald-600 font-bold text-[10px] uppercase">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span class="flex items-center gap-1.5 text-slate-400 font-bold text-[10px] uppercase">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-5 py-5 text-slate-400 font-medium">
                                @if($user->last_login_at)
                                    <div class="text-[10px] leading-tight">
                                        <p>{{ $user->last_login_at->format('d/m/Y') }}</p>
                                        <p>{{ $user->last_login_at->format('H:i') }} ({{ $user->last_login_ip }})</p>
                                    </div>
                                @else
                                    <span class="text-[10px] italic">Belum pernah</span>
                                @endif
                            </td>

                            <td class="px-8 py-5 text-right whitespace-nowrap">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('prestasiprima.admin.users.edit', $user->id) }}"
                                       class="w-9 h-9 flex items-center justify-center rounded-xl bg-slate-50 text-slate-500 hover:bg-orange-50 hover:text-[#FF6B00] transition-all"
                                       title="Edit">
                                        <i class="ri-edit-2-line"></i>
                                    </a>

                                    @if($user->id !== auth('authPP')->id())
                                        <form action="{{ route('prestasiprima.admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirmDelete(event)"
                                                    class="w-9 h-9 flex items-center justify-center rounded-xl bg-slate-50 text-slate-500 hover:bg-red-50 hover:text-red-600 transition-all">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-16 text-center">
                                <div class="flex flex-col items-center justify-center opacity-40">
                                    <i class="ri-user-line text-6xl mb-4"></i>
                                    <p class="text-sm font-bold italic">Tidak ada pengguna ditemukan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
