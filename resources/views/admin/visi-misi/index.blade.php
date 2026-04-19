<x-layouts.admin title="CMS Visi & Misi">

<div 
    x-data="visiMisiModal()" 
    class="p-6 space-y-6"
>

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">CMS Visi & Misi</h1>
            <p class="text-sm text-gray-500">Kelola Visi & Misi section website</p>
        </div>

        <a href="{{ route('visi-misi.create') }}"
           class="inline-flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-xl shadow hover:bg-green-700 transition">
            + Add Visi & Misi
        </a>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">

            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="p-4 text-left">Visi</th>
                        <th class="p-4 text-left">Misi</th>
                        <th class="p-4 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                @forelse ($visiMisi as $data)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="p-4 font-semibold text-gray-800">
                            {!! Str::limit(strip_tags($data->visi ?? $data->description), 50) !!}
                        </td>

                        <td class="p-4 text-gray-500 max-w-md">
                            <div class="line-clamp-2">
                                {!! Str::limit(strip_tags($data->misi), 80) !!}
                            </div>
                        </td>

                        <td class="p-4">
                            <div class="flex justify-center gap-2">

                                <!-- SHOW -->
                                <button
                                    @click="open({{ $data->id }})"
                                    class="px-3 py-1.5 text-xs rounded-lg bg-gray-700 text-white hover:bg-gray-800">
                                    Show
                                </button>

                                <a href="{{ route('visi-misi.edit', $data->id) }}"
                                   class="px-3 py-1.5 text-xs rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                                    Edit
                                </a>

                                <form action="{{ route('visi-misi.destroy', $data->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="px-3 py-1.5 text-xs rounded-lg bg-red-600 text-white hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-10 text-center text-gray-400">
                            Data belum tersedia
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>

    <!-- MODAL -->
<!-- BACKDROP -->
<div 
    x-show="openModal"
    x-transition:enter="transition-opacity ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm"
>

    <!-- MODAL BOX -->
    <div 
        @click.outside="close()"

        x-transition:enter="transition-all duration-300 ease-[cubic-bezier(0.22,1,0.36,1)]"
        x-transition:enter-start="opacity-0 scale-95 translate-y-8"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"

        x-transition:leave="transition-all duration-200 ease-in"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-4"

        class="bg-white w-full max-w-3xl rounded-2xl shadow-xl p-6 relative"
    >

            <!-- CLOSE -->
            <button 
                @click="close()" 
                class="absolute top-3 right-3 text-gray-400 hover:text-red-500 text-xl">
                ✕
            </button>

            <!-- HEADER -->
            <div class="mb-4">
                <h2 class="text-xl font-bold text-gray-800">Detail Visi & Misi</h2>
                <p class="text-sm text-gray-500">Informasi lengkap</p>
            </div>

            <!-- LOADING -->
            <template x-if="loading">
                <div class="text-center py-10 text-gray-400">
                    Loading...
                </div>
            </template>

            <!-- CONTENT -->
            <div 
                x-show="!loading"
                class="space-y-6 max-h-[70vh] overflow-y-auto pr-2"
            >

                <div>
                    <h3 class="font-semibold text-gray-700 mb-2">Visi</h3>
                    <div x-html="visi" class="prose max-w-none"></div>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-700 mb-2">Misi</h3>
                    <div x-html="misi" class="prose max-w-none"></div>
                </div>

            </div>

        </div>
    </div>

</div>
<!-- SWEET ALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- ALPINE SCRIPT -->
<script>
function visiMisiModal() {
    return {
        openModal: false,
        visi: '',
        misi: '',
        loading: false,

        async open(id) {
            this.openModal = true;
            this.loading = true;

            try {
                const response = await fetch(`/admin/visi-misi/${id}`);
                const data = await response.json();

                console.log(data);

                this.visi = data.visi ?? data.description ?? '<p>Tidak ada data</p>';
                this.misi = data.misi ?? '<p>Tidak ada data</p>';

            } catch (error) {
                console.error(error);
            } finally {
                this.loading = false;
            }
        },

        close() {
            this.openModal = false;
            this.visi = '';
            this.misi = '';
        }
    }
}

</script>
<script>
    @if(session('success'))
Swal.fire({
    icon: "success",
    title: "Berhasil",
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
@endif

@if(session('error'))
Swal.fire({
    icon: "error",
    title: "Gagal",
    text: "{{ session('error') }}",
    timer: 2000,
    showConfirmButton: false
});
@endif
</script>

</x-layouts.admin>