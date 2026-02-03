@extends('layouts.admin')

@section('title', 'Log Aktivitas Admin')

@section('content')

{{-- Header Section --}}
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Log Aktivitas Admin</h1>
            <p class="text-slate-500 mt-1">Pantau setiap aksi dan perubahan yang dilakukan admin</p>
        </div>
        <div class="flex items-center gap-3">
            <form action="{{ route('prestasiprima.admin.logs.clear') }}" method="POST" onsubmit="return confirm('Hapus log lama?')">
                @csrf
                <input type="hidden" name="days" value="30">
                <button type="submit" class="bg-red-50 text-red-600 px-6 py-3 rounded-2xl font-bold hover:bg-red-100 transition-all flex items-center gap-2">
                    <i class="ri-delete-bin-line"></i> Bersihkan Log (>30 hari)
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Filter Bar --}}
<div class="bg-white rounded-[24px] shadow-sm border border-slate-100 p-6 mb-6">
    <form method="GET" action="{{ route('prestasiprima.admin.logs.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="text-xs font-bold text-slate-400 uppercase mb-2 block">Admin</label>
            <input type="text" name="user" value="{{ request('user') }}" placeholder="Nama Admin" class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-[#FF6B00] outline-none transition-all">
        </div>
        <div>
            <label class="text-xs font-bold text-slate-400 uppercase mb-2 block">Aksi</label>
            <select name="action" class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-[#FF6B00] outline-none transition-all">
                <option value="">Semua Aksi</option>
                <option value="create" {{ request('action') == 'create' ? 'selected' : '' }}>Create</option>
                <option value="update" {{ request('action') == 'update' ? 'selected' : '' }}>Update</option>
                <option value="delete" {{ request('action') == 'delete' ? 'selected' : '' }}>Delete</option>
                <option value="login" {{ request('action') == 'login' ? 'selected' : '' }}>Login</option>
                <option value="system" {{ request('action') == 'system' ? 'selected' : '' }}>System</option>
            </select>
        </div>
        <div>
            <label class="text-xs font-bold text-slate-400 uppercase mb-2 block">Tgl Mulai</label>
            <input type="date" name="date_start" value="{{ request('date_start') }}" class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-[#FF6B00] outline-none transition-all">
        </div>
        <div class="flex items-end gap-2">
            <div class="flex-1">
                <label class="text-xs font-bold text-slate-400 uppercase mb-2 block">Tgl Selesai</label>
                <input type="date" name="date_end" value="{{ request('date_end') }}" class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-[#FF6B00] outline-none transition-all">
            </div>
            <button type="submit" class="bg-[#FF6B00] text-white p-3.5 rounded-xl hover:bg-[#e66000] shadow-lg shadow-orange-500/20 transition-all">
                <i class="ri-search-line"></i>
            </button>
            @if(request()->anyFilled(['user', 'action', 'date_start', 'date_end']))
                <a href="{{ route('prestasiprima.admin.logs.index') }}" class="bg-slate-100 text-slate-500 p-3.5 rounded-xl hover:bg-slate-200 transition-all">
                    <i class="ri-refresh-line"></i>
                </a>
            @endif
        </div>
    </form>
</div>

{{-- Logs List --}}
<div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50">
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Waktu</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Admin</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Aksi</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Modul</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Detail</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($logs as $log)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <span class="text-sm font-medium text-slate-800">{{ $log->created_at->format('d M Y') }}</span>
                        <p class="text-[11px] text-slate-400">{{ $log->created_at->format('H:i:s') }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 font-bold text-xs">
                                {{ substr($log->user_name, 0, 1) }}
                            </div>
                            <span class="text-sm font-bold text-slate-700">{{ $log->user_name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $badgeClass = match($log->action) {
                                'create' => 'bg-green-100 text-green-700',
                                'update' => 'bg-blue-100 text-blue-700',
                                'delete' => 'bg-red-100 text-red-700',
                                'login' => 'bg-orange-100 text-orange-700',
                                default => 'bg-slate-100 text-slate-700',
                            };
                        @endphp
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase {{ $badgeClass }}">
                            {{ $log->action }}
                        </span>
                    </td>
                    <td class="px-6 py-4 min-w-[200px]">
                        <p class="text-sm text-slate-600 leading-relaxed">{{ $log->description }}</p>
                    </td>
                    <td class="px-6 py-4">
                        @if($log->model_type)
                            <span class="text-xs font-medium text-slate-400 italic">
                                {{ class_basename($log->model_type) }} #{{ $log->model_id }}
                            </span>
                        @else
                            <span class="text-xs text-slate-300">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <button onclick="showLogModal({{ $log->id }})" class="p-2 text-slate-400 hover:text-[#FF6B00] transition-colors">
                            <i class="ri-information-line text-xl"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-20 text-center">
                        <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-history-line text-3xl text-slate-300"></i>
                        </div>
                        <h4 class="text-lg font-bold text-slate-800">Tidak ada log ditemukan</h4>
                        <p class="text-sm text-slate-500">Sesuaikan filter atau kata kunci Anda</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($logs->hasPages())
    <div class="px-6 py-4 border-t border-slate-100">
        {{ $logs->links() }}
    </div>
    @endif
</div>

{{-- Detail Modal --}}
<div id="logModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-sm hidden">
    <div class="bg-white rounded-[32px] w-full max-w-2xl overflow-hidden shadow-2xl">
        <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-xl font-bold text-slate-800">Detail Log Aktivitas</h3>
            <button onclick="closeLogModal()" class="text-slate-400 hover:text-red-500 transition-colors">
                <i class="ri-close-line text-2xl"></i>
            </button>
        </div>
        <div class="p-8 max-h-[70vh] overflow-y-auto" id="logModalContent">
            <!-- Content loaded via script -->
        </div>
    </div>
</div>

<script>
    const logsData = @json($logs->items());

    function showLogModal(id) {
        const log = logsData.find(l => l.id === id);
        if (!log) return;

        const content = `
            <div class="space-y-6">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase mb-1">Waktu</p>
                        <p class="text-sm font-bold text-slate-800">${log.created_at}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase mb-1">Admin</p>
                        <p class="text-sm font-bold text-slate-800">${log.user_name}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase mb-1">IP Address</p>
                        <p class="text-sm font-medium text-slate-800">${log.ip_address || '-'}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase mb-1">Aksi</p>
                        <span class="text-xs font-bold uppercase text-slate-700">${log.action}</span>
                    </div>
                </div>

                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase mb-1">User Agent</p>
                    <p class="text-xs text-slate-600 bg-slate-50 p-3 rounded-xl border border-slate-100">${log.user_agent || '-'}</p>
                </div>

                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase mb-1">Payload (Data Perubahan)</p>
                    <pre class="text-[11px] text-slate-600 bg-slate-900 p-4 rounded-2xl border border-slate-800 overflow-x-auto text-white">${JSON.stringify(log.payload, null, 2) || 'Tidak ada data perubahan'}</pre>
                </div>
            </div>
        `;

        document.getElementById('logModalContent').innerHTML = content;
        document.getElementById('logModal').classList.remove('hidden');
    }

    function closeLogModal() {
        document.getElementById('logModal').classList.add('hidden');
    }

    // Close modal on click outside
    window.onclick = function(event) {
        const modal = document.getElementById('logModal');
        if (event.target == modal) {
            closeLogModal();
        }
    }
</script>

@endsection
