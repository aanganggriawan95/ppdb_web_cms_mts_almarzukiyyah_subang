<x-layouts.admin title="CMS Tentang Section">

<div class="h-full overflow-auto">

    <div class=" rounded-xl ">
        {{-- @foreach ($tentang as $data ) --}}

        @if ($sambutan)
            
        <form class="space-y-6">
                <!-- TITLE -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2" >
                        Image
                    </label>
                    <img 
                        src="{{ asset('storage/sambutan/' . $sambutan->image) }}" 
                        class="w-28 h-28 object-cover rounded-full border-4 border-green-500 shadow"
                    >
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2" >
                        Judul
                    </label>

                    <input
                        disabled
                        type="text"
                        name="title"
                   
                        value="{{ $sambutan ? $sambutan->title : '' }}"
                        
                        class="w-full border px-2 border-gray-300 rounded-lg p-1 focus:ring-2 focus:ring-blue-500 focus:outline-none
                       "
                    >

             
                </div>

                 {{-- Data --}}
                <div class="grid grid-cols-1 ">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Pemberi Sambutan
                        </label>

                        <input
                        disabled
                           
                            name="nama"
                            value="{{ $sambutan ? $sambutan->nama : '' }}"
                          
                            class="w-full border px-2 border-gray-300 rounded-lg p-1 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        >

                     
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
                    >{{ $sambutan ? $sambutan->deskripsi : '' }}</textarea>

                   
                </div>

              

                <!-- BUTTON -->
              @if ($sambutan)
            {{-- Kalau ADA data --}}
            
        </form>

        @else
            {{-- Kalau KOSONG --}}
         
        @endif

        <div class="mt-4">

            <a href="{{ route('sambutan.edit', $sambutan->id) }}"
                class="px-5 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition inline-block">
                Update
            </a>
            
            <form action="{{ route('sambutan.destroy', $sambutan->id) }}" method="POST" class="inline-block"  onsubmit="return confirm('Yakin hapus data ini?')">
                @csrf
                @method('DELETE')
                <button
                type="submit"
                    class="px-5 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                    Hapus
                </button>
            
                @else
                    {{-- Kalau KOSONG --}}
                    <div class="w-full h-44 border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition flex flex-col items-center justify-center bg-white">

    <!-- Icon -->
    <div class="w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-full mb-3">
        <!-- icon plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M12 4v16m8-8H4" />
        </svg>
    </div>

    <!-- Text -->
    <p class="text-gray-700 font-semibold text-sm mb-3">
        Tambah Data Sambutan
    </p>

    <!-- Button -->
    <a href="{{ route('sambutan.create') }}"
        class="px-4 py-2 bg-green-500 text-white text-sm rounded-lg hover:bg-green-600 active:scale-95 transition">
        + Tambah
    </a>

</div>
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