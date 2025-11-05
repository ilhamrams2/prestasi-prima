@extends('app')
@vite('resources/css/app.css')
@section('title', 'Tambah Perusahaan Baru')
@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-gradient-to-r from-purple-600 to-purple-700 shadow-lg">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.companies.index') }}" class="p-2 hover:bg-purple-800 rounded-lg transition-colors">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-white">Tambah Perusahaan Baru</h1>
                    <p class="text-purple-100 mt-1">Isi informasi perusahaan di bawah ini</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-8">
                <form action="{{ route('admin.companies.store') }}" method="POST" id="companyForm">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    @if ($errors->any())
                        <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                            <ul class="text-red-700 text-sm list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Company Name -->
                    <div class="mb-6">
                        <label for="company_name" class="block text-gray-700 font-semibold mb-2">
                            Nama Perusahaan <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="company_name"
                            name="company_name" 
                            value="{{ old('company_name') }}"
                            class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 @error('company_name') border-red-500 @enderror"
                            placeholder="Contoh: PT Teknologi Indonesia"
                            required
                        >
                        @error('company_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Name (for internal use) -->
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">
                            Nama Singkat <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="name"
                            name="name" 
                            value="{{ old('name') }}"
                            class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 @error('name') border-red-500 @enderror"
                            placeholder="Contoh: PT Teknologi Maju"
                            required
                        >
                        <p class="text-gray-500 text-sm mt-1">Nama untuk tampilan internal sistem</p>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Industry & Location -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="industry" class="block text-gray-700 font-semibold mb-2">
                                Industri
                            </label>
                            <select 
                                id="industry"
                                name="industry" 
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 @error('industry') border-red-500 @enderror"
                            >
                                <option value="">Pilih Industri</option>
                                <option value="Technology" {{ old('industry') == 'Technology' ? 'selected' : '' }}>Technology</option>
                                <option value="Finance" {{ old('industry') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                <option value="Healthcare" {{ old('industry') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                <option value="Education" {{ old('industry') == 'Education' ? 'selected' : '' }}>Education</option>
                                <option value="Manufacturing" {{ old('industry') == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                <option value="Retail" {{ old('industry') == 'Retail' ? 'selected' : '' }}>Retail</option>
                                <option value="E-Commerce" {{ old('industry') == 'E-Commerce' ? 'selected' : '' }}>E-Commerce</option>
                                <option value="Creative" {{ old('industry') == 'Creative' ? 'selected' : '' }}>Creative & Design</option>
                                <option value="Telecommunications" {{ old('industry') == 'Telecommunications' ? 'selected' : '' }}>Telecommunications</option>
                                <option value="Other" {{ old('industry') == 'Other' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label for="location" class="block text-gray-700 font-semibold mb-2">
                                Lokasi
                            </label>
                            <input 
                                type="text" 
                                id="location"
                                name="location" 
                                value="{{ old('location') }}"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 @error('location') border-red-500 @enderror"
                                placeholder="Contoh: Jakarta"
                            >
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label for="description" class="block text-gray-700 font-semibold mb-2">
                            Deskripsi Perusahaan
                        </label>
                        <textarea 
                            id="description"
                            name="description" 
                            rows="4"
                            class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 @error('description') border-red-500 @enderror"
                            placeholder="Ceritakan tentang perusahaan Anda..."
                        >{{ old('description') }}</textarea>
                    </div>

                    <!-- Contact Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="email" class="block text-gray-700 font-semibold mb-2">
                                Email Perusahaan <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="email"
                                name="email" 
                                value="{{ old('email') }}"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 @error('email') border-red-500 @enderror"
                                placeholder="info@company.com"
                                required
                            >
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-gray-700 font-semibold mb-2">
                                Nomor Telepon
                            </label>
                            <input 
                                type="text" 
                                id="phone"
                                name="phone" 
                                value="{{ old('phone') }}"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 @error('phone') border-red-500 @enderror"
                                placeholder="021-12345678"
                            >
                        </div>
                    </div>

                    <!-- Website & Logo -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="website" class="block text-gray-700 font-semibold mb-2">
                                Website
                            </label>
                            <input 
                                type="url" 
                                id="website"
                                name="website" 
                                value="{{ old('website') }}"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 @error('website') border-red-500 @enderror"
                                placeholder="https://company.com"
                            >
                        </div>

                        <div>
                            <label for="logo" class="block text-gray-700 font-semibold mb-2">
                                Logo URL
                            </label>
                            <input 
                                type="url" 
                                id="logo"
                                name="logo" 
                                value="{{ old('logo') }}"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 @error('logo') border-red-500 @enderror"
                                placeholder="https://example.com/logo.png"
                            >
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex items-center gap-4 pt-6 border-t border-gray-200">
                        <button 
                            type="submit"
                            class="px-8 py-3 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white rounded-lg transition-all duration-300 hover:scale-105 font-semibold shadow-lg"
                        >
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Perusahaan
                        </button>
                        <a 
                            href="{{ route('admin.companies.index') }}" 
                            class="px-8 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition-colors font-semibold"
                        >
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info Card -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <div class="flex items-start gap-3">
                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div class="text-sm text-blue-800">
                    <p class="font-semibold mb-1">Tips:</p>
                    <ul class="list-disc list-inside space-y-1">
                        <li>Pastikan nama perusahaan unik dan jelas</li>
                        <li>Deskripsi yang menarik akan meningkatkan minat kandidat</li>
                        <li>Logo akan ditampilkan di setiap lowongan kerja</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
