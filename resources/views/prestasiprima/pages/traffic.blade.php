@extends('prestasiprima.index')

@section('title', 'Traffic Tracker - SMK Prestasi Prima')

@section('content')
<section class="min-h-screen bg-gradient-to-b from-white via-orange-50/30 to-gray-50 pt-36 pb-24 relative overflow-hidden">

  {{-- === ORNAMENT LIGHT === --}}
  <div class="absolute top-0 left-0 w-72 h-72 bg-orange-200/40 blur-3xl rounded-full -z-10"></div>
  <div class="absolute bottom-0 right-0 w-80 h-80 bg-gray-300/40 blur-3xl rounded-full -z-10"></div>

  <div class="max-w-6xl mx-auto px-6">
    {{-- === HEADING === --}}
    <div class="text-center mb-16">
      <h2 class="text-5xl font-extrabold tracking-tight mb-3">
        <span class="text-orange-600">Traffic</span> <span class="text-gray-900">Tracker</span>
      </h2>
      <p class="text-gray-600 text-lg max-w-2xl mx-auto">
        Hitung jarak dan waktu tempuh dari rumah Anda ke <strong class="text-gray-800">SMK Prestasi Prima</strong> secara akurat.  
        Gunakan lokasi otomatis atau masukkan alamat manual, lalu pilih mode transportasi favorit Anda.
      </p>
    </div>

    {{-- === CARD FORM === --}}
    <div class="bg-white/90 backdrop-blur-md shadow-lg rounded-2xl border border-gray-100 p-8 transition hover:shadow-2xl duration-300">
      <div class="grid md:grid-cols-2 gap-10">

        {{-- === ALAMAT INPUT === --}}
        <div class="space-y-3">
          <label for="alamat_rumah" class="block text-gray-800 font-semibold text-lg flex items-center gap-2">
            <i class="ri-home-5-line text-orange-600"></i> Alamat Rumah
          </label>
          <input type="text" id="alamat_rumah" name="alamat_rumah"
            class="w-full border border-gray-300 rounded-xl p-3 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-orange-500 focus:outline-none"
            placeholder="Contoh: Jl. Raya Pondok Gede No.10, Jakarta Timur">

          <button type="button" onclick="gunakanLokasiSaya()"
            class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 
            text-white py-3 rounded-xl font-semibold transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center gap-2">
            <i class="ri-focus-3-line"></i> Gunakan Lokasi Saat Ini
          </button>
        </div>

        {{-- === MODE TRANSPORTASI === --}}
        <div class="space-y-3">
          <label class="block text-gray-800 font-semibold text-lg flex items-center gap-2">
            <i class="ri-car-line text-orange-600"></i> Pilih Mode Transportasi
          </label>
          <select id="mode_transportasi"
            class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-500 focus:outline-none text-gray-700">
            <option value="DRIVING">🚘 Mobil</option>
            <option value="TWO_WHEELER">🏍️ Motor</option>
            <option value="WALKING">🚶 Jalan Kaki</option>
            <option value="TRANSIT">🚌 Transportasi Umum</option>
          </select>

          <button type="button" onclick="hitungJarakManual()"
            class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 
            text-white py-3 rounded-xl font-semibold transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center gap-2">
            <i class="ri-map-pin-search-line"></i> Hitung Jarak
          </button>
        </div>

      </div>
    </div>

    {{-- === HASIL PERHITUNGAN === --}}
    <div id="hasil" class="hidden mt-14 bg-white shadow-xl rounded-2xl p-8 text-center border border-gray-100 transition duration-300">
      <h3 class="text-2xl font-bold text-gray-900 mb-3 flex items-center justify-center gap-2">
  <i class="ri-line-chart-line text-orange-600"></i> Hasil Perhitungan
      </h3>
      <p class="text-gray-600 mb-2" id="alamatOutput"></p>
      <p class="text-gray-800 text-lg mb-1">Jarak: <strong class="text-orange-600" id="jarakOutput"></strong></p>
      <p class="text-gray-800 text-lg">Waktu Tempuh: <strong class="text-orange-600" id="durasiOutput"></strong></p>
    </div>

    {{-- === MAP === --}}
    <div id="map" class="mt-10 w-full h-96 rounded-2xl shadow-lg hidden"></div>
  </div>
</section>

{{-- === Google Maps API === --}}
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap">
</script>

{{-- === SCRIPT LOGIC === --}}
<script>
const sekolah = "SMK Prestasi Prima, Jakarta Timur";
let map, directionsService, directionsRenderer;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: { lat: -6.2268, lng: 106.8952 },
    styles: [
      { elementType: "geometry", stylers: [{ color: "#f9fafb" }] },
      { elementType: "labels.icon", stylers: [{ visibility: "off" }] },
      { elementType: "labels.text.fill", stylers: [{ color: "#333" }] },
      { featureType: "road", elementType: "geometry", stylers: [{ color: "#ffffff" }] },
      { featureType: "road.highway", elementType: "geometry", stylers: [{ color: "#f59e0b" }] },
      { featureType: "water", elementType: "geometry", stylers: [{ color: "#cce5ff" }] }
    ]
  });
  directionsService = new google.maps.DirectionsService();
  directionsRenderer = new google.maps.DirectionsRenderer({ map: map });
}

function tampilkanHasil(alamat, result) {
  document.getElementById("hasil").classList.remove("hidden");
  document.getElementById("map").classList.remove("hidden");
  document.getElementById("alamatOutput").innerHTML = "Alamat: <strong>" + alamat + "</strong>";
  document.getElementById("jarakOutput").innerText = result.routes[0].legs[0].distance.text;
  document.getElementById("durasiOutput").innerText = result.routes[0].legs[0].duration.text;
}

function hitungRute(asal, mode) {
  const request = { origin: asal, destination: sekolah, travelMode: mode };
  directionsService.route(request, function(result, status) {
    if (status === "OK") {
      directionsRenderer.setDirections(result);
      tampilkanHasil(asal, result);
    } else {
      alert("❌ Gagal menghitung jarak. Periksa alamat atau aktifkan GPS Anda.");
    }
  });
}

function gunakanLokasiSaya() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(pos) {
      const posisiSaya = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
      const mode = document.getElementById("mode_transportasi").value;
      hitungRute(posisiSaya, mode);
    }, function() {
      alert("Tidak dapat mengambil lokasi. Pastikan GPS aktif.");
    });
  } else {
    alert("Browser tidak mendukung geolokasi.");
  }
}

function hitungJarakManual() {
  const alamat = document.getElementById("alamat_rumah").value;
  if (!alamat) return alert("Masukkan alamat rumah terlebih dahulu!");
  const mode = document.getElementById("mode_transportasi").value;
  hitungRute(alamat, mode);
}

window.initMap = initMap;
</script>
@endsection
