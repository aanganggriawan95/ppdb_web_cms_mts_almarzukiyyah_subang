@props(['data'])

@php
    $slides = collect($data)->values()->toArray();
@endphp

<section 
    x-data="carousel()"
    x-init="init()"
    class="relative h-[85vh] min-h-[600px] overflow-hidden"
>

    <!-- Alpine Logic -->
    <script>
        function carousel() {
            return {
                current: 0,
                slides: @json($slides),

                init() {
                    if (this.slides.length > 0) {
                        setInterval(() => this.next(), 5000)
                    }
                },

                next() {
                    this.current = (this.current + 1) % this.slides.length
                },

                prev() {
                    this.current = (this.current - 1 + this.slides.length) % this.slides.length
                }
            }
        }
    </script>

    <!-- BACKGROUND (FADE) -->
    <template x-for="(slide, index) in slides" :key="index">
        <div 
            x-show="current === index"

            x-transition:enter="transition-opacity duration-1000 ease-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"

            x-transition:leave="transition-opacity duration-800 ease-out"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"

            class="absolute inset-0"
        >
            <img :src="slide.image" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>
    </template>

    <!-- CONTENT -->
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="text-center text-white px-4 max-w-3xl">

            <template x-for="(slide, index) in slides" :key="index">
                <div 
    x-show="current === index"
    class="absolute inset-0 flex items-center justify-center"

    x-transition:enter="transition-all duration-700 ease-[cubic-bezier(0.22,1,0.36,1)]"
    x-transition:enter-start="opacity-0 -translate-x-20"
    x-transition:enter-end="opacity-100 translate-x-0"

    x-transition:leave="transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)]"
    x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-20"
>
<div>

    <!-- Subtitle -->
    <template x-if="slide.subtitle">
        <span 
            class="inline-block px-4 py-1.5 rounded-full bg-yellow-400 text-black text-sm font-semibold mb-4"
            x-text="slide.subtitle">
        </span>
    </template>

    <!-- Title -->
    <h1 class="text-4xl md:text-6xl font-bold mb-4"
        x-text="slide.title">
    </h1>

    <!-- Description -->
    <p class="text-lg md:text-xl mb-8"
       x-html="slide.description">
    </p>

    <!-- Buttons -->
    <div class="flex gap-4 justify-center">
        <a href="/pmb"
           class="bg-green-600 px-6 py-3 rounded-full font-semibold hover:opacity-90">
            Daftar Sekarang
        </a>

        <a href="/profile"
           class="bg-white/20 px-6 py-3 rounded-full border border-white hover:bg-white/30">
            Selengkapnya
        </a>
    </div>
</div>

                </div>
            </template>

        </div>
    </div>

    <!-- NAVIGATION -->
    <button @click="prev"
        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 p-3 rounded-full">
        ❮
    </button>

    <button @click="next"
        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 p-3 rounded-full">
        ❯
    </button>

    <!-- DOTS -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-2">
        <template x-for="(slide, index) in slides" :key="index">
            <button 
                @click="current = index"
                :class="current === index ? 'w-8 bg-white' : 'w-2 bg-white/50'"
                class="h-2 rounded-full transition-all duration-300"
            ></button>
        </template>
    </div>

</section>