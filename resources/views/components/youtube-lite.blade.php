@php
  $videoId = $videoId ?? null;
  $title = $title ?? 'Video';
  $gradient = $gradient ?? 'from-orange-500 via-orange-400 to-orange-600';
  $thumbnailPath = $thumbnailPath ?? null;
  $behavior = $behavior ?? 'inline';
  $wrapperClass = trim(($wrapperClass ?? '') . ' youtube-lite relative group');
  $thumbnailIsRemote = $thumbnailPath && \Illuminate\Support\Str::startsWith($thumbnailPath, ['http://', 'https://']);
  $thumbnailExists = $thumbnailIsRemote || ($thumbnailPath && file_exists(public_path($thumbnailPath)));
  $thumbnailSize = (!$thumbnailIsRemote && $thumbnailExists)
    ? (@getimagesize(public_path($thumbnailPath)) ?: null)
    : null;
  $thumbnailUrl = $thumbnailExists
    ? ($thumbnailIsRemote ? $thumbnailPath : asset($thumbnailPath))
    : null;
@endphp

<div class="{{ $wrapperClass }}"
     data-youtube-id="{{ $videoId }}"
     data-title="{{ $title }}"
     data-behavior="{{ $behavior }}">
  @if($thumbnailUrl)
    <img src="{{ $thumbnailUrl }}"
         alt="{{ $title }}"
         @if($thumbnailSize) width="{{ $thumbnailSize[0] }}" height="{{ $thumbnailSize[1] }}" @endif
         loading="lazy"
         class="w-full aspect-video object-cover rounded-2xl">
  @else
    <div class="w-full aspect-video rounded-2xl bg-gradient-to-br {{ $gradient }} flex items-center justify-center px-6 text-center text-white font-semibold">
      <span class="text-sm sm:text-base md:text-lg">{{ $title }}</span>
    </div>
  @endif

  <button type="button"
          class="absolute inset-0 flex items-center justify-center focus-visible:outline-none group z-10"
          aria-label="Putar video {{ $title }}">
    <!-- Modern Play Button Container -->
    <div class="relative w-16 h-16 md:w-20 md:h-20 flex items-center justify-center">
      <!-- Outer Pulsing Ring -->
      <div class="absolute inset-0 bg-orange-500 rounded-full animate-ping opacity-20 group-hover:opacity-40 transition-opacity"></div>
      
      <!-- Button Body -->
      <div class="relative w-full h-full bg-white/95 backdrop-blur-xl rounded-full flex items-center justify-center shadow-[0_20px_40px_-10px_rgba(234,88,12,0.4)] group-hover:scale-110 group-hover:bg-orange-600 transition-all duration-500 border border-white/20">
        <iconify-icon icon="solar:play-bold" class="text-3xl md:text-4xl text-orange-600 group-hover:text-white transition-all duration-500"></iconify-icon>
      </div>
    </div>
  </button>
</div>
