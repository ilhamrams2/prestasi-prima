@extends('prestasiprima.index')

@section('title', 'Galeri Kegiatan Sekolah')

@section('content')
<section 
    class="max-w-7xl mx-auto px-6 lg:px-12 py-16 mt-24"
    x-data="{
        category: 'ALL',
        visible: 3,
        total: {{ count($galeris) }},
        showAll() { this.visible = this.total }
    }"
>
    <!-- Judul -->
    <div class="text-center mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-blue-900 mb-3">
            Dokumentasi Kegiatan Sekolah
        </h1>
        <p class="text-gray-600">
            Lihat serunya aktivitas dan prestasi siswa kami dalam berbagai kegiatan sekolah
        </p>
    </div>

    <!-- Video Utama -->
    <div class="mb-10 flex justify-center">
        <div class="relative w-full md:w-3/4 lg:w-2/3 overflow-hidden rounded-2xl shadow-lg">
            @if ($galeris->isNotEmpty() && $galeris->first()->embed_url)
                <iframe 
                    class="w-full aspect-video rounded-2xl"
                    src="{{ $galeris->first()->embed_url }}"
                    title="{{ $galeris->first()->title }}"
                    frameborder="0"
                    allowfullscreen
                    loading="lazy">
                </iframe>
            @else
                <div class="w-full aspect-video flex items-center justify-center bg-gray-100 text-gray-500 rounded-2xl">
                    Tidak ada video tersedia
                </div>
            @endif
        </div>
    </div>

    <!-- Filter Kategori -->
    <div class="flex flex-wrap justify-center gap-2 md:gap-3 mb-10">
        <!-- Tombol ALL -->
        <button
            @click="category='ALL'; visible=3"
            :class="category==='ALL' ? 'bg-orange-600' : 'bg-orange-500 hover:bg-orange-600'"
            class="px-4 py-2 text-sm text-white rounded-full flex items-center gap-2 transition hover:scale-105"
        >
            <i class="fas fa-list"></i> ALL
        </button>

        <!-- Tombol Kategori -->
        @foreach ($categories as $cat)
            <button
                @click="category='{{ $cat->id }}'; visible=3"
                :class="category==='{{ $cat->id }}' ? 'bg-orange-600' : 'bg-orange-500 hover:bg-orange-600'"
                class="px-4 py-2 text-sm text-white rounded-full flex items-center gap-2 transition hover:scale-105"
            >
                <i class="fas fa-{{ $cat->icon }}"></i> {{ $cat->name }}
            </button>
        @endforeach
    </div>

    <!-- Grid Galeri -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($galeris as $i => $galeri)
            <template x-if="(category==='ALL' || category==='{{ $galeri->category_id }}') && {{ $i }} < visible">
                <div
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 scale-75 translate-y-4"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="opacity-0 scale-75 translate-y-4"
                    class="bg-white overflow-hidden rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2 hover:scale-[1.02]"
                >
                    <iframe 
                        class="w-full aspect-video rounded-t-xl"
                        src="{{ $galeri->embed_url }}"
                        title="{{ $galeri->title }}"
                        frameborder="0"
                        allowfullscreen
                        loading="lazy">
                    </iframe>
                    <p class="p-2 text-center text-xs md:text-sm font-medium text-gray-700">
                        {{ $galeri->title }}
                    </p>
                </div>
            </template>
        @endforeach
    </div>

    <!-- Tombol Lihat Semua -->
    <div class="mt-10 text-center">
        <button
            @click="showAll()"
            x-show="visible < total"
            x-transition.opacity
            class="px-6 py-3 font-semibold text-white bg-orange-500 hover:bg-orange-600 rounded-xl shadow-lg transition hover:scale-105"
        >
            Lihat Semua Video
        </button>

        <button
            x-show="visible >= total"
            x-transition.opacity
            disabled
            class="px-6 py-3 font-semibold text-white bg-gray-400 rounded-xl shadow-lg cursor-not-allowed"
        >
            Semua Video Sudah Ditampilkan
        </button>
    </div>
</section>

<!-- Alpine.js -->
<script src="//unpkg.com/alpinejs" defer></script>
@endsection
