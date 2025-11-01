@extends('prestasiprima.index')

@section('title', 'PresmaContact - SMK Prestasi Prima')

@section('content')
<section class="relative min-h-screen bg-gradient-to-br from-gray-100 via-white to-gray-200 pt-36 pb-24 overflow-hidden">

  {{-- === BACKGROUND EFFECT === --}}
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute w-96 h-96 bg-orange-500/10 blur-[120px] top-[-50px] left-[-100px] rounded-full"></div>
    <div class="absolute w-96 h-96 bg-gray-900/10 blur-[120px] bottom-[-50px] right-[-100px] rounded-full"></div>
  </div>

  {{-- === HEADER === --}}
  <div class="text-center mb-20 relative z-10 animate-fade-down">
    <h2 class="text-5xl md:text-6xl font-extrabold text-gray-800 tracking-tight">
      <span class="text-orange-600">Presma</span>Contact
    </h2>
    <p class="mt-4 text-gray-600 text-lg max-w-2xl mx-auto">
      Mari terhubung dengan <span class="font-semibold text-orange-600">SMK Prestasi Prima</span>
      kami siap mendengarkan aspirasi dan kolaborasi untuk masa depan yang lebih gemilang.
    </p>
  </div>

  {{-- === MAIN CONTENT === --}}
  <div class="relative z-10 container mx-auto px-6 grid md:grid-cols-2 gap-12 items-start">

    {{-- === FORM === --}}
    <div class="bg-white/80 backdrop-blur-md border border-gray-200 shadow-xl rounded-3xl p-8 hover:shadow-2xl transition-all duration-500 animate-fade-up">
      <h3 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3 border-gray-300">Kirim Pesan</h3>

      <form method="POST" action="{{ route('presmacontact.send') }}" class="space-y-5">
        @csrf
        <div>
          <label class="block font-semibold text-gray-700 mb-2">Nama Lengkap</label>
          <input type="text" name="nama" placeholder="Masukkan nama anda"
            class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none transition">
        </div>

        <div>
          <label class="block font-semibold text-gray-700 mb-2">Email</label>
          <input type="email" name="email" placeholder="Masukkan email aktif"
            class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none transition">
        </div>

        <div>
          <label class="block font-semibold text-gray-700 mb-2">Pesan</label>
          <textarea name="pesan" rows="5" placeholder="Tuliskan pesan atau pertanyaan anda"
            class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none transition"></textarea>
        </div>

        <button type="submit"
          class="w-full py-3 bg-orange-600 hover:bg-orange-700 text-white text-lg font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
          <i class="fas fa-paper-plane mr-2"></i> Kirim Sekarang
        </button>
      </form>
    </div>

    {{-- === CONTACT INFO CARD === --}}
    <div class="bg-gray-900 text-white rounded-3xl shadow-xl p-10 relative overflow-hidden animate-fade-up delay-300">
      <div class="absolute inset-0 bg-gradient-to-br from-orange-600/20 to-transparent"></div>
      <div class="relative z-10 space-y-6">
        <h3 class="text-3xl font-extrabold text-orange-500 mb-6">Hubungi Kami</h3>

        <div class="space-y-4 text-gray-200">
          <p><i class="fas fa-map-marker-alt text-orange-400 mr-3"></i> Jl. Kayu Manis No.123, Jakarta Timur</p>
          <p><i class="fas fa-envelope text-orange-400 mr-3"></i> info@smkprestasiprima.sch.id</p>
          <p><i class="fas fa-phone-alt text-orange-400 mr-3"></i> (021) 555-7890</p>
          <p><i class="fab fa-whatsapp text-orange-400 mr-3"></i> +62 812 3456 7890</p>
        </div>

        <div class="pt-6">
          <h4 class="text-lg font-semibold mb-3">Ikuti Kami</h4>
          <div class="flex space-x-5 text-2xl">
            <a href="#" class="hover:text-orange-400 transition"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-orange-400 transition"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-orange-400 transition"><i class="fab fa-tiktok"></i></a>
            <a href="#" class="hover:text-orange-400 transition"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- === MAP === --}}
  <div class="container mx-auto mt-20 px-6 animate-fade-up delay-500">
    <div class="rounded-3xl overflow-hidden shadow-2xl border border-gray-300">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4748268020353!2d106.8972187!3d-6.332476499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed2681bc7c67%3A0x777152b1d3f74a62!2sSMK%20Prestasi%20Prima!5e0!3m2!1sid!2sid!4v1756647265168!5m2!1sid!2sid"
        width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
</style>
@endsection
