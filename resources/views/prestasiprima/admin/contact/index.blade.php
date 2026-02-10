@extends('layouts.admin')

@section('title', 'Inbox Pesan')

@section('content')

{{-- Header Section --}}
<div class="mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Inbox Pesan</h1>
            <p class="text-slate-500 mt-1">Kelola pesan masuk dari pengunjung website</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="bg-gradient-to-r from-orange-50 to-orange-100 px-5 py-3 rounded-2xl border-2 border-orange-200 flex items-center gap-3 shadow-sm">
                <div class="w-8 h-8 bg-[#FF6B00] rounded-lg flex items-center justify-center">
                    <i class="ri-mail-unread-line text-white text-base"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-medium">Belum Dibaca</p>
                    <p class="text-lg font-extrabold text-[#FF6B00]">{{ $unreadCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Filter & Search Bar --}}
<div class="bg-white rounded-[24px] shadow-sm border border-slate-100 p-6 mb-6">
    <form method="GET" action="{{ route('prestasiprima.admin.contact.index') }}" class="flex flex-col md:flex-row gap-4">
        
        {{-- Search Input --}}
        <div class="flex-1">
            <div class="relative">
                <i class="ri-search-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl"></i>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}"
                       placeholder="Cari berdasarkan nama, email, atau isi pesan..." 
                       class="w-full pl-12 pr-4 py-3.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-[#FF6B00] focus:border-transparent transition-all text-sm">
            </div>
        </div>

        {{-- Filter Status --}}
        <div class="flex gap-3">
            <div class="relative">
                <i class="ri-filter-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg pointer-events-none z-10"></i>
                <select name="status" 
                        class="pl-11 pr-10 py-3.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-[#FF6B00] focus:border-transparent transition-all font-semibold text-slate-700 text-sm appearance-none bg-white cursor-pointer min-w-[180px]">
                    <option value="all" {{ request('status', 'all') == 'all' ? 'selected' : '' }}>Semua Pesan</option>
                    <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
                    <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
                </select>
                <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
            </div>

            <button type="submit" 
                    class="px-6 py-3.5 bg-[#FF6B00] text-white rounded-xl font-bold hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 flex items-center gap-2 text-sm">
                <i class="ri-search-2-line text-base"></i>
                Terapkan
            </button>

            @if(request('search') || (request('status') && request('status') != 'all'))
                <a href="{{ route('prestasiprima.admin.contact.index') }}" 
                   class="px-5 py-3.5 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition-all flex items-center gap-2 text-sm">
                    <i class="ri-refresh-line text-base"></i>
                    Reset
                </a>
            @endif
        </div>
    </form>
</div>

{{-- Bulk Actions Bar --}}
<div id="bulk-actions-bar" class="bg-gradient-to-r from-[#FF6B00] to-orange-600 rounded-[24px] shadow-xl shadow-orange-500/30 p-5 mb-6 hidden">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="flex items-center gap-3 text-white">
            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                <i class="ri-checkbox-multiple-line text-xl"></i>
            </div>
            <div>
                <span class="font-bold text-base"><span id="selected-count">0</span> pesan dipilih</span>
                <p class="text-xs text-white/80 mt-0.5">Pilih aksi yang ingin dilakukan</p>
            </div>
        </div>
        <div class="flex gap-2">
            <form id="bulk-mark-read-form" method="POST" action="{{ route('prestasiprima.admin.contact.bulk-mark-read') }}" class="inline">
                @csrf
                <input type="hidden" name="ids" id="bulk-mark-read-ids">
                <button type="submit" 
                        class="px-5 py-2.5 bg-white/20 hover:bg-white text-white hover:text-[#FF6B00] rounded-xl font-bold transition-all flex items-center gap-2 text-sm backdrop-blur-sm">
                    <i class="ri-check-double-line text-base"></i>
                    Tandai Dibaca
                </button>
            </form>

            <form id="bulk-delete-form" method="POST" action="{{ route('prestasiprima.admin.contact.bulk-delete') }}" class="inline">
                @csrf
                <input type="hidden" name="ids" id="bulk-delete-ids">
                <button type="submit" 
                        onclick="return confirmDelete(event)"
                        data-confirm-text="Yakin ingin menghapus pesan yang dipilih?"
                        class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-xl font-bold transition-all flex items-center gap-2 text-sm shadow-lg shadow-red-500/20">
                    <i class="ri-delete-bin-line text-base"></i>
                    Hapus
                </button>
            </form>

            <button onclick="clearSelection()" 
                    class="px-5 py-2.5 bg-white/20 hover:bg-white text-white hover:text-slate-700 rounded-xl font-bold transition-all flex items-center gap-2 text-sm backdrop-blur-sm">
                <i class="ri-close-circle-line text-base"></i>
                Batal
            </button>
        </div>
    </div>
</div>

{{-- Messages List --}}
<div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
    
    @if($messages->count() > 0)
        {{-- Select All Checkbox --}}
        <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
            <label class="flex items-center gap-3 cursor-pointer">
                <input type="checkbox" 
                       id="select-all" 
                       onchange="toggleSelectAll(this)"
                       class="w-5 h-5 rounded border-slate-300 text-[#FF6B00] focus:ring-[#FF6B00]">
                <span class="text-sm font-bold text-slate-700">Pilih Semua</span>
            </label>
        </div>

        <div class="divide-y divide-slate-100">
            @foreach($messages as $message)
                <div class="p-6 hover:bg-slate-50 transition-colors {{ !$message->is_read ? 'bg-orange-50/30' : '' }}">
                    <div class="flex items-start gap-4">
                        
                        {{-- Checkbox --}}
                        <input type="checkbox" 
                               class="message-checkbox mt-4 w-5 h-5 rounded border-slate-300 text-[#FF6B00] focus:ring-[#FF6B00]" 
                               value="{{ $message->id }}"
                               onchange="updateBulkActions()">

                        {{-- Avatar --}}
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#FF6B00] to-orange-600 flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                            {{ strtoupper(substr($message->nama, 0, 1)) }}
                        </div>

                        {{-- Message Content --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-bold text-slate-800">{{ $message->nama }}</h3>
                                @if(!$message->is_read)
                                    <span class="text-[10px] font-bold text-white bg-[#FF6B00] px-2 py-0.5 rounded uppercase">Baru</span>
                                @endif
                            </div>
                            <p class="text-sm text-slate-600 mb-1">{{ $message->email }}</p>
                            <p class="text-sm text-slate-700 line-clamp-2 mb-2">{{ $message->pesan }}</p>
                            <div class="flex items-center gap-4 text-xs text-slate-400">
                                <span class="flex items-center gap-1">
                                    <i class="ri-time-line"></i>
                                    {{ $message->created_at->diffForHumans() }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="ri-calendar-line"></i>
                                    {{ $message->created_at->format('d M Y, H:i') }}
                                </span>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="flex gap-2">
                            <a href="{{ route('prestasiprima.admin.contact.show', $message->id) }}" 
                               class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border-2 border-slate-200 text-slate-600 hover:text-[#FF6B00] hover:border-[#FF6B00] hover:bg-orange-50 transition-all group"
                               title="Lihat Detail">
                                <i class="ri-eye-line text-lg group-hover:scale-110 transition-transform"></i>
                            </a>
                            
                            <form action="{{ route('prestasiprima.admin.contact.destroy', $message->id) }}" 
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirmDelete(event)"
                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border-2 border-slate-200 text-slate-600 hover:text-red-600 hover:border-red-600 hover:bg-red-50 transition-all group"
                                        title="Hapus">
                                    <i class="ri-delete-bin-line text-lg group-hover:scale-110 transition-transform"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="px-6 py-4 border-t border-slate-100">
            {{ $messages->appends(request()->query())->links() }}
        </div>

    @else
        {{-- Empty State --}}
        <div class="py-24 text-center">
            <div class="w-24 h-24 bg-gradient-to-br from-orange-50 to-orange-100 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-sm">
                <i class="ri-mail-line text-5xl text-[#FF6B00]"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">
                @if(request('search') || (request('status') && request('status') != 'all'))
                    Tidak Ada Hasil Ditemukan
                @else
                    Belum Ada Pesan
                @endif
            </h3>
            <p class="text-slate-500 text-sm max-w-md mx-auto">
                @if(request('search') || (request('status') && request('status') != 'all'))
                    Coba ubah filter atau kata kunci pencarian Anda
                @else
                    Pesan dari pengunjung website akan muncul di sini
                @endif
            </p>
        </div>
    @endif

</div>

{{-- Bulk Actions JavaScript --}}
<script>
    function toggleSelectAll(checkbox) {
        const checkboxes = document.querySelectorAll('.message-checkbox');
        checkboxes.forEach(cb => cb.checked = checkbox.checked);
        updateBulkActions();
    }

    function updateBulkActions() {
        const checkboxes = document.querySelectorAll('.message-checkbox:checked');
        const count = checkboxes.length;
        const bulkBar = document.getElementById('bulk-actions-bar');
        const selectedCount = document.getElementById('selected-count');
        
        selectedCount.textContent = count;
        
        if (count > 0) {
            bulkBar.classList.remove('hidden');
            
            // Update hidden inputs with selected IDs
            const ids = Array.from(checkboxes).map(cb => cb.value);
            document.getElementById('bulk-mark-read-ids').value = JSON.stringify(ids);
            document.getElementById('bulk-delete-ids').value = JSON.stringify(ids);
        } else {
            bulkBar.classList.add('hidden');
        }
    }

    function clearSelection() {
        document.querySelectorAll('.message-checkbox').forEach(cb => cb.checked = false);
        document.getElementById('select-all').checked = false;
        updateBulkActions();
    }
</script>

@endsection

