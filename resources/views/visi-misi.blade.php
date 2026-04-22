

<x-layouts.app title="Home">
    

<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">

        <!-- Header -->
        <div class="flex items-center gap-3 mb-10">
            {{-- <div class="w-11 h-11 rounded-xl bg-green-600 flex items-center justify-center shadow">
                👁️
            </div> --}}

            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                Visi & Misi
            </h2>
        </div>

        <!-- GRID 2 KOTAK -->
        @foreach ($visiMisi as $item)
        <div class="grid md:grid-cols-2 gap-8">

            <!-- ================= Visi ================= -->
            <div class="bg-white rounded-2xl shadow-lg border p-8 border-t-4 border-green-600 hover:shadow-xl transition">

                <div class="flex justify-center mb-6">
                    <img src="/assets/logopst.png" class="w-20 h-20 object-contain" alt="Logo">
                </div>

                <h3 class="text-xl font-bold text-center text-gray-800 mb-4">
                    Visi MTS Almarzukiyyah
                </h3>

                <blockquote class="text-center italic text-gray-700 font-medium leading-relaxed mb-6">
                     {!! $item->visi !!}
                </blockquote>

                

            </div>

            <!-- ================= Misi ================= -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 border-t-4 border-green-600 hover:shadow-xl transition">
                 <div class="flex justify-center mb-6">
                    <img src="/assets/logopst.png" class="w-20 h-20 object-contain" alt="Logo">
                </div>
                <h3 class="text-xl font-bold text-center text-gray-800 mb-6">
                    Misi MTS Almarzukiyyah
                </h3>

                <div class="prose">
                    {!! $item->misi !!}
                </div>

            </div>

        </div>
        @endforeach

    </div>
</section>



</x-layouts.app>