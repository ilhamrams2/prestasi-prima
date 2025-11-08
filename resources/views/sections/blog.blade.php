<!-- ==================== SECTION BLOG ==================== -->
<section id="blog" class="relative py-24 bg-gradient-to-b from-orange-50 via-white to-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 md:px-8">

        <!-- ===== Header ===== -->
        <header data-aos="fade-up" data-aos-duration="900" data-aos-easing="ease-out-cubic" class="mb-16 text-center">
            <p class="text-sm md:text-lg font-semibold text-orange-600 uppercase tracking-widest">
                Blog & Artikel
            </p>
            <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mt-3 mb-4">
                Cerita & <span class="text-orange-600">Kabar Terbaru</span> dari Kami
            </h2>
            <div class="w-24 h-1 bg-orange-500 mx-auto rounded-full"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Dapatkan berbagai informasi menarik seputar kegiatan, prestasi, dan inspirasi dari lingkungan sekolah
                kami.
            </p>
        </header>

        <!-- ===== Swiper Blog ===== -->
        <div class="swiper blogSwiper relative">
            <div class="swiper-wrapper">

                {{-- @php
          $blogs = [
            [
              'img' => 'assets/images/section/blog/nobar.webp',
              'category' => 'Kegiatan',
              'date' => '20 September 2025',
              'title' => 'Nonton Bareng Prestasi Prima',
              'desc' => 'Keluarga besar Prestasi Prima mengadakan Nonton Bareng yang seru dan penuh kebersamaan, mempererat hubungan antar siswa, guru, dan staf sekolah.'
            ],
            [
              'img' => 'assets/images/section/blog/rapat-guru.webp',
              'category' => 'Edukasi',
              'date' => '05 Oktober 2025',
              'title' => 'Rapat Guru Prestasi Prima',
              'desc' => 'Guru-guru Prestasi Prima melaksanakan rapat koordinasi untuk membahas strategi pembelajaran dan peningkatan mutu pendidikan.'
            ],
            [
              'img' => 'assets/images/section/blog/penghargaan-guru.webp',
              'category' => 'Prestasi',
              'date' => '01 Oktober 2025',
              'title' => 'Penghargaan Guru Berprestasi',
              'desc' => 'Sekolah memberikan penghargaan kepada guru-guru berprestasi atas dedikasi dan kerja keras dalam menciptakan pendidikan berkualitas.'
            ],
          ];
        @endphp --}}

                @foreach ($news as $index => $blog)
                    <div class="swiper-slide" data-aos="zoom-out-up" data-aos-delay="{{ ($index + 1) * 150 }}"
                        data-aos-duration="900">
                        <article
                            class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-700 border border-white/10 bg-white/80 backdrop-blur-xl flex flex-col h-full hover:-translate-y-3">

                            <!-- Thumbnail -->
                            <div class="relative overflow-hidden">
                                <img src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->title }}"
                                    class="w-full h-60 object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                                </div>
                                <span
                                    class="absolute top-4 left-4 bg-gradient-to-r from-orange-500 to-orange-400 text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg">
                                    {{ $blog->category->name ?? 'Tanpa Kategori' }}
                                </span>
                            </div>

                            <!-- Konten -->
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-orange-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10m-12 8h14a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    {{ $blog->published_at ? $blog->published_at->format('d M Y') : 'Belum dipublikasikan' }}
                                </div>

                                <h3
                                    class="font-extrabold text-lg md:text-xl text-gray-900 leading-snug mb-3 group-hover:text-orange-600 transition-colors duration-300">
                                    {{ $blog->title }}
                                </h3>

                                <p class="text-gray-600 text-sm leading-relaxed flex-grow">
                                    {{ Str::limit($blog->excerpt, 120) }}
                                </p>

                                <div class="mt-5 flex items-center justify-between">
                                    <a href="{{ route('berita.detail', $blog->slug) }}"
                                        class="inline-flex items-center gap-2 text-orange-600 hover:text-orange-700 font-semibold text-sm transition-all">
                                        Selengkapnya
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                    <div
                                        class="h-1.5 w-8 bg-gradient-to-r from-orange-500 to-orange-300 rounded-full group-hover:w-14 transition-all duration-500">
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach


            </div>

            <!-- Navigasi -->
            <div class="swiper-pagination mt-10"></div>
            <div class="swiper-button-prev custom-nav"></div>
            <div class="swiper-button-next custom-nav"></div>
        </div>
    </div>
</section>

<!-- ====== Swiper & AOS ====== -->
@push('styles')
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    </noscript>
    <style>
        .blogSwiper article {
            border-radius: 1.25rem;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            transition: all 0.6s ease;
        }

        .blogSwiper article:hover {
            box-shadow: 0 12px 30px rgba(234, 88, 12, 0.15);
            border-color: rgba(234, 88, 12, 0.3);
            transform: translateY(-8px);
        }

        .blogSwiper .swiper-slide {
            display: flex;
            height: auto !important;
        }

        .swiper-button-prev,
        .swiper-button-next {
            color: #ea580c !important;
            transition: all 0.3s ease;
        }

        .swiper-button-prev:hover,
        .swiper-button-next:hover {
            transform: scale(1.2);
            color: #f97316 !important;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ensureSwiperInstance = () => {
                if (typeof window.ensureSwiper === 'function') {
                    return window.ensureSwiper();
                }
                if (window.Swiper) {
                    return Promise.resolve(window.Swiper);
                }
                return Promise.reject(new Error('Swiper loader is not available.'));
            };

            const ensureAOSInstance = () => {
                if (typeof window.ensureAOS === 'function') {
                    return window.ensureAOS();
                }
                if (window.AOS) {
                    return Promise.resolve(window.AOS);
                }
                return Promise.reject(new Error('AOS loader is not available.'));
            };

            ensureSwiperInstance().then(() => ensureAOSInstance()).then((AOS) => {
                if (AOS) {
                    AOS.init({
                        once: true,
                        duration: 1000,
                        offset: 120,
                        easing: 'ease-out-cubic'
                    });
                }

                new Swiper('.blogSwiper', {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 24
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 30
                        },
                    },
                });
            }).catch((err) => console.error('Failed to bootstrap blog Swiper/AOS', err));
        });
    </script>
@endpush
