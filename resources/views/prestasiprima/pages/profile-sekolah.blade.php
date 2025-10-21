@extends('prestasiprima.index')

@section('title', $title)

@section('content')
<section 
  class="min-h-screen pt-44 pb-28 bg-gradient-to-b from-orange-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-950 dark:to-gray-900"
  data-aos="fade-up"
>
  {{-- Breadcrumb --}}
  @include('prestasiprima.components.breadcrumb', [
      'title' => 'Profil Sekolah Prestasi Prima',
      'breadcrumbs' => [
          'Profil Sekolah' => route('profilesekolah'),
      ]
  ])

  {{-- Konten Profil --}}
  <div class="max-w-5xl mx-auto px-6 mt-10">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">Tentang Sekolah Prestasi Prima</h1>
    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
      SMK Prestasi Prima merupakan sekolah berbasis teknologi yang berkomitmen mencetak generasi muda unggul, kreatif, dan berkarakter. 
      Sekolah ini memiliki berbagai jurusan modern serta fasilitas pendukung pembelajaran berbasis industri.
    </p>
    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
      Dengan visi menjadi sekolah vokasi terdepan dan berprestasi, Prestasi Prima terus berinovasi dalam bidang pendidikan dan kolaborasi dengan dunia usaha.
    </p>
  </div>
</section>
@endsection
