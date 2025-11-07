@php
    $user = auth()->user();
    $profile = $user ? ($user->profile ?? null) : null;

    // Calculate profile completion roughly the same as controller
    $totalFields = 8;
    $completedFields = 0;
    if($user && $user->name) $completedFields++;
    if($user && $user->email) $completedFields++;
    if($profile && $profile->phone) $completedFields++;
    if($profile && $profile->location) $completedFields++;
    if($profile && $profile->bio) $completedFields++;
    if($profile && $profile->avatar) $completedFields++;
    $skills = $profile && $profile->skills ? json_decode($profile->skills, true) : [];
    if(is_array($skills) && count($skills) > 0) $completedFields++;
    if(is_array($skills) && count($skills) >= 3) $completedFields++;
    $profileCompletion = $totalFields ? round(($completedFields / $totalFields) * 100) : 0;

    $applicationsCount = $user ? $user->applications()->count() : 0;
    // Change 'Tersimpan' to 'Diterima' = accepted applications
    $acceptedCount = $user ? $user->applications()->where('status', 'accepted')->count() : 0;

    $currentRoute = request()->route()->getName() ?? '';
@endphp

<div x-data="{ 
    isCollapsed: false, 
    isMobileOpen: false,
    profileAvatar: '{{ $profile?->avatar ? \Illuminate\Support\Facades\Storage::url($profile->avatar) : ($user?->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'User')) }}',
    toggleCollapse() {
        this.isCollapsed = !this.isCollapsed;
        // notify layout to recompute centered content offset
        try {
            window.dispatchEvent(new CustomEvent('sidebar-toggled', { detail: { collapsed: this.isCollapsed } }));
        } catch (e) {
            // ignore
        }
    },
    toggleMobile() {
        this.isMobileOpen = !this.isMobileOpen;
        if (this.isMobileOpen) {
            document.body.classList.add('sidebar-open');
        } else {
            document.body.classList.remove('sidebar-open');
        }
    },
    navigate(url) {
        window.location.href = url;
    }
}" @profile-updated.window="profileAvatar = $event.detail.avatar_url ?? $event.detail.avatar ?? profileAvatar" 
class="sidebar-wrapper">
    {{-- Mobile Sidebar Overlay --}}
    <div x-show="isMobileOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="toggleMobile()"
         class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"
         style="display: none;">
    </div>

    {{-- Left Sidebar - Desktop --}}
    <aside :class="isCollapsed ? 'w-20' : 'w-80'" 
           class="hidden lg:block fixed left-0 top-0 h-screen z-50 transition-all duration-300">
        <div class="h-full flex flex-col bg-white border-r border-gray-200 shadow-sm">
            {{-- Collapse Toggle Button --}}
            <div class="absolute -right-3 top-8 z-[60]">
                <button @click="toggleCollapse()"
                        class="w-6 h-6 bg-orange-500 text-white rounded-full shadow-lg hover:bg-orange-600 transition-all duration-300 flex items-center justify-center hover:scale-110">
                    <svg x-show="isCollapsed" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    <svg x-show="!isCollapsed" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
            </div>

            {{-- Profile Section --}}
            <div :class="isCollapsed ? 'p-3' : 'p-6'" class="transition-all duration-300">
                {{-- Collapsed Profile - Avatar Only --}}
                <div x-show="isCollapsed" 
                     @click="navigate('{{ route('profile.show') }}')"
                     class="flex flex-col items-center cursor-pointer group">
                    <div class="relative">
                        <div class="w-12 h-12 rounded-full overflow-hidden border-4 border-orange-100 group-hover:border-orange-300 transition-all">
                            <img x-bind:src="profileAvatar" src="{{ $profile?->avatar ? \Illuminate\Support\Facades\Storage::url($profile->avatar) : ($user?->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'User')) }}" 
                                 alt="{{ $user->name ?? 'User' }}"
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                    </div>
                </div>

                {{-- Expanded Profile --}}
                <div x-show="!isCollapsed" class="overflow-hidden border-l-4 border-l-orange-500 bg-white rounded-lg shadow hover:shadow-lg transition-all duration-300">
                    <div class="p-5 space-y-4">
                        {{-- Avatar & Basic Info --}}
                        <div class="flex items-start gap-4">
                            <div class="relative">
                                <div class="w-16 h-16 rounded-full overflow-hidden border-4 border-orange-100">
                                    <img x-bind:src="profileAvatar" src="{{ $profile?->avatar ? \Illuminate\Support\Facades\Storage::url($profile->avatar) : ($user?->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'User')) }}" 
                                         alt="{{ $user->name ?? 'User' }}"
                                         class="w-full h-full object-cover">
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-gray-900 truncate">{{ $user->name ?? '-' }}</h3>
                                <p class="text-sm text-gray-600 truncate">{{ $user->role ?? 'Job Seeker' }}</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-xs text-gray-500 truncate">{{ $profile->location ?? $user->location ?? 'Jakarta, Indonesia' }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Profile Completion --}}
                        <div class="space-y-2">
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-gray-600">Profil Lengkap</span>
                                <span class="font-semibold text-orange-600">{{ $profileCompletion }}%</span>
                            </div>
                            <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-orange-500 to-orange-600 rounded-full transition-all duration-500" 
                                     style="width: {{ $profileCompletion }}%"></div>
                            </div>
                            @if($profileCompletion < 100)
                                <p class="text-xs text-gray-500">Lengkapi profil untuk meningkatkan peluang</p>
                            @endif
                        </div>

                        {{-- Quick Stats --}}
                        <div class="grid grid-cols-2 gap-2 pt-3 border-t border-gray-100">
                            <div class="text-center p-2 bg-orange-50 rounded-lg">
                                <div class="text-lg font-bold text-orange-600">{{ $applicationsCount }}</div>
                                    <div class="text-xs text-gray-600">Lamaran</div>
                            </div>
                                <div class="text-center p-2 bg-blue-50 rounded-lg">
                                    <div class="text-lg font-bold text-blue-600">{{ $acceptedCount }}</div>
                                    <div class="text-xs text-gray-600">Diterima</div>
                                </div>
                        </div>

                        {{-- View Profile Button --}}
                        <a href="{{ route('profile.show') }}" 
                           class="w-full inline-flex items-center justify-center px-4 py-2 text-sm border border-orange-200 rounded-lg hover:bg-orange-50 hover:border-orange-300 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Lihat Profil
                        </a>
                    </div>
                </div>
            </div>

            {{-- Navigation Menu --}}
            <nav :class="isCollapsed ? 'px-2' : 'px-4'" class="flex-1 pb-4 overflow-y-auto">
                <div class="space-y-1">
                    {{-- Beranda --}}
                    <a href="{{ route('jobs.index') }}" 
                       class="w-full flex items-center rounded-lg transition-all duration-300 group relative {{ request()->routeIs('jobs.index') ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg shadow-orange-200' : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600' }} {{ $isCollapsed ?? false ? 'justify-center px-3 py-3' : 'gap-3 px-4 py-3' }}"
                       x-bind:class="isCollapsed ? 'justify-center px-3 py-3' : 'gap-3 px-4 py-3'"
                       x-bind:title="isCollapsed ? 'Beranda' : null">
                        <svg class="w-5 h-5 transition-transform duration-300 {{ request()->routeIs('jobs.index') ? '' : 'group-hover:scale-110' }}" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span x-show="!isCollapsed" class="flex-1 text-left font-medium">Beranda</span>
                        <div x-show="!isCollapsed && {{ request()->routeIs('jobs.index') ? 'true' : 'false' }}" class="w-1 h-6 bg-white rounded-full"></div>
                    </a>

                    {{-- Applications (user-facing) --}}
                    <a href="{{ route('applications.index') }}"
                       class="w-full flex items-center rounded-lg transition-all duration-300 group {{ request()->routeIs('applications.*') ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg shadow-orange-200' : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600' }} {{ $isCollapsed ?? false ? 'justify-center px-3 py-3' : 'gap-3 px-4 py-3' }}"
                       x-bind:class="isCollapsed ? 'justify-center px-3 py-3' : 'gap-3 px-4 py-3'"
                       x-bind:title="isCollapsed ? 'Applications' : null">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span x-show="!isCollapsed" class="flex-1 text-left font-medium">Applications</span>
                    </a>

                   

                {{-- Premium card removed per request --}}
            </nav>

            {{-- Logout Button - Fixed at bottom --}}
            <div :class="isCollapsed ? 'p-2' : 'p-4'" class="border-t border-gray-200 bg-gray-50">
                <form method="POST" action="{{ route('logout') }}" id="logout-form" class="w-full">
                    @csrf
                    <button type="button"
                            onclick="if(confirm('Apakah Anda yakin ingin keluar?')) { document.getElementById('logout-form').submit(); }"
                            :class="isCollapsed ? 'px-2' : ''"
                            :title="isCollapsed ? 'Keluar' : null"
                            class="w-full inline-flex items-center justify-center px-4 py-2 border border-red-200 text-red-600 rounded-lg hover:bg-red-50 hover:border-red-300 hover:text-red-700 transition-all duration-300 group">
                        <svg class="w-4 h-4 group-hover:animate-pulse" 
                             :class="isCollapsed ? '' : 'mr-2'"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span x-show="!isCollapsed">Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- Left Sidebar - Mobile --}}
    <aside x-show="isMobileOpen"
           x-transition:enter="transition ease-out duration-300 transform"
           x-transition:enter-start="-translate-x-full"
           x-transition:enter-end="translate-x-0"
           x-transition:leave="transition ease-in duration-300 transform"
           x-transition:leave-start="translate-x-0"
           x-transition:leave-end="-translate-x-full"
           class="lg:hidden w-80 fixed left-0 top-0 h-screen z-50"
           style="display: none;">
        <div class="h-full flex flex-col bg-white border-r border-gray-200 shadow-sm">
            {{-- Mobile sidebar content (same as desktop but without collapse) --}}
            <div class="p-6">
                <div class="overflow-hidden border-l-4 border-l-orange-500 bg-white rounded-lg shadow hover:shadow-lg transition-all duration-300">
                    <div class="p-5 space-y-4">
                        {{-- Avatar & Basic Info --}}
                        <div class="flex items-start gap-4">
                            <div class="relative">
                                <div class="w-16 h-16 rounded-full overflow-hidden border-4 border-orange-100">
                                    <img src="{{ $user?->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'User') }}" 
                                         alt="{{ $user->name ?? 'User' }}"
                                         class="w-full h-full object-cover">
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-gray-900 truncate">{{ $user->name ?? 'User' }}</h3>
                                <p class="text-sm text-gray-600 truncate">{{ $user->role ?? 'Job Seeker' }}</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-xs text-gray-500 truncate">{{ $user->location ?? 'Jakarta, Indonesia' }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Profile Completion --}}
                        <div class="space-y-2">
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-gray-600">Profil Lengkap</span>
                                <span class="font-semibold text-orange-600">{{ $profileCompletion }}%</span>
                            </div>
                            <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-orange-500 to-orange-600 rounded-full transition-all duration-500" 
                                     style="width: {{ $profileCompletion }}%"></div>
                            </div>
                            @if($profileCompletion < 100)
                                <p class="text-xs text-gray-500">Lengkapi profil untuk meningkatkan peluang</p>
                            @endif
                        </div>

                        {{-- Quick Stats --}}
                        <div class="grid grid-cols-2 gap-2 pt-3 border-t border-gray-100">
                            <div class="text-center p-2 bg-orange-50 rounded-lg">
                                <div class="text-lg font-bold text-orange-600">{{ $applicationsCount }}</div>
                                <div class="text-xs text-gray-600">Lamaran</div>
                            </div>
                            <div class="text-center p-2 bg-blue-50 rounded-lg">
                                <div class="text-lg font-bold text-blue-600">{{ $acceptedCount }}</div>
                                <div class="text-xs text-gray-600">Diterima</div>
                            </div>
                        </div>

                        {{-- View Profile Button --}}
                        <a href="{{ route('profile.show') }}" 
                           @click="toggleMobile()"
                           class="w-full inline-flex items-center justify-center px-4 py-2 text-sm border border-orange-200 rounded-lg hover:bg-orange-50 hover:border-orange-300 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Lihat Profil
                        </a>
                    </div>
                </div>
            </div>

            {{-- Mobile Navigation --}}
            <nav class="flex-1 px-4 pb-4 overflow-y-auto">
                <div class="space-y-1">
                    <a href="{{ route('jobs.index') }}" 
                       @click="toggleMobile()"
                       class="w-full flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-300 group {{ request()->routeIs('jobs.index') ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg shadow-orange-200' : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span class="flex-1 text-left font-medium">Beranda</span>
                    </a>

                    
                </div>
            </nav>

            {{-- Mobile Logout --}}
            <div class="p-4 border-t border-gray-200 bg-gray-50">
                <form method="POST" action="{{ route('logout') }}" id="logout-form-mobile" class="w-full">
                    @csrf
                    <button type="button"
                            onclick="if(confirm('Apakah Anda yakin ingin keluar?')) { document.getElementById('logout-form-mobile').submit(); }"
                            class="w-full inline-flex items-center justify-center px-4 py-2 border border-red-200 text-red-600 rounded-lg hover:bg-red-50 hover:border-red-300 hover:text-red-700 transition-all duration-300 group">
                        <svg class="w-4 h-4 mr-2 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- Mobile Menu Button --}}
    <button @click="toggleMobile()"
            class="lg:hidden fixed top-4 left-4 z-[60] p-3 bg-orange-500 text-white rounded-lg shadow-lg hover:bg-orange-600 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path x-show="!isMobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            <path x-show="isMobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>

{{-- Alpine.js CDN (if not already included in your layout) --}}
@push('scripts')
@endpush
