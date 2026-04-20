<section class="fixed top-0 left-0 right-0 z-50">


<nav class="bg-[#DF9800] p-1 flex">
    <div class="ms-14 flex gap-2">

        <div class="text-center flex items-center justify-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-icon text-white  lucide-phone"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg><span class="text-white text-sm">123456789</span></div>
        <div class="text-center flex items-center justify-center gap-1">
    </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail text-white"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg>
        <span class="text-white text-sm">admin@gmail.com</span></div>
</nav>
<nav x-data="{ open:false, dropdown:null, subDropdown:null }"
     class=" bg-[#084E43]">

    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16 lg:h-20">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <div class="w-14 h-14 p-1 rounded-full bg-white flex items-center justify-center">
                    <img src="/assets/logopst.png" class="rounded-full object-contain">
                </div>
                <div>
                    <span class="font-bold text-lg text-white">
                        MTS Almarzukiyyah
                    </span>
                    <p class="text-xs text-white">
                        MTS Almarzukiyyah Sumedang
                    </p>
                </div>
            </a>

            <!-- Desktop -->
            <div class="hidden md:flex items-center text-white gap-1">

                <!-- HOME -->
                <a href="/" class="px-3 py-2  text-sm hover:text-primary">
                    Home
                </a>

                <!-- PROFILE -->
                <div class="relative"
                     @mouseenter="dropdown='profile'"
                     @mouseleave="dropdown=null">

                    <button class="flex items-center gap-1 px-3 py-2 text-sm">
                        Profile
                        ▼
                    </button>

                    <!-- Dropdown -->
                    <div x-show="dropdown==='profile'"
                         x-transition
                         class="absolute top-full left-0 w-56 bg-[#DF9800] shadow rounded-xl py-2">

                        <!-- Sub Dropdown -->
                         <a href="/visi-misi" class="block px-4 py-2 text-sm hover:bg-[#084E43]">
                            Visi & Misi
                        </a>

                        <a href="/ekstra" class="block px-4 py-2 text-sm hover:bg-[#084E43]">
                            Ekstrakulikuler
                        </a>

                        <a href="/guru-staf" class="block px-4 py-2 text-sm hover:bg-[#084E43]">
                            Guru & Staf
                        </a>
                        
                    </div>
                </div>

                <!-- FASILITAS -->
                <div class="relative flex items-center gap-1 px-3 py-2 text-sm ">
                     {{-- @mouseenter="dropdown='fasilitas'"
                     @mouseleave="dropdown=null"> --}}

                    <a href="/fasilitas" class="flex items-center  text-sm" >
                        Fasilitas 
                    </a>

                    {{-- <div x-show="dropdown==='fasilitas'"
                         x-transition
                         class="absolute top-full left-0 w-56 bg-white shadow rounded-xl py-2">

                        <a href="/fasilitas#masjid" class="block px-4 py-2 text-sm hover:bg-gray-100">Masjid</a>
                        <a href="/fasilitas#perpustakaan" class="block px-4 py-2 text-sm hover:bg-gray-100">Perpustakaan</a>
                        <a href="/fasilitas#kantin" class="block px-4 py-2 text-sm hover:bg-gray-100">Kantin</a>
                    </div> --}}
                </div>

                <!-- PMB -->
                <a href="/ppdb"
                   class="px-4 py-2 text-sm bg-green-600 text-white rounded-lg">
                    PMB Online
                </a>

                <!-- LOGIN -->
                <a href="/login" class="flex items-center gap-2 px-4 py-2 text-sm text-primary">
                    Login
                </a>

            </div>

            <!-- Mobile Button -->
            <button @click="open=!open" class="md:hidden">
                ☰
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="md:hidden">
        <div class="p-4 space-y-2">

            <a href="/" class="block px-4 py-2">Home</a>

            <!-- PROFILE -->
            <div>
                <button @click="dropdown==='profile' ? dropdown=null : dropdown='profile'"
                        class="w-full flex justify-between px-4 py-2">
                    Profile
                </button>

                <div x-show="dropdown==='profile'" class="ml-4 border-l pl-2">
                    <a href="/profile/tentang" class="block px-4 py-2">Tentang</a>
                    <a href="/profile/visi-misi" class="block px-4 py-2">Visi & Misi</a>
                </div>
            </div>

            <a href="/pmb" class="block px-4 py-2">PMB Online</a>
        </div>
    </div>
</nav>
</section>