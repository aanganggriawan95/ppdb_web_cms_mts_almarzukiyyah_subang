<x-layouts.app title="Home">

<section class="py-20 bg-white">
    <div class="container mx-auto px-4 max-w-6xl">

        <!-- TITLE -->
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold mb-2">
                Fasilitas MTS Almarzukiyyah
            </h2>
            <p class="text-gray-500">
                Berbagai fasilitas MTS Almarzukiyyah
            </p>
        </div>


        <!-- GRID -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">

            @foreach($fasilitas as $i => $item)
            <div 
                    x-data
                    x-intersect.once="$el.classList.add('show-news')"
                    class="relative h-72 rounded-2xl overflow-hidden group opacity-0"
                    style="animation-delay: {{ $i * 0.1 }}s"
                >
                <span class="rounded-full absolute m-2 z-50 bg-green-500 px-2.5 py-0.5 text-sm whitespace-nowrap text-white dark:bg-white ">
  Fasilitas
</span>
                <img 
                          src="{{ asset('storage/fasilitas/' . $item->image) }}" 
                        alt=""
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                    >

                    <!-- OVERLAY -->
                <div class="absolute inset-0 bg-black/50 group-hover:bg-black/40 transition"></div>

                <!-- ICON -->
                <div class="absolute inset-0 flex flex-col justify-end p-5 text-white">
                    <!-- TITLE -->
                    <h3 class="text-xl font-bold mb-2">
                        {!! $item['nama'] !!}
                    </h3>
    
                    <!-- DESC -->
                    <p class="text-sm leading-relaxed mb-4">
                        {!! $item['deskripsi'] !!}
                    </p>
    
                    <!-- BUTTON -->
                  
                </div>


            </div>
            @endforeach

    </div>
</section>


</x-layouts.app>