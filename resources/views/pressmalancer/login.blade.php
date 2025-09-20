@include('header')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presmalance - Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white font-sans relative overflow-x-hidden">

    <div class="absolute top-50 -left-20 w-48 h-48 bg-orange-300 rounded-full blur-2xl opacity-60"></div>
    <div class="absolute bottom-100 -right-20 w-60 h-60 bg-orange-300 rounded-full blur-2xl opacity-60"></div>
    

    <section class="max-w-5xl mx-auto px-6 py-12 relative z-10">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 leading-snug">
                    Temukan magang dan kerja paruh waktu yang cocok untuk anak SMK hanya di 
                    <span class="text-orange-500">Presmalance!</span>
                </h1>

                <div class="bg-orange-100 border shadow-md rounded-xl mt-6 p-6">
                    <button class="w-full flex items-center justify-center gap-3 bg-white border border-gray-300 rounded-lg py-3 hover:bg-gray-100 transition">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-5 h-5">
                        <span class="font-medium">Login dengan Google</span>
                    </button>

                    <div class="flex items-center my-4">
                        <hr class="flex-grow border-gray-300">
                        <span class="px-3 text-gray-500 text-sm">atau</span>
                        <hr class="flex-grow border-gray-300">
                    </div>

                    <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg transition">
                        Masuk
                    </button>

                    <p class="text-center text-gray-600 mt-4 text-sm">
                        Belum punya akun? <a href="#" class="text-orange-500 font-semibold">Daftar</a>
                    </p>
                </div>
            </div>

            <div class="flex flex-col items-center">
                <img src="../assets/images/section/presmalancer/siswa1.png" alt="Anak SMK" class="w-80 relative z-10">
                <span class="margin-top: 0.125rem transform translate-x-2.5 bg-orange-500 text-white px-10 py-3 rounded-full shadow-md text-sm font-semibold transition hover:shadow-lg">
                    Dari Kelas ke Dunia Kerja
                </span>
            </div>
        </div>
    </section>

    <section class="py-12 relative z-10">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-xl md:text-2xl font-semibold text-gray-800 text-center mb-8">
                Cari magang atau kerja part-time seru di perusahaan pilihanmu!
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="bg-orange-100 border rounded-xl shadow-sm p-6 hover:shadow-md transition">
                    <img src="../assets/images/section/industri/komatsu.png" alt="Komatsu" class="h-8 mx-auto mb-2">
                    <p class="text-sm text-gray-600">7 lowongan tersedia</p>
                </div>
                <div class="bg-orange-100 border rounded-xl shadow-sm p-6 hover:shadow-md transition">
                    <img src="../assets/images/section/industri/jatelindo.png" alt="Komatsu" class="h-8 mx-auto mb-2">
                    <p class="text-sm text-gray-600">13 lowongan tersedia</p>
                </div>
                <div class="bg-orange-100 border rounded-xl shadow-sm p-6 hover:shadow-md transition">
                    <img src="../assets/images/section/industri/antam.png" alt="Komatsu" class="h-8 mx-auto mb-2">
                    <p class="text-sm text-gray-600">3 lowongan tersedia</p>
                </div>
                <div class="bg-orange-100 border rounded-xl shadow-sm p-6 hover:shadow-md transition">
                    <img src="../assets/images/section/industri/wika.png" alt="Komatsu" class="h-8 mx-auto mb-2">
                    <p class="text-sm text-gray-600">9 lowongan tersedia</p>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-6 py-12 grid md:grid-cols-2 gap-6 relative z-10">
        <div class="bg-orange-100 rounded-2xl p-6 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-bold text-gray-800">Siap Magang? Upgrade Skill-mu Dulu!</h3>
                <button class="mt-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                    Ikuti Jadwal Workshop
                </button>
            </div>
            <img src="../assets/images/section/presmalancer/logo.webp" alt="Workshop" class="h-24">
        </div>

        <div class="bg-orange-100 rounded-2xl p-6 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-bold text-gray-800">Cari tahu gaji di industri pilihanmu!</h3>
                <button class="mt-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                    Cek Gaji & Info Lainnya
                </button>
            </div>
            <img src="../assets/images/section/presmalancer/logo.webp" alt="Salary" class="h-24">
        </div>
    </section>

</body>
</html>
@include('footer')