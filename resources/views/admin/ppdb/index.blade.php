<x-layouts.admin title="CMS Guru & Staf">

<div class="p-6 space-y-6 ">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">CMS Guru & Staf</h1>
            <p class="text-sm text-gray-500">Kelola Guru & Staf section website</p>
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
    <form method="GET" action="{{ route('ppdb.index') }}"
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
    <div class="bg-white rounded-2xl shadow-sm">
    <div class="overflow-x-auto w-full">

        <table class="min-w-max text-sm">

            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="p-4 whitespace-nowrap">Nama</th>
                    <th class="p-4 whitespace-nowrap">Jenjang</th>
                    <th class="p-4 whitespace-nowrap">JK</th>
                    <th class="p-4 whitespace-nowrap">Alamat</th>
                    <th class="p-4 whitespace-nowrap">WA Wali</th>
                    <th class="p-4 whitespace-nowrap">Asal Sekolah</th>
                    <th class="p-4 whitespace-nowrap">WA Wali Kelas</th>
                    <th class="p-4 whitespace-nowrap">WA Operator</th>
                    <th class="p-4 whitespace-nowrap">Alamat Sekolah</th>
                    <th class="p-4 whitespace-nowrap text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">

            @forelse ($ppdb as $data)
            <tr class="hover:bg-gray-50 transition text-sm">

                <td class="p-4 whitespace-nowrap">{{ $data->nama }}</td>
                <td class="p-4 whitespace-nowrap">{{ $data->jenjang }}</td>
                <td class="p-4 whitespace-nowrap">
                    {{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                </td>
                <td class="p-4 whitespace-nowrap">{{ $data->alamat_lengkap }}</td>
                <td class="p-4 whitespace-nowrap">{{ $data->no_wa_wali }}</td>
                <td class="p-4 whitespace-nowrap">{{ $data->asal_sekolah }}</td>
                <td class="p-4 whitespace-nowrap">{{ $data->wa_walikelas_asal_sekolah }}</td>
                <td class="p-4 whitespace-nowrap">{{ $data->wa_operator_asal_sekolah }}</td>
                <td class="p-4 whitespace-nowrap">{{ $data->alamat_asal_sekolah }}</td>

                <td class="p-4 whitespace-nowrap">
                    <div class="flex gap-2">
                        <a href="{{ route('ppdb.show', $data->id) }}"
                           class="px-3 py-1 text-xs bg-blue-600 text-white rounded-lg">
                            Detail
                        </a>

                        <form action="{{ route('ppdb.destroy', $data->id) }}" method="POST"
                              onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')

                            <button class="px-3 py-1 text-xs bg-red-600 text-white rounded-lg">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="10" class="p-10 text-center text-gray-400">
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
            {{ $ppdb->withQueryString()->links() }}
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