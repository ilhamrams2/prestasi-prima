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
        <div class="relative mt-10 px-0 sm:px-14" data-aos="fade-up" data-aos-duration="1000">
            <div class="swiper blogSwiper !p-10 !pb-20 !-m-10">
                <div class="swiper-wrapper">
                    @foreach ($news as $index => $blog)
                        <div class="swiper-slide">
                            <article
                                class="blog-card group relative rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 bg-white flex flex-col h-full w-full">

                                <!-- Thumbnail -->
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->title }}"
                                        class="w-full h-60 object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                                    <div
                                        class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                                    </div>
                                    <span
                                        class="absolute top-4 left-4 bg-orange-600 text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg">
                                        {{ $blog->category->name ?? 'Tanpa Kategori' }}
                                    </span>
                                </div>

                                <!-- Konten -->
                                <div class="p-6 flex flex-col flex-grow">
                                    <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                        <iconify-icon icon="lucide:calendar" class="text-orange-500"></iconify-icon>
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
                                            class="inline-flex items-center gap-2 text-orange-600 hover:text-orange-700 font-semibold text-sm transition-all group/link">
                                            Selengkapnya
                                            <iconify-icon icon="lucide:arrow-right" class="transition-transform group-hover/link:translate-x-1"></iconify-icon>
                                        </a>
                                        <div
                                            class="h-1 w-8 bg-orange-500 rounded-full group-hover:w-12 transition-all duration-500">
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination (Ditempatkan di bawah swiper-wrapper melalui bottom padding) -->
                <div class="swiper-pagination !bottom-4"></div>
            </div>

            <!-- Navigation Buttons - Custom classes matching Prestasi Style -->
            <button class="blog-nav-prev custom-nav-v3 -left-4 sm:-left-8">
                <iconify-icon icon="lucide:chevron-left"></iconify-icon>
            </button>
            <button class="blog-nav-next custom-nav-v3 -right-4 sm:-right-8">
                <iconify-icon icon="lucide:chevron-right"></iconify-icon>
            </button>
        </div>
    </div>
</section>

<!-- ====== Swiper & AOS ====== -->
@push('styles')
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    </noscript>
    <style>
        .blog-card {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
        }

        .blog-card:hover {
            transform: scale(1.05);
            box-shadow: 0 25px 50px -12px rgba(234, 88, 12, 0.12);
            z-index: 20;
            border-color: #ffedd5;
        }

        .blogSwiper .swiper-slide {
            display: flex;
            height: auto !important;
        }

        /* Swiper Navigation V3 - Premium Glass Look (Matching Prestasi Section) */
        .custom-nav-v3 {
            position: absolute;
            top: 50%;
            z-index: 10;
            width: 42px !important;
            height: 42px !important;
            background-color: white !important;
            border-radius: 9999px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            color: #ea580c !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            margin-top: -30px !important;
            border: 1px solid rgba(234, 88, 12, 0.1);
            display: flex !important;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            outline: none;
        }

        .custom-nav-v3:hover {
            background-color: #ea580c !important;
            color: white !important;
            transform: scale(1.15);
            box-shadow: 0 8px 25px rgba(234, 88, 12, 0.4);
            border-color: transparent;
        }

        .custom-nav-v3 iconify-icon {
            font-size: 18px;
        }

        /* Swiper Pagination Dot Custom (Matching Prestasi Section) */
        .blogSwiper .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background: #d1d5db;
            opacity: 1;
            transition: all 0.3s ease;
        }

        .blogSwiper .swiper-pagination-bullet-active {
            background: #ea580c;
            width: 24px;
            border-radius: 5px;
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
                        nextEl: '.blog-nav-next',
                        prevEl: '.blog-nav-prev'
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
