@vite('resources/css/app.css')
@section('title', 'Edit Lowongan')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center gap-4 mb-4">
                <a href="{{ route('admin.jobs.index') }}" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Edit Lowongan</h1>
                    <p class="text-gray-600 mt-1">Update informasi lowongan pekerjaan</p>
                </div>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.jobs.update', $job) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                    <ul class="text-red-700 text-sm list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Basic Information Card -->
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-l-orange-500">
                <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Informasi Dasar
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Job Title -->
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Lowongan <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="title" 
                            id="title"
                            value="{{ old('title', $job->title) }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('title') border-red-500 @enderror"
                            placeholder="Contoh: Senior Web Developer"
                        >
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Company Name -->
                    <div>
                        <label for="company_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Perusahaan <span class="text-red-500">*</span>
                        </label>
                        <select name="company_id" id="company_id" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('company_id') border-red-500 @enderror">
                            <option value="">Pilih Perusahaan</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ old('company_id', $job->company_id) == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                        @error('company_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                            Lokasi <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="location" 
                            id="location"
                            value="{{ old('location', $job->location) }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('location') border-red-500 @enderror"
                            placeholder="Contoh: Jakarta Selatan"
                        >
                        @error('location')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Job Type -->
                    <div>
                        <label for="job_type" class="block text-sm font-medium text-gray-700 mb-2">
                            Tipe Pekerjaan <span class="text-red-500">*</span>
                        </label>
                        <select 
                            name="job_type" 
                            id="job_type"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('job_type') border-red-500 @enderror"
                        >
                            <option value="">Pilih Tipe</option>
                            <option value="Full Time" {{ old('job_type', $job->job_type) === 'Full Time' ? 'selected' : '' }}>Full Time</option>
                            <option value="Part Time" {{ old('job_type', $job->job_type) === 'Part Time' ? 'selected' : '' }}>Part Time</option>
                            <option value="Contract" {{ old('job_type', $job->job_type) === 'Contract' ? 'selected' : '' }}>Contract</option>
                            <option value="Freelance" {{ old('job_type', $job->job_type) === 'Freelance' ? 'selected' : '' }}>Freelance</option>
                            <option value="Internship" {{ old('job_type', $job->job_type) === 'Internship' ? 'selected' : '' }}>Internship</option>
                        </select>
                        @error('job_type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Salary -->
                    <div>
                        <label for="salary_range" class="block text-sm font-medium text-gray-700 mb-2">
                            Gaji <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="salary_range" 
                            id="salary_range"
                            value="{{ old('salary_range', $job->salary_range) }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('salary_range') border-red-500 @enderror"
                            placeholder="Contoh: Rp 8-12 juta"
                        >
                        @error('salary_range')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Company Logo URL -->
                    <div class="md:col-span-2">
                        <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">
                            URL Logo Perusahaan (Optional)
                        </label>
                        <input 
                            type="url" 
                            name="logo" 
                            id="logo"
                            value="{{ old('logo', $job->logo) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('logo') border-red-500 @enderror"
                            placeholder="https://example.com/logo.png"
                        >
                        <p class="mt-1 text-xs text-gray-500">Gunakan URL dari Unsplash atau sumber gambar lainnya</p>
                        @error('logo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Job Details Card -->
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-l-blue-500">
                <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Detail Pekerjaan
                </h2>

                <div class="space-y-6">
                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Pekerjaan <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="description" 
                            id="description"
                            rows="5"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('description') border-red-500 @enderror"
                            placeholder="Jelaskan detail pekerjaan, tanggung jawab, dan ekspektasi..."
                        >{{ old('description', $job->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Requirements -->
                    <div>
                        <label for="requirements" class="block text-sm font-medium text-gray-700 mb-2">
                            Kualifikasi & Keahlian <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="requirements" 
                            id="requirements"
                            rows="5"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('requirements') border-red-500 @enderror"
                            placeholder="Masukkan requirements, satu per baris atau dipisah koma&#10;Contoh:&#10;React&#10;Node.js&#10;JavaScript"
                        >{{ old('requirements', is_array($job->requirements) ? implode("\n", $job->requirements) : $job->requirements) }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">Pisahkan setiap requirement dengan enter atau koma</p>
                        @error('requirements')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Status Card -->
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-l-green-500">
                <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Status Publikasi
                </h2>

                <div class="flex items-center">
                    <label for="is_active" class="flex items-center cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="is_active" 
                            id="is_active"
                            value="1"
                            {{ old('is_active', $job->is_active) ? 'checked' : '' }}
                            class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500"
                        >
                        <span class="ml-3 text-sm font-medium text-gray-700">
                            Publikasikan lowongan ini (tampilkan di halaman publik)
                        </span>
                    </label>
                </div>
            </div>

            <!-- Job Info -->
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="text-sm text-blue-700">
                        <p class="font-medium">Informasi Lowongan</p>
                        <p class="mt-1">Dibuat: {{ $job->created_at->format('d M Y, H:i') }} ({{ $job->time_ago }})</p>
                        <p>Terakhir diupdate: {{ $job->updated_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end gap-4 bg-white rounded-lg shadow-sm p-6">
                <a href="{{ route('admin.jobs.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white rounded-lg transition-all duration-300 hover:scale-105 flex items-center gap-2 font-medium shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Lowongan
                </button>
            </div>
        </form>
    </div>
</div>
