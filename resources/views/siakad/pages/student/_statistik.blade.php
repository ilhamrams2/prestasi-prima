@php
    $stats = [
        ['icon'=>'ri-team-line','bg'=>'bg-orange-100','text'=>'text-orange-600','label'=>'Total Siswa','value'=>'320'],
        ['icon'=>'ri-men-line','bg'=>'bg-blue-100','text'=>'text-blue-600','label'=>'Laki-laki','value'=>'180'],
        ['icon'=>'ri-women-line','bg'=>'bg-pink-100','text'=>'text-pink-600','label'=>'Perempuan','value'=>'140'],
        ['icon'=>'ri-book-line','bg'=>'bg-green-100','text'=>'text-green-600','label'=>'Jumlah Kelas','value'=>'12']
    ];
@endphp

<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    @foreach ($stats as $s)
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
            <div class="{{ $s['bg'].' '.$s['text'] }} p-3 rounded-lg">
                <i class="{{ $s['icon'] }} text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">{{ $s['label'] }}</p>
                <h2 class="text-xl font-bold">{{ $s['value'] }}</h2>
            </div>
        </div>
    @endforeach
</div>
