<x-layouts.admin title="Update Fasilitas">

<div class="h-full overflow-auto">

    <div class=" rounded-xl ">

       <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- IMAGE -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    IMAGE
                </label>
                

              
               <div 
                    x-data="{
                        fileSelected: false,
                        fileName: null,

                        handleFile(e) {
                            const file = e.target.files[0]
                            this.fileSelected = !!file
                            this.fileName = file ? file.name : null
                        }
                    }"
                    class="mt-2 flex justify-center rounded-lg border border-dashed px-6 py-10 transition-all duration-300"
                    :class="fileSelected 
                        ? 'bg-green-50 border-green-500' 
                        : 'border-gray-900/25'"
                >
                    <div class="text-center">

                        <!-- ICON -->
                        <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true" class="mx-auto size-12 text-gray-300">
                    <path d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" fill-rule="evenodd" />
                </svg>
                        <!-- INPUT -->
                        <div class="mt-4 flex text-sm text-gray-600 justify-center">
                            <label 
                                for="file-upload"
                                class="cursor-pointer font-semibold text-slate-500 hover:text-indigo-500"
                            >
                                Upload file
                            </label>

                            <input 
                                id="file-upload"
                                type="file"
                                name="image"
                                class="sr-only"
                                accept="image/*"
                                @change="handleFile($event)"
                            >

                            <p class="pl-1">atau drag & drop</p>
                        </div>

                        <!-- INFO -->
                        <p class="text-xs text-gray-500 mt-1">
                            PNG, JPG, GIF up to 5MB
                        </p>

                        <!-- FILE NAME -->
                        <p x-show="fileSelected"
                        x-text="fileName"
                        class="text-xs text-green-600 mt-2"></p>
                        </p>

                    </div>
                </div>

                @error('image')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- TITLE -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Fasilitas
                </label>

                <input
                maxlength="30"
                    type="text"
                    name="nama"
                    value="{{ old('nama', $fasilitas->nama) }}"
                    placeholder="Masukkan Nama Ekskul"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                    @error('nama') border-red-500 @enderror"
                >

                @error('nama')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

             <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    DESCRIPTION
                </label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    placeholder="Masukkan Description Product"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                    @error('description') border-red-500 @enderror"
                >{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>

                @error('deskripsi')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PRICE & STOCK -->
            {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        PRICE
                    </label>

                    <input
                        type="number"
                        name="price"
                        value="{{ old('price') }}"
                        placeholder="Masukkan Harga Product"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                        @error('price') border-red-500 @enderror"
                    >

                    @error('price')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        STOCK
                    </label>

                    <input
                        type="number"
                        name="stock"
                        value="{{ old('stock') }}"
                        placeholder="Masukkan Stock Product"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                        @error('stock') border-red-500 @enderror"
                    >

                    @error('stock')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div> --}}

            <!-- BUTTON -->
            <div class="flex gap-3">
                <a href="/admin/fasilitas"
                  
                    class="px-5 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition"
                >
                    Back
                </a>
                <button
                    type="submit"
                    class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                >
                    SAVE
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