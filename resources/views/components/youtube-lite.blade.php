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
          class="absolute inset-0 flex items-center justify-center text-white bg-black/10 hover:bg-black/30 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-orange-300 rounded-2xl transition"
          aria-label="Putar video {{ $title }}">
    <i class="ph ph-play-circle text-5xl sm:text-6xl drop-shadow-lg"></i>
  </button>
</div>
