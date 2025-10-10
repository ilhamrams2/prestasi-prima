@extends('siakad.index')

@section('title', 'Manajemen Kelas')

@section('content')
<div class="p-6 space-y-6">

    {{-- ================= HEADER ================= --}}
    @include('siakad.pages.class.classes-header')

    {{-- ================= TABEL ================= --}}
    @include('siakad.pages.class.classes-table')

</div>

{{-- ================= MODALS ================= --}}
@include('siakad.pages.class.classes-modals')

@push('scripts')
<script src="{{ asset('assets/js/siakad/classes.js') }}"></script>
@endpush
@endsection