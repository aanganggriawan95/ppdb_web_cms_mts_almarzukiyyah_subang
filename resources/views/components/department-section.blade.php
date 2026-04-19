<section class="py-20 bg-gray-100">
    <div class="container mx-auto px-4">

        <!-- TITLE -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-2">
                Program Studi
            </h2>
            <p class="text-gray-500">
                Pilihan program studi unggulan untuk masa depan Anda
            </p>
        </div>

        @php
$departments = [
    [
        'icon' => '💻',
        'name' => 'Teknik Informatika',
        'description' => 'Program studi TI...',
        'highlights' => ['Pemrograman', 'Jaringan', 'AI', 'Database'],
    ],
    [
        'icon' => '🏭',
        'name' => 'Teknik Industri',
        'description' => 'Program studi industri...',
        'highlights' => ['Produksi', 'QC', 'Ergonomi', 'Supply Chain'],
    ],
];
@endphp

        <!-- CONTENT -->
        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">

            @foreach($departments as $i => $dept)
                <div 
                    x-data
                    x-intersect.once="$el.classList.add('show-card')"
                    class="bg-white rounded-2xl p-8 shadow hover:scale-105 transition-all duration-500 group opacity-0"
                    style="animation-delay: {{ $i * 0.2 }}s"
                >

                    <!-- ICON -->
                    <div class="w-14 h-14 rounded-xl bg-green-600 flex items-center justify-center mb-6 text-white text-xl group-hover:scale-110 transition">
                        {{ $dept['icon'] }}
                    </div>

                    <!-- TITLE -->
                    <h3 class="text-2xl font-bold mb-3">
                        {{ $dept['name'] }}
                    </h3>

                    <!-- DESC -->
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        {{ $dept['description'] }}
                    </p>

                    <!-- TAG -->
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($dept['highlights'] as $h)
                            <span class="px-3 py-1 bg-green-100 text-green-600 text-xs font-semibold rounded-full">
                                {{ $h }}
                            </span>
                        @endforeach
                    </div>

                    <!-- LINK -->
                    <a href="/profile"
                       class="inline-flex items-center gap-2 text-green-600 font-semibold text-sm group-hover:gap-3 transition-all">
                        Selengkapnya →
                    </a>

                </div>
            @endforeach

        </div>
    </div>
</section>