@extends('admin/main')


@section('body')
    <div class="container-xxl border p-4 mt-3 w-100 mb-5">
        @include('components/button-group-jadwal')
        <div class="container-fluid p-0 m-0">
            @foreach ($topiks as $key => $topik)
                <div class="wrapper-topik mt-3" style="cursor: pointer">
                    <div class="btn btn-light d-flex gap-2 p-2 align-items-center  justify-content-between">
                        <div class="d-flex gap-2 p-2 align-items-center topik-header topik-header-{{ $topik->id }} col-9"
                            data-id="{{ $topik->id }}">
                            <div class="col">
                                <p class="fw-bold">{{ $topik->urutan }}.</p>
                            </div>
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="topik-addon1">Nama Topik</span>
                                    <input type="text" class="form-control nama_topik" value="{{ $topik->nama_topik }}"
                                        aria-describedby="topik-addon1">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="durasi-addon1">Durasi</span>
                                    <input type="text" class="form-control durasi" value="{{ $topik->durasi }}"
                                        aria-describedby="durasi-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="action d-flex gap-2 ms-4 align-items-start p-0 mb-2 col-3">

                            <button type="button" class="btn btn-primary btn-sm btn-edit-topik"
                                data-id="{{ $topik->id }}"><i data-feather="edit"></i>
                                Ubah</button>
                            <button type="button" class="btn btn-danger btn-sm btn-delete-topik"
                                data-id="{{ $topik->id }}"><i data-feather="trash-2"></i>
                                Hapus</button>


                            @if ($topik->urutan !== 1)
                                <a href="#" data-bs-toggle="tooltip" class="topik-up" data-id="{{ $topik->id }}"
                                    data-bs-title="Naikkan Urutan"><i data-feather="arrow-up"></i></a>
                            @endif
                            @if ($topik->urutan < $total_topik)
                                <a href="#" data-bs-toggle="tooltip" class="topik-down" data-id="{{ $topik->id }}"
                                    data-bs-title="Turunkan Urutan"><i data-feather="arrow-down"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="topik-content topik-{{ $topik->id }}">
                        <div
                            class="aktivitas_header mt-2 border border-2 border-bottom-0 border-start-0 border-end-0 border-dark p-2">
                            <span class="fw-semibold">Detail Aktivitas {{ $topik->nama_topik }}</span>
                        </div>
                        <div class="aktivitas_content p-2 table-responsive">
                            <table class="table table-hover table-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center col-1">No.</th>
                                        <th class="col-5">Nama Aktivitas</th>
                                        <th class="col-2">Jenis Aktivitas</th>
                                        <th class="text-center col-1">Kunci</th>
                                        <th class="text-center col-1">Bobot</th>
                                        <th class="text-center col-2">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_aktivitas = count($topik->aktivitas);
                                    @endphp
                                    @foreach ($topik->aktivitas as $key => $aktivitas)
                                        <tr>
                                            <td class="text-center col">{{ ++$key }}</td>
                                            <td class=" col-5">{{ $aktivitas->nama_aktivitas }}</td>
                                            <td class=" col-2">{{ ucwords($aktivitas->jenis) }}</td>
                                            <td class="text-center col">
                                                {{ $aktivitas->is_locked === 1 ? 'Kunci' : 'Tidak' }}</td>
                                            <td class="text-center col">{{ $aktivitas->bobot }}</td>
                                            <td class="text-start col-2">
                                                <a href="/admin/kelas/{{ $topik->kelas_id }}/jadwal/{{ $topik->jadwal_id }}/topik/{{ $topik->id }}/aktivitas/{{ $aktivitas->id }}/edit"
                                                    data-bs-toggle="tooltip" data-bs-title="Edit"><i data-feather="edit"
                                                        class="ms-4"></i></a>
                                                <a class="text-danger"
                                                    href="/admin/kelas/{{ $topik->kelas_id }}/jadwal/{{ $topik->jadwal_id }}/topik/{{ $topik->id }}/aktivitas/{{ $aktivitas->id }}/delete"
                                                    data-bs-toggle="tooltip" data-bs-title="Hapus"><i
                                                        data-feather="trash"></i></a>
                                                @if ($aktivitas->urutan !== 1)
                                                    <a href="/admin/kelas/{{ $topik->kelas_id }}/jadwal/{{ $topik->jadwal_id }}/topik/{{ $topik->id }}/aktivitas/{{ $aktivitas->id }}/down"
                                                        data-bs-toggle="tooltip" class="aktivitas-up text-success"
                                                        data-id="{{ $aktivitas->id }}" data-bs-title="Turunkan Urutan"><i
                                                            data-feather="arrow-up"></i></a>
                                                @endif
                                                @if ($aktivitas->urutan < $total_aktivitas)
                                                    <a href="/admin/kelas/{{ $topik->kelas_id }}/jadwal/{{ $topik->jadwal_id }}/topik/{{ $topik->id }}/aktivitas/{{ $aktivitas->id }}/upper"
                                                        data-bs-toggle="tooltip" class="aktivitas-down text-success"
                                                        data-id="{{ $aktivitas->id }}" data-bs-title="Turunkan Urutan"><i
                                                            data-feather="arrow-down"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>

                            <div class="button-group mt-5">
                                <a href="/admin/kelas/{{ $topik->kelas_id }}/jadwal/{{ $topik->jadwal_id }}/topik/{{ $topik->id }}/aktivitas/create"
                                    class="btn btn-sm btn-outline-primer"> <i data-feather="plus"></i> Tambah Aktivitas</a>
                                <a href="/admin/kelas/{{ $topik->kelas_id }}/jadwal/{{ $topik->jadwal_id }}/topik/{{ $topik->id }}/aktivitas/copy"
                                    class="btn btn-sm btn-outline-secondary" target="COPY_AKTIVITAS"> <i
                                        data-feather="copy"></i>
                                    Salin Aktivitas</a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <button class="btn btn-sm btn-primer btn-rounded-3 mt-5" id="add-topik"> <i data-feather="plus-circle"></i>
            Tambah Baru</button>
        <div id="new-topik" class="new-topik mt-2 rounded-4 d-flex flex-column p-3 border rounded-4">
            <div class="mt-2 wrapper-topik-content d-flex flex-column gap-3">
                <div class="wrapper-nama-topik">
                    <label class=" fw-semibold">Nama Topik</label>
                    <input class="form-control" aria-label="With textarea" name="nama_topik" id="nama_topik">
                </div>
                <div class="wrapper-durasi">
                    <label class=" fw-semibold">Durasi Topik</label>
                    <input class="form-control" aria-label="With textarea" name="durasi" id="durasi">
                </div>
            </div>
            <div class="mt-2">
                <button type="button" class="btn btn-sm btn-primer" id="btn-create-topik">Simpan</button>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script>
        $(document).ready(function() {
            $(`#btn-group-${@json($btn_group)}`).removeClass('btn-outline-primer').addClass(
                'btn-primer');


            $(document).on('click', '#add-topik', function() {
                $('#new-topik').toggleClass('d-none')
            })

            $(document).on('click', '.topik-header', function() {
                const id = $(this).data('id');
                console.log({
                    id
                });
                $(`.topik-${id}`).toggleClass('d-none')


            })

            // Store new topik
            $(document).on('click', '#btn-create-topik', function() {
                const nama_topik = $('#nama_topik').val();
                const durasi = $('#durasi').val();

                fetch(`/admin/kelas/${@json($kelas_id)}/jadwal/${@json($jadwal->id)}/topik/create`, {
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': @json(csrf_token())
                    },
                    body: JSON.stringify({
                        nama_topik: nama_topik,
                        durasi: durasi
                    })
                }).then(res => {
                    $(`.wrapper-nama-topik>p`).remove()
                    $(`.wrapper-durasi>p`).remove()


                    if (res.status === 400) {
                        return res.json().then(e => {
                            console.log(
                                e.errors.nama_topik
                            );
                            if (e.errors.nama_topik) {
                                $(`.wrapper-nama-topik`).append(
                                    `<p class="text-danger">${e.errors.nama_topik}</p>`)
                            }
                            if (e.errors.durasi) {
                                $(`.wrapper-durasi`).append(
                                    `<p class="text-danger">${e.errors.durasi}</p>`)
                            }

                            throw new Error(e.errors);
                        })
                    }

                    return res.json()
                }).then(d => {
                    location.reload()

                })


            })




            // Update topik
            $(document).on('click', '.btn-edit-topik', function() {
                const id = $(this).data('id')
                const nama_topik = $(`.topik-header-${id} .nama_topik`).val();
                const durasi = $(`.topik-header-${id} .durasi`).val();

                fetch(`/admin/kelas/${@json($kelas_id)}/jadwal/${@json($jadwal->id)}/topik/${id}/edit`, {
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': @json(csrf_token())
                    },
                    body: JSON.stringify({
                        nama_topik: nama_topik,
                        durasi: durasi
                    })
                }).then(res => {


                    if (res.status === 400) {
                        return res.json().then(e => {
                            const showError = () => {
                                Swal.fire({
                                    icon: "error",
                                    title: `${e.errors.nama_topik ?? ''}
                                    ${e.errors.durasi ?? ''}
                                    `,
                                });
                            }
                            showError()
                            throw new Error(e.errors);
                        })
                    }

                    return res.json()
                }).then(d => {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil Mengubah Data!",
                    });

                })


            })


            $(document).on('click', '.topik-up', function() {
                const id = $(this).data('id')

                fetch(`/admin/kelas/${@json($kelas_id)}/jadwal/${@json($jadwal->id)}/topik/${id}/up`, {
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': @json(csrf_token())
                    },
                }).then(res => {
                    if (!res.ok) {
                        throw new Error("gagal");
                    }

                    return res.json()
                }).then(d => {
                    location.reload()

                }).catch(e => {
                    console.error(e);

                })

            })
            $(document).on('click', '.topik-down', function() {
                const id = $(this).data('id')

                fetch(`/admin/kelas/${@json($kelas_id)}/jadwal/${@json($jadwal->id)}/topik/${id}/down`, {
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': @json(csrf_token())
                    },
                }).then(res => {
                    if (!res.ok) {
                        throw new Error("gagal");
                    }

                    return res.json()
                }).then(d => {
                    location.reload()

                }).catch(e => {
                    console.error(e);

                })

            })

        });
    </script>
@endpush
