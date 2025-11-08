<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMK Prestasi Prima')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- === Favicon === --}}
  <link rel="icon" type="image" href="{{ asset('assets/images/logo-smk.webp') }}">
  <link rel="apple-touch-icon" href="{{ asset('assets/images/logo-smk.webp') }}">

        @stack('styles')

</head>

<body class="bg-white font-sans relative overflow-x-hidden">

    @include('header')

    {{-- Dekorasi Lingkaran PNG --}}
    <img src="../assets/images/section/presmalancer/oren rock2.webp" alt="Lingkaran Kiri Atas"
        class="absolute top-0 -left-20 w-56 opacity-70 -z-10">

    <img src="../assets/images/section/presmalancer/oren rock.webp" alt="Lingkaran Kanan Bawah"
        class="absolute bottom-0 -right-20 w-72 opacity-70 -z-10">

    {{-- Section Hero --}}
    <section class="max-w-5xl mx-auto px-6 py-12 mt-16 md:mt-20 relative z-10">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 leading-snug">
                    Temukan magang dan kerja paruh waktu yang cocok untuk anak SMK hanya di
                    <span class="text-orange-500">Presmalance!</span>
                </h1>

                {{-- Card Login --}}
                <div class="bg-orange-100 border shadow-md rounded-xl mt-6 p-6">
                    <a href="{{ route('auth.google', ['provider' => 'google']) }}"
                        class="bg-white group flex items-center justify-center w-full border border-orange-400 rounded-md py-2 mb-3 hover:bg-orange-500 transition">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-5 h-5 mr-2">
                        <span class="text-gray-700 font-medium group-hover:text-white transition">Continue with
                            Google</span>
                    </a>

                    <div class="flex items-center my-4">
                        <hr class="flex-grow border-gray-300">
                        <span class="px-3 text-gray-500 text-sm">atau</span>
                        <hr class="flex-grow border-gray-300">
                    </div>

                    <a href="{{ route('login') }}"
                        class="inline-block w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg transition text-center">
                        Masuk
                    </a>

                    <p class="text-center text-gray-600 mt-4 text-sm">
                        Belum punya akun? <a href="/register" class="text-orange-500 font-semibold">Daftar</a>
                    </p>
                </div>
            </div>

            {{-- Gambar siswa --}}
            <div class="flex flex-col items-center relative">
                <img src="../assets/images/section/presmalancer/rock behind girl.webp" alt="Lingkaran Belakang"
                    class="absolute w-96 -z-10 top-1/2 -translate-y-1/2">

                <img src="../assets/images/section/presmalancer/siswa1.webp" alt="Anak SMK" class="w-80 relative z-10">

                <span
                    class="margin-top: 0.125rem translate-x-3 bg-orange-500 text-white px-10 py-3 rounded-full shadow-md text-sm font-semibold transition hover:shadow-lg">
                    Dari Kelas ke Dunia Kerja
                </span>
            </div>
        </div>
    </section>

    {{-- Carousel Mitra --}}
    <section class="py-12 relative z-10">
        <h2 class="text-xl md:text-2xl font-semibold text-gray-800 text-center mb-8">
            Cari magang atau kerja part-time seru di perusahaan pilihanmu!
        </h2>

        <div class="relative flex items-center max-w-7xl mx-auto px-4 sm:px-10">
            <button id="prevBtn"
                class="absolute -left-5 bg-orange-500 text-white rounded-full w-10 h-10 flex items-center justify-center shadow hover:bg-orange-600 transition z-10">
                &#10094;
            </button>

            <div id="carouselWrapper" class="overflow-hidden w-full">
                <div id="carouselTrack" class="flex gap-6 transition-transform duration-500 ease-in-out">
                    @php
                        $companies = [
                            ['logo' => '../assets/images/section/industri/komatsu.webp', 'lowongan' => '7'],
                            ['logo' => '../assets/images/section/industri/jatelindo.webp', 'lowongan' => '13'],
                            ['logo' => '../assets/images/section/industri/antam.webp', 'lowongan' => '3'],
                            ['logo' => '../assets/images/section/industri/wika.webp', 'lowongan' => '9'],
                        ];
                        $loopedCompanies = array_merge(
                            $companies,
                            $companies,
                            $companies,
                            $companies,
                            $companies,
                            $companies,
                            $companies,
                            $companies,
                            $companies,
                            $companies,
                            $companies,
                            $companies,
                        );
                    @endphp

                    @foreach ($loopedCompanies as $c)
                        <div
                            class="flex-shrink-0 w-56 bg-orange-50 border rounded-xl shadow p-6 hover:shadow-lg transition flex flex-col items-center justify-center">
                            <img src="{{ $c['logo'] }}" class="h-10 mb-2" alt="Logo perusahaan mitra">
                            <p class="bg-gray-200 rounded-full px-3 py-1 text-xs">{{ $c['lowongan'] }} lowongan tersedia
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <button id="nextBtn"
                class="absolute -right-5 bg-orange-500 text-white rounded-full w-10 h-10 flex items-center justify-center shadow hover:bg-orange-600 transition z-10">
                &#10095;
            </button>
        </div>
    </section>

    @include('footer')

    @include('ChatbotUI')

    <script>
        const track = document.getElementById("carouselTrack");
        const nextBtn = document.getElementById("nextBtn");
        const prevBtn = document.getElementById("prevBtn");

        const items = track.children;
        const itemWidth = items[0].offsetWidth + 24; // termasuk gap-6
        let position = -(itemWidth * (items.length / 3)); // mulai di tengah
        track.style.transform = `translateX(${position}px)`;

        function moveCarousel(direction = 1) {
            position -= itemWidth * direction;
            track.style.transition = "transform 0.5s ease-in-out";
            track.style.transform = `translateX(${position}px)`;

            track.addEventListener("transitionend", () => {
                const totalItems = items.length;
                const visibleItems = 3;
                const maxTranslate = -(itemWidth * (totalItems - visibleItems));

                if (position <= maxTranslate) {
                    track.style.transition = "none";
                    position = -(itemWidth * (totalItems / 3));
                    track.style.transform = `translateX(${position}px)`;
                } else if (position >= 0) {
                    track.style.transition = "none";
                    position = -(itemWidth * (totalItems / 3));
                    track.style.transform = `translateX(${position}px)`;
                }
            }, {
                once: true
            });
        }

        nextBtn.addEventListener("click", () => moveCarousel(1));
        prevBtn.addEventListener("click", () => moveCarousel(-1));

        setInterval(() => moveCarousel(1), 5000);
    </script>


</body>

</html>

