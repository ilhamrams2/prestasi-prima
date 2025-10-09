{{-- resources/views/siakad/pages/teacher/teacher.blade.php --}}
@extends('siakad.index')

@section('title', 'Manajemen Guru')

@section('content')
<div class="p-6 space-y-6">
    @include('siakad.pages.teacher.teacher-header')
    @include('siakad.pages.teacher.teacher-table')
</div>

@include('siakad.pages.teacher.teacher-modals')

@push('scripts')
<script src="{{ asset('assets/js/siakad/teacher.js') }}"></script>
@endpush
@endsection
