{{-- Admin Sidebar Component --}}
<div x-data="{ isCollapsed: false, showMobileMenu: false }" class="relative">
    {{-- Mobile Overlay --}}
    <div 
        x-show="showMobileMenu" 
        @click="showMobileMenu = false"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"
        style="display: none;"
    ></div>

    {{-- Sidebar --}}
    <aside 
        :class="isCollapsed ? 'lg:w-20' : 'lg:w-80'"
        class="fixed left-0 top-0 h-screen bg-white border-r border-gray-200 z-50 transition-all duration-300 ease-in-out
               w-80 -translate-x-full lg:translate-x-0"
        :class="{ 'translate-x-0': showMobileMenu }"
    >
        <div class="flex flex-col h-full">
            {{-- Header with Logo and Collapse Button --}}
            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                <div class="flex items-center gap-3" x-show="!isCollapsed">
                    <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-semibold text-gray-900">Admin Panel</h1>
                        <p class="text-xs text-gray-500">Presmalance</p>
                    </div>
                </div>

                {{-- Collapse Button (Desktop) --}}
                <button 
                    @click="isCollapsed = !isCollapsed"
                    class="hidden lg:flex items-center justify-center w-8 h-8 rounded-lg hover:bg-gray-100 transition-colors"
                >
                    <svg 
                        :class="isCollapsed ? 'rotate-180' : ''" 
                        class="w-4 h-4 text-gray-600 transition-transform duration-300" 
                        fill="none" 
                        stroke="currentColor" 
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                {{-- Close Button (Mobile) --}}
                <button 
                    @click="showMobileMenu = false"
                    class="lg:hidden flex items-center justify-center w-8 h-8 rounded-lg hover:bg-gray-100 transition-colors"
                >
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            {{-- Admin Profile Card --}}
            <div class="p-4 border-b border-gray-200">
                <div :class="isCollapsed ? 'justify-center' : ''" class="flex items-center gap-3">
                    {{-- Avatar --}}
                    <div class="relative flex-shrink-0">
                        <img 
                            src="{{ auth()->user()->profile->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=f97316&color=fff&size=200' }}"
                            alt="Admin Avatar"
                            class="w-12 h-12 rounded-full object-cover border-2 border-orange-500"
                        >
                        <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
                    </div>

                    {{-- Admin Info --}}
                    <div x-show="!isCollapsed" class="flex-1 min-w-0">
                        <h3 class="font-medium text-gray-900 truncate">{{ auth()->user()->name }}</h3>
                        <p class="text-xs text-orange-600 font-medium">Administrator</p>
                    </div>

                    {{-- Dropdown Menu --}}
                    <div x-data="{ open: false }" x-show="!isCollapsed" class="relative">
                        <button 
                            @click="open = !open"
                            class="p-1 hover:bg-gray-100 rounded-lg transition-colors"
                        >
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </button>

                        {{-- Dropdown --}}
                        <div 
                            x-show="open"
                            @click.away="open = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-10"
                            style="display: none;"
                        >
                            <a href="{{ route('profile.show') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                My Profile
                            </a>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Settings
                            </a>
                            <div class="border-t border-gray-200 my-1"></div>
                            <form method="POST" action="{{ route('logout') ?? '#' }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Navigation Menu --}}
            <nav class="flex-1 overflow-y-auto p-4 space-y-2">
                {{-- Dashboard --}}
                <a 
                    href="{{ route('admin.jobs.index') }}"
                    :class="isCollapsed ? 'justify-center px-2' : 'px-4'"
                    class="flex items-center gap-3 py-3 rounded-lg transition-all duration-200
                           {{ request()->routeIs('admin.jobs.index') ? 'bg-orange-50 text-orange-600' : 'text-gray-700 hover:bg-gray-100' }}"
                >
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    <span x-show="!isCollapsed" class="font-medium">Dashboard</span>
                </a>

                {{-- Manage Jobs --}}
                <a 
                    href="{{ route('admin.jobs.create') }}"
                    :class="isCollapsed ? 'justify-center px-2' : 'px-4'"
                    class="flex items-center gap-3 py-3 rounded-lg transition-all duration-200
                           {{ request()->routeIs('admin.jobs.create') ? 'bg-orange-50 text-orange-600' : 'text-gray-700 hover:bg-gray-100' }}"
                >
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span x-show="!isCollapsed" class="font-medium">Create job applications</span>
                </a>

                {{-- Manage Companies --}}
                <a 
                    href="{{ route('admin.companies.index') }}"
                    :class="isCollapsed ? 'justify-center px-2' : 'px-4'"
                    class="flex items-center gap-3 py-3 rounded-lg transition-all duration-200
                           {{ request()->routeIs('admin.companies.*') ? 'bg-orange-50 text-orange-600' : 'text-gray-700 hover:bg-gray-100' }}"
                >
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <span x-show="!isCollapsed" class="font-medium">Manage Companies</span>
                </a>

                {{-- Applications --}}
                <a 
                    href="{{ route('admin.applications.index') }}"
                    :class="isCollapsed ? 'justify-center px-2' : 'px-4'"
                    class="flex items-center gap-3 py-3 rounded-lg text-gray-700 hover:bg-gray-100 transition-all duration-200 {{ request()->routeIs('admin.applications.*') ? 'bg-orange-50 text-orange-600' : '' }}"
                >
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span x-show="!isCollapsed" class="font-medium">Applications</span>
                </a>

                <div x-show="!isCollapsed" class="border-t border-gray-200 my-4"></div>

                {{-- Public Job List --}}
                <a 
                    href="{{ route('jobs.index') }}"
                    :class="isCollapsed ? 'justify-center px-2' : 'px-4'"
                    class="flex items-center gap-3 py-3 rounded-lg transition-all duration-200
                           {{ request()->routeIs('jobs.index') ? 'bg-orange-50 text-orange-600' : 'text-gray-700 hover:bg-gray-100' }}"
                >
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span x-show="!isCollapsed" class="font-medium">Job List (Public)</span>
                </a>

                <div x-show="!isCollapsed" class="border-t border-gray-200 my-4"></div>

        </div>
    </aside>

    {{-- Mobile Menu Button --}}
    <button 
        @click="showMobileMenu = true"
        class="fixed top-4 left-4 z-30 lg:hidden bg-white p-2 rounded-lg shadow-md border border-gray-200"
    >
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</div>


