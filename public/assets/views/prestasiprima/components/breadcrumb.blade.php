@props(['title' => '', 'breadcrumbs' => []])

<div class="mb-4">
  @if ($title)
    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">{{ $title }}</h2>
  @endif

  <nav data-aos="fade-down" class="bg-gray-50 dark:bg-gray-800 py-3 px-6 rounded-xl mb-2 text-sm shadow-sm border border-gray-100 dark:border-gray-700">
    <ol class="flex items-center space-x-2 text-gray-600 dark:text-gray-300">
      <li class="flex items-center gap-1">
        <i data-lucide="home" class="w-4 h-4"></i>
        <a href="{{ url('/') }}" class="hover:text-orange-500 transition-colors duration-200">
          Beranda
        </a>
      </li>

      @foreach ($breadcrumbs as $label => $url)
        <li class="text-gray-400">›</li>
        @if ($loop->last)
          <li class="font-semibold text-orange-500">{{ $label }}</li>
        @else
          <li>
            <a href="{{ $url }}" class="hover:text-orange-500 transition-colors duration-200">
              {{ $label }}
            </a>
          </li>
        @endif
      @endforeach
    </ol>
  </nav>
</div>
