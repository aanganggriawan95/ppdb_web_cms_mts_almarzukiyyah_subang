@props(['title'])

<header class="bg-[#DF9800]  shadow p-4 flex items-center justify-between">

    <!-- Hamburger -->
    <button
        class="md:hidden text-gray-700"
        @click="sidebarOpen = !sidebarOpen"
    >
        ☰
    </button>

    <h4 class="font-semibold text-xl text-white">
        {{ $title ?? 'Dashboard' }}
    </h4>

    <div class="flex items-center gap-3">
        <span class="text-sm text-white">Admin</span>
        <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
    </div>

</header>