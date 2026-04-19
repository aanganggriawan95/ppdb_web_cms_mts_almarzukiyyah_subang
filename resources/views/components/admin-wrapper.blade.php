@props(['title'])

<div x-data="{ sidebarOpen: false }" class="flex h-screen">

    <!-- Sidebar -->

    <x-sidebar />


    <!-- Overlay Mobile -->
    <div
        class="fixed inset-0 bg-black/50 z-30 md:hidden"
        x-show="sidebarOpen"
        x-transition
        @click="sidebarOpen = false"
    ></div>

    <!-- Main Area -->
    <div class="flex-1 flex flex-col  w-full">

        <x-topbar :title="$title" />

        <main class="p-6 h-screen overflow-auto">
            {{ $slot }}
        </main>

    </div>
</div>