{{-- resources/views/siakad/pages/majors/majors.blade.php --}}
@extends('siakad.index')

@section('title', 'Manajemen Jurusan')

@section('content')
<<<<<<< HEAD
    <div class="p-6 space-y-6">

        {{-- ================= HEADER ================= --}}
        @include('siakad.pages.major.majors-header')

        {{-- ================= TABEL ================= --}}
        @include('siakad.pages.major.majors-table')

    </div>

    {{-- ================= MODALS ================= --}}
    @include('siakad.pages.major.majors-modals')

    @include('siakad.pages.major.majors-modals-edit')

    {{-- ================= SCRIPTS ================= --}}

    @push('scripts')
        {{-- <script src="{{ asset('assets/js/siakad/majors.js') }}"></script> --}}
        <script>
            // === ELEMENT REFERENSI ===
            const modal = document.getElementById("modal");
            const modalBox = document.getElementById("modalBox");
            const modalTitle = document.getElementById("modalTitle");
            const formJurusan = document.getElementById("formJurusan");
            const btnCancel = document.getElementById("btnCancel");

            const modalView = document.getElementById("modalView");
            const viewImage = document.querySelector("#viewImage img");
            const viewName = document.getElementById("viewName");
            const viewCode = document.getElementById("viewCode");
            const viewDescription = document.getElementById("viewDescription");
            const viewStatus = document.getElementById("viewStatus");

            // === BUKA MODAL (Tambah/Edit) ===
            function openModal(type = 'add', data = null) {
                modal.classList.remove("hidden");
                setTimeout(() => {
                    modalBox.classList.remove("scale-95", "opacity-0");
                    modalBox.classList.add("scale-100", "opacity-100");
                }, 50);

                if (type === 'add') {
                    modalTitle.textContent = "Tambah Jurusan Baru";
                    formJurusan.reset();
                    formJurusan.removeAttribute('action');
                    formJurusan.setAttribute('method', 'POST');
                } else if (type === 'edit' && data) {
                    modalTitle.textContent = "Edit Jurusan";
                    formJurusan.name.value = data.name;
                    formJurusan.major_code.value = data.major_code;
                    formJurusan.description.value = data.description;
                    formJurusan.status.value = data.status;

                    formJurusan.setAttribute('action', `/majors/${data.id}`);
                    formJurusan.setAttribute('method', 'POST');
                }
            }

            // === TUTUP MODAL (Tambah/Edit) ===
            function closeModal() {
                modalBox.classList.add("scale-95", "opacity-0");
                setTimeout(() => {
                    modal.classList.add("hidden");
                }, 150);
            }

            btnCancel.addEventListener("click", closeModal);
            modal.addEventListener("click", (e) => {
                if (e.target === modal) closeModal();
            });

            // === BUKA MODAL VIEW ===
            function openModalView(data) {
                modalView.classList.remove("hidden");

                if (data.image) {
                    viewImage.classList.remove("hidden");
                    viewImage.src = `/storage/${data.image}`;
                } else {
                    viewImage.classList.add("hidden");
                }

                viewName.textContent = data.name;
                viewCode.textContent = `Kode: ${data.major_code}`;
                viewDescription.textContent = data.description;
                viewStatus.textContent = data.status.toUpperCase();

                viewStatus.className =
                    `px-2 py-1 rounded text-sm ${data.status === 'aktif'
                ? 'bg-green-100 text-green-700'
                : 'bg-red-100 text-red-700'}`;
            }

            // === TUTUP MODAL VIEW ===
            function closeModalView() {
                modalView.classList.add("hidden");
            }

            // Optional: klik di luar modalView juga bisa nutup
            modalView.addEventListener("click", (e) => {
                if (e.target === modalView) closeModalView();
            });
        </script>
    @endpush
=======
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
<<<<<<< HEAD
>>>>>>> e247cf6 (update siakad)
@endsection
=======
@endsection
>>>>>>> 911e62f (update frontend siakad)
