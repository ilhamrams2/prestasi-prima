@extends('prestasiprima.index')
@section('title', 'Leaderboard')

@section('content')

@php
    // Ambil kandidat juara dengan aman (Collection::get mengembalikan null bila index tidak ada)
    $first  = $students->get(0);
    $second = $students->get(1);
    $third  = $students->get(2);

    // Helper kecil: ambil foto jika ada, else default
    function studentPhoto($student) {
        if ($student && !empty($student->foto)) {
            return asset('storage/presmaboard/students/' . $student->foto);
        }
        return asset('assets/images/presmaboard/user.png');
    }

    function studentName($student) {
        return $student && !empty($student->nama) ? $student->nama : '-';
    }

    function studentScore($student) {
        return $student && isset($student->scores_avg_score) ? number_format($student->scores_avg_score, 2) : number_format(0, 2);
    }

    function studentProfileRoute($student) {
        return $student ? route('presmaboard.eligible', $student->id) : '#';
    }
@endphp

    <!-- SECTION BOARDNAME -->
    <div class="flex justify-center mt-44 px-4">
        <div class="relative w-full max-w-6xl">

            <div class="absolute -top-0 -right-1.5 -bottom-0 -left-1.5 bg-orange-500 rounded-[25px]"></div>

            <div class="relative bg-white rounded-[25px] py-6 px-8 flex items-center justify-center shadow-md">
                <h2 class="text-center text-2xl sm:text-3xl font-semibold text-orange-500">
                    Penilaian Tengah Semester
                </h2>

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
                <div
                    class="w-24 h-24 sm:w-28 sm:h-28 rounded-lg overflow-hidden mb-3
                  flex items-center justify-center shadow-md animate-fadeInScale">
                    <img src="{{ studentPhoto($second) }}"
                        alt="avatar" class="w-full h-full object-cover">
                </div>
                <span
                    class="text-lg sm:text-xl font-bold text-orange-500 mb-5
                   animate-fadeInUp [animation-delay:0.3s] group-hover:animate-pulseGlow">
                    {{ studentName($second) }}
                </span>

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
                        <span class="text-3xl sm:text-4xl font-bold mb-2 counter"
                            data-value="{{ studentScore($second) }}">0</span>
                        <span class="text-lg sm:text-xl font-semibold mb-3">PKP</span>

                        @if($second)
                            <a href="{{ studentProfileRoute($second) }}"
                                class="bg-white text-orange-500 font-semibold px-4 py-2 rounded-md shadow text-sm
                                transition-transform duration-300 ease-in-out
                                hover:scale-135 hover:shadow-lg hover:shadow-orange-400/50
                                active:scale-120 active:shadow-xl active:shadow-orange-500/60
                                animate-buttonPop">
                                View Profile
                            </a>
                        @else
                            <button disabled
                                class="bg-white text-gray-400 font-semibold px-4 py-2 rounded-md shadow text-sm cursor-not-allowed">
                                View Profile
                            </button>
                        @endif

                    </div>
                </div>
            </div>

            <!-- JUARA 1 -->
            <div
                class="group flex flex-col items-center order-first lg:order-none animate-grow origin-bottom
                transition-transform duration-500 ease-in-out hover:scale-110 hover:animate-floatHover">
                <div
                    class="w-28 h-28 sm:w-32 sm:h-32 rounded-lg overflow-hidden mb-3
                  flex items-center justify-center shadow-md animate-fadeInScale">
                    <img src="{{ studentPhoto($first) }}"
                        alt="avatar" class="w-full h-full object-cover">
                </div>
                <span
                    class="text-xl sm:text-2xl font-bold text-orange-500 mb-5
                   animate-fadeInUp [animation-delay:0.3s] group-hover:animate-pulseGlow">
                    {{ studentName($first) }}
                </span>

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
                        <span class="text-4xl sm:text-5xl font-bold mb-2 counter"
                            data-value="{{ studentScore($first) }}">0</span>
                        <span class="text-lg sm:text-xl font-semibold mb-3">PKP</span>

                        @if($first)
                            <a href="{{ studentProfileRoute($first) }}"
                                class="bg-white text-orange-500 font-semibold px-4 py-2 rounded-md shadow text-sm
                                transition-transform duration-300 ease-in-out
                                hover:scale-135 hover:shadow-lg hover:shadow-orange-400/50
                                active:scale-120 active:shadow-xl active:shadow-orange-500/60
                                animate-buttonPop">
                                View Profile
                            </a>
                        @else
                            <button disabled
                                class="bg-white text-gray-400 font-semibold px-4 py-2 rounded-md shadow text-sm cursor-not-allowed">
                                View Profile
                            </button>
                        @endif

                    </div>
                </div>
            </div>

            <!-- JUARA 3 -->
            <div
                class="group flex flex-col items-center animate-grow origin-bottom [animation-delay:0.6s]
                transition-transform duration-500 ease-in-out hover:scale-110 hover:animate-floatHover">
                <div
                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg overflow-hidden mb-3
                  flex items-center justify-center shadow-md animate-fadeInScale">
                    <img src="{{ studentPhoto($third) }}"
                        alt="avatar" class="w-full h-full object-cover">
                </div>
                <span
                    class="text-base sm:text-lg font-bold text-orange-500 mb-5
                   animate-fadeInUp [animation-delay:0.3s] group-hover:animate-pulseGlow">
                    {{ studentName($third) }}
                </span>

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
                        <span class="text-3xl sm:text-4xl font-bold mb-2 counter"
                            data-value="{{ studentScore($third) }}">0</span>
                        <span class="text-lg sm:text-xl font-semibold mb-3">PKP</span>

                        @if($third)
                            <a href="{{ studentProfileRoute($third) }}"
                                class="bg-white text-orange-500 font-semibold px-4 py-2 rounded-md shadow text-sm
                                transition-transform duration-300 ease-in-out
                                hover:scale-135 hover:shadow-lg hover:shadow-orange-400/50
                                active:scale-120 active:shadow-xl active:shadow-orange-500/60
                                animate-buttonPop">
                                View Profile
                            </a>
                        @else
                            <button disabled
                                class="bg-white text-gray-400 font-semibold px-4 py-2 rounded-md shadow text-sm cursor-not-allowed">
                                View Profile
                            </button>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>


<div class="container mx-auto p-4">
  <div class="overflow-x-auto bg-white rounded-lg shadow-md mt-10 max-w-6xl mx-auto">
    <div class="max-h-96 overflow-y-auto">
      <table class="min-w-full text-sm text-left text-gray-500">
        <thead class="bg-orange-500 text-white sticky top-0 z-10">
          <tr>
            <th class="px-4 py-3 w-12">Posisi</th>
            <th class="px-4 py-3 w-44">Nama Siswa</th>
            <th class="px-4 py-3 w-16">Kelas</th>
            <th class="px-4 py-3 w-16">Jurusan</th>
            <th class="px-4 py-3 w-24">PKP</th>
            <th class="px-4 py-3 w-32 text-center">Discover More</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @foreach ($students->skip(3) as $student)
            <tr class="border-t hover:bg-gray-50">
              <td class="px-4 py-4 w-12">{{ $loop->iteration + 3 }}</td>
              <td class="px-4 py-4 w-44">
                <div class="flex items-center space-x-3">
                  <img class="w-10 h-10 rounded-full object-cover"
                       src="{{ $student->foto ? asset('storage/presmaboard/students/' . $student->foto) : asset('assets/images/presmaboard/user.png') }}"
                       alt="profile picture">
                  <span class="font-medium text-gray-700">{{ $student->nama ?? '-' }}</span>
                </div>
              </td>
              <td class="px-4 py-4 w-16">{{ $student->kelas ?? '-' }}</td>
              <td class="px-4 py-4 w-16 uppercase">{{ $student->jurusan ?? '-' }}</td>
              <td class="px-4 py-4 w-24 font-semibold text-gray-700">
                {{ number_format($student->scores_avg_score ?? 0, 2) }}
              </td>
              <td class="px-4 py-4 w-32 text-center">
                @if($student)
                  <a href="{{ route('presmaboard.eligible', $student->id) }}"
                     class="bg-orange-500 text-white font-semibold rounded-full px-5 py-2.5 inline-block hover:bg-orange-600 transition-all duration-200">
                    View Profile
                  </a>
                @else
                  <button disabled class="bg-gray-300 text-white rounded-full py-2 px-5 cursor-not-allowed">View Profile</button>
                @endif
              </td>
            </tr>
          @endforeach

          @if($students->count() <= 3)
            <tr class="border-t">
              <td colspan="6" class="px-4 py-4 text-center text-gray-500">Tidak ada data lebih lanjut</td>
            </tr>
          @endif
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
                // Pastikan value numeric
                let target = parseFloat(counter.getAttribute("data-value")) || 0;
                let count = 0;
                // step minimal 1 agar tidak 0 (tetap cepat kalau target kecil)
                let step = Math.max(Math.ceil(target / 50), 1);
                let interval = setInterval(() => {
                    count += step;
                    if (count >= target) {
                        count = target;
                        clearInterval(interval);
                    }
                    // Format agar tampilannya oke (tanpa ribuan separator)
                    counter.textContent = Number.isInteger(target) ? count : count.toFixed(2);
                }, 30);
            });
        });
    </script>
@endsection
