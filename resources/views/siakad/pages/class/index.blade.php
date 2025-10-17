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
    @include('siakad.pages.class.classes-modals-edit')

    {{-- ================= SCRIPTS ================= --}}


    @push('scripts')
        <script src="{{ asset('assets/js/siakad/classes.js') }}"></script>
        <script>
            document.addEventListener('click', function(e) {
                if (e.target.closest('.btnEdit')) {
                    const btn = e.target.closest('.btnEdit');
                    const modalEdit = document.getElementById('modalEdit');

                    // Ambil data
                    const id = btn.dataset.id;
                    const major = btn.dataset.major;
                    const teacher = btn.dataset.teacher;
                    const grade = btn.dataset.grade;
                    const group = btn.dataset.group;

                    // Isi form
                    document.getElementById('edit_id').value = id;
                    document.getElementById('edit_major').value = major;
                    document.getElementById('edit_teacher').value = teacher;
                    document.getElementById('edit_grade').value = grade;
                    document.getElementById('edit_group').value = group;

                    // Set action
                    document.getElementById('formEditKelas').action = `/siakad/classes/${id}`;

                    // Tampilkan modal
                    modalEdit.classList.remove('hidden');
                }

                // Tutup modal
                if (e.target.closest('#btnCloseEdit') || e.target.closest('#btnCancelEdit')) {
                    document.getElementById('modalEdit').classList.add('hidden');
                }
            });
        </script>
    @endpush
@endsection
