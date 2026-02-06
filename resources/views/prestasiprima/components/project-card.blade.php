<div class="project-card group h-full flex flex-col overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
    {{-- Image container with zoom effect --}}
    <div class="relative h-[280px] overflow-hidden rounded-t-[40px] bg-slate-50">
        @if($project->gambar)
            <img src="{{ asset('assets/images/karya-proyek/' . $project->gambar) }}" alt="{{ $project->judul }}" 
                 class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
        @else
            <div class="w-full h-full flex items-center justify-center text-slate-200">
                <iconify-icon icon="solar:gallery-bold-duotone" class="text-7xl"></iconify-icon>
            </div>
        @endif
        
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
        
        {{-- Category Badge --}}
        <div class="absolute top-6 left-6 px-4 py-2 bg-white/90 backdrop-blur-md rounded-2xl shadow-sm border border-white/50">
            <span class="font-outfit text-[10px] font-black text-[#E65100] uppercase tracking-widest">{{ $project->kategori }}</span>
        </div>
    </div>

    <div class="p-10 flex flex-col flex-1">
        <h3 class="font-outfit text-2xl font-black text-[#0e162e] mb-4 group-hover:text-[#E65100] transition-colors leading-tight">
            {{ $project->judul }}
        </h3>
        <p class="font-jakarta text-gray-500 text-base leading-relaxed mb-8 line-clamp-3">
            {{ $project->deskripsi }}
        </p>

        @php
            $tagsArr = $project->tags ? explode(',', $project->tags) : [];
        @endphp
        <div class="flex flex-wrap gap-2 mb-8 mt-auto">
            @foreach (array_slice($tagsArr, 0, 3) as $tag)
                <span class="tag-pill">{{ trim($tag) }}</span>
            @endforeach
            @if(count($tagsArr) > 3)
                <span class="tag-pill">+{{ count($tagsArr) - 3 }}</span>
            @endif
        </div>

        <button @click="openModal({{ json_encode($project) }})" 
                class="inline-flex items-center gap-4 text-[#0e162e] font-outfit font-black text-xs uppercase tracking-widest group/btn hover:text-[#E65100] transition-colors">
            View Project Details
            <div class="w-12 h-12 rounded-2xl border border-gray-100 flex items-center justify-center transition-all group-hover/btn:bg-[#E65100] group-hover/btn:border-[#E65100] group-hover/btn:text-white group-hover/btn:translate-x-2">
                <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>
            </div>
        </button>
    </div>
</div>
