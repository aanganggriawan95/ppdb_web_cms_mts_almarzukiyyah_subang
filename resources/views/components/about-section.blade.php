@props(['data'])


<section class="py-20 bg-gray-100">
    <div class="container mx-auto px-4">

        <div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-16 items-center">

            <!-- LEFT CONTENT -->
            <div 
                x-data
                x-intersect="$el.classList.add('animate-fade-in-left')"
                class="opacity-0 transition-all duration-700"
            >
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    {{ $data ? $data->title : '' }}
                </h2>

                <p class="text-gray-600 leading-relaxed mb-6">
                    {!! $data ? $data->deskripsi : '' !!}
                </p>

                
               
            </div>

            <!-- RIGHT STATS -->
            <div 
                x-data
                x-intersect="$el.classList.add('animate-fade-in-right')"
                class="grid grid-cols-2 gap-5 opacity-0 transition-all duration-700"
            >

                @php
                $stats = [
                    ['icon' => '👨‍🎓', 'value' => $data ? $data->jml_siswa : '0', 'label' => 'Siswa Aktif'],
                    ['icon' => '📚', 'value' => $data ? $data->jml_guru : '0', 'label' => 'Guru'],
                    ['icon' => '🏆', 'value' => $data ? $data->tahun_berdiri : '0', 'label' => 'Tahun Berdiri'],
                    ['icon' => '🏢', 'value' => $data ? $data->jml_fasilitas : '0', 'label' => 'Akreditasi'],
                ];
                @endphp

                @foreach($stats as $i => $stat)
                    <div 
                        x-data
                        x-intersect="$el.classList.add('animate-scale-in')"
                        class="bg-white rounded-2xl p-6 text-center shadow hover:scale-105 transition duration-300 opacity-0"
                        style="animation-delay: {{ 0.2 + $i * 0.1 }}s"
                    >
                        <div class="w-12 h-12 mx-auto rounded-xl bg-green-600 flex items-center justify-center mb-3 text-white text-xl">
                            {{ $stat['icon'] }}
                        </div>

                        <div class="text-2xl font-bold">
                            {{ $stat['value'] }}
                        </div>

                        <div class="text-sm text-gray-500">
                            {{ $stat['label'] }}
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
</section>