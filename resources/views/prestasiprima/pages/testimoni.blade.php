@extends('prestasiprima.index')

@section('title', 'Testimoni - SMK Prestasi Prima')

@section('content')
<section class="min-h-screen bg-gradient-to-b from-white via-gray-50 to-white pt-40 pb-24 relative overflow-hidden">

  {{-- ===== Dekorasi Background ===== --}}
  <div class="absolute inset-0 -z-10 overflow-hidden">
    <div class="absolute top-10 left-10 w-64 h-64 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#0e162e]/10 rounded-full blur-3xl opacity-40"></div>
  </div>

  <div class="max-w-7xl mx-auto px-6 text-center">
    {{-- ===== Header ===== --}}
    <h1 class="text-5xl font-extrabold text-[#0e162e] mb-4 tracking-tight" data-aos="fade-down">
      Testimoni <span class="text-orange-500">Inspiratif</span>
    </h1>
    <p class="text-gray-600 mb-16 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
      Dengarkan pengalaman luar biasa dari siswa, alumni, dan wali murid SMK Prestasi Prima tentang perjalanan mereka bersama kami.
    </p>

    {{-- ===== Tabs Navigation ===== --}}
    <div class="tabs flex justify-center gap-10 mb-16 relative" data-aos="fade-up" data-aos-delay="150">
      <button class="tab-btn active" data-tab="siswa">Siswa</button>
      <button class="tab-btn" data-tab="alumni">Alumni</button>
      <button class="tab-btn" data-tab="wali">Wali Murid</button>
      <div class="tab-indicator"></div>
    </div>

    {{-- ===== Tab Contents ===== --}}
    <div id="siswa" class="tab-content grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-10 fade-in">
      @foreach([
        ['img'=>'siswa1.jpg','nama'=>'Anisa Rahma','jurusan'=>'PPLG X-1','text'=>'Guru-gurunya sangat sabar dan fasilitas belajarnya lengkap. Saya merasa termotivasi untuk terus berkembang.'],
        ['img'=>'siswa1.jpg','nama'=>'Bagas Pratama','jurusan'=>'TJKT X-2','text'=>'Belajar di SMK Prestasi Prima membuat saya lebih disiplin dan siap menghadapi dunia industri.'],
        ['img'=>'siswa1.jpg','nama'=>'Dewi Larasati','jurusan'=>'DKV X-1','text'=>'Saya bisa menyalurkan ide kreatif lewat berbagai proyek desain yang seru dan menantang!'],
      ] as $siswa)
      <div class="testimonial-card" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 150 }}">
        <img src="{{ asset('assets/images/testimoni/' . $siswa['img']) }}" alt="{{ $siswa['nama'] }}" class="avatar">
        <p class="quote">“{{ $siswa['text'] }}”</p>
        <h3 class="name">{{ $siswa['nama'] }}</h3>
        <span class="role text-orange-500">{{ $siswa['jurusan'] }}</span>
      </div>
      @endforeach
    </div>

    <div id="alumni" class="tab-content hidden grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-10 fade-in">
      @foreach([
        ['img'=>'siswa1.jpg','nama'=>'Rizky Setiawan','jurusan'=>'Alumni TJKT 2021','text'=>'Bekal ilmu dari SMK Prestasi Prima sangat berguna saat saya bekerja di perusahaan teknologi nasional.'],
        ['img'=>'siswa1.jpg','nama'=>'Dinda Putri','jurusan'=>'Alumni DKV 2023','text'=>'Lingkungan kreatif dan dukungan dari guru menjadikan saya lebih percaya diri di dunia kerja.'],
        ['img'=>'siswa1.jpg','nama'=>'Fauzan Hidayat','jurusan'=>'Alumni PPLG 2022','text'=>'SMK Prestasi Prima membentuk karakter kerja yang tangguh dan profesional.'],
      ] as $alumni)
      <div class="testimonial-card" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 150 }}">
        <img src="{{ asset('assets/images/testimoni/' . $alumni['img']) }}" alt="{{ $alumni['nama'] }}" class="avatar">
        <p class="quote">“{{ $alumni['text'] }}”</p>
        <h3 class="name">{{ $alumni['nama'] }}</h3>
        <span class="role text-orange-500">{{ $alumni['jurusan'] }}</span>
      </div>
      @endforeach
    </div>

    <div id="wali" class="tab-content hidden grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-10 fade-in">
      @foreach([
        ['img'=>'siswa1.jpg','nama'=>'Ibu Rina Hartati','jurusan'=>'Orang Tua Anisa Rahma','text'=>'Saya bangga anak saya bersekolah di sini. Sekolahnya sangat memperhatikan karakter dan prestasi siswa.'],
        ['img'=>'siswa1.jpg','nama'=>'Bapak Hendra Saputra','jurusan'=>'Orang Tua Bagas','text'=>'Komunikasi antara guru dan orang tua berjalan baik, dan perkembangan anak kami sangat terasa.'],
        ['img'=>'siswa1.jpg','nama'=>'Ibu Melati','jurusan'=>'Orang Tua Dewi Larasati','text'=>'Program pembelajaran di SMK Prestasi Prima sangat relevan dengan kebutuhan masa depan.'],
      ] as $wali)
      <div class="testimonial-card" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 150 }}">
        <img src="{{ asset('assets/images/testimoni/' . $wali['img']) }}" alt="{{ $wali['nama'] }}" class="avatar">
        <p class="quote">“{{ $wali['text'] }}”</p>
        <h3 class="name">{{ $wali['nama'] }}</h3>
        <span class="role text-orange-500">{{ $wali['jurusan'] }}</span>
      </div>
      @endforeach
    </div>

    {{-- ===== CTA ===== --}}
    <div class="mt-24" data-aos="fade-up" data-aos-delay="300">
      <h2 class="text-3xl font-bold text-[#0e162e] mb-6">Ingin Menjadi Bagian dari Prestasi Kami?</h2>
      <a href="/pendaftaran" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-10 py-4 rounded-full shadow-lg hover:shadow-xl transition duration-300">
        Daftar Sekarang
      </a>
    </div>
  </div>
</section>

{{-- ===== STYLE KHUSUS ===== --}}
<style>
.tab-btn {
  @apply relative px-6 py-3 font-semibold text-gray-600 transition-all duration-300;
}
.tab-btn.active {
  @apply text-orange-500;
}
.tab-btn::after {
  content: "";
  position: absolute;
  left: 50%;
  bottom: -4px;
  width: 0;
  height: 3px;
  background-color: #f97316;
  border-radius: 2px;
  transform: translateX(-50%);
  transition: width 0.3s ease;
}
.tab-btn.active::after {
  width: 50%;
}
.tab-btn:hover {
  color: #f97316;
}
.testimonial-card {
  @apply bg-white rounded-3xl shadow-lg p-8 text-center border border-gray-100 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2;
}
.testimonial-card .avatar {
  @apply w-24 h-24 rounded-full mx-auto mb-6 object-cover border-4 border-orange-100 shadow-md;
}
.testimonial-card .quote {
  @apply italic text-gray-700 mb-6 leading-relaxed;
}
.testimonial-card .name {
  @apply text-lg font-bold text-[#0e162e];
}
.fade-in {
  animation: fadeIn 0.6s ease-in-out;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>

{{-- ===== SCRIPT UNTUK TAB + AUTO SLIDE ===== --}}
<script>
document.addEventListener("DOMContentLoaded", () => {
  const tabs = document.querySelectorAll(".tab-btn");
  const contents = document.querySelectorAll(".tab-content");
  let index = 0;

  function showTab(i) {
    tabs.forEach(t => t.classList.remove("active"));
    contents.forEach(c => c.classList.add("hidden"));
    tabs[i].classList.add("active");
    contents[i].classList.remove("hidden");
  }

  tabs.forEach((tab, i) => {
    tab.addEventListener("click", () => {
      index = i;
      showTab(index);
    });
  });

  // Auto slide setiap 8 detik
  setInterval(() => {
    index = (index + 1) % tabs.length;
    showTab(index);
  }, 5000);
});
</script>
@endsection
