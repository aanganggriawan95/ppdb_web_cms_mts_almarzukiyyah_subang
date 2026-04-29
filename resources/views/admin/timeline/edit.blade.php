<x-layouts.admin title="DasUpdate Timeline PPDB">

<div class="h-full overflow-auto">
    <div class="rounded-xl">

        <form action="{{ route('timeline.update', $timeline->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Timeline Pendaftaran
                </label>

                <input
                    type="text"
                    name="daftar"
                    value="{{old('daftar', $timeline->daftar)}}"
                    placeholder="Contoh (1 Jan s/d 30 Jun 2026)"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                    @error('daftar') border-red-500 @enderror"
                >

                @error('daftar')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Timeline Tes Masuk
                </label>

                <input
                    type="text"
                    name="tes"
                    value="{{old('tes', $timeline->tes)}}"
                    placeholder="Contoh (1 Jan s/d 30 Jun 2026)"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                    @error('tes') border-red-500 @enderror"
                >

                @error('tes')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Timeline Daftar Ulang
                </label>

                <input
                    type="text"
                    name="daftar_ulang"
                    value="{{old('daftar_ulang', $timeline->daftar_ulang)}}"
                    placeholder="Contoh (30 Aug 2026)"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                    @error('daftar_ulang') border-red-500 @enderror"
                >

                @error('daftar_ulang')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Timeline MPLS
                </label>

                <input
                    type="text"
                    name="mpls"
                    value="{{old('mpls', $timeline->mpls)}}"
                    placeholder="Contoh (30 Sep 2026)"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                    @error('mpls') border-red-500 @enderror"
                >

                @error('mpls')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            
           

            <!-- BUTTON -->
            <div class="flex gap-3">
                

                <a href="/admin/timeline" class="px-5 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                    Back
                </a>
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Update
                </button>
            </div>

        </form>

    </div>
</div>

<!-- CKEDITOR -->
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('visi', {
        height: 200
    });

    CKEDITOR.replace('misi', {
        height: 200
    });
</script>

</x-layouts.admin>