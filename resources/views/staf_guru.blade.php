<x-layouts.app title="Home">
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">

        <!-- TITLE -->
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold mb-2">
                Guru & Staf
            </h2>
            <p class="text-gray-500">
                Tenaga pendidik dan kependidikan MTS Almarzukiyyah
            </p>
        </div>

        @php
        $guru = [
            [
                'nama' => 'Ahmad Fauzi, S.Pd',
                'jabatan' => 'Kepala Sekolah',
                'mapel' => '-',
                'foto' => '/images/guru1.jpg',
            ],
            [
                'nama' => 'Siti Aisyah, S.Pd',
                'jabatan' => 'Guru Bahasa Indonesia',
                'mapel' => 'Bahasa Indonesia',
                'foto' => '/images/guru2.jpg',
            ],
            [
                'nama' => 'Budi Santoso, S.Kom',
                'jabatan' => 'Guru TIK',
                'mapel' => 'Informatika',
                'foto' => '/images/guru3.jpg',
            ],
            [
                'nama' => 'Nur Hidayah',
                'jabatan' => 'Staf TU',
                'mapel' => '-',
                'foto' => '/images/guru4.jpg',
            ],
            [
                'nama' => 'Dedi Kurniawan',
                'jabatan' => 'Staf Perpustakaan',
                'mapel' => '-',
                'foto' => '/images/guru5.jpg',
            ],
            [
                'nama' => 'Rina Marlina, S.Pd',
                'jabatan' => 'Guru Matematika',
                'mapel' => 'Matematika',
                'foto' => '/images/guru6.jpg',
            ],
        ];
        @endphp

        <!-- GRID -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            @foreach($guru_staf as $item)
            <div class="bg-white rounded-2xl shadow hover:shadow-xl transition duration-300 p-6 text-center">

                <!-- FOTO -->
                <div class="flex justify-center mb-4">
                    <img 
                        src="{{ asset('storage/guru-staf/' . $item->image) }}" 
                        class="w-28 h-28 object-cover rounded-full border-4 border-green-500 shadow"
                    >
                </div>

                <!-- NAMA -->
                <h3 class="text-lg font-bold text-gray-800">
                    {{ $item['nama'] }}
                </h3>

                <!-- JABATAN -->
                <p class="text-green-600 text-sm font-semibold mb-1">
                    {{ $item['jabatan'] }}
                </p>

               

            </div>
            @endforeach

        </div>

    </div>
</section>
</x-layouts.app>