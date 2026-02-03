@extends('layouts.admin')

@section('title', 'Admin Settings')

@section('content')

{{-- Header Section --}}
<div class="mb-10">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Konfigurasi Sistem</h1>
            <p class="text-slate-500 mt-1">Sesuaikan identitas, tampilan, dan integrasi website utama</p>
        </div>
        <div class="flex items-center gap-3">
            <form action="{{ route('prestasiprima.admin.settings.init') }}" method="POST">
                @csrf
                <button type="submit" class="bg-white text-slate-600 border border-slate-200 px-6 py-3.5 rounded-2xl font-bold hover:bg-slate-50 hover:border-slate-300 transition-all flex items-center gap-2 shadow-sm">
                    <i class="ri-refresh-line"></i> Reset ke Default
                </button>
            </form>
        </div>
    </div>
</div>

@if($settings->isNotEmpty())
<form action="{{ route('prestasiprima.admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
        {{-- Sidebar Navigation --}}
        <div class="lg:col-span-1">
            <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 p-3 sticky top-24">
                <nav class="space-y-1">
                    @php
                        $icons = [
                            'general' => 'ri-settings-4-line',
                            'identity' => 'ri-fingerprint-line',
                            'appearance' => 'ri-palette-line',
                            'contact' => 'ri-customer-service-2-line',
                            'social' => 'ri-share-line',
                            'seo' => 'ri-search-eye-line'
                        ];
                    @endphp
                    @foreach($settings as $group => $items)
                    <a href="#group-{{ $group }}" 
                       class="w-full flex items-center gap-3 px-6 py-4 rounded-2xl transition-all group nav-setting-btn"
                       data-group="{{ $group }}">
                        <div class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center group-hover:bg-[#FF6B00] group-hover:text-white transition-all icon-box">
                            <i class="{{ $icons[$group] ?? 'ri-list-settings-line' }} text-lg"></i>
                        </div>
                        <span class="text-sm font-bold text-slate-600 group-hover:text-slate-800 capitalize">{{ $group }}</span>
                    </a>
                    @endforeach
                </nav>
            </div>
        </div>

        {{-- Settings Content --}}
        <div class="lg:col-span-3 space-y-12 pb-24">
            @foreach($settings as $group => $items)
            <div id="group-{{ $group }}" class="bg-white rounded-[40px] shadow-sm border border-slate-100 overflow-hidden setting-section scroll-mt-24">
                <div class="px-10 py-8 border-b border-slate-50/50 bg-slate-50/20">
                    <h3 class="text-xl font-extrabold text-slate-800 capitalize flex items-center gap-3">
                        <i class="{{ $icons[$group] ?? 'ri-list-settings-line' }} text-[#FF6B00]"></i>
                        {{ $group }} Settings
                    </h3>
                </div>
                <div class="p-10 space-y-10">
                    @foreach($items as $setting)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                        <div class="md:col-span-1">
                            <label class="text-sm font-bold text-slate-800 block mb-1">{{ $setting->label }}</label>
                            <p class="text-[11px] text-slate-400 leading-relaxed font-medium">{{ $setting->description }}</p>
                        </div>
                        <div class="md:col-span-2">
                            @if($setting->type == 'textarea')
                                <textarea name="{{ $setting->key }}" class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-[#FF6B00]/20 focus:border-[#FF6B00] focus:bg-white outline-none transition-all text-sm min-h-[120px] font-medium text-slate-700">{{ $setting->value }}</textarea>
                            
                            @elseif($setting->type == 'image')
                                <div class="flex items-center gap-6">
                                    <div class="w-24 h-24 rounded-2xl bg-slate-50 border-2 border-dashed border-slate-200 flex items-center justify-center overflow-hidden flex-shrink-0 relative group/img">
                                        @if($setting->value)
                                            <img src="{{ asset($setting->value) }}" id="preview-{{ $setting->key }}" class="w-full h-full object-contain">
                                        @else
                                            <i class="ri-image-add-line text-2xl text-slate-300" id="icon-{{ $setting->key }}"></i>
                                            <img src="" id="preview-{{ $setting->key }}" class="w-full h-full object-contain hidden">
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <input type="file" name="{{ $setting->key }}" id="input-{{ $setting->key }}" onchange="previewImage(this, '{{ $setting->key }}')" class="hidden" accept="image/*">
                                        <button type="button" onclick="document.getElementById('input-{{ $setting->key }}').click()" class="px-5 py-2.5 bg-slate-100 text-slate-600 rounded-xl text-xs font-bold hover:bg-slate-200 transition-all flex items-center gap-2">
                                            <i class="ri-upload-cloud-2-line"></i> Pilih Gambar
                                        </button>
                                        <p class="text-[10px] text-slate-400 mt-2 italic">*Hanya dukung format PNG, JPG, atau WEBP. Max 2MB.</p>
                                    </div>
                                </div>

                            @elseif($setting->type == 'boolean')
                                <div class="flex items-center">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="{{ $setting->key }}" value="1" {{ $setting->value == '1' ? 'checked' : '' }} class="sr-only peer">
                                        <div class="w-14 h-8 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#FF6B00]/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#FF6B00]"></div>
                                        <span class="ml-3 text-sm font-bold text-slate-600 {{ $setting->value == '1' ? 'text-[#FF6B00]' : '' }}">
                                            {{ $setting->value == '1' ? 'Aktif' : 'Non-aktif' }}
                                        </span>
                                    </label>
                                </div>

                            @elseif($setting->type == 'color')
                                <div class="flex items-center gap-4">
                                    <div class="relative w-12 h-12 rounded-xl overflow-hidden border border-slate-200">
                                        <input type="color" name="{{ $setting->key }}" value="{{ $setting->value }}" class="absolute -inset-2 w-[150%] h-[150%] cursor-pointer">
                                    </div>
                                    <input type="text" value="{{ $setting->value }}" class="px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-mono font-bold text-slate-600 w-32 uppercase" readonly>
                                </div>

                            @else
                                <input type="{{ $setting->type }}" name="{{ $setting->key }}" value="{{ $setting->value }}" class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-[#FF6B00]/20 focus:border-[#FF6B00] focus:bg-white outline-none transition-all text-sm font-bold text-slate-700">
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

            {{-- Floating Save Bar --}}
            <div class="fixed bottom-8 left-1/2 -translate-x-1/2 lg:left-[calc(50%+140px)] w-[90%] lg:w-[600px] bg-slate-900/90 backdrop-blur-xl rounded-[32px] p-4 shadow-2xl shadow-slate-900/40 flex items-center justify-between z-50 border border-white/10">
                <div class="px-6 hidden md:block">
                    <p class="text-xs text-slate-400 font-medium">Perubahan belum disimpan</p>
                    <p class="text-slate-100 text-sm font-bold">Pastikan data sudah benar</p>
                </div>
                <div class="flex items-center gap-3 w-full md:w-auto">
                    <button type="reset" class="flex-1 md:flex-none px-8 py-4 text-slate-400 font-bold hover:text-white transition-all text-sm">Batal</button>
                    <button type="submit" class="flex-1 md:flex-none px-10 py-4 bg-[#FF6B00] text-white rounded-2xl font-extrabold hover:bg-[#e66000] shadow-xl shadow-orange-500/20 transition-all text-sm flex items-center justify-center gap-2">
                        <i class="ri-save-3-line text-lg"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@else
<div class="bg-white rounded-[40px] shadow-sm border border-slate-100 p-20 text-center">
    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
        <i class="ri-settings-4-line text-4xl text-slate-300 animate-pulse"></i>
    </div>
    <h3 class="text-xl font-bold text-slate-800 mb-2">Konfigurasi Kosong</h3>
    <p class="text-slate-500 max-w-sm mx-auto mb-8 text-sm">Silakan klik tombol di bawah untuk membuat pengaturan situs standar.</p>
    <form action="{{ route('prestasiprima.admin.settings.init') }}" method="POST">
        @csrf
        <button type="submit" class="bg-[#FF6B00] text-white px-8 py-4 rounded-2xl font-bold hover:bg-[#e66000] transition-all flex items-center gap-2 shadow-lg shadow-orange-500/20 mx-auto">
            Inisialisasi Sekarang
        </button>
    </form>
</div>
@endif

<script>
    function previewImage(input, key) {
        const preview = document.getElementById('preview-' + key);
        const icon = document.getElementById('icon-' + key);
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                if(icon) icon.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const sections = document.querySelectorAll('.setting-section');
        const navLinks = document.querySelectorAll('.nav-setting-btn');

        // Smooth scroll with manual offset for compatibility
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const id = link.getAttribute('href');
                const target = document.querySelector(id);
                if (target) {
                    const yOffset = -100;
                    const y = target.getBoundingClientRect().top + window.scrollY + yOffset;
                    window.scrollTo({top: y, behavior: 'smooth'});
                    
                    // Update URL without jump
                    history.pushState(null, null, id);
                }
            });
        });

        // Intersection Observer for highlighting
        const options = {
            root: null,
            rootMargin: '-150px 0px -70% 0px',
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id').replace('group-', '');
                    
                    navLinks.forEach(link => {
                        if (link.getAttribute('data-group') === id) {
                            link.classList.add('bg-orange-50', 'active');
                        } else {
                            link.classList.remove('bg-orange-50', 'active');
                        }
                    });
                }
            });
        }, options);

        sections.forEach(section => observer.observe(section));
    });
</script>

<style>
    .nav-setting-btn.active span {
        color: #FF6B00;
    }
    .nav-setting-btn.active .icon-box {
        background-color: #FF6B00;
        color: white;
        box-shadow: 0 4px 12px rgba(255, 107, 0, 0.2);
    }
    .scroll-mt-24 {
        scroll-margin-top: 6rem;
    }
    html {
        scroll-behavior: smooth;
    }
</style>

@endsection
