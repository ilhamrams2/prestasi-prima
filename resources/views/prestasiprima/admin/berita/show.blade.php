@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('prestasiprima.admin.berita.index') }}" 
           class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all">
            <i class="ri-arrow-left-line text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Pratinjau Berita</h1>
            <p class="text-sm text-slate-500 font-medium">Tampilan berita sebagaimana akan dilihat oleh pengunjung website.</p>
        </div>
    </div>

    {{-- ================= ARTICLE CARD ================= --}}
    <article class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        {{-- Hero Thumbnail --}}
        @if($news->thumbnail)
            <div class="relative h-[28rem] overflow-hidden">
                <img src="{{ asset($news->thumbnail) }}" alt="{{ $news->title }}" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent"></div>
            </div>
        @endif
        
        <div class="p-8 md:p-14">
            {{-- Category & Date --}}
            <div class="flex items-center gap-4 mb-6">
                <span class="px-4 py-1.5 rounded-xl bg-orange-50 text-[#FF6B00] text-[10px] font-extrabold uppercase tracking-widest">
                    {{ $news->category->name ?? 'Update' }}
                </span>
                <span class="text-slate-400 font-bold text-[10px] uppercase tracking-widest flex items-center gap-2">
                    <i class="ri-calendar-event-line"></i> {{ $news->created_at->translatedFormat('d F Y') }}
                </span>
            </div>

            <h2 class="text-4xl font-extrabold text-slate-800 tracking-tight mb-8 leading-[1.15]">
                {{ $news->title }}
            </h2>

            {{-- Content --}}
            <div class="prose prose-slate max-w-none prose-p:text-slate-600 prose-p:text-lg prose-p:leading-relaxed prose-p:font-medium prose-headings:text-slate-800 prose-headings:font-extrabold prose-strong:text-slate-900 prose-img:rounded-3xl">
                {!! $news->content !!}
            </div>

            {{-- Action Bottom --}}
            <div class="mt-16 pt-10 border-t border-slate-50 flex flex-col md:flex-row gap-3">
                <a href="{{ route('prestasiprima.admin.berita.edit', $news->id) }}" 
                   class="flex-1 md:flex-none px-10 py-4 rounded-2xl bg-[#FF6B00] text-white font-bold text-sm hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 text-center">
                    Edit Berita
                </a>
                <a href="{{ route('prestasiprima.admin.berita.index') }}" 
                   class="flex-1 md:flex-none px-10 py-4 rounded-2xl bg-slate-50 text-slate-600 font-bold text-sm hover:bg-slate-100 transition-all text-center">
                   Kembali ke Daftar
                </a>
            </div>
        </div>
    </article>
</div>
@endsection
