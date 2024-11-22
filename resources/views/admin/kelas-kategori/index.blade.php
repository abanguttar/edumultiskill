@extends('admin/main')
@push('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush
@section('body')
    <div class="mt-3">
        <a href="/admin/kelas/kategori/create" class="btn btn-success btn-sm" id="btn-create">
            <i data-feather="plus"></i> Tambah
        </a>
        <button type="button" class="btn btn-primary btn-sm" id="btn-editk">
            <i data-feather="edit"></i> Edit
        </button>
        <button type="button" class="btn btn-danger btn-sm" id="btn-delete">
            <i data-feather="trash-2"></i> Hapus
        </button>
        <button type="submit" class="btn btn-info btn-sm text-white" id="btn-search">
            <i data-feather="search"></i> Cari
        </button>
    </div>

    <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-hover table-striped table-sm mt-2">
            <thead class="text-center table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Icon Kategori</th>
                    <th>Update By</th>
                    <th>Update Date</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach ($kategori as $key => $k)
                    <tr class="table-row text-center" data-id="{{ $k->id }}">
                        <td>{{ ++$key }}</td>
                        <td>{{ $k->nama_kategori }}</td>
                        <td><i class="{{ $k->icon_kategori }}"></i></td>
                        <td>{{ $k->updatedBy->name }}</td>
                        <td>{{ $k->updated_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <style>
        .table-row {
            cursor: pointer;
        }

        .selected {
            background-color: #e2e6ea !important;
        }

        .img-thumbnail {
            cursor: zoom-in;
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
            $('#btn-editk').click(function() {
                var selectedRow = table.row('.selected');
                if (selectedRow.any()) {
                    var id = $(selectedRow.node()).data('id');
                    window.location.href = `/admin/kelas/kategori/${id}/edit`;
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan',
                        text: 'Silakan pilih kategori yang akan diedit'
                    });
                }
            });

            // Delete button functionality
            $('#btn-delete').click(function() {
                var selectedRow = table.row('.selected');
                if (selectedRow.any()) {
                    var id = $(selectedRow.node()).data('id');

                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        text: "Apakah Anda yakin ingin menghapus kategori ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: `/admin/kelas/kategori/${id}`,
                                type: 'DELETE',
                                data: {
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Kategori berhasil dihapus'
                                    }).then(() => {
                                        location.reload();
                                    });
                                },
                                error: function(xhr) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Terjadi kesalahan saat menghapus kategori'
                                    });
                                }
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan',
                        text: 'Silakan pilih kategori yang akan dihapus'
                    });
                }
            });

            // Image hover effect
            $('.img-thumbnail').hover(
                function() {
                    $(this).css({
                        'transform': 'scale(2.5)',
                        'transition': 'transform 0.3s ease',
                        'z-index': '1000',
                        'position': 'relative'
                    });
                },
                function() {
                    $(this).css({
                        'transform': 'scale(1)',
                        'z-index': '1',
                        'position': 'static'
                    });
                }
            );
        });
    </script>
@endpush
