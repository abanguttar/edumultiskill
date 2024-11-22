@extends('admin/main')

@push('link')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('body')
    <div class="container-fluid p-4 mt-3 mb-5">
        @include('components/button-group-create-kelas')

        <div>
            <div class="row mb-4">
                <div class="col-md-3 col-sm-12"> <label class="fw-bold">Judul Kelas</label></div>

                <div class="col-md-9 col-sm-12">
                    <div class="input-group">
                        <input type="text" name="judul_kelas" class="form-control"
                            value="{{ old('judul_kelas', $kelas->judul_kelas) }}" id="judul_kelas"
                            aria-describedby="basic-addon2" disabled>
                        <span class="input-group-text" id="basic-addon2">
                            <span id="limit-judul-kelas"></span>
                            {{ 110 - (int) strlen($kelas->judul_kelas) }}/110

                        </span>
                    </div>
                </div>
            </div>


            <!-- Button Group -->
            <div class="mt-3">
                <button type="button" class="btn btn-primary btn-sm" id="btn-editj">
                    <i class="feather-16" data-feather="edit"></i> Edit
                </button>
                <button type="button" class="btn btn-info btn-sm text-white" id="btn-archive">
                    <i class="feather-16" data-feather="archive"></i> Tampilkan
                </button>
                <button type="button" class="btn btn-danger btn-sm" id="btn-delete">
                    <i class="feather-16" data-feather="trash-2"></i> Hapus
                </button>
            </div>

            <!-- Daftar Jadwal -->
            <div class="table-responsive mt-3">
                <table id="myTable" class="table table-bordered table-hover table-striped table-sm">
                    <thead class="text-center table-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Jadwal</th>
                            <th>Kode Jadwal</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Waktu Pelaksanaan</th>
                            <th>Status</th>
                            <th>Update By</th>
                            <th>Update Date</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        @if(isset($kelas->JadwalPelatihans) && count($kelas->JadwalPelatihans) > 0)
                            @foreach($kelas->JadwalPelatihans as $key => $j)
                                @if($j->diarsipkan == 1)
                                    <tr class="table-row text-center" data-id="{{ $j->id }}">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $j->judul_jadwal_pelatihan }}</td>
                                        <td>{{ $j->schedule_code }}</td>
                                        <td>{{ $j->tanggal_mulai->format('d/m/Y') }} - {{ $j->tanggal_selesai->format('d/m/Y') }}</td>
                                        <td>{{ $j->waktu_pelaksanaan }}</td>
                                        <td>{{ $j->status }}</td>
                                        <td>@if($j->update_by && $j->updater)
                                            {{ $j->updater->username }}
                                        @elseif($j->create_by && $j->creator)
                                            {{ $j->creator->username }}
                                        @endif</td>
                                        <td>{{ $j->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Bottom Buttons -->

            <div class="mt-3">
                <a type="button" class="btn btn-secondary" href="{{ route('view-jadwal', $kelas_id) }}"> 
                    <i class="feather-16" data-feather='x-square'></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <style>
        .table-row {
            cursor: pointer;
        }
        .selected {
            background-color: #e2e6ea !important;
        }
    </style>
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            // DataTable initialization
            var table = $('#myTable').DataTable({
                "pageLength": 10,
                "ordering": true,
                "info": true,
                "responsive": true,
                "language": {
                    "search": "Pencarian:",
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data tersedia",
                    "infoFiltered": "(difilter dari _MAX_ total data)",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });

            // Row selection
            $('#myTable tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });

            // Edit button functionality
            $('#btn-editj').click(function() {
                var selectedRow = table.row('.selected');
                if (selectedRow.any()) {
                    var jadwalId = $(selectedRow.node()).data('id');
                    var kelasId = {{ $kelas->id }};
                    window.location.href = `/admin/kelas/${kelasId}/jadwal/${jadwalId}/edit`;
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan',
                        text: 'Silakan pilih jadwal yang akan diedit'
                    });
                }
            });

            // Archive button functionality
            $('#btn-archive').click(function() {
                var selectedRow = table.row('.selected');
                if (selectedRow.any()) {
                    var jadwalId = $(selectedRow.node()).data('id');
                    var kelasId = {{ $kelas->id }};
                    Swal.fire({
                        title: 'Konfirmasi Tampil',
                        text: "Apakah anda yakin ingin menampilkan jadwal ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Tampilkan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('arsip-jadwal', ['id' => ':kelasId', 'jadwal_id' => ':jadwalId']) }}".replace(':kelasId', kelasId).replace(':jadwalId', jadwalId),
                                type: 'POST',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "_method": "PUT"
                                },
                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Jadwal berhasil ditampilkan'
                                    }).then(() => {
                                        location.reload();
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error:', error);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Terjadi kesalahan saat menampilkan jadwal: ' + error
                                    });
                                }
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan',
                        text: 'Silakan pilih jadwal yang akan ditampilkan'
                    });
                }
            });

            $('#btn-delete').click(function() {
                var selectedRow = table.row('.selected');
                if (selectedRow.any()) {
                    var jadwalId = $(selectedRow.node()).data('id');
                    var kelasId = {{ $kelas->id }};
                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        text: "Apakah anda yakin ingin menghapus jadwal ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('destroy-jadwal', ['id' => ':kelasId', 'jadwal_id' => ':jadwalId']) }}".replace(':kelasId', kelasId).replace(':jadwalId', jadwalId),
                                type: 'POST',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "_method": "DELETE"
                                },
                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Jadwal berhasil dihapus'
                                    }).then(() => {
                                        location.reload();
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error:', error);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Terjadi kesalahan saat menghapus jadwal: ' + error
                                    });
                                }
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan',
                        text: 'Silakan pilih jadwal yang akan dihapus'
                    });
                }
            });

            $(`#btn-group-${@json($btn_group)}`).removeClass('btn-outline-danger').addClass('btn-danger');
        });

    </script>
@endpush