@extends('prestasiprima.index')

@section('title', 'Beranda - SMK Prestasi Prima')

@section('meta_description', 'SMK Prestasi Prima menghadirkan pendidikan kejuruan berstandar industri dengan program unggulan, fasilitas modern, serta dukungan karier dan prestasi siswa yang inspiratif.')

@section('meta_keywords', 'SMK Prestasi Prima, sekolah kejuruan Jakarta, pendidikan vokasi, prestasi siswa, pendaftaran SMK, program keahlian')

@section('content')
  @include('sections.hero')
  @include('sections.tentang')
  @include('sections.program')
  @include('sections.sejarah')
  @include('sections.virtual-tour')
  @include('sections.prestasi')
  @include('sections.presmalancer')
  @include('sections.kerjasama-ptn')
  @include('sections.primaboard')
  @include('sections.industri')
  @include('sections.blog')
@endsection