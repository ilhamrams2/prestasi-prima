@props([
    'type' => 'info',
    'title' => '',
    'message' => '',
])

@php
    $variants = [
        'success' => [
            'icon' => 'ri-checkbox-circle-line',
            'background' => 'bg-green-50',
            'border' => 'border-green-200',
            'text' => 'text-green-700',
        ],
        'error' => [
            'icon' => 'ri-error-warning-line',
            'background' => 'bg-red-50',
            'border' => 'border-red-200',
            'text' => 'text-red-700',
        ],
        'warning' => [
            'icon' => 'ri-alert-line',
            'background' => 'bg-yellow-50',
            'border' => 'border-yellow-200',
            'text' => 'text-yellow-700',
        ],
        'info' => [
            'icon' => 'ri-information-line',
            'background' => 'bg-blue-50',
            'border' => 'border-blue-200',
            'text' => 'text-blue-700',
        ],
    ];

    $variant = $variants[$type] ?? $variants['info'];
@endphp

@if (filled($message))
    <div {{ $attributes->merge([
        'class' => "fixed bottom-6 right-6 z-50 max-w-md w-[calc(100%-3rem)] md:w-auto border-l-4 rounded-lg shadow-lg p-4 flex items-start gap-3 {$variant['background']} {$variant['border']} {$variant['text']}",
    ]) }}>
        <i class="{{ $variant['icon'] }} text-2xl shrink-0"></i>
        <div class="flex-1">
            @if (filled($title))
                <p class="font-semibold mb-1">{{ $title }}</p>
            @endif
            <p class="text-sm leading-relaxed">{!! nl2br(e($message)) !!}</p>
        </div>
        <button type="button" x-data x-on:click="$el.closest('div').remove()" class="text-xl leading-none">
            <i class="ri-close-line"></i>
        </button>
    </div>
@endif
