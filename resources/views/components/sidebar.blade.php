<aside
    class="fixed md:static z-40 inset-y-0 left-0 w-64 bg-[#084E43] text-white transform
    md:translate-x-0 transition-transform duration-300"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
>

    <!-- Logo -->
    <div class="p-4 text-xl font-bold border-b border-[#DF9800]">
        Admin Panel
    </div>

    <nav class="p-4 space-y-2 text-sm">

        <!-- DASHBOARD -->
        <a href="/admin"
           class="block px-4 py-2 rounded hover:bg-gray-700">
            Dashboard
        </a>

        <!-- CMS DROPDOWN -->
        <div x-data="{ openCms: false }" class="space-y-1">

            <button
                @click="openCms = !openCms"
                class="w-full flex justify-between items-center px-4 py-2 rounded hover:bg-gray-700"
            >
                <span>CMS</span>
                <span x-text="openCms ? '-' : '+'"></span>
            </button>

            <div x-show="openCms" x-transition class="pl-4 space-y-1">

                <a href="/admin/hero"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    Hero Section
                </a>

                <a href="/admin/visi-misi"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    Visi Misi
                </a>

                <a href="/admin/cms/fasilitas"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    Fasilitas
                </a>

            </div>
        </div>

        <!-- PENDAFTARAN DROPDOWN -->
        <div x-data="{ openReg: false }" class="space-y-1">

            <button
                @click="openReg = !openReg"
                class="w-full flex justify-between items-center px-4 py-2 rounded hover:bg-gray-700"
            >
                <span>Pendaftaran</span>
                <span x-text="openReg ? '-' : '+'"></span>
            </button>

            <div x-show="openReg" x-transition class="pl-4 space-y-1">

                <a href="/admin/pendaftaran/data"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    Data Pendaftar
                </a>

            </div>
        </div>

    </nav>
</aside>