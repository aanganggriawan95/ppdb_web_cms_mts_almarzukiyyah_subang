<x-layouts.admin title="Top Manager">

    <div class="h-full overflow-auto  p-6 ">
        <div class="flex flex-col gap-6">
        <!-- HEADER -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Penerimaan Siswa</h1>
                    <p class="text-sm text-gray-500">Kelola penerimaan siswa</p>
                </div>

                <div class="flex gap-3 mb-4">

                    <a href="{{ route('ppdb.export.excel') }}"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg">
                        Export Excel
                    </a>

                    <a href="{{ route('ppdb.export.pdf') }}"
                    class="bg-red-600 text-white px-4 py-2 rounded-lg">
                        Export PDF
                    </a>
                </div>
            </div>
    

            <!-- SEARCH -->
            <form method="GET" action="{{ route('penerimaan.index') }}"
                class="flex flex-col md:flex-row gap-3">

                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Cari siswa..."
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
            <div class="bg-white rounded-2xl shadow-sm">
                <div class="">

                   <table class="text-sm w-full">

    <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
        <tr>
            <th class="p-4">Nama</th>
            <th class="p-4">Email</th>
            <th class="p-4">NISN</th>
            <th class="p-4">No HP</th>
            <th class="p-4">Asal Sekolah</th>
            <th class="p-4">Orang Tua</th>
            <th class="p-4">Status</th>
            <th class="p-4 text-center">Aksi</th>
        </tr>
    </thead>

    <tbody class="divide-y divide-gray-100">

    @forelse ($siswa as $data)
    <tr class="hover:bg-gray-50 transition text-sm">

        <td class="p-4">{{ $data->nama }}</td>
        <td class="p-4">{{ $data->email }}</td>
        <td class="p-4">{{ $data->nisn }}</td>
        <td class="p-4">{{ $data->no_hp }}</td>
        <td class="p-4">{{ $data->asal_sekolah }}</td>
        
        <td class="p-4">
            {{ $data->nama_ayah }} / {{ $data->nama_ibu }}
        </td>

        <td class="p-4">
            <span class="px-2 py-1 text-xs rounded
                {{ $data->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                {{ $data->status == 'diterima' ? 'bg-green-100 text-green-700' : '' }}
                {{ $data->status == 'ditolak' ? 'bg-red-100 text-red-700' : '' }}">
                {{ ucfirst($data->status) }}
            </span>
        </td>

        <td class="p-4">
            <div class="flex gap-2">
                <a href="{{ route('penerimaan.show', $data->id) }}"
                   class="px-3 py-1 text-xs bg-blue-600 text-white rounded-lg">
                   Detail
                </a>

              
            </div>
        </td>

    </tr>
    @empty
    <tr>
        <td colspan="8" class="p-10 text-center text-gray-400">
            Data PPDB belum ada
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
                    {{ $siswa->withQueryString()->links() }}
                </div>
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