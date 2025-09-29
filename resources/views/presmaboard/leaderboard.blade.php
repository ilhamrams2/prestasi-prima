@extends('prestasiprima.index')
@section('title', 'Leaderboard')

@section('content')

    <!-- SECTION BOARDNAME -->
    <div class="flex justify-center mt-44 px-4">
        <div class="relative w-full max-w-6xl"> <!-- Mengurangi lebar Board Name agar tidak melebihi navbar -->

            <!-- Layer Orange (belakang, sedikit lebih besar) -->
            <div class="absolute -top-0 -right-1.5 -bottom-0 -left-1.5 bg-orange-500 rounded-[25px]"></div>

            <!-- Layer Putih (depan) -->
            <div class="relative bg-white rounded-[25px] py-6 px-8 flex items-center justify-center shadow-md">

                <!-- Title -->
                <h2 class="text-center text-2xl sm:text-3xl font-semibold text-orange-500">
                    Penilaian Tengah Semester
                </h2>

                <!-- Badge Updated -->
                <span
                    class="absolute top-3 right-0 bg-orange-500 text-white text-sm sm:text-base font-medium px-3 py-1
             rounded-tr-[25px] rounded-bl-[25px] shadow -mt-3">
                    Updated 2 days ago
                </span>

            </div>
        </div>
    </div>

    <div class="flex justify-center mt-10 sm:mt-10 lg:mt-10 items-center px-4">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8 sm:gap-12 lg:gap-16">

            <!-- JUARA 2 -->
            <div
                class="group flex flex-col items-center animate-grow origin-bottom [animation-delay:0.3s]
                transition-transform duration-500 ease-in-out hover:scale-110 hover:animate-floatHover">
                <!-- Foto + Nama -->
                <div
                    class="w-24 h-24 sm:w-28 sm:h-28 rounded-lg bg-[#1D1D1D] overflow-hidden mb-3
                  flex items-center justify-center shadow-md animate-fadeInScale">
                    <img src="https://i.pravatar.cc/150?img=11" alt="avatar" class="w-full h-full object-cover">
                </div>
                <span
                    class="text-lg sm:text-xl font-bold text-orange-500 mb-5
                   animate-fadeInUp [animation-delay:0.3s] group-hover:animate-pulseGlow">
                    Panjul
                </span>

                <!-- Podium -->
                <div
                    class="relative w-40 h-56 sm:w-48 sm:h-64 flex flex-col items-center justify-center
                  shadow-2xl shadow-orange-500/50 rounded-lg
                  transition-transform duration-500 ease-in-out group-hover:scale-105">
                    <div
                        class="absolute inset-0 bg-gradient-to-b from-[#FF9500] via-[#FF7A00] to-[#FF6802]
          [clip-path:polygon(10%_0,90%_0,100%_10%,100%_100%,0%_100%,0%_10%)] rounded-t-lg">
                    </div>

                    <div class="relative z-10 flex flex-col items-center text-white">
                        <img src="{{ asset('assets/images/presmaboard/king2.svg') }}" alt="icon"
                            class="w-12 h-10 sm:w-[48px] sm:h-[40px] mt-2 mb-3
                      animate-kingInteractive group-hover:animate-bounce">
                        <span class="text-3xl sm:text-4xl font-bold mb-2 counter" data-value="85">0</span>
                        <span class="text-lg sm:text-xl font-semibold mb-3">PKP</span>
                        <button
                            class="bg-white text-orange-500 font-semibold px-4 py-2 rounded-md shadow text-sm
            transition-transform duration-300 ease-in-out
            hover:scale-135 hover:shadow-lg hover:shadow-orange-400/50
            active:scale-120 active:shadow-xl active:shadow-orange-500/60
            animate-buttonPop">
                            View Profile
                        </button>
                    </div>
                </div>
            </div>

            <!-- JUARA 1 -->
            <div
                class="group flex flex-col items-center order-first lg:order-none animate-grow origin-bottom
                transition-transform duration-500 ease-in-out hover:scale-110 hover:animate-floatHover">
                <!-- Foto + Nama -->
                <div
                    class="w-28 h-28 sm:w-32 sm:h-32 rounded-lg bg-[#1D1D1D] overflow-hidden mb-3
                  flex items-center justify-center shadow-md animate-fadeInScale">
                    <img src="https://i.pravatar.cc/150?img=12" alt="avatar" class="w-full h-full object-cover">
                </div>
                <span
                    class="text-xl sm:text-2xl font-bold text-orange-500 mb-5
                   animate-fadeInUp [animation-delay:0.3s] group-hover:animate-pulseGlow">
                    orang ganteng
                </span>

                <!-- Podium -->
                <div
                    class="relative w-56 h-72 sm:w-64 sm:h-80 flex flex-col items-center justify-center
                  shadow-3xl shadow-orange-500/60 rounded-lg
                  transition-transform duration-500 ease-in-out group-hover:scale-105">
                    <div
                        class="absolute inset-0 bg-gradient-to-b from-[#FF9500] via-[#FF7A00] to-[#FF6802]
          [clip-path:polygon(10%_0,90%_0,100%_10%,100%_100%,0%_100%,0%_10%)] rounded-t-lg">
                    </div>

                    <div class="relative z-10 flex flex-col items-center text-white">
                        <img src="{{ asset('assets/images/presmaboard/king1.svg') }}" alt="icon"
                            class="w-14 h-12 sm:w-[70px] sm:h-[55px] mt-2 mb-3
                      animate-kingInteractive group-hover:animate-bounce">
                        <span class="text-4xl sm:text-5xl font-bold mb-2 counter" data-value="96">0</span>
                        <span class="text-lg sm:text-xl font-semibold mb-3">PKP</span>
                        <button
                            class="bg-white text-orange-500 font-semibold px-4 py-2 rounded-md shadow text-sm
            transition-transform duration-300 ease-in-out
            hover:scale-135 hover:shadow-lg hover:shadow-orange-400/50
            active:scale-120 active:shadow-xl active:shadow-orange-500/60
            animate-buttonPop">
                            View Profile
                        </button>
                    </div>
                </div>
            </div>

            <!-- JUARA 3 -->
            <div
                class="group flex flex-col items-center animate-grow origin-bottom [animation-delay:0.6s]
                transition-transform duration-500 ease-in-out hover:scale-110 hover:animate-floatHover">
                <!-- Foto + Nama -->
                <div
                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg bg-[#1D1D1D] overflow-hidden mb-3
                  flex items-center justify-center shadow-md animate-fadeInScale">
                    <img src="https://i.pravatar.cc/150?img=13" alt="avatar" class="w-full h-full object-cover">
                </div>
                <span
                    class="text-base sm:text-lg font-bold text-orange-500 mb-5
                   animate-fadeInUp [animation-delay:0.3s] group-hover:animate-pulseGlow">
                    signature
                </span>

                <!-- Podium -->
                <div
                    class="relative w-48 h-64 sm:w-56 sm:h-72 flex flex-col items-center justify-center
                  shadow-xl shadow-orange-500/40 rounded-lg
                  transition-transform duration-500 ease-in-out group-hover:scale-105">
                    <div
                        class="absolute inset-0 bg-gradient-to-b from-[#FF9500] via-[#FF7A00] to-[#FF6802]
          [clip-path:polygon(10%_0,90%_0,100%_10%,100%_100%,0%_100%,0%_10%)] rounded-t-lg">
                    </div>

                    <div class="relative z-10 flex flex-col items-center text-white">
                        <img src="{{ asset('assets/images/presmaboard/king3.svg') }}" alt="icon"
                            class="w-10 h-8 sm:w-[40px] sm:h-[34px] mt-2 mb-3
                      animate-kingInteractive group-hover:animate-bounce">
                        <span class="text-3xl sm:text-4xl font-bold mb-2 counter" data-value="75">0</span>
                        <span class="text-lg sm:text-xl font-semibold mb-3">PKP</span>
                        <button
                            class="bg-white text-orange-500 font-semibold px-4 py-2 rounded-md shadow text-sm
            transition-transform duration-300 ease-in-out
            hover:scale-135 hover:shadow-lg hover:shadow-orange-400/50
            active:scale-120 active:shadow-xl active:shadow-orange-500/60
            animate-buttonPop">
                            View Profile
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="container mx-auto p-4">
        <div class="overflow-x-auto bg-white rounded-lg shadow-md mt-10 max-w-6xl mx-auto">
    <table class="min-w-full text-sm text-left text-gray-500">
      <thead class="bg-orange-500 text-white">
        <tr>
          <th class="px-4 py-3 w-12">Posisi</th>
          <th class="px-4 py-3 w-44">Nama Siswa</th>
          <th class="px-4 py-3 w-16">Kelas</th>
          <th class="px-4 py-3 w-16">Jurusan</th>
          <th class="px-4 py-3 w-24">PKP</th>
          <th class="px-4 py-3 w-32">Discover More</th>
        </tr>
      </thead>
    </table>

    <div class="max-h-96 overflow-y-auto">
      <table class="min-w-full text-sm text-left text-gray-500">
        <tbody class="bg-white">
          <tr class="border-t">
            <td class="px-4 py-4 w-12">4</td>
            <td class="px-4 py-4 w-44">
              <div class="flex items-center space-x-3">
                <img class="w-10 h-10 rounded-full" src="https://randomuser.me/api/portraits/men/4.jpg" alt="profile picture">
                <span>Nusa</span>
              </div>
            </td>
            <td class="px-4 py-4 w-16">X</td>
            <td class="px-4 py-4 w-16">1</td>
            <td class="px-4 py-4 w-24">8399</td>
            <td class="px-4 py-4 w-32">
              <button class="bg-orange-500 text-white rounded-full py-1 px-4">view profile</button>
            </td>
          </tr>
          <tr class="border-t">
            <td class="px-4 py-4 w-12">5</td>
            <td class="px-4 py-4 w-44">
              <div class="flex items-center space-x-3">
                <img class="w-10 h-10 rounded-full" src="https://randomuser.me/api/portraits/men/5.jpg" alt="profile picture">
                <span>Dodo</span>
              </div>
            </td>
            <td class="px-4 py-4 w-16">X</td>
            <td class="px-4 py-4 w-16">1</td>
            <td class="px-4 py-4 w-24">8799</td>
            <td class="px-4 py-4 w-32">
              <button class="bg-orange-500 text-white rounded-full py-1 px-4">view profile</button>
            </td>
          </tr>
          <tr class="border-t">
            <td class="px-4 py-4 w-12">6</td>
            <td class="px-4 py-4 w-44">
              <div class="flex items-center space-x-3">
                <img class="w-10 h-10 rounded-full" src="https://randomuser.me/api/portraits/men/6.jpg" alt="profile picture">
                <span>Nusa</span>
              </div>
            </td>
            <td class="px-4 py-4 w-16">X</td>
            <td class="px-4 py-4 w-16">1</td>
            <td class="px-4 py-4 w-24">8399</td>
            <td class="px-4 py-4 w-32">
              <button class="bg-orange-500 text-white rounded-full py-1 px-4">view profile</button>
            </td>
          </tr>
          <tr class="border-t">
            <td class="px-4 py-4 w-12">7</td>
            <td class="px-4 py-4 w-44">
              <div class="flex items-center space-x-3">
                <img class="w-10 h-10 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg" alt="profile picture">
                <span>John</span>
              </div>
            </td>
            <td class="px-4 py-4 w-16">XI</td>
            <td class="px-4 py-4 w-16">2</td>
            <td class="px-4 py-4 w-24">8999</td>
            <td class="px-4 py-4 w-32">
              <button class="bg-orange-500 text-white rounded-full py-1 px-4">view profile</button>
            </td>
          </tr>
          <tr class="border-t">
            <td class="px-4 py-4 w-12">8</td>
            <td class="px-4 py-4 w-44">
              <div class="flex items-center space-x-3">
                <img class="w-10 h-10 rounded-full" src="https://randomuser.me/api/portraits/men/8.jpg" alt="profile picture">
                <span>Peter</span>
              </div>
            </td>
            <td class="px-4 py-4 w-16">X</td>
            <td class="px-4 py-4 w-16">1</td>
            <td class="px-4 py-4 w-24">8299</td>
            <td class="px-4 py-4 w-32">
              <button class="bg-orange-500 text-white rounded-full py-1 px-4">view profile</button>
            </td>
          </tr>
          <tr class="border-t">
            <td class="px-4 py-4 w-12">9</td>
            <td class="px-4 py-4 w-44">
              <div class="flex items-center space-x-3">
                <img class="w-10 h-10 rounded-full" src="https://randomuser.me/api/portraits/men/9.jpg" alt="profile picture">
                <span>Mary</span>
              </div>
            </td>
            <td class="px-4 py-4 w-16">X</td>
            <td class="px-4 py-4 w-16">1</td>
            <td class="px-4 py-4 w-24">8199</td>
            <td class="px-4 py-4 w-32">
              <button class="bg-orange-500 text-white rounded-full py-1 px-4">view profile</button>
            </td>
          </tr>
          <tr class="border-t">
            <td class="px-4 py-4 w-12">10</td>
            <td class="px-4 py-4 w-44">
              <div class="flex items-center space-x-3">
                <img class="w-10 h-10 rounded-full" src="https://randomuser.me/api/portraits/men/10.jpg" alt="profile picture">
                <span>Samuel</span>
              </div>
            </td>
            <td class="px-4 py-4 w-16">XI</td>
            <td class="px-4 py-4 w-16">2</td>
            <td class="px-4 py-4 w-24">7999</td>
            <td class="px-4 py-4 w-32">
              <button class="bg-orange-500 text-white rounded-full py-1 px-4">view profile</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>


    {{-- Script animasi angka --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const counters = document.querySelectorAll(".counter");
            counters.forEach(counter => {
                let target = +counter.getAttribute("data-value");
                let count = 0;
                let step = Math.ceil(target / 50);
                let interval = setInterval(() => {
                    count += step;
                    if (count >= target) {
                        count = target;
                        clearInterval(interval);
                    }
                    counter.textContent = count;
                }, 30);
            });
        });
    </script>
@endsection
