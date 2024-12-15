<div class="btn-group mb-1" role="group" aria-label="Basic example">
    <a href="/admin/kelas/{{ $kelas_id }}/jadwal/{{ $jadwal->id }}/materi" class="btn btn-outline-primer"
        id="btn-group-materi">Meteri Kelas</a>
    <a href="#" class="btn btn-outline-primer" id="btn-group-materi">Detail Aktivitas</a>
    @if ($aktivitas->jenis === 'evaluasi')
        <a href="/admin/materi/aktivitas/{{ $aktivitas->id }}/paket" class="btn btn-outline-primer"
            class="btn btn-outline-primer" id="btn-group-materi">Paket Soal</a>
    @endif
</div>
<hr>
