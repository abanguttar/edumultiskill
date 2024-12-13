@extends('admin/main')

@section('body')
    <section id="section-faq">
        <a href="/admin/faq/create" class="btn btn-success btn-sm" id="btn-create"><i data-feather="plus"></i>
            Tambah</a>
        <button type="button" class="btn btn-primary btn-sm" id="btn-edit"><i data-feather="edit"></i>
            Edit</button>
        @if (Auth::user()->tipe_user === 99)
            <button type="button" class="btn btn-danger btn-sm" id="btn-delete"><i data-feather="trash-2"></i>
                Hapus</button>
        @endif
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered table-hover table-striped table-sm mt-2">
                <thead class="text-center table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Update By</th>
                        <th>Update Date</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($faqs as $key => $faq)
                        <tr class="table-row" data-id="/admin/faq/{{ $faq->id }}">
                            <td>{{ ++$key }}</td>
                            <td>{{ $faq->title }}</td>
                            <td>{{ $faq->user->name }}</td>
                            <td>{{ $faq->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
