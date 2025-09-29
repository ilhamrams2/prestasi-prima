<aside class="bg-orange-500 text-white flex flex-col justify-between p-6 rounded-2xl shadow-xl w-full md:w-[260px] h-auto md:h-[500px]">

    <!-- Header -->
    <div>
        <h1 class="text-center font-bold mb-10 text-white text-2xl md:text-[28px] tracking-tight">
            Content Management
        </h1>

        <!-- Navigation -->
        <nav class="space-y-5">
            <!-- Home -->
            <a href="#"
               class="flex items-center gap-4 px-4 py-2 rounded-xl transition-all duration-300 ease-in-out
                      {{ request()->is('/') ? 'bg-white text-orange-600 scale-[1.05] shadow-lg' : 'bg-transparent' }} hover:bg-white hover:text-orange-600 hover:scale-[1.03]">
                <img src="{{ asset('assets/images/news/home.svg') }}" alt="Home"
                     class="w-[22px] h-[22px] transition-transform duration-300">
                <span class="text-lg font-semibold">Home</span>
            </a>

            <!-- Daftar Berita -->
            <a href="{{ route('news.index') }}"
               class="flex items-center gap-4 px-4 py-2 rounded-xl transition-all duration-300 ease-in-out
                      {{ request()->routeIs('news.index') ? 'bg-white text-orange-600 scale-[1.05] shadow-lg' : 'bg-transparent' }} hover:bg-white hover:text-orange-600 hover:scale-[1.03]">
                <img src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/svgs/solid/newspaper.svg" alt="Daftar Berita" class="w-[22px] h-[22px] transition-transform duration-300">
                <span class="text-lg font-semibold">Daftar Berita</span>
            </a>

            <!-- Daftar Gallery -->
            <a href="{{ route('gallery.index') }}"
               class="flex items-center gap-4 px-4 py-2 rounded-xl transition-all duration-300 ease-in-out
                      {{ request()->routeIs('gallery.index') ? 'bg-white text-orange-600 scale-[1.05] shadow-lg' : 'bg-transparent' }} hover:bg-white hover:text-orange-600 hover:scale-[1.03]">
                <img src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/svgs/solid/images.svg" alt="Daftar Gallery"
                     class="w-[22px] h-[22px] transition-transform duration-300">
                <span class="text-lg font-semibold">Daftar Gallery</span>
            </a>
        </nav>
    </div>

    <!-- Logout -->
    <div class="mt-8">
        <a href="#" onclick="document.getElementById('logout-form').submit()"
           class="flex items-center gap-4 px-4 py-2 rounded-xl transition-all duration-300 ease-in-out hover:bg-white hover:text-orange-600 hover:scale-[1.03]">
            <img src="{{ asset('assets/images/news/logout.svg') }}" alt="Logout" class="w-[22px] h-[22px] transition-transform duration-300">
            <span class="text-lg font-semibold">Logout</span>
        </a>

        <!-- Form logout dengan method POST -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</aside>
