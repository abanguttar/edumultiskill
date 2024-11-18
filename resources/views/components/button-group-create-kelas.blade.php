<div class="btn-group mb-1 " role="group" aria-label="Basic example">
    <a @if ($kelas_id != null) href="/admin/kelas/informasi/{{ $kelas_id }}"
    @else
    href="/admin/kelas/create" @endif
        class="btn btn-danger text-white" id="btn-group-kelas">Informasi</a>
    @if ($kelas_id != null)
        <a href="/admin/kelas/{{ $kelas_id }}/deskripsi" class="btn btn-outline-danger"
            id="btn-group-kelas-deskripsi">Deskripsi</a>
        <a href="/admin/kelas/{{ $kelas_id }}/jadwal" class="btn btn-outline-danger" id="btn-group-jadwal">Jadwal</a>
        <a href="/admin/kelas/{{ $kelas_id }}/skkni" class="btn btn-outline-danger"
            id="btn-group-kelas-skkni">SKKNI</a>
        <a href="/admin/kelas/{{ $kelas_id }}/rating" class="btn btn-outline-danger"
            id="btn-group-rating">Rating</a>
    @endif
</div>
<hr>
