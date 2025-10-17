<!-- ================= SECTION INDUSTRI ================= -->
<section id="industri" class="py-20 bg-gray-50 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 md:px-8 text-center">

    <!-- Sponsorship -->
    <div class="mb-16">
      <h3 class="text-3xl md:text-4xl font-extrabold text-orange-600">SPONSORSHIP</h3>
      <div class="mt-6 flex justify-center">
        <img src="assets/images/section/industri/prambos.png" alt="Prambos" class="h-20 md:h-28 object-contain">
      </div>
    </div>

    <!-- Kerja Sama Industri -->
    <h3 class="text-3xl md:text-4xl font-extrabold text-orange-600 mb-10">KERJA SAMA INDUSTRI</h3>
    <div class="relative w-full overflow-hidden">

      <!-- Wrapper scroll -->
      <div class="flex animate-scroll space-x-10 sm:space-x-16 md:space-x-20 items-center">
        <!-- Logo Template -->
        <template id="logos">
          <img src="assets/images/section/industri/telkom.png" alt="Telkom Indonesia" class="h-14 sm:h-20 md:h-28 object-contain">
          <img src="assets/images/section/industri/komatsu.png" alt="Komatsu" class="h-14 sm:h-20 md:h-28 object-contain">
          <img src="assets/images/section/industri/kemenkop.png" alt="Kemenkop UKM" class="h-14 sm:h-20 md:h-28 object-contain">
          <img src="assets/images/section/industri/jatelindo.png" alt="Jatelindo" class="h-14 sm:h-20 md:h-28 object-contain">
          <img src="assets/images/section/industri/panasonic.png" alt="Panasonic" class="h-14 sm:h-20 md:h-28 object-contain">
          <img src="assets/images/section/industri/antam.png" alt="Antam" class="h-14 sm:h-20 md:h-28 object-contain">
          <img src="assets/images/section/industri/starvision.png" alt="StarVision" class="h-14 sm:h-20 md:h-28 object-contain">
          <img src="assets/images/section/industri/lemnegara.png" alt="Lembaga Negara" class="h-14 sm:h-20 md:h-28 object-contain">
        </template>

        <!-- Duplicate logos for infinite loop -->
        <script>
          const wrapper = document.currentScript.parentElement;
          const template = wrapper.querySelector('#logos').content;
          for (let i = 0; i < 2; i++) wrapper.append(...template.cloneNode(true).children);
        </script>
      </div>
    </div>
  </div>

  <!-- Gradient fade effect -->
  <div class="pointer-events-none absolute inset-y-0 left-0 w-20 bg-gradient-to-r from-gray-50 to-transparent"></div>
  <div class="pointer-events-none absolute inset-y-0 right-0 w-20 bg-gradient-to-l from-gray-50 to-transparent"></div>
</section>

<style>
@keyframes scroll {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}
.animate-scroll {
  display: flex;
  width: max-content;
  animation: scroll 25s linear infinite;
}
</style>
