@extends('layouts.admin')

@section('title', 'Manajemen Galeri')

@section('content')
<div class="space-y-6">
    {{-- ================= HEADER SECTION ================= --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Koleksi Galeri</h1>
            <p class="text-sm text-slate-500 font-medium">Kelola foto dan video dokumentasi sekolah di sini.</p>
        </div>

        <a href="{{ route('prestasiprima.admin.gallery.create') }}"
           class="inline-flex items-center gap-2 bg-[#FF6B00] hover:bg-[#e66000] text-white px-6 py-3 rounded-2xl font-bold transition-all duration-300 shadow-lg shadow-orange-500/20 active:scale-95">
            <i class="ri-add-circle-line text-lg"></i>
            Tambah Media Baru
        </a>
    </div>


    {{-- ================= GRID GALERI ================= --}}
    @if ($galleries->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach ($galleries as $gallery)
                <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col group">
                    {{-- Thumbnail Container --}}
                    <div class="relative h-56 overflow-hidden bg-slate-100">
                        @php
                            $imageUrl = Str::startsWith($gallery->thumbnail, ['http://','https://']) 
                                ? $gallery->thumbnail 
                                : ($gallery->thumbnail ? asset('storage/' . $gallery->thumbnail) : null);
                        @endphp

                        @if ($imageUrl)
                            <img src="{{ $imageUrl }}" 
                                 alt="{{ $gallery->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-300">
                                <i class="ri-image-line text-4xl mb-2"></i>
                                <span class="text-[10px] font-bold uppercase tracking-widest">No Image</span>
                            </div>
                        @endif

                        {{-- Type Badge --}}
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1.5 text-[10px] font-extrabold uppercase tracking-widest rounded-full bg-white/90 backdrop-blur shadow-sm text-slate-700 border border-white/20">
                                <i class="{{ $gallery->video_url ? 'ri-video-line' : 'ri-camera-3-line' }} mr-1 text-[#FF6B00]"></i>
                                {{ $gallery->video_url ? 'Video' : 'Foto' }}
                            </span>
                        </div>

                        {{-- Hover Actions (Overlay) --}}
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-3">
                            <a href="{{ route('prestasiprima.admin.gallery.edit', $gallery->id) }}" 
                               class="w-12 h-12 flex items-center justify-center rounded-2xl bg-white text-slate-800 hover:bg-[#FF6B00] hover:text-white transition-all duration-300 shadow-xl">
                                <i class="ri-edit-2-line text-xl"></i>
                            </a>
                            <form action="{{ route('prestasiprima.admin.gallery.destroy', $gallery->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirmDelete(event)"
                                        class="w-12 h-12 flex items-center justify-center rounded-2xl bg-white text-red-600 hover:bg-red-600 hover:text-white transition-all duration-300 shadow-xl">
                                    <i class="ri-delete-bin-6-line text-xl"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Content Section --}}
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-[10px] font-bold text-[#FF6B00] bg-orange-50 px-2 py-0.5 rounded uppercase tracking-widest">
                                {{ $gallery->category ?? 'General' }}
                            </span>
                        </div>
                        <h3 class="font-bold text-slate-800 mb-2 line-clamp-2 leading-tight group-hover:text-[#FF6B00] transition-colors">
                            {{ $gallery->title }}
                        </h3>
                        <p class="text-xs text-slate-500 mb-4 line-clamp-2 font-medium leading-relaxed">
                            {{ $gallery->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- ================= PAGINATION ================= --}}
        @if($galleries->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $galleries->links() }}
            </div>
        @endif
    @else
        <div class="bg-white rounded-[2rem] border border-slate-100 p-20 text-center">
            <div class="max-w-xs mx-auto opacity-30">
                <i class="ri-image-2-line text-7xl mb-4 block text-slate-300"></i>
                <h3 class="text-xl font-bold text-slate-800">Galeri Masih Kosong</h3>
                <p class="text-sm font-medium mt-1">Belum ada media foto atau video yang diunggah ke portal ini.</p>
            </div>
        </div>
    @endif
</div>
@endsection
