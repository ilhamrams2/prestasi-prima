@extends('layouts.admin')

@section('title', 'Manajemen Ekstrakurikuler')

@section('content')
<div class="max-w-7xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Ekstrakurikuler</h1>
            <p class="text-sm text-slate-500 font-medium">Kelola daftar kegiatan pengembangan diri siswa di luar jam pelajaran.</p>
        </div>
        <a href="{{ route('prestasiprima.admin.ekstrakurikuler.create') }}" 
           class="inline-flex items-center gap-2 bg-[#FF6B00] hover:bg-[#e66000] text-white px-6 py-3.5 rounded-2xl font-bold text-sm transition-all shadow-lg shadow-orange-200 active:scale-95">
            <i class="ri-add-line text-lg"></i>
            Tambah Ekskul
        </a>
    </div>


    {{-- ================= CONTENT GRID ================= --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse ($ekskuls as $item)
            <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-orange-500/5 transition-all duration-300 group overflow-hidden flex flex-col">
                {{-- Visual --}}
                <div class="relative h-48 overflow-hidden">
                    @if($item->gambar)
                        <img src="{{ asset('assets/images/ekskul/' . $item->gambar) }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                            <i class="ri-image-line text-5xl transition-transform group-hover:scale-110 duration-500"></i>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="absolute bottom-4 left-4 right-4 translate-y-4 group-hover:translate-y-0 transition-transform flex items-center gap-2 opacity-0 group-hover:opacity-100">
                        <a href="{{ route('prestasiprima.admin.ekstrakurikuler.edit', $item->id) }}" 
                           class="flex-1 bg-white/20 backdrop-blur-md hover:bg-white text-white hover:text-[#FF6B00] py-2 rounded-xl text-xs font-bold text-center transition-all">
                           Edit
                        </a>
                        <form action="{{ route('prestasiprima.admin.ekstrakurikuler.destroy', $item->id) }}" method="POST" class="flex-1">
                            @csrf @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirmDelete(event)"
                                    class="w-full bg-red-500/80 backdrop-blur-md hover:bg-red-600 text-white py-2 rounded-xl text-xs font-bold text-center transition-all">
                               Hapus
                            </button>
                        </form>
                    </div>
                </div>

                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="font-bold text-slate-800 text-lg mb-2 tracking-tight group-hover:text-[#FF6B00] transition-colors">
                        {{ $item->nama }}
                    </h3>
                    <p class="text-xs text-slate-500 font-medium leading-relaxed line-clamp-3 mb-4">
                        {{ $item->deskripsi ?? 'Belum ada deskripsi untuk kegiatan ini.' }}
                    </p>
                    <div class="mt-auto pt-4 border-t border-slate-50 flex items-center justify-between">
                        <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest flex items-center gap-1.5">
                            <i class="ri-time-line"></i> {{ $item->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 text-center bg-white rounded-[32px] border border-slate-100 border-dashed">
                <div class="flex flex-col items-center justify-center opacity-30">
                    <i class="ri-group-line text-6xl mb-4 text-slate-400"></i>
                    <p class="text-sm font-bold italic text-slate-500 tracking-widest uppercase">Belum ada data ekstrakurikuler.</p>
                </div>
            </div>
        @endforelse
    </div>

    {{-- ================= PAGINATION ================= --}}
    <div class="mt-10">
        {{ $ekskuls->links() }}
    </div>
</div>
@endsection
