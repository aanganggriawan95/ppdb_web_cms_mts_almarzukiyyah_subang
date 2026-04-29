<h2>Halo {{ $siswa->nama }}</h2>

@if($siswa->status == 'diterima')
    <p>Selamat! Anda dinyatakan <b>DITERIMA</b> di sekolah kami.</p>
@else
    <p>Mohon maaf, Anda dinyatakan <b>DITOLAK</b>.</p>
@endif

<p>Terima kasih telah mendaftar.</p>