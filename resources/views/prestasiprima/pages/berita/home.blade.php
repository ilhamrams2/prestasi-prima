@extends('prestasiprima.index')

@section('title', 'Berita Sekolah')

@section('content')
<section class="max-w-7xl mx-auto px-6 lg:px-12 pt-32 pb-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- ========== BERITA UTAMA ========== -->
        <div class="md:col-span-2">
            @if($berita->first())
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $berita->first()->gambar) }}" 
                         alt="{{ $berita->first()->judul }}" 
                         class="w-full h-80 object-cover rounded-lg shadow">
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        {{ Str::limit(strip_tags($berita->first()->isi), 180) }}
                    </p>
                    <a href="{{ route('berita.show', $berita->first()->id) }}" 
                       class="text-orange-600 font-semibold mt-2 inline-block">
                        Read More >>
                    </a>
                </div>
            @endif
        </div>

        <!-- ========== SIDEBAR ========== -->
        <aside class="space-y-6">
            <!-- Search -->
            <div>
                <input type="text" 
                       placeholder="Search" 
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-orange-500">
            </div>

            <!-- Kategori -->
            <div class="space-y-3">
                <h3 class="font-bold text-gray-800">Kategori</h3>
                <ul class="space-y-2 text-orange-600 font-medium">
                    <li><a href="#">Hot News</a></li>
                    <li><a href="#">Pendidikan</a></li>
                    <li><a href="#">Event</a></li>
                    <li><a href="#">Prestasi</a></li>
                    <li><a href="#">Olahraga</a></li>
                </ul>
            </div>
        </aside>
    </div>

    <!-- ========== BERITA POPULER ========== -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b-2 border-orange-600 inline-block">
            Populer
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($berita->skip(1)->take(3) as $item)
                <div class="bg-white rounded-lg shadow hover:shadow-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $item->gambar) }}" 
                         alt="{{ $item->judul }}" 
                         class="w-full h-40 object-cover">
                    <div class="p-4">
                        <p class="text-sm text-orange-600 font-bold mb-2">
                            {{ $item->kategori ?? 'Pendidikan' }}
                        </p>
                        <h3 class="font-semibold text-gray-800">
                            {{ $item->judul }}
                        </h3>
                        <p class="text-xs text-gray-500">
                            {{ $item->created_at->format('d F Y') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- ========== GLOBAL NEWS & RECOMMENDED ========== -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
        <!-- Global News -->
        <div class="md:col-span-2">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b-2 border-orange-600 inline-block">
                Global News
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($berita->skip(4)->take(4) as $item)
                    <div class="flex items-start gap-4">
                        <img src="{{ asset('storage/' . $item->gambar) }}" 
                             alt="{{ $item->judul }}" 
                             class="w-28 h-20 object-cover rounded">
                        <div>
                            <h4 class="font-semibold text-gray-800 text-sm">
                                {{ $item->judul }}
                            </h4>
                            <p class="text-xs text-gray-500">
                                {{ $item->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Recommended -->
        <aside>
            <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b-2 border-orange-600 inline-block">
                Recommended
            </h2>
            <div class="space-y-4">
                @foreach($berita->skip(8)->take(4) as $item)
                    <div class="flex items-start gap-3">
                        <img src="{{ asset('storage/' . $item->gambar) }}" 
                             alt="{{ $item->judul }}" 
                             class="w-16 h-12 object-cover rounded">
                        <div>
                            <h4 class="font-medium text-gray-800 text-sm">
                                {{ $item->judul }}
                            </h4>
                            <p class="text-xs text-gray-500">
                                {{ $item->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </aside>
    </div>
</section>
@endsection
