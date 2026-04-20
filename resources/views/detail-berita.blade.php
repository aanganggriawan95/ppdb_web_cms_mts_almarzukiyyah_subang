<x-layouts.app title="{{ $berita->title }}">

<div class="bg-gray-50 min-h-screen py-12">

    <div class="max-w-4xl mx-auto px-4">

        <!-- Back Button -->
        <a href="/" class="text-sm text-gray-500 hover:text-black transition mb-6 inline-block">
            ← Kembali ke Beranda
        </a>

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

            <!-- Image -->
            <div class="w-full h-[400px] overflow-hidden">
                <img 
                    src="{{ asset('storage/berita/' . $berita->image) }}" 
                    class="w-full h-full object-cover hover:scale-105 transition duration-500"
                >
            </div>

            <!-- Content -->
            <div class="p-8">

                <!-- Title -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3 leading-tight">
                    {{ $berita->title }}
                </h1>

                <!-- Meta -->
                <div class="flex items-center text-sm text-gray-400 mb-6 gap-4">
                    <span>📅 {{ $berita->created_at->format('d M Y') }}</span>
                    <span>👤 Admin</span>
                </div>

                <!-- Divider -->
                <div class="border-t mb-6"></div>

                <!-- Description -->
                <div class="prose max-w-none prose-lg text-gray-700">
                    {!! $berita->deskripsi !!}
                </div>

            </div>

        </div>

    </div>

</div>

</x-layouts.app>