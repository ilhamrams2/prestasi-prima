@extends('prestasiprima.index')

@section('title', 'Karya & Proyek Siswa - SMK Prestasi Prima')

@section('content')
    <section class="min-h-screen bg-gradient-to-b from-white via-gray-50 to-white pt-36 pb-28 relative overflow-hidden">

        {{-- ======== HEADER ======== --}}
        <div class="text-center mb-20 px-6" data-aos="fade-down" data-aos-duration="800">
            <h1 class="text-4xl md:text-5xl font-bold text-[#0e162e] mb-5">
                Karya & <span class="text-orange-600">Proyek Siswa</span>
            </h1>
            <p class="text-gray-600 max-w-3xl mx-auto text-base sm:text-lg leading-relaxed">
                Jelajahi hasil karya, ide, dan inovasi dari siswa <strong>SMK Prestasi Prima</strong> —
                mulai dari desain kreatif, proyek teknologi, hingga game interaktif yang menginspirasi.
            </p>
        </div>

        {{-- ======== GRID PROJECTS ======== --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($projects as $project)
                <div class="group bg-white rounded-3xl shadow-md hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-orange-500/40 relative"
                    data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                    {{-- === Image === --}}
                    <div class="relative overflow-hidden">
                        <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}"
                            class="w-full h-56 sm:h-60 md:h-64 object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out rounded-t-3xl">

                        {{-- === Overlay Gradient === --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>

                        {{-- === Floating Button on Hover === --}}
                        <div
                            class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transform translate-y-3 group-hover:translate-y-0 transition-all duration-500">
                            <a href="{{ $project['link'] }}" target="_blank" rel="noopener noreferrer"
                                class="bg-orange-600 text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-orange-700 shadow-lg">
                                Lihat Detail
                            </a>

                        </div>
                    </div>

                    {{-- === Content === --}}
                    <div class="p-6">
                        <span
                            class="text-xs font-semibold text-orange-600 uppercase tracking-wide">{{ $project['category'] }}</span>
                        <h3
                            class="text-xl md:text-2xl font-semibold text-[#0e162e] mt-3 mb-3 group-hover:text-orange-600 transition-colors duration-300">
                            {{ $project['title'] }}
                        </h3>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-4">
                            {{ Str::limit($project['description'], 100) }}
                        </p>

                        {{-- === Skill Tags === --}}
                        <div class="flex flex-wrap gap-2">
                            @foreach ($project['tags'] as $tag)
                                <span
                                    class="text-xs bg-gray-100 text-gray-700 px-3 py-1 rounded-full hover:bg-orange-600 hover:text-white transition-all duration-300">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    {{-- === Glow Hover Effect === --}}
                    <div
                        class="absolute inset-0 pointer-events-none bg-gradient-to-br from-orange-100/0 via-orange-100/0 to-orange-200/0 group-hover:from-orange-100/30 group-hover:to-orange-200/20 transition-all duration-700 rounded-3xl">
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- FOTO GEDUNG -->
    <section class="relative w-full bg-white overflow-hidden">
        <img alt="Gedung SMK Prestasi Prima"
            class="w-full h-[40vh] sm:h-[55vh] lg:h-screen object-cover object-center hover:scale-[1.02] transition-transform duration-700"
            src="{{ asset('assets/images/gedung/gedung.avif') }}">
    </section>
@endsection