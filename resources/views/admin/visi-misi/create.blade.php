<x-layouts.admin title="Dashboard">

<div class="h-full overflow-auto">
    <div class="rounded-xl">

        <form action="{{ route('visi-misi.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- DESCRIPTION / VISI -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    VISI
                </label>

                <textarea
                    id="visi"
                    name="visi"
                    rows="5"
                    class="w-full border border-gray-300 rounded-lg p-2 @error('description') border-red-500 @enderror"
                >{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- MISI -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    MISI
                </label>

                <textarea
                    id="misi"
                    name="misi"
                    rows="5"
                    class="w-full border border-gray-300 rounded-lg p-2 @error('misi') border-red-500 @enderror"
                >{{ old('misi') }}</textarea>

                @error('misi')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- BUTTON -->
            <div class="flex gap-3">
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    SAVE
                </button>

                <button type="reset" class="px-5 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                    RESET
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