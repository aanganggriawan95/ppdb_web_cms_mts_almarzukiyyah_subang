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
        <span class="text-sm text-white">{{ auth()->user()->name }}</span>
        <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-icon lucide-user-round"><circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 0 0-16 0"/></svg>
        </div>
    </div>

</header>