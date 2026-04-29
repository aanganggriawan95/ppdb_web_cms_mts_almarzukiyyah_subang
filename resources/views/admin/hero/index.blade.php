<x-layouts.admin title="CMS Hero">

<div class="p-6 h-full overflow-auto space-y-6">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">CMS Hero</h1>
            <p class="text-sm text-gray-500">Kelola hero section website</p>
        </div>

        <a href="{{ route('hero.create') }}"
           class="inline-flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-xl shadow hover:bg-green-700 transition">
            + Add Hero
        </a>
    </div>

    <!-- SEARCH -->
    <form method="GET" action="{{ route('hero.index') }}"
          class="flex flex-col md:flex-row gap-3">

        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}"
            placeholder="Cari judul hero..."
            class="w-full md:w-1/3 px-4 py-2 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none"
        >

        <button 
            type="submit"
            class="bg-blue-600 text-white px-5 py-2 rounded-xl hover:bg-blue-700 transition"
        >
            Search
        </button>
    </form>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="p-4 text-left">Image</th>
                        <th class="p-4 text-left">Title</th>
                        <th class="p-4 text-left">Description</th>
                        <th class="p-4 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                @forelse ($hero as $data)
                    <tr class="hover:bg-gray-50 transition">

                        <!-- IMAGE -->
                        <td class="p-4">
                            <img 
                                src="{{ asset('storage/hero/'.$data->image) }}" 
                                class="w-28 h-16 object-cover rounded-lg shadow"
                            >
                        </td>

                        <!-- TITLE -->
                        <td class="p-4 font-semibold text-gray-800">
                            {{ $data->title }}
                        </td>

                        <!-- DESCRIPTION -->
                        <td class="p-4 text-gray-500 max-w-md">
                            <div class="line-clamp-2">
                                {!! Str::limit(strip_tags($data->description), 80) !!}
                            </div>
                        </td>

                        <!-- ACTIONS -->
                        <td class="p-4">
                            <div class="flex justify-center gap-2">

                              

                                <a href="{{ route('hero.edit', $data->id) }}"
                                   class="px-3 py-1.5 text-xs rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                                    Edit
                                </a>

                                <form action="{{ route('hero.destroy', $data->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="px-3 py-1.5 text-xs rounded-lg bg-red-600 text-white hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @empty

                    <tr>
                        <td colspan="4" class="p-10 text-center">
                            <div class="text-gray-400">
                                <p class="text-lg font-medium">Data belum tersedia</p>
                                <p class="text-sm">Silakan tambahkan hero pertama</p>
                            </div>
                        </td>
                    </tr>

                @endforelse

                </tbody>
            </table>
        </div>
    </div>

    <!-- PAGINATION -->
    <div class="flex justify-center">
        <div class="bg-white px-4 py-2 rounded-xl shadow">
            {{ $hero->withQueryString()->links() }}
        </div>
    </div>

</div>

<!-- SWEET ALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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