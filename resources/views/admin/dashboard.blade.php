<x-layouts.admin title="Dashboard">

    <div class="p-6 bg-gray-100 h-full overflow-auto">

    <!-- CARD -->
    
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">

                    <!-- Berita -->
                    <div class="bg-green-600 p-5 rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 transition flex items-center justify-between">
                        <div>
                            <p class="text-white text-sm">Berita</p>
                            <h2 class="text-3xl font-bold text-white">{{ $total['berita'] }}</h2>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                            📰
                        </div>
                    </div>

                    <!-- Guru -->
                    <div class="bg-green-600 p-5 rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 transition flex items-center justify-between">
                        <div>
                            <p class="text-white text-sm">Guru</p>
                            <h2 class="text-3xl font-bold text-white">{{ $total['guru'] }}</h2>
                        </div>
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center">
                            👨‍🏫
                        </div>
                    </div>

                    <!-- PPDB -->
                    <div class="bg-green-600 p-5 rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 transition flex items-center justify-between">
                        <div>
                            <p class="text-white text-sm">PPDB</p>
                            <h2 class="text-3xl font-bold text-white">{{ $total['ppdb'] }}</h2>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center">
                            📋
                        </div>
                    </div>

                    <!-- Fasilitas -->
                    <div class="bg-green-600 p-5 rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 transition flex items-center justify-between">
                        <div>
                            <p class="text-white text-sm">Fasilitas</p>
                            <h2 class="text-3xl font-bold text-white">{{ $total['fasilitas'] }}</h2>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-xl flex items-center justify-center">
                            🏫
                        </div>
                    </div>

                    <!-- Ekskul -->
                    <div class="bg-green-600 p-5 rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 transition flex items-center justify-between">
                        <div>
                            <p class="text-white text-sm">Ekskul</p>
                            <h2 class="text-3xl font-bold text-white">{{ $total['ekstra'] }}</h2>
                        </div>
                        <div class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center">
                            ⚽
                        </div>
                    </div>

                    <!-- Hero -->
                    <div class="bg-green-600 p-5 rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 transition flex items-center justify-between">
                        <div>
                            <p class="text-white text-sm">Hero</p>
                            <h2 class="text-3xl font-bold text-white">{{ $total['hero'] }}</h2>
                        </div>
                        <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                            🌟
                        </div>
                    </div>
                
            </div>

        <!-- CHART -->
       
       


    <div class="bg-white mb-4 p-6 rounded-xl shadow">
        <h2 class="text-lg font-semibold mb-4">Grafik Kelas</h2>
        
       
            <div class="">
                <canvas id="chartKelas"></canvas>
            </div>
       
    </div>

    <!-- GENDER (30%) -->
    <div class="bg-white p-6 rounded-xl shadow flex flex-col">
        <h2 class="text-lg font-semibold mb-4 text-center">Grafik Jenis Kelamin</h2>
        
        <div class="h-[350px]">
            <canvas id="chartGender"></canvas>
        </div>
    </div>

</div>

    </div>  

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// ✅ Gender
new Chart(document.getElementById('chartGender'), {
    type: 'bar',
    data: {
        labels: ['Laki-laki', 'Perempuan'],
        datasets: [{
            label: 'Jumlah Siswa',
            data: [
                {{ $jeniskelamin['laki-laki'] ?? 0 }},
                {{ $jeniskelamin['perempuan'] ?? 0 }}
            ],
            backgroundColor: [
                '#3b82f6', // biru
                '#ec4899'  // pink
            ],
            borderRadius: 8, // biar rounded
            barThickness: 40 // biar tidak terlalu lebar
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false // biar simpel
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});

// ✅ Kelas
new Chart(document.getElementById('chartKelas'), {
    type: 'bar',
    data: {
        labels: [
            '7 Baru','8 Baru','9 Baru',
            '7 Pindahan','8 Pindahan','9 Pindahan'
        ],
        datasets: [{
            label: 'Jumlah Siswa',
            data: [
                {{ $kelas['7 baru'] ?? 0 }},
                {{ $kelas['8 baru'] ?? 0 }},
                {{ $kelas['9 baru'] ?? 0 }},
                {{ $kelas['7 pindahan'] ?? 0 }},
                {{ $kelas['8 pindahan'] ?? 0 }},
                {{ $kelas['9 pindahan'] ?? 0 }}
            ],
            backgroundColor: '#10b981'
        }],
        
    },

});
</script>

</x-layouts.admin>