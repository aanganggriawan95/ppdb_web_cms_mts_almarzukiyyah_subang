
@props(['data'])


<section class="py-20">
    <div class="container mx-auto px-4">

        <!-- TITLE -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-2">
                Berita MTS Almarzukiyyah
            </h2>
            <p class="text-gray-500">
                Kabar terbaru dari MTS Almarzukiyyah
            </p>
        </div>

   

        <!-- GRID -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">

            @foreach($data as $i => $item)
                <article 
                    x-data
                    x-intersect.once="$el.classList.add('show-news')"
                    class="relative h-72 rounded-2xl overflow-hidden group cursor-pointer opacity-0"
                    style="animation-delay: {{ $i * 0.1 }}s"
                >

                    <!-- IMAGE -->
                    <img 
                        src="{{ asset('storage/berita/' . $item->image) }}" 
                        alt="{{ $item->title }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                    >

                    <!-- OVERLAY -->
                    <div class="absolute inset-0 bg-black/50 group-hover:bg-black/40 transition"></div>

                    <!-- CONTENT -->
                    <a href="{{ route('berita.show', $item->id) }}">

                        <div class="absolute inset-0 flex flex-col justify-end p-5 text-white">
    
                            <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur text-xs font-semibold rounded-full mb-2 w-fit">
                                Berita
                            </span>
    
                            <h3 class="text-lg font-bold mb-2 line-clamp-2">
                                {{ $item->title }}
                            </h3>
    
                            <p class="text-sm text-white/80 line-clamp-2 mb-3">
                                {{ Str::limit(strip_tags($item->deskripsi), 100) }}
                            </p>
    
                            <div class="flex items-center justify-between text-xs text-white/80">
                                <span>
                                    📅 {{ $item['date'] }}
                                </span>
    
                                <span class="opacity-0 group-hover:opacity-100 transition">
                                    →
                                </span>
                            </div>
                        </div>
                    </a>

                </article>
            @endforeach

        </div>
    </div>
</section>