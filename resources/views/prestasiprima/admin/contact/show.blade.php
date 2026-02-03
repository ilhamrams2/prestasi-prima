@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')

{{-- Back Button --}}
<div class="mb-6">
    <a href="{{ route('prestasiprima.admin.contact.index') }}" 
       class="inline-flex items-center gap-2 text-slate-600 hover:text-[#FF6B00] transition-colors font-semibold">
        <i class="ri-arrow-left-line"></i>
        Kembali ke Inbox
    </a>
</div>

{{-- Message Card --}}
<div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
    
    {{-- Header --}}
    <div class="px-8 py-6 border-b border-slate-100 bg-slate-50/50">
        <div class="flex items-start justify-between">
            <div class="flex items-start gap-4">
                {{-- Avatar --}}
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-[#FF6B00] to-orange-600 flex items-center justify-center text-white font-bold text-2xl">
                    {{ strtoupper(substr($message->nama, 0, 1)) }}
                </div>
                
                {{-- Sender Info --}}
                <div>
                    <h2 class="text-2xl font-bold text-slate-800 mb-1">{{ $message->nama }}</h2>
                    <div class="flex items-center gap-4 text-sm text-slate-600">
                        <span class="flex items-center gap-1">
                            <i class="ri-mail-line"></i>
                            {{ $message->email }}
                        </span>
                        <span class="flex items-center gap-1">
                            <i class="ri-calendar-line"></i>
                            {{ $message->created_at->format('d M Y, H:i') }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Status Badge --}}
            <div>
                @if($message->is_read)
                    <span class="inline-flex items-center gap-1 text-xs font-bold text-green-700 bg-green-50 px-3 py-1.5 rounded-lg">
                        <i class="ri-check-double-line"></i>
                        Sudah Dibaca
                    </span>
                @else
                    <span class="inline-flex items-center gap-1 text-xs font-bold text-[#FF6B00] bg-orange-50 px-3 py-1.5 rounded-lg">
                        <i class="ri-mail-unread-line"></i>
                        Belum Dibaca
                    </span>
                @endif
            </div>
        </div>
    </div>

    {{-- Message Body --}}
    <div class="px-8 py-8">
        <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-3">Isi Pesan</h3>
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
            <p class="text-slate-700 leading-relaxed whitespace-pre-wrap">{{ $message->pesan }}</p>
        </div>
    </div>

    {{-- Meta Info --}}
    <div class="px-8 py-6 border-t border-slate-100 bg-slate-50/30">
        <div class="flex items-center gap-6 text-xs text-slate-500">
            <span class="flex items-center gap-1">
                <i class="ri-global-line"></i>
                IP: {{ $message->ip_address ?? 'N/A' }}
            </span>
            <span class="flex items-center gap-1">
                <i class="ri-time-line"></i>
                Diterima {{ $message->created_at->diffForHumans() }}
            </span>
        </div>
    </div>

    {{-- Actions --}}
    <div class="px-8 py-6 border-t border-slate-100 flex items-center justify-between">
        <a href="mailto:{{ $message->email }}" 
           class="inline-flex items-center gap-2 px-6 py-3 bg-[#FF6B00] text-white rounded-2xl font-bold hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20">
            <i class="ri-reply-line"></i>
            Balas via Email
        </a>

        <form action="{{ route('prestasiprima.admin.contact.destroy', $message->id) }}" 
              method="POST" 
              onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="inline-flex items-center gap-2 px-6 py-3 bg-red-50 text-red-600 rounded-2xl font-bold hover:bg-red-100 transition-all">
                <i class="ri-delete-bin-line"></i>
                Hapus Pesan
            </button>
        </form>
    </div>

</div>

@endsection
