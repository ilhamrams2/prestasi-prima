@extends('prestasiprima.index')

@section('title', 'PresmaContact - SMK Prestasi Prima')

@section('content')
<section class="relative min-h-screen bg-gradient-to-br from-gray-100 via-white to-gray-200 pt-32 pb-20 overflow-hidden">

  {{-- === BACKGROUND EFFECT === --}}
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute w-80 h-80 md:w-96 md:h-96 bg-orange-500/10 blur-[100px] top-[-60px] left-[-80px] rounded-full"></div>
    <div class="absolute w-80 h-80 md:w-96 md:h-96 bg-gray-900/10 blur-[100px] bottom-[-60px] right-[-80px] rounded-full"></div>
  </div>

  {{-- === HEADER === --}}
  <div class="text-center mb-14 md:mb-20 relative z-10 animate-fade-down px-4">
    <h2 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-gray-800 tracking-tight leading-tight">
      <span class="text-orange-600">Presma</span>Contact
    </h2>
    <p class="mt-4 text-gray-600 text-base sm:text-lg max-w-xl sm:max-w-2xl mx-auto leading-relaxed">
      Mari terhubung dengan <span class="font-semibold text-orange-600">SMK Prestasi Prima</span>.
      Kami siap mendengarkan aspirasi dan kolaborasi untuk masa depan yang lebih gemilang.
    </p>
  </div>

  {{-- === MAIN CONTENT === --}}
<div class="relative z-10 container mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-12 items-stretch">

  {{-- === FORM KONTAK === --}}
  <div class="bg-white/80 backdrop-blur-md border border-gray-200 shadow-xl rounded-3xl p-6 sm:p-8 h-full flex flex-col justify-between hover:shadow-2xl transition-all duration-500 animate-fade-up">
    <div>
      <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 border-b pb-3 border-gray-300">Kirim Pesan</h3>

      {{-- === SUCCESS MESSAGE === --}}
      @if(session('success'))
        <div class="p-3 mb-5 bg-green-100 border border-green-400 text-green-700 rounded-lg">
          {{ session('success') }}
        </div>
      @endif

      <form method="POST" action="{{ route('presmacontact.send') }}" class="space-y-5">
        @csrf
        <div>
          <label class="block font-semibold text-gray-700 mb-2 text-sm sm:text-base">Nama Lengkap</label>
          <input type="text" name="nama" placeholder="Masukkan nama anda"
            class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none transition text-sm sm:text-base">
        </div>

        <div>
          <label class="block font-semibold text-gray-700 mb-2 text-sm sm:text-base">Email</label>
          <input type="email" name="email" placeholder="Masukkan email aktif"
            class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none transition text-sm sm:text-base">
        </div>

        <div>
          <label class="block font-semibold text-gray-700 mb-2 text-sm sm:text-base">Nomor Telepon</label>
          <input type="tel" name="telepon" placeholder="Masukkan nomor telepon aktif"
            class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none transition text-sm sm:text-base">
        </div>

        <div>
          <label class="block font-semibold text-gray-700 mb-2 text-sm sm:text-base">Kategori Pesan</label>
          <select name="kategori"
            class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none transition text-sm sm:text-base">
            <option value="">-- Pilih kategori --</option>
            <option value="pertanyaan">Pertanyaan</option>
            <option value="kerjasama">Kerja Sama</option>
            <option value="pengaduan">Pengaduan</option>
            <option value="lainnya">Lainnya</option>
          </select>
        </div>

        <div>
          <label class="block font-semibold text-gray-700 mb-2 text-sm sm:text-base">Pesan</label>
          <textarea name="pesan" rows="5" placeholder="Tuliskan pesan atau pertanyaan anda"
            class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none transition text-sm sm:text-base"></textarea>
        </div>

        <div class="flex gap-3">
          <button type="submit"
            class="w-full py-3 bg-orange-600 hover:bg-orange-700 text-white text-base sm:text-lg font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <i class="fas fa-paper-plane mr-2"></i> Kirim Sekarang
          </button>
          <button type="reset"
            class="w-1/3 py-3 border border-gray-400 text-gray-700 hover:bg-gray-100 rounded-xl font-semibold transition-all duration-300">
            Reset
          </button>
        </div>
      </form>
    </div>
  </div>

  {{-- === CONTACT INFO CARD (PADAT & INFORMATIF) === --}}
  <div class="bg-gradient-to-br from-orange-500 to-orange-400 text-white rounded-3xl shadow-2xl p-8 sm:p-10 h-full flex flex-col justify-between relative overflow-hidden animate-fade-up delay-300">
    <div class="absolute inset-0 bg-gradient-to-tr from-orange-600/40 to-orange-200/20 rounded-3xl pointer-events-none"></div>

    <div class="relative z-10 space-y-7">
      {{-- Judul dan Deskripsi --}}
      <div>
        <h3 class="text-2xl sm:text-3xl font-extrabold text-white mb-2">Hubungi Kami</h3>
        <p class="text-white/90 text-sm sm:text-base leading-relaxed">
          Kami siap membantu Anda untuk informasi lebih lanjut mengenai sekolah dan kegiatan di SMK Prestasi Prima.
        </p>
      </div>

      {{-- Informasi Kontak --}}
      <div class="space-y-4 text-white/90 text-sm sm:text-base">
        <p class="flex items-start"><i class="ri-map-pin-line text-white mr-3 text-lg"></i> Jl. Hankam Raya No. 89, Cilangkap, Cipayung, Jakarta Timur, DKI Jakarta</p>
        <p class="flex items-center"><i class="ri-mail-line text-white mr-3 text-lg"></i> smk.prestasiprima.sch.id</p>
        <p class="flex items-center"><i class="ri-phone-line text-white mr-3 text-lg"></i> +62 851-9592-8886</p>
      </div>

      {{-- Jam Operasional --}}
      <div class="bg-white/15 p-4 rounded-2xl text-white/90">
        <h4 class="text-lg font-semibold mb-2 flex items-center"><i class="ri-time-line mr-2"></i>Jam Operasional</h4>
        <p class="text-sm">Senin - Jumat : 07.00 - 17.00 WIB</p>
        <p class="text-sm">Sabtu : 07.00 - 16.00 WIB</p>
        <p class="text-sm">Minggu : 07.00 - 15.00</p>
      </div>

      {{-- Peta Lokasi --}}
      <div class="rounded-2xl overflow-hidden shadow-lg border border-white/20">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0301712568135!2d106.89720587499186!3d-6.259022793724494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed7ed2b62b13%3A0x3e109bcbffb80b3f!2sSMK%20Prestasi%20Prima!5e0!3m2!1sid!2sid!4v1695110704374!5m2!1sid!2sid"
          width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>

      {{-- Social Media --}}
      <div class="pt-3">
        <h4 class="text-lg font-semibold mb-3">Ikuti Kami</h4>
        <div class="flex items-center gap-4">
          <a href="https://www.facebook.com/p/SMK-Prestasi-PRIMA-100035392916117/"
             class="bg-white/20 hover:bg-white/30 w-10 h-10 flex items-center justify-center rounded-full transition shadow-md">
             <i class="ri-facebook-fill text-white text-xl"></i>
          </a>
          <a href="https://www.instagram.com/smkprestasiprima/"
             class="bg-white/20 hover:bg-white/30 w-10 h-10 flex items-center justify-center rounded-full transition shadow-md">
             <i class="ri-instagram-line text-white text-xl"></i>
          </a>
          <a href="https://www.youtube.com/@SEKOLAHPRESTASIPRIMA"
             class="bg-white/20 hover:bg-white/30 w-10 h-10 flex items-center justify-center rounded-full transition shadow-md">
             <i class="ri-youtube-line text-white text-xl"></i>
          </a>
        </div>
      </div>

      {{-- Tombol WhatsApp --}}
      <div class="pt-6">
        <a href="https://wa.me/6285195928886"
           class="block w-full text-center bg-white text-orange-600 font-semibold py-3 rounded-xl shadow-md hover:bg-orange-100 transition-all duration-300">
           <i class="ri-whatsapp-line mr-2 text-lg"></i> Hubungi via WhatsApp
        </a>
      </div>
    </div>
  </div>
</div>


  {{-- === MAP === --}}
  <div class="container mx-auto mt-20 px-6 animate-fade-up delay-500">
    <div class="rounded-3xl overflow-hidden shadow-2xl border border-gray-300">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4748268020353!2d106.8972187!3d-6.332476499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed2681bc7c67%3A0x777152b1d3f74a62!2sSMK%20Prestasi%20Prima!5e0!3m2!1sid!2sid!4v1756647265168!5m2!1sid!2sid"
        width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy" title="Lokasi SMK Prestasi Prima"></iframe>
    </div>
  </div>
</section>

{{-- === ANIMATIONS === --}}
<style>
  @keyframes fadeDown {
    from { opacity: 0; transform: translateY(-40px); }
    to { opacity: 1; transform: translateY(0); }
  }
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(50px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-down { animation: fadeDown 1s ease forwards; }
  .animate-fade-up { animation: fadeUp 1s ease forwards; }
  .delay-300 { animation-delay: .3s; }
  .delay-500 { animation-delay: .5s; }

  /* ===== RESPONSIVE ADJUSTMENTS ===== */
  @media (max-width: 768px) {
    section {
      padding-top: 7rem;
      padding-bottom: 4rem;
    }
  }
</style>
@endsection
