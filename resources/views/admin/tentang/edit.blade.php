<x-layouts.admin title="Dashboard">

<div class="px-4 sm:px-6 lg:px-8">

    <div class=" rounded-xl ">

       <form action="{{ route('tentang.update', $tentang->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- TITLE -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2" >
                        Judul
                    </label>

                    <input
                   
                        type="text"
                        name="title"
                        value="{{old('title', $tentang->title)}}"
                        class="w-full border border-gray-300 rounded-lg p-1 focus:ring-2 focus:ring-blue-500 focus:outline-none
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
                        
                            type="number"
                            name="jml_siswa"
                            value="{{old('jml_siswa', $tentang->jml_siswa)}}"
                          
                            class="w-full border border-gray-300 rounded-lg p-1 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        >

                     
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Jumlah Guru
                        </label>

                        <input
                            type="number"
                            name="jml_guru"
                            
                            value="{{old('jml_guru', $tentang->jml_guru)}}"
                           
                            class="w-full border border-gray-300 rounded-lg p-1 focus:ring-2 focus:ring-blue-500 focus:outline-none
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
                            name="jml_fasilitas"
                            value="{{old('jml_fasilitas', $tentang->jml_fasilitas)}}"
                           
                            class="w-full border border-gray-300 rounded-lg p-1 focus:ring-2 focus:ring-blue-500 focus:outline-none
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
                            name="tahun_berdiri"
                            value="{{old('tahun_berdiri', $tentang->tahun_berdiri)}}"
                           
                            class="w-full border border-gray-300 rounded-lg p-1 focus:ring-2 focus:ring-blue-500 focus:outline-none
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
                    
                        name="deskripsi"
                        rows="5"
                        
                        class="w-full border border-gray-300 rounded-lg p-1 focus:ring-2 focus:ring-blue-500 focus:outline-none
                        "
                    >
                        {{old('deskripsi', $tentang->deskripsi)}}</textarea>

                   
                </div>

            <!-- BUTTON -->
            <div class="flex gap-3">
                <button
                    type="submit"
                    class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                >
                    Simpan Data
                </button>

                <button
                    type="reset"
                    class="px-5 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition"
                >
                    Kembali
                </button>
            </div>

        </form>

    </div>

</div>

<!-- CKEDITOR -->
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
</script>



</x-layouts.admin>