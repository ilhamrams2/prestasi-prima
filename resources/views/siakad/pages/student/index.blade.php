@extends('siakad.index')

@section('title', 'Manajemen Siswa')

@section('content')
<div class="p-6 space-y-6">
    @include('siakad.pages.student._header')
    @include('siakad.pages.student._statistik')
    @include('siakad.pages.student._filter')
    @include('siakad.pages.student._table')
    @include('siakad.pages.student._modal')
</div>

@include('siakad.pages.student._script')
@endsection
