<x-layouts.app title="Home">

<section class="py-20 bg-white">
    <div class="container mx-auto px-4 max-w-6xl">

        <!-- TITLE -->
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold mb-2">
                Ekstrakurikuler
            </h2>
            <p class="text-gray-500">
                Berbagai kegiatan untuk mengembangkan bakat dan minat siswa MTS Almarzukiyyah
            </p>
        </div>

        @php
        $ekskul = [
            [
                'icon' => '⚽',
                'nama' => 'Futsal',
                'deskripsi' => 'Mengembangkan kemampuan olahraga dan kerja sama tim.',
            ],
            [
                'icon' => '🎨',
                'nama' => 'Seni Lukis',
                'deskripsi' => 'Menyalurkan kreativitas siswa dalam bidang seni rupa.',
            ],
            [
                'icon' => '🎤',
                'nama' => 'Paduan Suara',
                'deskripsi' => 'Melatih vokal dan kekompakan dalam bernyanyi.',
            ],
            [
                'icon' => '🥋',
                'nama' => 'Pencak Silat',
                'deskripsi' => 'Membentuk karakter disiplin dan bela diri.',
            ],
            [
                'icon' => '🕌',
                'nama' => 'Rohis',
                'deskripsi' => 'Meningkatkan keimanan dan kegiatan keagamaan.',
            ],
            [
                'icon' => '💻',
                'nama' => 'Komputer',
                'deskripsi' => 'Belajar teknologi, desain, dan dasar pemrograman.',
            ],
        ];
        @endphp

        <!-- GRID -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">

            @foreach($ekskul as $i => $item)
            <div 
                class="bg-gray-50 rounded-2xl p-6 shadow hover:shadow-xl hover:-translate-y-2 transition duration-300 group"
            >

                <!-- ICON -->
                <div class="w-14 h-14 flex items-center justify-center rounded-xl bg-green-600 text-white text-2xl mb-5 group-hover:scale-110 transition">
                    {{ $item['icon'] }}
                </div>

                <!-- TITLE -->
                <h3 class="text-xl font-bold text-gray-800 mb-2">
                    {{ $item['nama'] }}
                </h3>

                <!-- DESC -->
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    {{ $item['deskripsi'] }}
                </p>

                <!-- BUTTON -->
                <a href="#" 
                   class="inline-flex items-center text-green-600 font-semibold text-sm hover:gap-2 transition-all">
                    Lihat Detail →
                </a>

            </div>
            @endforeach

        </div>

    </div>
</section>


</x-layouts.app>