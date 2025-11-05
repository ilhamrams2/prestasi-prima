{{-- resources/views/prestasiprima/pages/profile-sekolah.blade.php --}}
@extends('prestasiprima.index')

@section('title', 'Profil Sekolah')

@section('content')

  <!-- ====================== HERO SECTION ====================== -->
  <section class="relative bg-[#0e1620] text-white pt-36 pb-28 overflow-hidden">
    <div class="absolute inset-0">
      <img src="{{ asset('assets/images/gedung/gedungsiswa.avif') }}" alt="SMK Prestasi Prima"
           class="w-full h-full object-cover opacity-25" loading="lazy" decoding="async">
    </div>

    <div class="relative z-10 text-center max-w-3xl mx-auto px-4" data-aos="fade-down" data-aos-duration="800">
      <img src="{{ asset('assets/images/logo-smk.png') }}" alt="Logo SMK Prestasi Prima"
           class="w-24 h-24 mx-auto mb-5 animate-fade-in" loading="lazy">
      <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
        SMK <span class="text-orange-500">Prestasi Prima</span>
      </h1>
      <p class="text-gray-200 text-lg leading-relaxed italic">
        "If better is possible, good is not enough"
      </p>
    </div>
  </section>

  <!-- ====================== SEJARAH SEKOLAH ====================== -->
  <section class="py-24 bg-[#0e1620] text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-[#0e1620] via-[#111a26] to-[#0e1620]"></div>

    <div class="max-w-7xl mx-auto relative px-6">
      <div class="text-center mb-16" data-aos="fade-up">
        <h2 class="text-4xl font-extrabold mb-3">
          <span class="text-orange-500">Sejarah</span> Sekolah
        </h2>
        <p class="text-gray-200 text-lg max-w-2xl mx-auto">
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

      <div class="relative border-l-4 border-orange-500 ml-6 space-y-16">
        @foreach ($timeline as $i => $item)
          <div class="relative pl-10" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
            <div class="absolute -left-4 top-2 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
              <span>{{ substr($item['year'], -2) }}</span>
            </div>
            <div class="bg-[#111a26] rounded-2xl p-6 shadow-lg hover:shadow-orange-500/30 transition">
              <h3 class="text-xl font-semibold text-orange-400 mb-1">
                {{ $item['year'] }} — {{ $item['title'] }}
              </h3>
              <p class="text-gray-300 leading-relaxed">{{ $item['desc'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ====================== VISI & MISI ====================== -->
  <section class="relative py-28 bg-white text-gray-800 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-white via-orange-50/30 to-white"></div>

    <div class="max-w-7xl mx-auto relative z-10 px-6 md:px-10 grid md:grid-cols-2 gap-14 items-center">
      <div data-aos="fade-right" data-aos-duration="900">
        <div class="relative group">
          <img src="{{ asset('assets/images/gedung/gedungtinggi.webp') }}" alt="Visi Misi Sekolah"
               class="rounded-3xl shadow-2xl transform group-hover:scale-105 transition duration-700 ease-out" loading="lazy">
          <div class="absolute bottom-6 left-6">
            <p class="bg-orange-500/90 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg backdrop-blur-sm">
              SMK Prestasi Prima
            </p>
          </div>
        </div>
      </div>

      <div data-aos="fade-left" data-aos-duration="900">
        <h2 class="text-4xl font-extrabold mb-8 leading-tight text-[#0e1620]">
          Visi & <span class="text-orange-500">Misi</span> Sekolah
        </h2>

        <div class="mb-8">
          <h3 class="font-semibold text-xl mb-3 text-orange-600 tracking-wide">Visi</h3>
          <p class="text-gray-700 leading-relaxed text-lg bg-orange-50/60 p-5 rounded-2xl shadow-md border border-orange-100">
            Mewujudkan lulusan yang <strong class="text-orange-600">unggul</strong> dan <strong class="text-orange-600">terpercaya</strong>
            dalam mengembangkan serta mempersiapkan tenaga terampil di bidang Teknologi Informasi dan Komunikasi yang beriman,
            bertaqwa, cerdas, percaya diri, berwawasan global, dan berkarakter Pancasila.
          </p>
        </div>

        <div>
          <h3 class="font-semibold text-xl mb-4 text-orange-600 tracking-wide">Misi</h3>
          <ul class="space-y-4">
            @php
              $misi = [
                'Menyelenggarakan proses belajar mengajar yang berkualitas dalam mencapai kompetensi peserta didik yang berstandar nasional dan internasional.',
                'Menyiapkan tamatan yang mampu berkompetisi pada era revolusi industri 4.0 dan globalisasi sesuai dengan kompetensi bidangnya.',
                'Memberikan pelayanan pendidikan berbasis pembelajaran abad 21 agar peserta didik memperoleh ilmu pengetahuan dan teknologi terkini.',
                'Mengembangkan sikap profesional yang menghargai etika dan keberagaman serta menerapkan budaya kerja yang membentuk jati diri berkarakter bangsa.'
              ];
            @endphp

            @foreach ($misi as $point)
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
  <section class="relative py-24 bg-[#0e1620] text-white overflow-hidden">
    <div class="max-w-6xl mx-auto px-6 md:px-10 grid md:grid-cols-2 gap-16 items-center">
      <!-- Foto Kepala Sekolah -->
      <div data-aos="fade-right" data-aos-duration="900" class="flex justify-center">
        <div class="relative group">
          <img src="{{ asset('assets/images/section/tentang/kepala-sekolah.png') }}" 
               alt="Kepala Sekolah SMK Prestasi Prima"
               class="rounded-3xl shadow-2xl w-80 md:w-96 h-auto object-cover transform group-hover:scale-105 transition duration-700 ease-out">
          <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition duration-700"></div>
        </div>
      </div>

      <!-- Sambutan -->
      <div data-aos="fade-left" data-aos-duration="900">
        <h2 class="text-4xl font-extrabold mb-5 text-orange-400 tracking-wide">
          Sambutan <span class="text-white">Kepala Sekolah</span>
        </h2>

        <p class="text-gray-300 leading-relaxed mb-6 text-justify">
          <span class="block mb-3">Assalamu’alaikum Warahmatullahi Wabarakatuh.</span>
          Dengan penuh rasa syukur, SMK Prestasi Prima terus berkomitmen menjadi lembaga pendidikan 
          yang tidak hanya menyiapkan peserta didik untuk dunia kerja, tetapi juga membentuk karakter unggul, 
          kreatif, dan berdaya saing global di era modern ini.
        </p>

        <blockquote class="relative border-l-4 border-orange-500 pl-5 italic text-orange-300 text-lg mb-8 overflow-hidden">
          <span id="typing-quote" class="inline-block"></span>
        </blockquote>

        <p class="mt-6 text-gray-300 font-semibold text-lg">
          — <span class="text-orange-400">Hendry Kurniawan, S.Kom., M.I.Kom.</span><br>
          Kepala Sekolah SMK Prestasi Prima
        </p>
      </div>
    </div>
  </section>

  <!-- ====================== ANIMASI QUOTE ====================== -->
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
  <section class="py-24 bg-white text-gray-800 relative z-20">
    <div class="max-w-5xl mx-auto text-center px-6">
      <h2 class="text-4xl font-extrabold mb-6">
        Video <span class="text-orange-500">Profil Sekolah</span>
      </h2>
      <p class="text-gray-600 mb-10 max-w-2xl mx-auto">
        Saksikan sekilas perjalanan dan suasana belajar di SMK Prestasi Prima melalui video berikut.
      </p>

      <div class="relative w-full max-w-4xl mx-auto pb-[56.25%] overflow-hidden rounded-2xl shadow-xl">
        <iframe class="absolute top-0 left-0 w-full h-full"
                src="https://www.youtube.com/embed/EYzn0caf0_k?si=rCs4oPLk_iowbcV8"
                title="Video Profil SMK Prestasi Prima"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen></iframe>
      </div>
    </div>
  </section>

  <!-- ====================== LOKASI SEKOLAH ====================== -->
  <section class="relative bg-gradient-to-br from-[#0d141d] via-[#121b26] to-[#1a2636] text-white py-28 overflow-hidden">
    <div class="max-w-6xl mx-auto px-6 text-center relative z-10">
      <h2 class="text-5xl font-extrabold mb-6 tracking-tight">
        Lokasi <span class="bg-gradient-to-r from-orange-500 to-yellow-400 bg-clip-text text-transparent">Sekolah</span>
      </h2>

      <p class="text-gray-300 text-lg mb-12 max-w-3xl mx-auto leading-relaxed">
        Temukan <span class="text-orange-400 font-semibold">SMK Prestasi Prima</span> — pusat pendidikan unggulan 
        yang membina generasi profesional masa depan. 
        Terletak strategis di kawasan yang mudah dijangkau, 
        sekolah kami menghadirkan lingkungan belajar modern dan inspiratif.
      </p>

      <div class="rounded-3xl overflow-hidden shadow-2xl border border-white/10 bg-[#111a25] hover:scale-[1.02] transition-transform duration-500 ease-in-out" data-aos="fade-up">
        <iframe class="w-full h-[450px]" 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4748268020353!2d106.8972187!3d-6.332476499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed2681bc7c67%3A0x777152b1d3f74a62!2sSMK%20Prestasi%20Prima!5e0!3m2!1sid!2sid!4v1756647265168!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="mt-12 mx-auto max-w-2xl bg-[#111a25] border border-white/10 rounded-2xl p-6 shadow-lg">
        <h3 class="text-2xl font-semibold mb-3 text-orange-400">Alamat Lengkap</h3>
        <p class="text-gray-300 leading-relaxed">
          <strong>SMK Prestasi Prima</strong><br>
          Jl. Hankam Raya No.89, RT.4/RW.5, Cilangkap, Kec. Cipayung, 
          Kota Jakarta Timur, DKI Jakarta 13870<br>
          📍 <span class="italic text-orange-300">Dekat dengan Universitas Krisnadwipayana & Terminal Cilangkap</span>
        </p>

        <div class="flex justify-center gap-4 mt-6">
          <a href="https://goo.gl/maps/k3PUPcTZhQKxW1t69" target="_blank"
             class="px-6 py-2 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-semibold shadow-md transition-all">
            Buka di Google Maps
          </a>
          <a href="/contact"
             class="px-6 py-2 rounded-xl border border-orange-400 text-orange-400 hover:bg-orange-500 hover:text-white font-semibold transition-all">
            Hubungi Kami
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ====================== TESTIMONI LINK SECTION ====================== -->
<section class="py-24 bg-white text-center text-gray-800">
    <h2 class="text-4xl font-extrabold mb-6">
      Suara dari <span class="text-orange-500">Alumni & Orang Tua</span>
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto mb-10">
      Dengarkan pengalaman langsung dari mereka yang telah merasakan perjalanan bersama SMK Prestasi Prima.
    </p>
    <a href="{{ url('/testimoni') }}"
       class="inline-block px-8 py-3 bg-orange-500 text-white font-semibold rounded-xl shadow-md hover:bg-orange-600 transition-all">
      Lihat Semua Testimoni →
    </a>
  </section>

@endsection
