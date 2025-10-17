{{-- resources/views/siakad/pages/majors/majors-table.blade.php --}}
<div class="bg-white rounded-lg shadow overflow-hidden">

    {{-- Desktop --}}
    <div class="hidden md:block">
        <table class="w-full table-auto">
            <thead class="bg-gray-50 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    {{-- <th class="px-4 py-3 text-left">Gambar</th> --}}
                    <th class="px-4 py-3 text-left">Nama Jurusan</th>
                    <th class="px-4 py-3 text-left">Kode Jurusan</th>
                    {{-- <th class="px-4 py-3 text-left">Deskripsi</th> --}}
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @php
                    $no = 1;
                @endphp
                @forelse ($majors as $major)
                    <tr class="hover:bg-gray-50">
                        {{-- <td class="px-4 py-3">
                            @if ($major->image)
                                <img src="{{ asset('storage/' . $major->image) }}" alt="Gambar Jurusan"
                                    class="w-12 h-12 object-cover rounded">
                            @else
                                <span class="text-gray-400 italic">Tidak ada</span>
                            @endif
                        </td> --}}
                        <td class="px-4 py-3">
                            <?= $no++ ?>
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $major->name }}</td>
                        <td class="px-4 py-3">{{ $major->major_code }}</td>
                        {{-- <td class="px-4 py-3">{{ Str::limit($major->description, 60) }}</td> --}}
                        {{-- <td class="px-4 py-3">
                            <span
                                class="px-2 py-1 text-xs font-semibold rounded 
                                {{ $major->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ ucfirst($major->status) }}
                            </span>
                        </td> --}}
                        <td class="px-4 py-3 space-x-2">
                            <button
                                onclick="openModalEdit({ 
    id: {{ $major->id }}, 
    name: '{{ $major->name }}', 
    major_code: '{{ $major->major_code }}', 
    description: '{{ $major->description }}', 
})"
                                class="text-blue-600 hover:underline">
                                Edit
                            </button>


                            <form action="{{ route('majors.destroy', $major->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"
                                    onclick="return confirm('Yakin ingin menghapus jurusan ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500 italic">
                            Belum ada data jurusan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Mobile --}}
    <div id="cardList" class="md:hidden p-4 space-y-3"></div>

    {{-- Empty State --}}
    @if ($majors->isEmpty())
        <div id="emptyState" class="p-8 text-center text-gray-400">
            <div class="text-3xl mb-2"><i class="ri-folder-open-line"></i></div>
            <div class="font-semibold mb-1">Belum ada data jurusan</div>
            <div class="text-sm">
                Klik tombol <span class="font-medium">Tambah Jurusan</span> untuk menambahkan data baru.
            </div>
        </div>
    @endif
</div>

{{-- Pagination --}}
@if ($majors instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="flex items-center justify-between mt-4">
        <div class="text-sm text-gray-500">
            Menampilkan {{ $majors->firstItem() }} - {{ $majors->lastItem() }} dari {{ $majors->total() }} data
        </div>
        <div>
            {{ $majors->links() }}
        </div>
    </div>
@endif
