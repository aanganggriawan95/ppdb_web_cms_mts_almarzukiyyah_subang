<x-layouts.admin title="CMS Timeline PPDB">

<div 
    x-data="visiMisiModal()" 
    class="p-6 space-y-6"
>

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">CMS Timeline PPDB</h1>
            <p class="text-sm text-gray-500">Kelola Timeline PPDB section website</p>
        </div>

       <a href="{{ route('timeline.create') }}"
   class="inline-flex {{ $timeline->count() > 0 ? 'pointer-events-none opacity-50' : '' }} items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-xl shadow hover:bg-green-700 transition">
    + Add Timeline
</a>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">

            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="p-4 text-left">Pendaftran</th>
                        <th class="p-4 text-left">Tes Penerimaan</th>
                        <th class="p-4 text-left">Daftar Ulang</th>
                        <th class="p-4 text-left">MPLS</th>
                        <th class="p-4 text-left">Tahun</th>
                        <th class="p-4 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                @forelse ($timeline as $data)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="p-4 font-semibold text-gray-800">
                            {!! Str::limit(strip_tags($data->daftar), 50) !!}
                        </td>

                        <td class="p-4 text-gray-500 max-w-md">
                            <div class="line-clamp-2">
                                {!! Str::limit(strip_tags($data->tes), 80) !!}
                            </div>
                        </td>
                        <td class="p-4 text-gray-500 max-w-md">
                            <div class="line-clamp-2">
                                {!! Str::limit(strip_tags($data->daftar_ulang), 80) !!}
                            </div>
                        </td>
                        <td class="p-4 text-gray-500 max-w-md">
                            <div class="line-clamp-2">
                                {!! Str::limit(strip_tags($data->mpls), 80) !!}
                            </div>
                        </td>
                        <td class="p-4 text-gray-500 max-w-md">
                            <div class="line-clamp-2">
                                {!! Str::limit(strip_tags($data->tahun), 80) !!}
                            </div>
                        </td>

                        <td class="p-4">
                            <div class="flex justify-center gap-2">

                                <!-- SHOW -->
                           

                                <a href="{{ route('timeline.edit', $data->id) }}"
                                   class="px-3 py-1.5 text-xs rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                                    Edit
                                </a>

                                <form action="{{ route('timeline.destroy', $data->id) }}" method="POST"
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
</div>
  
<!-- SWEET ALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- ALPINE SCRIPT -->
<script>


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