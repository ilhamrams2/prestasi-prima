@extends('layouts.admin')

@section('title', 'Manajemen Staff')

@section('content')
<div class="space-y-6">
    {{-- ================= HEADER SECTION ================= --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Data Staff & Guru</h1>
            <p class="text-sm text-slate-500 font-medium">Kelola informasi tenaga pendidik dan kependidikan di sini.</p>
        </div>

        <a href="{{ route('prestasiprima.admin.staff.create') }}"
           class="inline-flex items-center gap-2 bg-[#FF6B00] hover:bg-[#e66000] text-white px-6 py-3 rounded-2xl font-bold transition-all duration-300 shadow-lg shadow-orange-500/20 active:scale-95">
            <i class="ri-user-add-line text-lg"></i>
            Tambah Staff Baru
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
                        <th class="px-8 py-5">Potret</th>
                        <th class="px-5 py-5">Nama Lengkap</th>
                        <th class="px-5 py-5">Jabatan / Peran</th>
                        <th class="px-5 py-5">Kategori</th>
                        <th class="px-8 py-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($staffs as $staff)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-8 py-5">
                                <div class="relative w-14 h-18 group/img">
                                    @if($staff->foto)
                                        <img src="{{ asset('storage/staff/' . $staff->foto) }}" alt="{{ $staff->nama }}" 
                                             class="w-full h-20 object-cover rounded-2xl shadow-sm border-2 border-white group-hover:scale-110 transition-transform duration-300">
                                    @else
                                        <div class="w-14 h-20 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-300 border-2 border-white">
                                            <i class="ri-user-line text-2xl"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <td class="px-5 py-5">
                                <p class="font-bold text-slate-800 group-hover:text-[#FF6B00] transition-colors leading-snug">
                                    {{ $staff->nama }}
                                </p>
                            </td>

                            <td class="px-5 py-5">
                                <span class="text-slate-500 font-medium text-xs">{{ $staff->jabatan }}</span>
                            </td>

                            <td class="px-5 py-5">
                                <span class="px-3 py-1 text-[10px] font-extrabold uppercase tracking-widest rounded-lg {{ $staff->kategori == 'tendik' ? 'bg-orange-50 text-[#FF6B00]' : 'bg-slate-100 text-slate-500' }}">
                                    {{ ucfirst($staff->kategori) }}
                                </span>
                            </td>

                            <td class="px-8 py-5 text-right whitespace-nowrap">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('prestasiprima.admin.staff.show', $staff->id) }}"
                                       class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-600 hover:bg-orange-50 hover:text-[#FF6B00] transition-all duration-300 shadow-sm border border-slate-100 hover:border-orange-200"
                                       title="Detail">
                                        <i class="ri-eye-line text-lg"></i>
                                    </a>
                                    <a href="{{ route('prestasiprima.admin.staff.edit', $staff->id) }}"
                                       class="w-10 h-10 flex items-center justify-center rounded-xl bg-orange-50 text-[#FF6B00] hover:bg-[#FF6B00] hover:text-white transition-all duration-300 shadow-sm border border-orange-100"
                                       title="Edit">
                                        <i class="ri-edit-2-line text-lg"></i>
                                    </a>

                                    <form action="{{ route('prestasiprima.admin.staff.destroy', $staff->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirmDelete(event)"
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
                                    <i class="ri-group-line text-6xl mb-4"></i>
                                    <p class="text-sm font-bold italic">Belum ada data staff yang tersedia.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ================= PAGINATION ================= --}}
        @if($staffs->hasPages())
            <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
                {{ $staffs->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
