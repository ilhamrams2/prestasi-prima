@extends('prestasiprima.index')

@section('content')
    <!-- === Wrapper News Section === -->
    <section class="container mx-auto px-6 mt-0 pt-[190px] md:pt-[154px] max-w-[1228px] flex flex-col gap-16">

        <!-- === Section Hero News === -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Left Big News -->
            <div class="col-span-2 bg-white rounded-2xl shadow-md overflow-hidden flex flex-col">
                <img src="https://picsum.photos/900/450" alt="Guru Berprestasi" class="w-full h-auto md:h-[450px] object-cover">
                <div class="p-8 flex flex-col flex-1 justify-between">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 leading-snug">
                        Memberikan penghargaan kepada para guru berprestasi sebagai bentuk apresiasi atas dedikasi dan kontribusi mereka dalam pendidikan.
                    </h2>
                    <p class="text-base md:text-lg text-gray-600 mb-4 leading-relaxed">
                        Ikatan Guru Indonesia (IGI) berkomitmen untuk terus mendukung dan mengembangkan kualitas pendidikan di Indonesia melalui berbagai program pengembangan profesional guru.
                    </p>
                    <!-- Button ReadMore -->
                    <a href="#"
                       class="inline-flex items-center gap-2 bg-orange-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-orange-600 transition w-fit">
                        Read More
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Right Column -->
            <div class="flex flex-col gap-6">
                <!-- Hot News -->
                <div class="bg-white rounded-2xl shadow-md p-6 flex-1">
                    <h3 class="text-xl font-bold text-gray-900 border-l-4 border-orange-500 pl-3 mb-4">
                        Hot News
                    </h3>
                    <img src="https://picsum.photos/400/220"
                         alt="Hot News"
                         class="w-full h-auto md:h-[220px] object-cover rounded-xl mb-4">
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">
                        Kegiatan Akhir Semester Sekolah Prestasi
                    </h4>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Siswa-siswi SMK Prestasi Prima berhasil menutup semester dengan berbagai
                        lomba akademik dan non-akademik. Acara ini disambut antusias oleh para
                        guru dan orang tua siswa.
                    </p>
                </div>

                <!-- Akses Cepat -->
                <div class="bg-white rounded-2xl shadow-md p-6 flex-1">
                    <h3 class="text-xl font-bold text-gray-900 border-l-4 border-orange-500 pl-3 mb-4">
                        Akses Cepat
                    </h3>
                    <ul class="space-y-4">
                        @foreach (['Pendidikan', 'Event', 'Prestasi', 'Olahraga'] as $item)
                            <li
                                class="flex items-center justify-between bg-gray-50 rounded-lg px-5 py-4 hover:bg-gray-100 cursor-pointer">
                                <span class="text-gray-700 text-lg">{{ $item }}</span>
                                <span class="w-2.5 h-2.5 bg-orange-500 rounded-full"></span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- === Section Populer === -->
        <div>
            <h3 class="text-xl font-bold text-gray-900 border-l-4 border-orange-500 pl-3 mb-6">
                Populer
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ([400, 401, 402] as $i)
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col">
                        <img src="https://picsum.photos/{{ $i }}/250" alt="Card {{ $i }}"
                             class="w-full h-[180px] object-cover">
                        <div class="p-5 flex flex-col flex-1 justify-between">
                            <div>
                                <span class="text-sm text-gray-500">Kategori</span>
                                <h3 class="text-lg font-bold text-gray-900">Judul Berita</h3>
                                <p class="text-gray-600 text-sm">
                                    Deskripsi singkat berita
                                </p>
                                <div class="flex items-center justify-between text-sm text-gray-500 mt-[7px]">
                                    <span class="flex items-center gap-2">
                                        <i class="far fa-calendar"></i> 22 Des 2024
                                    </span>
                                    <span class="flex items-center gap-2">
                                        <i class="far fa-eye"></i> 126
                                    </span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#"
                                   class="inline-flex items-center gap-2 bg-orange-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-orange-600 transition w-fit">
                                    Selengkapnya
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- === Section Global News === -->
        <div>
            <h3 class="text-xl font-bold text-gray-900 border-l-4 border-orange-500 pl-3 mb-6 mt-9">
                Global News
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Left Big News -->
                <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col">
                    <img src="https://picsum.photos/700/400" alt="Rapat Guru" class="w-full h-auto md:h-[250px] object-cover">
                    <div class="p-6 flex flex-col flex-1 justify-between">
                        <div>
                            <span class="flex items-center text-sm text-gray-500 mb-2">
                                <i class="far fa-clock mr-2"></i> 10 Juni 2024
                            </span>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Rapat Guru</h3>
                            <p class="text-gray-600 text-base mb-4">Persiapan UN</p>
                        </div>
                        <a href="#"
                           class="inline-flex items-center gap-2 bg-orange-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-orange-600 transition w-fit">
                            Selengkapnya
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Right Small News -->
                <div class="flex flex-col gap-4 overflow-y-auto">
                    @for ($j = 0; $j < 4; $j++)
                        <div
                            class="bg-white shadow-md rounded-2xl p-5 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition">
                            <div>
                                <span class="text-sm text-orange-500 font-semibold">Pendidikan</span>
                                <span class="text-xs text-gray-500 ml-3">5 mnt</span>
                                <h4 class="text-gray-900 font-semibold mt-1">
                                    Pendidikan Digital Era Baru Untuk Guru Indonesia
                                </h4>
                                <p class="text-xs text-gray-500 mt-1">18 Des 2024</p>
                            </div>
                            <button class="text-orange-500 text-xl hover:translate-x-1 transition mr-3">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

    </section>
@endsection
