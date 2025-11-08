{{-- resources/views/prestasiprima/pages/profile-sekolah.blade.php --}}
@extends('prestasiprima.index')

@section('title', 'Profil Sekolah')

@section('content')

@php
    $resolveLocalThumbnail = function (?string $videoId, ?string $fallback = null) {
        $candidates = [];

        if ($videoId) {
            $candidates[] = "assets/images/video-thumbnails/{$videoId}.webp";
            $candidates[] = "assets/images/video-thumbnails/{$videoId}.jpg";
            $candidates[] = "assets/images/video-thumbnails/{$videoId}.png";
        }

        if ($fallback && !\Illuminate\Support\Str::startsWith($fallback, ['http://', 'https://'])) {
            $candidates[] = ltrim($fallback, '/');
        }

        foreach ($candidates as $candidate) {
            if (file_exists(public_path($candidate))) {
                return $candidate;
            }
        }

        return null;
    };
@endphp

<!-- ====================== HERO SECTION ====================== -->
<section class="relative bg-gradient-to-br from-orange-500 via-orange-400 to-yellow-300 text-white pt-36 pb-28 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('assets/images/gedung/gedungsiswa.avif') }}" alt="SMK Prestasi Prima"
             class="w-full h-full object-cover opacity-30" loading="lazy" decoding="async">
        <!-- Overlay Orange -->
        <div class="absolute inset-0 bg-orange-500/30 mix-blend-multiply"></div>
    </div>

    <!-- Konten -->
    <div class="relative z-10 text-center max-w-3xl mx-auto px-4" data-aos="fade-down" data-aos-duration="800">
        <img src="{{ asset('assets/images/logo-smk.png') }}" alt="Logo SMK Prestasi Prima"
             class="w-24 h-24 mx-auto mb-5 animate-fade-in" loading="lazy">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 drop-shadow-md">
            SMK <span class="text-white">Prestasi Prima</span>
        </h1>
        <p class="text-white/90 text-lg leading-relaxed italic">
            "If better is possible, good is not enough"
        </p>
    </div>
</section>


<!-- ====================== SEJARAH SEKOLAH ====================== -->
<section class="relative py-24 bg-gradient-to-b from-orange-50 via-white to-orange-100 text-gray-800 overflow-hidden">
    {{-- Dekoratif --}}
    <div class="absolute top-0 left-0 w-64 h-64 bg-orange-200/40 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-orange-300/30 rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>

    <div class="max-w-7xl mx-auto relative px-6">
        {{-- Judul --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-extrabold mb-4 text-gray-900">
                <span class="text-orange-600">Sejarah</span> Sekolah
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                Perjalanan panjang SMK Prestasi Prima dalam membangun pendidikan vokasi unggul yang adaptif terhadap perkembangan zaman.
            </p>
        </div>

        @php
        $timeline = [
            ['year' => '2011', 'title' => 'Pendirian Awal', 'desc' => 'SMK Prestasi Prima resmi didirikan di Cipayung, Jakarta Timur, dengan semangat mencetak lulusan unggul dan berkarakter.'],
            ['year' => '2013', 'title' => 'Standarisasi Kurikulum', 'desc' => 'Peningkatan kurikulum berbasis industri mulai diterapkan untuk memenuhi kebutuhan dunia kerja modern.'],
            ['year' => '2015', 'title' => 'Perluasan Fasilitas', 'desc' => 'Fasilitas pendukung pembelajaran seperti laboratorium, studio, dan perpustakaan mulai dikembangkan.'],
            ['year' => '2018', 'title' => 'Digitalisasi Pembelajaran', 'desc' => 'Sekolah mulai memanfaatkan teknologi digital dan platform daring untuk kegiatan belajar mengajar.'],
            ['year' => '2021', 'title' => 'Akreditasi A', 'desc' => 'Pencapaian akreditasi tertinggi (A) menjadi bukti kualitas dan konsistensi sekolah dalam memberikan pendidikan terbaik.'],
            ['year' => '2025', 'title' => 'Transformasi Edukasi', 'desc' => 'Penerapan Kurikulum Merdeka dan transformasi digital di seluruh aspek pembelajaran.'],
        ];
        @endphp

        {{-- Timeline --}}
        <div class="relative border-l-4 border-orange-500 ml-6 space-y-16">
            @foreach ($timeline as $i => $item)
            <div class="relative pl-10" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                {{-- Titik Tahun --}}
                <div class="absolute -left-5 top-2 w-10 h-10 bg-gradient-to-tr from-orange-600 to-orange-400 rounded-full flex items-center justify-center text-white font-bold shadow-lg shadow-orange-300">
                    <span>{{ substr($item['year'], -2) }}</span>
                </div>

                {{-- Card --}}
                <div class="bg-white/90 backdrop-blur-md rounded-2xl p-6 md:p-7 shadow-md hover:shadow-orange-400/40 hover:scale-[1.03] transition-all duration-500 border border-orange-100">
                    <h3 class="text-xl md:text-2xl font-semibold text-orange-600 mb-1">
                        {{ $item['year'] }} — {{ $item['title'] }}
                    </h3>
                    <p class="text-gray-700 leading-relaxed">{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ====================== VISI & MISI ====================== -->
<section class="relative py-28 bg-gradient-to-tr from-orange-100 via-white to-orange-50 text-gray-800 overflow-hidden">
    <div class="max-w-7xl mx-auto relative z-10 px-6 md:px-10 grid md:grid-cols-2 gap-14 items-center">

        {{-- Gambar --}}
        <div data-aos="fade-right" data-aos-duration="900" class="flex justify-center">
            <div class="relative group">
                <img src="{{ asset('assets/images/gedung/gedungtinggi.webp') }}" alt="Visi Misi Sekolah"
                     class="rounded-3xl shadow-2xl transform group-hover:scale-105 transition duration-700 ease-out">
                <div class="absolute bottom-6 left-6">
                    <p class="bg-orange-500/90 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg backdrop-blur-sm">
                        SMK Prestasi Prima
                    </p>
                </div>
            </div>
        </div>

        {{-- Teks --}}
        <div data-aos="fade-left" data-aos-duration="900">
            <h2 class="text-4xl font-extrabold mb-8 leading-tight text-gray-900">
                Visi & <span class="text-orange-600">Misi</span> Sekolah
            </h2>

            {{-- Visi --}}
            <div class="mb-8">
                <h3 class="font-semibold text-xl mb-3 text-orange-600 tracking-wide">Visi</h3>
                <p class="text-gray-800 leading-relaxed text-lg bg-orange-50 p-5 rounded-2xl shadow-md border border-orange-100">
                    Mewujudkan lulusan yang <strong class="text-orange-600">unggul</strong> dan <strong class="text-orange-600">terpercaya</strong> dalam mengembangkan serta mempersiapkan tenaga terampil di bidang Teknologi Informasi dan Komunikasi yang beriman, bertaqwa, cerdas, percaya diri, berwawasan global, dan berkarakter Pancasila.
                </p>
            </div>

            {{-- Misi --}}
            <div>
                <h3 class="font-semibold text-xl mb-4 text-orange-600 tracking-wide">Misi</h3>
                <ul class="space-y-4">
                    @foreach ([
                        'Menyelenggarakan proses belajar mengajar yang berkualitas dalam mencapai kompetensi peserta didik yang berstandar nasional dan internasional.',
                        'Menyiapkan tamatan yang mampu berkompetisi pada era revolusi industri 4.0 dan globalisasi sesuai dengan kompetensi bidangnya.',
                        'Memberikan pelayanan pendidikan berbasis pembelajaran abad 21 agar peserta didik memperoleh ilmu pengetahuan dan teknologi terkini.',
                        'Mengembangkan sikap profesional yang menghargai etika dan keberagaman serta menerapkan budaya kerja yang membentuk jati diri berkarakter bangsa.'
                    ] as $point)
                        <li class="flex items-start gap-3 bg-white rounded-2xl p-4 border border-orange-100 shadow-sm hover:shadow-lg hover:border-orange-300 transition">
                            <div class="w-3 h-3 mt-2 bg-orange-500 rounded-full flex-shrink-0 shadow-sm"></div>
                            <p class="text-gray-700 leading-relaxed">{{ $point }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</section>

<!-- ====================== PROFIL KEPALA SEKOLAH ====================== -->
<section class="relative py-24 text-white overflow-hidden">
    {{-- Background --}}
    <div class="absolute inset-0">
        <img src="{{ asset('assets/images/section/tentang/bg-sekolah.jpg') }}" alt="Background Sekolah"
             class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-br from-orange-600 via-orange-500 to-orange-400 mix-blend-multiply"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-6 md:px-10 grid md:grid-cols-2 gap-16 items-center z-10">
        {{-- Kepala Sekolah --}}
        <div data-aos="fade-right" data-aos-duration="900" class="flex justify-center">
            <div class="relative group">
                <img src="{{ asset('assets/images/section/tentang/kepala-sekolah.png') }}"
                     alt="Kepala Sekolah SMK Prestasi Prima"
                     class="rounded-3xl shadow-2xl w-80 md:w-96 h-auto object-cover transform transition duration-700 ease-out group-hover:scale-105 group-hover:shadow-orange-300/50">
            </div>
        </div>

        {{-- Sambutan --}}
        <div data-aos="fade-left" data-aos-duration="900">
            <h2 class="text-4xl font-extrabold mb-5 text-white">
                Sambutan <span class="text-orange-100">Kepala Sekolah</span>
            </h2>
            <p class="text-orange-50 leading-relaxed mb-6 text-justify">
                <span class="block mb-3">Assalamu’alaikum Warahmatullahi Wabarakatuh.</span>
                Dengan penuh rasa syukur, SMK Prestasi Prima terus berkomitmen menjadi lembaga pendidikan
                yang tidak hanya menyiapkan peserta didik untuk dunia kerja, tetapi juga membentuk karakter unggul,
                kreatif, dan berdaya saing global di era modern ini.
            </p>

            <blockquote class="relative border-l-4 border-white/80 pl-5 italic text-orange-100 text-lg mb-8 overflow-hidden">
                <span id="typing-quote" class="inline-block"></span>
            </blockquote>

            <p class="mt-6 text-white font-semibold text-lg">
                — <span class="text-yellow-100">Hendry Kurniawan, S.Kom., M.I.Kom.</span><br>
                Kepala Sekolah SMK Prestasi Prima
            </p>
        </div>
    </div>
</section>

<!-- ====================== TYPING QUOTE SCRIPT ====================== -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const text = "“Pendidikan bukan hanya tentang masa depan, tetapi tentang membangun masa kini dengan penuh makna dan tanggung jawab.”";
    const typingElement = document.getElementById("typing-quote");
    let index = 0;
    function typeEffect() {
        if (index < text.length) {
            typingElement.textContent += text.charAt(index);
            index++;
            setTimeout(typeEffect, 50);
        }
    }
    typeEffect();
});
</script>

<!-- ====================== VIDEO PROFIL SEKOLAH ====================== -->
<section class="py-24 bg-orange-50 text-gray-800 relative z-20 overflow-hidden">
    <div class="max-w-5xl mx-auto text-center px-6" data-aos="fade-up" data-aos-duration="900">
        <h2 class="text-4xl font-extrabold mb-6 text-gray-900">
            Video <span class="text-orange-600">Profil Sekolah</span>
        </h2>
        <p class="text-gray-600 mb-10 max-w-2xl mx-auto">
            Saksikan sekilas perjalanan dan suasana belajar di SMK Prestasi Prima melalui video berikut.
        </p>

        @php
            $profileVideoId = 'EYzn0caf0_k';
            $profileGradient = 'from-orange-500 via-orange-400 to-yellow-300';
            $profileThumbnail = $resolveLocalThumbnail($profileVideoId);
        @endphp
        <div class="relative w-full max-w-4xl mx-auto overflow-hidden rounded-2xl shadow-xl group">
            @include('components.youtube-lite', [
                'videoId' => $profileVideoId,
                'title' => 'Video Profil SMK Prestasi Prima',
                'gradient' => $profileGradient,
                'thumbnailPath' => $profileThumbnail,
                'wrapperClass' => 'w-full',
                'behavior' => 'inline'
            ])
        </div>
    </div>
</section>

@include('components.youtube-lite-script')

<!-- ====================== TESTIMONI LINK SECTION ====================== -->
<section class="py-24 bg-white text-center text-gray-800 relative z-10 overflow-hidden">
    <div data-aos="fade-up" data-aos-duration="900">
        <h2 class="text-4xl font-extrabold mb-6">
            Suara dari <span class="text-orange-500">Alumni & Orang Tua</span>
        </h2>
        <p class="text-gray-600 max-w-2xl mx-auto mb-10">
            Dengarkan pengalaman langsung dari mereka yang telah merasakan perjalanan bersama SMK Prestasi Prima.
        </p>
        <a href="{{ url('/testimoni') }}"
           class="inline-block px-8 py-3 bg-orange-500 text-white font-semibold rounded-xl shadow-md hover:bg-orange-600 hover:shadow-lg transition-all duration-300">
           Lihat Semua Testimoni →
        </a>
    </div>
</section>

<!-- ====================== LOKASI SEKOLAH ====================== -->
<section class="relative py-28 bg-gradient-to-br from-orange-100 via-white to-orange-50 overflow-hidden text-gray-800">
    <div class="max-w-6xl mx-auto px-6 text-center relative z-10">

        {{-- Judul --}}
        <div data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-5xl font-extrabold mb-5 tracking-tight text-gray-900">
                Lokasi <span class="bg-gradient-to-r from-orange-500 to-yellow-400 bg-clip-text text-transparent">Sekolah</span>
            </h2>
            <p class="text-gray-600 text-lg mb-14 max-w-3xl mx-auto leading-relaxed">
                Temukan <span class="text-orange-600 font-semibold">SMK Prestasi Prima</span> — pusat pendidikan unggulan
                yang membina generasi profesional masa depan.
                Terletak strategis di kawasan yang mudah dijangkau,
                sekolah kami menghadirkan lingkungan belajar modern dan inspiratif.
            </p>
        </div>

        {{-- Peta --}}
        <div class="relative group" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
            <div class="rounded-3xl overflow-hidden shadow-2xl border border-orange-200 bg-white transition-transform duration-500 ease-in-out group-hover:scale-[1.02] group-hover:shadow-orange-200/50">
        <iframe class="w-full h-[450px] grayscale-[20%] hover:grayscale-0 transition-all duration-700 ease-in-out"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4748268020353!2d106.8972187!3d-6.332476499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed2681bc7c67%3A0x777152b1d3f74a62!2sSMK%20Prestasi%20Prima!5e0!3m2!1sid!2sid!4v1756647265168!5m2!1sid!2sid"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Lokasi SMK Prestasi Prima">
                </iframe>
            </div>
        </div>

        {{-- Alamat --}}
        <div class="mt-16 mx-auto max-w-2xl bg-white/80 backdrop-blur-sm border border-orange-100 rounded-3xl p-8 shadow-lg"
             data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <h3 class="text-2xl font-bold mb-3 text-orange-600">Alamat Lengkap</h3>
            <p class="text-gray-700 leading-relaxed">
                <strong>SMK Prestasi Prima</strong><br>
                Jl. Hankam Raya No.89, RT.4/RW.5, Cilangkap, Kec. Cipayung,
                Kota Jakarta Timur, DKI Jakarta 13870<br>
                <span class="italic text-orange-500">Dekat dengan Markas Besar TNI Angkatan Laut Cilangkap</span>
            </p>

            {{-- Tombol Aksi --}}
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                <a href="https://goo.gl/maps/k3PUPcTZhQKxW1t69" target="_blank"
                   class="px-8 py-3 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-semibold shadow-md hover:shadow-lg transition-all duration-300">
                   <i class="ri-map-pin-line mr-2"></i> Buka di Google Maps
                </a>
                <a href="/contact"
                   class="px-8 py-3 rounded-xl border border-orange-400 text-orange-500 hover:bg-orange-500 hover:text-white font-semibold shadow-md hover:shadow-lg transition-all duration-300">
                   <i class="ri-mail-send-line mr-2"></i> Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    {{-- Dekoratif Background --}}
    <div class="absolute top-0 left-0 w-96 h-96 bg-orange-200 rounded-full blur-3xl opacity-40 -z-10"></div>
    <div class="absolute bottom-0 right-0 w-[28rem] h-[28rem] bg-yellow-100 rounded-full blur-3xl opacity-40 -z-10"></div>
</section>


@endsection
