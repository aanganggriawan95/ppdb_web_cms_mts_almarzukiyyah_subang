<aside
    class="fixed md:static z-40 inset-y-0 left-0 w-64 bg-[#084E43] text-white transform
    md:translate-x-0 transition-transform duration-300"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
>

    <!-- Logo -->
    <div class="p-4 text-xl font-bold border-b border-[#DF9800]">
        <div class=" flex items-center gap-2 justify-center">
            <img src="/assets/logopst.png" alt="Logo" width="50px">
            <span class="">MTS Almarzukiyyah</span>
        </div>
       
    </div>

    <nav class="p-4 space-y-2 text-sm">

        <!-- DASHBOARD -->
        <a href="/admin"
           class=" px-4 py-2 rounded flex items-center gap-2 hover:bg-gray-700">
           <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard-icon lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
            Dashboard
        </a>

        <!-- CMS DROPDOWN -->
        <div x-data="{ openCms: false }" class="space-y-1">

            <button
            @click="openCms = !openCms"
            class="w-full flex justify-between items-center px-4 py-2 rounded hover:bg-gray-700"
        >
            <span class="flex items-center gap-2">
                <!-- ICON -->
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                    <path d="M10 4v4"/>
                    <path d="M2 8h20"/>
                    <path d="M6 4v4"/>
                </svg>

                CMS
            </span>

            <!-- ICON ARROW -->
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                class="transition-transform duration-300"
                :class="openCms ? 'rotate-90' : ''"
            >
                <path d="m9 18 6-6-6-6"/>
            </svg>
        </button>

            <div x-show="openCms" x-transition class="pl-4 space-y-1">

                <a href="/admin/hero"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    Hero Section CMS
                </a>

                <a href="/admin/visi-misi"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    Visi Misi CMS
                </a>
                <a href="/admin/sambutan"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    Sambutan Kepala CMS
                </a>

                <a href="/admin/tentang"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    Tentang CMS
                </a>
                <a href="/admin/berita"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    Berita CMS
                </a>
                <a href="/admin/ekskul"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    Ekskul CMS
                </a>
                <a href="/admin/guru-staf"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    Guru & Staf CMS
                </a>
                <a href="/admin/fasilitas"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    Fasilitas CMS
                </a>
                <a href="/admin/timeline"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    Time Line PPDB CMS
                </a>
               

            </div>
        </div>

        <!-- PENDAFTARAN DROPDOWN -->
         <a href="/admin/ppdb"
           class=" px-4 py-2 rounded hover:bg-gray-700 flex items-center gap-2">
           <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-paste-icon lucide-clipboard-paste"><path d="M11 14h10"/><path d="M16 4h2a2 2 0 0 1 2 2v1.344"/><path d="m17 18 4-4-4-4"/><path d="M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 1.793-1.113"/><rect x="8" y="2" width="8" height="4" rx="1"/></svg>
            PPDB Online
        </a>

        @if (auth()->user()->role == 'top_admin')
          <a href="/admin/penerimaan"
           class=" px-4 py-2 rounded hover:bg-gray-700 flex items-center gap-2">
           <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-paste-icon lucide-clipboard-paste"><path d="M11 14h10"/><path d="M16 4h2a2 2 0 0 1 2 2v1.344"/><path d="m17 18 4-4-4-4"/><path d="M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 1.793-1.113"/><rect x="8" y="2" width="8" height="4" rx="1"/></svg>
            Penerimaan Siswa
        </a>
            
        @endif

    </nav>
    <form id="logout-form" method="POST" action="{{ route('logout') }}">
    @csrf
    </form>

    <div class="absolute bottom-4 p-4 w-full">
        <button 
            onclick="confirmLogout()"
            type="button"
            class="px-4 py-2 bg-red-500  w-full hover:bg-red-700 text-white rounded">
            Logout
        </button>
    </div>

</aside>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmLogout() {
    Swal.fire({
        title: "Yakin logout?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, logout",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
        }
    });
}
</script>