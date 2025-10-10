{{-- resources/views/siakad/pages/majors/majors.blade.php --}}
@extends('siakad.index')

@section('title', 'Manajemen Jurusan')

@section('content')
<div class="p-6 space-y-6">

    {{-- ================= HEADER ================= --}}
    @include('siakad.pages.major.majors-header')

    {{-- ================= TABEL ================= --}}
    @include('siakad.pages.major.majors-table')

</div>

{{-- ================= MODALS ================= --}}
@include('siakad.pages.major.majors-modals')

@push('scripts')
<script src="{{ asset('assets/js/siakad/majors.js') }}"></script>
@endpush
@endsection