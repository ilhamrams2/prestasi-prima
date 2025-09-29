@extends('news.backend.index')

@section('content')

<div class="flex justify-center items-center min-h-screen mt-12 px-4"
     x-data="{
        openModal: false,
        openEditModal: false,
        deleteModal: false,
        deleteId: null,
        editData: {}
     }">

    <div class="flex flex-col md:flex-row overflow-hidden gap-4 w-full max-w-[1280px]">

        @include('news.backend.partials.sidebar')

        <!-- Main Content -->
        <main class="flex-1 bg-white p-6 flex flex-col rounded-3xl md:rounded-l-3xl w-full md:w-[974px] h-auto md:h-[974px]">

            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                <!-- Filter -->
                <div class="flex items-center bg-[#F9FAFC] rounded-2xl shadow px-4 w-full md:w-[530px] h-[57px]">
                    <div class="flex items-center gap-2 pr-4 border-r border-gray-300">
                        <img src="{{ asset('assets/images/news/filter.svg') }}" alt="Filter" class="w-5 h-5">
                        <span class="text-orange-500 font-medium">Filter By</span>
                    </div>
                    <div class="flex items-center px-4 border-r border-gray-300">
                        <select class="bg-transparent text-orange-500 font-medium focus:outline-none">
                            <option class="font-medium">Kategori</option>
                        </select>
                    </div>
                    <div class="flex items-center px-4 border-r border-gray-300">
                        <select class="bg-transparent text-orange-500 font-medium focus:outline-none">
                            <option class="font-medium">Status</option>
                        </select>
                    </div>
                    <div class="flex items-center px-4">
                        <input type="date" class="text-orange-500 font-medium focus:outline-none bg-transparent"/>
                    </div>
                </div>

                <!-- Button Tambah -->
                <button @click="openModal = true"
                    class="bg-orange-500 text-white text-center rounded-lg shadow flex items-center justify-center gap-2 font-medium w-full md:w-[196px] h-[57px]">
                    <i data-feather="plus" width="20" height="20"></i> Tambah Gallery
                </button>
            </div>

            <!-- Cards Container -->
            <div class="rounded-2xl shadow-inner p-4 bg-white flex-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[25px] overflow-y-auto pr-2"
                     style="max-height: 700px; overflow-x: hidden;">
                    @forelse ($galleries as $item)
                        <div class="bg-white border rounded-2xl shadow flex flex-col items-center justify-between p-3 h-[285px]">
                            <div class="w-full h-40 flex items-center justify-center bg-gray-100 rounded-lg overflow-hidden">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="object-cover w-full h-full">
                                @else
                                    📷
                                @endif
                            </div>
                            <h2 class="text-orange-600 font-semibold text-lg mt-2">{{ $item->title }}</h2>
                            <p class="text-sm text-gray-500">{{ $item->category }}</p>
                            <div class="flex gap-2 mt-2">
                                <!-- Tombol Edit -->
                                <button type="button"
                                        @click="openEditModal = true; editData = {{ $item->toJson() }}"
                                        class="flex items-center justify-center rounded border-2 border-orange-500 bg-white text-orange-600 w-20 h-[47px]">
                                    <img src="{{ asset('assets/images/news/edit.svg') }}" alt="Edit" class="w-5 h-5">
                                </button>
                                <!-- Tombol Delete -->
                                <button type="button" @click="deleteModal = true; deleteId = {{ $item->id }}"
                                        class="bg-orange-500 flex items-center justify-center rounded w-20 h-[47px]">
                                    <img src="{{ asset('assets/images/news/delete.svg') }}" alt="Delete" class="w-5 h-5">
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 col-span-4">Belum ada gallery.</p>
                    @endforelse
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Edit Gallery -->
    <div x-show="openEditModal" x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-3xl shadow-lg w-[800px] p-8 relative" x-transition.scale>
            <!-- Tombol Close -->
            <button @click="openEditModal = false"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-xl font-bold">✕</button>

            <h2 class="text-2xl font-bold text-orange-500 text-center mb-2">Edit Gallery</h2>

            <form :action="`/gallery/${editData.id}`" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                    <div>
                        <label class="block text-orange-500 font-medium mb-1">Nama Gallery</label>
                        <input type="text" name="title" :value="editData.title"
                               class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-orange-500" required>
                    </div>
                    <div>
                        <label class="block text-orange-500 font-medium mb-1">Tanggal Publish</label>
                        <input type="date" name="published_at" :value="editData.published_at"
                               class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-orange-500 font-medium mb-1">Kategori</label>
                    <select name="category" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-orange-500" required>
                        <option value="Pendidikan" :selected="editData.category === 'Pendidikan'">Pendidikan</option>
                        <option value="Politik" :selected="editData.category === 'Politik'">Politik</option>
                        <option value="Olahraga" :selected="editData.category === 'Olahraga'">Olahraga</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-orange-500 font-medium mb-1">Link YouTube</label>
                    <input type="url" name="youtube_link" :value="editData.youtube_link"
                           class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-orange-500" required>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-orange-500 text-white px-8 py-3 rounded-xl font-medium flex items-center gap-2">
                        <img src="{{ asset('assets/images/news/upload.svg') }}" alt="Upload" class="w-5 h-5"> Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Tambah Gallery -->
    <div x-show="openModal" x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-3xl shadow-lg w-[800px] p-8 relative" x-transition.scale>

            <!-- Tombol Close -->
            <button @click="openModal = false"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-xl font-bold">✕</button>

            <h2 class="text-2xl font-bold text-orange-500 text-center mb-2">Tambah Gallery</h2>

            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                    <div>
                        <label class="block text-orange-500 font-medium mb-1">Nama Gallery</label>
                        <input type="text" name="title" placeholder="Nama Gallery"
                               class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-orange-500" required>
                    </div>
                    <div>
                        <label class="block text-orange-500 font-medium mb-1">Tanggal Publish</label>
                        <input type="date" name="published_at"
                               class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-orange-500 font-medium mb-1">Kategori</label>
                    <select name="category" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-orange-500" required>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Politik">Politik</option>
                        <option value="Olahraga">Olahraga</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-orange-500 font-medium mb-1">Link YouTube</label>
                    <input type="url" name="youtube_link"
                           class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-orange-500" required>
                </div>

                <div class="mb-6">
                    <label class="block text-orange-500 font-medium mb-1">Status</label>
                    <select name="status" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-orange-500" required>
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-orange-500 text-white px-8 py-3 rounded-xl font-medium flex items-center gap-2">
                        <img src="{{ asset('assets/images/news/upload.svg') }}" alt="Upload" class="w-5 h-5"> Upload
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Delete Gallery -->
    <div x-show="deleteModal" x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-3xl shadow-lg w-[500px] p-8 relative" x-transition.scale>
            <!-- Tombol Close -->
            <button @click="deleteModal = false"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-xl font-bold">✕</button>

            <h2 class="text-2xl font-bold text-red-500 text-center mb-4">Konfirmasi Hapus</h2>
            <p class="text-gray-600 text-center mb-6">
                Apakah Anda yakin ingin menghapus gallery ini?<br>
                Tindakan ini tidak bisa dibatalkan.
            </p>

            <form :action="`/gallery/${deleteId}`" method="POST" class="flex justify-center gap-4">
                @csrf
                @method('DELETE')
                <button type="button" @click="deleteModal = false"
                    class="px-6 py-3 rounded-xl border border-gray-300 bg-white text-gray-600 hover:bg-gray-100">
                    Batal
                </button>
                <button type="submit"
                    class="px-6 py-3 rounded-xl bg-red-500 text-white font-medium hover:bg-red-600">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
