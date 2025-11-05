@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('app')
@section('title', 'Profil Saya')
@section('centerMain', true)
@section('content')
<div class="min-h-screen bg-gray-50 overflow-x-hidden" x-data="profileEditor()">
    {{-- Header (constrained to same max width as content) --}}
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white">
    <div class="max-w-4xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold">Profil Saya</h1>
                    <p class="text-orange-100 mt-1">Kelola informasi dan pengaturan akun Anda</p>
                </div>
                <div class="flex gap-2">
                    <template x-if="!isEditing">
                        <button @click="startEdit()" 
                                class="px-4 py-2 bg-white text-orange-600 rounded-lg hover:bg-orange-50 border border-white inline-flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit Profil
                        </button>
                    </template>
                    <template x-if="isEditing">
                        <div class="flex gap-2">
                            <button @click="cancelEdit()" 
                                    class="px-4 py-2 bg-white text-orange-600 rounded-lg hover:bg-orange-50 border border-white inline-flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Batal
                            </button>
                            <button @click="saveProfile()" 
                                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 inline-flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Simpan
                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="w-full flex justify-center">
    <div class="max-w-4xl w-full px-4 sm:px-6 lg:px-8 py-6 mt-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left Column - Profile Card --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow overflow-hidden sticky top-8">
                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 h-24"></div>
                    <div class="px-6 pb-6">
                        {{-- Avatar --}}
                        <div class="relative -mt-12 mb-4">
                            <div @click="isEditing && $refs.avatarInput.click()" 
                                 :class="isEditing ? 'cursor-pointer group' : ''"
                                 class="w-24 h-24 rounded-full overflow-hidden border-4 border-white shadow-lg mx-auto relative">
                                <img :src="profile.avatar" 
                                     alt="Profile"
                                     class="w-full h-full object-cover">
                                <template x-if="isEditing">
                                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                </template>
                            </div>
                            <input type="file" 
                                   x-ref="avatarInput" 
                                   @change="handleAvatarChange($event)"
                                   accept="image/*" 
                                   class="hidden">
                        </div>

                        {{-- Basic Info --}}
                        <div class="text-center mb-6">
                            <h2 class="text-xl font-bold text-gray-900" x-text="profile.name"></h2>
                            <p class="text-gray-600" x-text="profile.role"></p>
                            <span class="inline-block mt-2 px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full border border-green-200">
                                Aktif
                            </span>
                        </div>

                        {{-- Contact Info --}}
                        <div class="space-y-3 text-sm">
                            <div class="flex items-center gap-3 text-gray-600">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="truncate" x-text="profile.email"></span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-600">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <span x-text="profile.phone"></span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-600">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                <span x-text="profile.location"></span>
                            </div>
                        </div>

                        {{-- Stats --}}
                        <div class="grid grid-cols-2 gap-3 mt-6 pt-6 border-t border-gray-100">
                            <div class="text-center p-3 bg-orange-50 rounded-lg">
                                <div class="text-2xl font-bold text-orange-600">{{ $applicationsCount ?? 0 }}</div>
                                <div class="text-xs text-gray-600">Lamaran</div>
                            </div>
                            <div class="text-center p-3 bg-blue-50 rounded-lg">
                                <div class="text-2xl font-bold text-blue-600">{{ $acceptedCount ?? ($savedJobsCount ?? 0) }}</div>
                                <div class="text-xs text-gray-600">Diterima</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column - Profile Details --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Personal Information --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center gap-2 mb-6">
                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Pribadi</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <template x-if="isEditing">
                                <input type="text" 
                                       x-model="profile.name"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </template>
                            <template x-if="!isEditing">
                                <p class="text-gray-900" x-text="profile.name"></p>
                            </template>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <template x-if="isEditing">
                                <input type="email" 
                                       x-model="profile.email"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </template>
                            <template x-if="!isEditing">
                                <p class="text-gray-900" x-text="profile.email"></p>
                            </template>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                            <template x-if="isEditing">
                                <input type="tel" 
                                       x-model="profile.phone"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </template>
                            <template x-if="!isEditing">
                                <p class="text-gray-900" x-text="profile.phone"></p>
                            </template>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                            <template x-if="isEditing">
                                <input type="text" 
                                       x-model="profile.location"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </template>
                            <template x-if="!isEditing">
                                <p class="text-gray-900" x-text="profile.location"></p>
                            </template>
                        </div>
                    </div>
                </div>

                {{-- Bio --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center gap-2 mb-6">
                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">Tentang Saya</h3>
                    </div>

                    <template x-if="isEditing">
                        <textarea x-model="profile.bio"
                                  rows="5"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                  placeholder="Ceritakan tentang diri Anda, pengalaman, dan minat..."></textarea>
                    </template>
                    <template x-if="!isEditing">
                        <p class="text-gray-700 leading-relaxed" x-text="profile.bio"></p>
                    </template>
                </div>

                {{-- Skills --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center gap-2 mb-6">
                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">Keahlian</h3>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <template x-for="(skill, index) in profile.skills" :key="index">
                            <span class="inline-flex items-center gap-2 px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm hover:bg-orange-200 transition-colors">
                                <span x-text="skill"></span>
                                <template x-if="isEditing">
                                    <button @click="removeSkill(index)" class="hover:text-orange-900">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </template>
                            </span>
                        </template>
                    </div>

                    <template x-if="isEditing">
                        <div class="flex gap-2 mt-4">
                            <input type="text" 
                                   x-model="newSkill"
                                   @keydown.enter.prevent="addSkill()"
                                   placeholder="Tambah keahlian baru..."
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            <button @click="addSkill()" 
                                    class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                Tambah
                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function profileEditor() {
    return {
        isEditing: false,
        newSkill: '',
        profile: {
            name: '{{ auth()->user()->name ?? "Ahmad Rizki" }}',
            email: '{{ auth()->user()->email ?? "ahmad.rizki@example.com" }}',
            phone: '{{ auth()->user()->phone ?? "+62 812 3456 7890" }}',
            location: '{{ auth()->user()->profile->location ?? "Jakarta, Indonesia" }}',
            avatar: '{{ $profile->avatar_url ?? auth()->user()->avatar ?? "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" }}',
            role: '{{ auth()->user()->profile->role ?? "Job Seeker" }}',
            bio: '{{ auth()->user()->profile->bio ?? "Passionate web developer with 3+ years of experience..." }}',
                skills: {!! json_encode(json_decode(auth()->user()->profile->skills ?? '[]')) !!}
        },
        originalProfile: {},
        
        startEdit() {
            this.originalProfile = JSON.parse(JSON.stringify(this.profile));
            this.isEditing = true;
        },
        
        cancelEdit() {
            this.profile = JSON.parse(JSON.stringify(this.originalProfile));
            this.isEditing = false;
            this.newSkill = '';
        },
        
            async saveProfile() {
                try {
                    // Pastikan skills dikirim sebagai array
                    const payload = { ...this.profile };
                    // Jangan kirim avatar ke backend, avatar hanya URL
                    delete payload.avatar;
                    if (typeof payload.skills === 'string') {
                        payload.skills = payload.skills.split(',').map(s => s.trim()).filter(Boolean);
                    }
                    if (!Array.isArray(payload.skills)) {
                        payload.skills = [];
                    }
                    const response = await fetch('/profile/update', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify(payload)
                    });
                    const data = await response.json();
                    if (data.success) {
                        alert('Profil berhasil diperbarui! ✅');
                        this.isEditing = false;
                    } else {
                        let errorMsg = data.message || 'Cek data Anda.';
                        if (data.errors) {
                            errorMsg += '\n';
                            for (const [field, messages] of Object.entries(data.errors)) {
                                errorMsg += `- ${field}: ${messages.join(', ')}\n`;
                            }
                        }
                        alert('Gagal memperbarui profil:\n' + errorMsg);
                    }
                } catch (e) {
                    alert('Terjadi error: ' + e.message);
                }
            },
        
        async handleAvatarChange(event) {
            const file = event.target.files[0];
            if (!file) return;
            const formData = new FormData();
            formData.append('avatar', file);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
            try {
                const response = await fetch('/profile/upload-avatar', {
                    method: 'POST',
                    body: formData
                });
                const data = await response.json();
                if (data.success && data.avatar_url) {
                    this.profile.avatar = data.avatar_url;
                    // Broadcast event so sidebars can update live
                    window.dispatchEvent(new CustomEvent('profile-updated', { detail: { avatar_url: data.avatar_url } }));
                    alert('Avatar berhasil diupload!');
                } else {
                    let errorMsg = data.message || 'Gagal upload avatar.';
                    if (data.errors) {
                        errorMsg += '\n';
                        for (const [field, messages] of Object.entries(data.errors)) {
                            errorMsg += `- ${field}: ${messages.join(', ')}\n`;
                        }
                    }
                    alert(errorMsg);
                }
            } catch (e) {
                alert('Terjadi error: ' + e.message);
            }
        },
        
        addSkill() {
            if (this.newSkill.trim() && !this.profile.skills.includes(this.newSkill.trim())) {
                if (!Array.isArray(this.profile.skills)) {
                    this.profile.skills = [];
                }
                this.profile.skills.push(this.newSkill.trim());
                this.newSkill = '';
            }
        },
        
        removeSkill(index) {
            this.profile.skills.splice(index, 1);
        }
    }
}
</script>
@endpush
@include('footer')
@endsection
