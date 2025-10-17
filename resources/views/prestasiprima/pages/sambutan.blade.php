@extends('prestasiprima.index')
@section('title','Sambutan - SMK Prestasi Prima')

@section('content')
  <!-- Section Sambutan -->
  <section class="relative bg-white py-16 mt-20">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center px-6">
      
      <!-- Foto Sambutan -->
      <div class="relative">
        <div class="bg-[#0C2340] rounded-2xl p-4 w-fit mx-auto shadow-xl">
          <img src="{{ asset('assets/images/sambutan/sambutan.png') }}" 
               alt="Foto Kepala Sekolah"
               class="rounded-xl w-full h-auto">
        </div>
      </div>

      <!-- Isi Sambutan -->
      <div>
        <h3 class="text-sm font-bold text-gray-600 uppercase tracking-wide">
          Penjamin Mutu Yayasan Prestasi Prima
        </h3>
        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mt-2">
          Dr. Wannen Pakpahan, MM.
        </h2>

        <div class="mt-6 text-gray-700 space-y-4 leading-relaxed">
          <p>Assalamu’alaikum Warahmatullahi Wabarakatuh.</p>
          <p>
            Selamat datang di website resmi SMK Prestasi Prima. Kami percaya, lulusan unggul bukan hanya yang cakap teknologi,
            tapi juga yang berkarakter, beriman, dan percaya diri.
          </p>
          <p>
            Melalui pendekatan abad 21 dan pembelajaran berbasis kompetensi, kami membekali siswa untuk siap bersaing di dunia kerja dan dunia global—terutama di bidang PPG, TJK, DKV, dan Broadcasting.
          </p>
          <p>
            Karena bagi kami, sekolah bukan sekadar tempat belajar, tapi tempat bertumbuh dan bermimpi.
          </p>
          <p>
            Terima kasih atas kunjungan Anda.<br/>
            Wassalamu’alaikum Warahmatullahi Wabarakatuh.
          </p>
        </div>

        <div class="mt-6">
          <a href="#"
             class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition">
            Daftar Sekarang →
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Background Sekolah -->
  <section class="relative mt-10">
    <img src="{{ asset('assets/images/sambutan/sekolah.svg') }}" 
         alt="Gedung SMK Prestasi Prima"
         class="w-full object-cover">
  </section>
@endsection