<section class="py-20">
    <div class="container mx-auto px-4">

        <!-- TITLE -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-2">
                Warta Berita
            </h2>
            <p class="text-gray-500">
                Kabar terbaru dari kampus STT Cipasung
            </p>
        </div>

        @php
        $news = [
            [
                'title' => 'Pendaftaran Mahasiswa Baru Tahun Akademik 2026/2027 Resmi Dibuka',
                'image' => asset('assets/hero_campus_1.jpg'),
                'date' => '20 Maret 2026',
                'category' => 'PMB',
                'excerpt' => 'STT Cipasung membuka pendaftaran mahasiswa baru untuk program studi Teknik Informatika dan Teknik Industri.',
            ],
            [
                'title' => 'Workshop Kecerdasan Buatan bersama Praktisi Industri',
                'image' => asset('assets/hero-campus-2.jpg'),
                'date' => '15 Maret 2026',
                'category' => 'Akademik',
                'excerpt' => 'Mahasiswa mengikuti workshop intensif AI dan Machine Learning bersama para ahli.',
            ],
            [
                'title' => 'STT Cipasung Raih Akreditasi Unggul dari BAN-PT',
                'image' => asset('assets/hero-campus-3.jpg'),
                'date' => '10 Maret 2026',
                'category' => 'Prestasi',
                'excerpt' => 'Pencapaian luar biasa dengan diraihnya akreditasi unggul.',
            ],
            [
                'title' => 'Kerjasama Strategis dengan Perusahaan Teknologi Nasional',
                'image' => asset('assets/hero_campus_1.jpg'),
                'date' => '5 Maret 2026',
                'category' => 'Kerjasama',
                'excerpt' => 'Penandatanganan MoU untuk program magang dan rekrutmen lulusan.',
            ],
        ];
        @endphp

        <!-- GRID -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">

            @foreach($news as $i => $item)
                <article 
                    x-data
                    x-intersect.once="$el.classList.add('show-news')"
                    class="relative h-72 rounded-2xl overflow-hidden group cursor-pointer opacity-0"
                    style="animation-delay: {{ $i * 0.1 }}s"
                >

                    <!-- IMAGE -->
                    <img 
                        src="{{ $item['image'] }}" 
                        alt="{{ $item['title'] }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                    >

                    <!-- OVERLAY -->
                    <div class="absolute inset-0 bg-black/50 group-hover:bg-black/40 transition"></div>

                    <!-- CONTENT -->
                    <div class="absolute inset-0 flex flex-col justify-end p-5 text-white">

                        <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur text-xs font-semibold rounded-full mb-2 w-fit">
                            {{ $item['category'] }}
                        </span>

                        <h3 class="text-lg font-bold mb-2 line-clamp-2">
                            {{ $item['title'] }}
                        </h3>

                        <p class="text-sm text-white/80 line-clamp-2 mb-3">
                            {{ $item['excerpt'] }}
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

                </article>
            @endforeach

        </div>
    </div>
</section>