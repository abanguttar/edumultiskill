@extends('admin/main')

@section('body')
    <div class="mt-3">
        <a href="/admin/create" class="btn btn-success btn-sm" id="btn-create"><i data-feather="plus"></i>
            Tambah</a>
        <button type="button" class="btn btn-primary btn-sm" id="btn-access"><i data-feather="user-plus"></i>
            Akses</button>
        <button type="button" class="btn btn-primary btn-sm" id="btn-edit"><i data-feather="edit"></i>
            Edit</button>
        <button type="submit" class="btn btn-info btn-sm text-white" id="btn-search"><i data-feather="search"></i>
            Cari</button>
    </div>

    <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-hover table-striped table-sm mt-2">
            <thead class="text-center table-dark">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Update By</th>
                    <th>Update Date</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach ($users as $key => $d)
                    <tr class="table-row text-center" data-id='/admin/{{ $d->id }}'>
                        <td>{{ ++$key }}</td>
                        <td>{{ $d->username }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td class="updated">{{ $d->updated_name[0]->name }}</td>
                        <td>{{ $d->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
