@props(['data'])

<section class="py-20 bg-gray-100">
    <div class="container mx-auto px-4 max-w-6xl">

        <!-- TITLE -->
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold mb-2">
                {{ $data ? $data->title : '' }}
            </h2>
            <p class="text-gray-500">
                MTS Almarzukiyyah
            </p>
        </div>

        <!-- CONTENT -->
        <div class="grid md:grid-cols-2 gap-6 items-center justify-center">

            <!-- FOTO -->
            <div class="flex justify-center rounded-full">
                    <img 
                        src="{{ $data ? asset('storage/sambutan/' . $data->image) : '' }}" 
                        alt="Kepala Sekolah"
                        class=" h-96 object-cover rounded-xl"
                    >
            </div>

            <!-- SAMBUTAN -->
            <div class="">
                <div class="mb-6">
                    <p class="text-gray-500">
                        {!! $data ? $data->deskripsi : '' !!}
                    </p>
                </div>

                <!-- NAMA -->
                <div class="mt-6">
                    <p class="font-semibold text-gray-800 text-lg">
                        Kepala Sekolah
                    </p>
                    <p class="text-green-600 font-bold text-xl">
                        {{$data? $data->nama : '' }}
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>