@extends('layouts.admin')

@section('title', 'Backup & Restore')

@section('content')

{{-- Header Section --}}
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Backup & Database</h1>
            <p class="text-slate-500 mt-1">Amankan data website Anda dengan mencadangkan database secara rutin</p>
        </div>
        <div class="flex items-center gap-3">
            <form action="{{ route('prestasiprima.admin.backup.create') }}" method="POST">
                @csrf
                <button type="submit" class="bg-[#FF6B00] text-white px-8 py-4 rounded-3xl font-extrabold hover:bg-[#e66000] transition-all flex items-center gap-3 shadow-xl shadow-orange-500/30">
                    <i class="ri-database-2-line text-xl"></i> Buat Cadangan Baru
                </button>
            </form>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    {{-- Info Card --}}
    <div class="lg:col-span-1">
        <div class="bg-slate-900 rounded-[48px] p-10 text-white shadow-2xl relative overflow-hidden group">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-[#FF6B00]/20 rounded-full blur-[80px] group-hover:bg-[#FF6B00]/30 transition-all duration-700"></div>
            
            <i class="ri-shield-check-fill text-6xl text-[#FF6B00] mb-8 block"></i>
            <h3 class="text-2xl font-extrabold mb-4 relative z-10">Keamanan Data Utama</h3>
            <p class="text-slate-400 text-sm leading-relaxed mb-10 relative z-10">
                Sangat disarankan untuk melakukan backup database sebelum melakukan perubahan besar pada struktur data atau update sistem.
            </p>

            <div class="space-y-6 relative z-10">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center flex-shrink-0 text-[#FF6B00]">
                        <i class="ri-check-line font-bold"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold">SQL Format</p>
                        <p class="text-xs text-slate-500">Standar ekspor mysql</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center flex-shrink-0 text-[#FF6B00]">
                        <i class="ri-check-line font-bold"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold">Local Storage</p>
                        <p class="text-xs text-slate-500">Tersimpan di server aman</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Backup List --}}
    <div class="lg:col-span-2">
        <div class="bg-white rounded-[48px] shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-10 py-8 border-b border-slate-50 bg-slate-50/30 flex items-center justify-between">
                <h3 class="text-xl font-extrabold text-slate-800 tracking-tight">Daftar File Cadangan</h3>
                <span class="px-4 py-1.5 bg-slate-100 text-slate-500 text-[11px] font-bold rounded-full uppercase tracking-widest">{{ count($backups) }} File</span>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-10 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Nama File</th>
                            <th class="px-10 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Ukuran</th>
                            <th class="px-10 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($backups as $backup)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-10 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-orange-50 rounded-2xl flex items-center justify-center text-[#FF6B00] group-hover:bg-[#FF6B00] group-hover:text-white transition-all duration-300 shadow-sm">
                                        <i class="ri-file-zip-line text-2xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-extrabold text-slate-800 group-hover:text-[#FF6B00] transition-colors">{{ $backup['name'] }}</p>
                                        <p class="text-[11px] text-slate-400 font-medium mt-1">{{ $backup['date'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-6">
                                <span class="px-4 py-1.5 bg-slate-100 text-slate-600 text-xs font-bold rounded-xl border border-slate-200/50">{{ $backup['size'] }}</span>
                            </td>
                            <td class="px-10 py-6">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('prestasiprima.admin.backup.download', $backup['name']) }}" class="w-11 h-11 flex items-center justify-center rounded-2xl bg-white border border-slate-100 text-slate-400 hover:text-[#FF6B00] hover:border-[#FF6B00] transition-all shadow-sm hover:shadow-orange-100 group/btn">
                                        <i class="ri-download-cloud-2-line text-xl group-hover/btn:scale-110 transition-transform"></i>
                                    </a>
                                    <form action="{{ route('prestasiprima.admin.backup.destroy', $backup['name']) }}" method="POST" onsubmit="return confirm('Hapus file backup ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-11 h-11 flex items-center justify-center rounded-2xl bg-white border border-slate-100 text-slate-400 hover:text-red-500 hover:border-red-500 transition-all shadow-sm hover:shadow-red-500/10 group/btn">
                                            <i class="ri-delete-bin-line text-xl group-hover/btn:scale-110 transition-transform"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-10 py-24 text-center">
                                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="ri-database-line text-4xl text-slate-200"></i>
                                </div>
                                <h4 class="text-lg font-bold text-slate-800">Belum ada file cadangan</h4>
                                <p class="text-sm text-slate-400 max-w-xs mx-auto mt-2 italic">Klik tombol "Buat Cadangan Baru" untuk mengamankan data Anda sekarang.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
