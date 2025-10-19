@props([
    'type' => 'success',
    'title' => null,
    'message' => null,
])

<div x-data="{ show: true, timeout: null }" x-init="timeout = setTimeout(() => show = false, 4000)" x-show="show" x-transition
    class="fixed top-5 right-5 z-50 max-w-sm w-full">
    <div class="flex items-center gap-3 p-4 rounded-xl shadow-lg border backdrop-blur-sm" @class([
        'bg-white border-emerald-200 text-emerald-700' => $type === 'success',
        'bg-white border-rose-200 text-rose-700' => $type === 'error',
    ])>
        <i @class([
            'ri-checkbox-circle-fill text-emerald-500 text-2xl' => $type === 'success',
            'ri-close-circle-fill text-rose-500 text-2xl' => $type === 'error',
        ])></i>

        <div class="flex-1">
            <p class="font-semibold">{{ $title ?? ($type === 'success' ? 'Berhasil!' : 'Gagal!') }}</p>
            <p class="text-sm text-gray-600">{{ $message }}</p>
        </div>

        <button @click="show = false" class="text-gray-400 hover:text-gray-600">
            <i class="ri-close-line text-lg"></i>
        </button>
    </div>
</div>
