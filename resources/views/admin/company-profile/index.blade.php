@extends('admin/main')

@section('body')
    {{-- <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-hover table-striped table-sm mt-2">
            <thead class="text-center table-dark">
                <tr>
                    <th>No</th>
                    <th>Link</th>
                    <th>Update By</th>
                    <th>Update Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach ($links as $link)
                    <tr>
                        <td>1</td>
                        <td><input type="text" class="form-control" value="{{ $link->url }}" name="link" id="link">
                        </td>
                        <td>{{ $link->name }}</td>
                        <td>{{ $link->updated_at }}</td>
                        <td><button type="button" class="btn btn-primary btn-sm" id="edit-link"><i data-feather="edit"></i>
                                Edit</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    <section id="section-gallery" class="mt-5">
        <h4 class="text-center">Gallery</h4>
        <a href="/admin/company-profile/gallery/create" class="btn btn-success btn-sm" id="btn-create"><i
                data-feather="plus"></i>
            Tambah</a>
        <button type="button" class="btn btn-primary btn-sm" id="btn-edit"><i data-feather="edit"></i>
            Edit</button>
        @if (Auth::user()->tipe_user === 99)
            <button type="button" class="btn btn-danger btn-sm" id="btn-delete"><i data-feather="trash-2"></i>
                Hapus</button>
        @endif
        <div class="table-responsive">
            <table id="myTable-2" class="table table-bordered table-hover table-striped table-sm mt-2">
                <thead class="text-center table-dark">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Update By</th>
                        <th>Update Date</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($gallery as $key => $g)
                        <tr class="table-row" data-id="/admin/company-profile/gallery/{{ $g->id }}">
                            <td>{{ ++$key }}</td>
                            <td> <a class="d-flex justify-content-center text-danger" style="text-decoration: none"
                                    href="/gallery/{{ $g->image }}" target="__blank"><i class="me-1"
                                        data-feather="image"></i> Lihat
                                    file</a></td>
                            <td>{{ $g->name }}</td>
                            <td>{{ $g->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <section id="section-image-sarana" class="mt-5 pt-5">
        <h4 class="text-center">Sarana Gallery</h4>
        <a href="/admin/company-profile/image-sarana/create" class="btn btn-success btn-sm" id="btn-create"><i
                data-feather="plus"></i>
            Tambah</a>
        <button type="button" class="btn btn-primary btn-sm" id="btn-edit"><i data-feather="edit"></i>
            Edit</button>
        @if (Auth::user()->tipe_user === 99)
            <button type="button" class="btn btn-danger btn-sm" id="btn-delete"><i data-feather="trash-2"></i>
                Hapus</button>
        @endif
        <div class="table-responsive">
            <table id="myTable-2" class="table table-bordered table-hover table-striped table-sm mt-2">
                <thead class="text-center table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Update By</th>
                        <th>Update Date</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($image_saranas as $key => $image_sarana)
                        <tr class="table-row" data-id="/admin/company-profile/image-sarana/{{ $image_sarana->id }}">
                            <td>{{ ++$key }}</td>
                            <td>{{ $image_sarana->title }}</td>
                            <td> <a class="d-flex justify-content-center text-danger" style="text-decoration: none"
                                    href="/image-sarana/{{ $image_sarana->image }}" target="__blank"><i class="me-1"
                                        data-feather="image"></i> Lihat
                                    file</a></td>
                            <td>{{ $image_sarana->name }}</td>
                            <td>{{ $image_sarana->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <section id="section-sarana-prasarana" class="mt-5 pt-5">
        <h4 class="text-center">Sarana Prasarana</h4>
        <a href="/admin/company-profile/sarana-prasarana/create" class="btn btn-success btn-sm" id="btn-create"><i
                data-feather="plus"></i>
            Tambah</a>
        <button type="button" class="btn btn-primary btn-sm" id="btn-edit"><i data-feather="edit"></i>
            Edit</button>
        @if (Auth::user()->tipe_user === 99)
            <button type="button" class="btn btn-danger btn-sm" id="btn-delete"><i data-feather="trash-2"></i>
                Hapus</button>
        @endif
        <div class="table-responsive">
            <table id="myTable-2" class="table table-bordered table-hover table-striped table-sm mt-2">
                <thead class="text-center table-dark">
                    <tr>
                        <th>No</th>
                        <th>Group</th>
                        <th>Nama Fasilitas</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Status</th>
                        <th>Update By</th>
                        <th>Update Date</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($sarana_prasaranas as $key => $sarana_prasarana)

                        <tr class="table-row"
                            data-id="/admin/company-profile/sarana-prasarana/{{ $sarana_prasarana->id }}">
                            <td>{{ ++$key }}</td>
                            <td>{{ $sarana_prasarana->group }}</td>
                            <td>{{ $sarana_prasarana->name }}</td>
                            <td>{{ $sarana_prasarana->qty }}</td>
                            <td>{{ $sarana_prasarana->condition }}</td>
                            <td>{{ $sarana_prasarana->status }}</td>
                            <td>{{ $sarana_prasarana->update_name }}</td>
                            <td>{{ $sarana_prasarana->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

@push('script')
@endpush
