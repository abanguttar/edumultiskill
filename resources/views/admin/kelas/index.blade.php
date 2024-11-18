@extends('admin/main')

@section('body')
    <div class="mt-3">
        <a href="/admin/kelas/create" class="btn btn-success btn-sm" id="btn-create"><i data-feather="plus"></i>
            Tambah</a>
        <button type="button" class="btn btn-primary btn-sm" id="edit-kelas"><i data-feather="edit"></i>
            Edit</button>
        @if (Auth::user()->tipe_user === 99)
            <button type="button" class="btn btn-danger btn-sm" id="btn-delete"><i data-feather="trash-2"></i>
                Hapus</button>
        @endif
        <button type="submit" class="btn btn-info btn-sm text-white" id="btn-search"><i data-feather="search"></i>
            Cari</button>
    </div>

    <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-hover table-striped table-sm mt-2">
            <thead class="text-center table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Kelas</th>
                    <th>Judul Kelas</th>
                    <th>Jenis</th>
                    <th>Program</th>
                    <th>Kategori Kelas</th>
                    <th>Status</th>
                    <th>Harga Reguler</th>
                    <th>Harga Diskon</th>
                    <th>Update By</th>
                    <th>Update Date</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach ($kelas as $key => $d)
                    <tr class="table-row text-center" data-id='/admin/kelas/{{ $d->id }}'>
                        <td>{{ ++$key }}</td>
                        <td>{{ $d->course_code }}</td>
                        <td>{{ $d->judul_kelas }}</td>
                        <td>{{ ucfirst($d->jenis) }}</td>
                        @php
                            $program = ['General', 'Indonesia Skill Week', 'Program 2'];
                        @endphp
                        <td class="text-center">{{ $program[$d->program] }}</td>
                        <td>{{ $d->nama_kategori }}</td>
                        <td>{{ $d->status_kelas > 3 ? ($d->status_kelas == 4 ? 'Aktif Belajar' : 'Tutup Pendaftaran') : ($d->status_kelas == 3 ? 'Aktif Pendaftaran' : ($d->status_kelas == 2 ? 'Kurasi' : 'Rencana')) }}
                        </td>
                        <td class="text-center">{{ number_format($d->harga_reguler) }}</td>
                        <td class="text-center">{{ number_format($d->harga_discount) }}</td>
                        <td class="text-center">{{ $d->user->name }}</td>
                        <td class="text-center">{{ $d->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('script')
    <script></script>
@endpush
