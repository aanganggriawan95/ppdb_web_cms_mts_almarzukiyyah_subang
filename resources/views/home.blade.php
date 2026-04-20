


<x-layouts.app title="Home">
    <div >
        <x-hero-carousel :data="$hero" />
        <x-about-section :data="$tentang" />
        <x-department-section />
        <x-news-section :data="$berita" />
        
    </div>

</x-layouts.app>