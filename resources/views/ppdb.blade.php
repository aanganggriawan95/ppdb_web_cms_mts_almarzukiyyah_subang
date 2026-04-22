<x-layouts.app title="Home">
  <div class="relative h-screen overflow-hidden">
    

            <!-- Overlay -->
            <div class="absolute inset-0 bg-green-700/70"></div>

            <!-- TEXT -->
            <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white px-10">
                <h1 class="text-4xl font-bold mb-4 leading-tight">
                    Pendaftaran Peserta Didik Baru
                </h1>

                <p class="text-lg opacity-90 mb-6">
                    MTS Almarzukiyyah membuka kesempatan bagi generasi terbaik untuk bergabung bersama kami.
                </p>

                <div class="bg-white/20 backdrop-blur-md px-6 py-3 rounded-xl">
                    <p class="text-sm">
                        Tahun Ajaran 2026/2027
                    </p>
                </div>

                  <a href="#form-pendaftaran"
            class="mt-6 flex flex-col items-center gap-2 text-white px-6 py-3 rounded-xl font-semibold  transition ">
                
                Daftar Sekarang
                
                <!-- ICON -->
                <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7"/>
                </svg>
            </a>
            </div> 
          

        </div>
    <section id="form-pendaftaran" class="py-20 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4">

            <!-- CARD -->
            <div class="bg-white shadow-xl rounded-2xl p-8">

                <!-- TITLE -->
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold mb-2">
                        Form Pendaftaran Online
                    </h2>
                    <p class="text-gray-500">
                        MTS Almarzukiyyah
                    </p>
                </div>

            <form action="/ppdb-post" method="POST">
                @csrf

                <!-- NAMA -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Nama Lengkap</label>
                    <input type="text" name="nama"
                        class="w-full border border-slate-400 rounded-lg px-4 py-2">
                    @error('nama')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <!-- JENIS KELAMIN -->
                    <div>
                        <label class="block text-sm font-semibold mb-1">Jenis Kelamin</label>
                        <select name="jenis_kelamin"
                            class="w-full border border-slate-400 rounded-lg px-4 py-2">
                            <option value="">Pilih</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                    <!-- JENJANG -->
                    <div x-data="{ open:false, selected:'' }" class="relative">
                        <label class="block text-sm font-semibold mb-1">Jenjang</label>

                        <div @click="open = !open"
                            class="w-full border border-slate-400 rounded-lg px-4 py-2 cursor-pointer flex justify-between items-center">

                            <span x-text="selected || 'Pilih Jenjang'" class="text-gray-500"></span>
                        </div>

                        <div x-show="open" @click.outside="open=false"
                            class="absolute w-full bg-white border rounded-lg mt-2 shadow-lg z-10">

                            @foreach(['MI','MTs','MA'] as $j)
                            <div @click="selected='{{ $j }}'; open=false"
                                class="px-4 py-2 hover:bg-green-100 cursor-pointer">
                                {{ $j }}
                            </div>
                            @endforeach
                        </div>

                        <input type="hidden" name="jenjang" :value="selected">
                        @error('jenjang')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                </div>

                <!-- ALAMAT -->
                <div class="mt-6">
                    <label class="block text-sm font-semibold mb-1">Alamat Lengkap</label>
                    <textarea name="alamat_lengkap" rows="3"
                        class="w-full border border-slate-400 rounded-lg px-4 py-2"></textarea>
                    @error('alamat_lengkap')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-6 mt-6">

                    <!-- WA WALI -->
                    <div>
                        <label class="block text-sm font-semibold mb-1">Nomor WA Orang Tua</label>
                        <input type="number" name="no_wa_wali"
                            class="w-full border border-slate-400 rounded-lg px-4 py-2">
                        @error('no_wa_wali')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- ASAL SEKOLAH -->
                    <div>
                        <label class="block text-sm font-semibold mb-1">Asal Sekolah</label>
                        <input type="text" name="asal_sekolah"
                            class="w-full border border-slate-400 rounded-lg px-4 py-2">
                        @error('asal_sekolah')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                    <!-- WA WALI KELAS -->
                    <div>
                        <label class="block text-sm font-semibold mb-1">WA Wali Kelas</label>
                        <input type="number" name="wa_walikelas_asal_sekolah"
                            class="w-full border border-slate-400 rounded-lg px-4 py-2">

                        @error('wa_walikelas_asal_sekolah')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                    <!-- WA OPERATOR -->
                    <div>
                        <label class="block text-sm font-semibold mb-1">WA Operator</label>
                        <input type="number" name="wa_operator_asal_sekolah"
                            class="w-full border border-slate-400 rounded-lg px-4 py-2">

                        @error('wa_operator_asal_sekolah')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                </div>

                <!-- ALAMAT SEKOLAH -->
                <div class="mt-6">
                    <label class="block text-sm font-semibold mb-1">Alamat Asal Sekolah</label>
                    <textarea name="alamat_asal_sekolah" rows="3"
                        class="w-full border border-slate-400 rounded-lg px-4 py-2"></textarea>
                    
                        @error('alamat_asal_sekolah')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- BUTTON -->
                <div class="mt-8">
                    <button type="submit"
                        class="w-full bg-green-600 text-white py-3 rounded-xl font-semibold">
                        Kirim Pendaftaran
                    </button>
                </div>

            </form>

            </div>

        </div>
    </section>

</section>


@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        timer: 2000,
        showConfirmButton: false
    }).then(() => {
        window.location.href = "/ppdb-success";
    });
});
</script>
@endif


@if ($errors->any())
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        html: `
            @foreach ($errors->all() as $error)
                <div style="text-align:left;">• {{ $error }}</div>
            @endforeach
        `,
        confirmButtonColor: '#dc2626'
    });

    document.getElementById('form-pendaftaran')
        ?.scrollIntoView({ behavior: 'smooth' });
});
</script>
@endif


</x-layouts.app>