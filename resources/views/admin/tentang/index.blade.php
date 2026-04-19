<x-layouts.admin title="CMS Tentang Section">

<div class="">

    <div class=" rounded-xl ">
        {{-- @foreach ($tentang as $data ) --}}
            
        <form class="space-y-6">

               

                <!-- TITLE -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2" >
                        Judul
                    </label>

                    <input
                        disabled
                        type="text"
                        name="title"
                   
                        value="{{ $tentang ? $tentang->title : '' }}"
                        
                        class="w-full border px-2 border-gray-300 rounded-lg p-1 focus:ring-2 focus:ring-blue-500 focus:outline-none
                       "
                    >

             
                </div>

                 {{-- Data --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Jumlah Siswa
                        </label>

                        <input
                        disabled
                            type="number"
                            name="price"
                            value="{{ $tentang ? $tentang->jml_siswa : '' }}"
                          
                            class="w-full border px-2 border-gray-300 rounded-lg p-1 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        >

                     
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Jumlah Guru
                        </label>

                        <input
                            type="number"
                            name="stock"
                            disabled
                            value="{{ $tentang ? $tentang->jml_guru : '' }}"
                           
                            class="w-full border border-gray-300 rounded-lg p-1 px-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                            @error('stock') border-red-500 @enderror"
                        >

                        @error('stock')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Akreditasi
                        </label>

                        <input
                            type="text"
                            name="stock"
                            value="{{ $tentang ? $tentang->jml_fasilitas : '' }}"
                           disabled
                            class="w-full border border-gray-300 rounded-lg p-1 px-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                            @error('stock') border-red-500 @enderror"
                        >

                        @error('stock')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Tahun Berdiri
                        </label>

                        <input
                            type="number"
                            name="stock"
                            value="{{ $tentang ? $tentang->tahun_berdiri : '' }}"
                           disabled
                            class="w-full border border-gray-300 rounded-lg p-1 px-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                            @error('stock') border-red-500 @enderror"
                        >

                        @error('stock')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- DESCRIPTION -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        DESCRIPTION
                    </label>

                    <textarea
                    
                        name="description"
                        rows="5"
                        disabled
                 
                        class="w-full border border-gray-300 rounded-lg p-1  focus:ring-2 focus:ring-blue-500 focus:outline-none
                        "
                    >{{ $tentang ? $tentang->deskripsi : '' }}</textarea>

                   
                </div>

              

                <!-- BUTTON -->
              @if ($tentang)
    {{-- Kalau ADA data --}}
    
</form>

<div class="mt-4">

    <a href="{{ route('tentang.edit', $tentang->id) }}"
        class="px-5 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition inline-block">
        Update
    </a>
    
    <form action="{{ route('tentang.destroy', $tentang->id) }}" method="POST" class="inline-block"  onsubmit="return confirm('Yakin hapus data ini?')">
        @csrf
        @method('DELETE')
        <button
           type="submit"
            class="px-5 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
            Hapus
        </button>
    
    @else
        {{-- Kalau KOSONG --}}
        
        <a href="{{ route('tentang.create') }}"
            class="px-5 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition inline-block">
            Tambah
        </a>
    @endif
    
                </form>
            {{-- @endforeach --}}
</div>


    </div>

</div>

<!-- CKEDITOR -->
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>

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