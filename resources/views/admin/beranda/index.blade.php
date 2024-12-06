@extends('admin/main')

@section('body')
    <div class="table-responsive">
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
    </div>

    <section id="section-banner">
        <h4 class="text-center">Banner</h4>
        <a href="/admin/beranda/banner/create" class="btn btn-success btn-sm" id="btn-create"><i data-feather="plus"></i>
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
                        <th>Link</th>
                        <th>Urutan</th>
                        <th>Dekstop</th>
                        <th>Mobile</th>
                        <th>Update By</th>
                        <th>Update Date</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($banners as $key => $banner)
                        <tr class="table-row" data-id="/admin/beranda/banner/{{ $banner->id }}">
                            <td>{{ ++$key }}</td>
                            <td>{{ $banner->link }}</td>
                            <td>{{ $banner->urutan }}</td>
                            <td> <a class="d-flex justify-content-center text-danger" style="text-decoration: none"
                                    href="/assets/{{ $banner->dekstop }}" target="__blank"><i class="me-1"
                                        data-feather="image"></i> Lihat
                                    file</a></td>
                            <td> <a class="d-flex justify-content-center text-danger" style="text-decoration: none"
                                    href="/assets/{{ $banner->mobile }}" target="__blank"><i class="me-1"
                                        data-feather="image"></i> Lihat
                                    file</a></td>

                            <td>{{ $banner->name }}</td>
                            <td>{{ $banner->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <section id="section-logo-mitra" class="mt-5">
        <h4 class="text-center">Logo</h4>
        <a href="/admin/beranda/logo/create" class="btn btn-success btn-sm" id="btn-create"><i data-feather="plus"></i>
            Tambah</a>
        <button type="button" class="btn btn-primary btn-sm" id="btn-edit" data-tipe="logo"><i data-feather="edit"></i>
            Edit</button>
        @if (Auth::user()->tipe_user === 99)
            <button type="button" class="btn btn-danger btn-sm btn-delete" data-tipe="logo"><i data-feather="trash-2"></i>
                Hapus</button>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped table-sm mt-2">
                <thead class="text-center table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Urutan</th>
                        <th>Logo</th>
                        <th>Update By</th>
                        <th>Update Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logos as $key => $l)
                        <tr class="table-row" data-id='/admin/beranda/logo/{{ $l->id }}'>
                            <td class="text-center">{{ ++$key }}</td>
                            <td class="text-center">{{ $l->name }}</td>
                            <td class="text-center">{{ $l->urutan }}</td>
                            <td><a class="d-flex justify-content-center" href="/assets/{{ $l->logo }}"
                                    target="__blank"><i data-feather="image"></i></a></td>
                            <td class="text-center">{{ $l->name_user }}</td>
                            <td class="text-center">{{ $l->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>
    <section id="section-logo-mitra" class="mt-5 mb-5">
        <h4 class="text-center">Testimoni</h4>
        <a href="/admin/beranda/testimoni/create" class="btn btn-success btn-sm" id="btn-create"><i data-feather="plus"></i>
            Tambah</a>
        <button type="button" class="btn btn-primary btn-sm" id="btn-edit" data-tipe="testimoni"><i
                data-feather="edit"></i>
            Edit</button>
        @if (Auth::user()->tipe_user === 99)
            <button type="button" class="btn btn-danger btn-sm btn-delete" data-tipe="testimoni"><i
                    data-feather="trash-2"></i>
                Hapus</button>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped table-sm mt-2">
                <thead class="text-center table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Profesi</th>
                        <th>Ulasan</th>
                        <th>Image</th>
                        <th>Urutan</th>
                        <th>Update By</th>
                        <th>Update Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonies as $key => $t)
                        <tr class="table-row" data-id='/admin/beranda/testimoni/{{ $t->id }}'>
                            <td class="text-center">{{ ++$key }}</td>
                            <td class="text-center">{{ $t->nama }}</td>
                            <td class="text-center">{{ $t->kelas }}</td>
                            <td class="text-center">{{ $t->profesi }}</td>
                            <td class="text-center">{{ $t->ulasan }}</td>
                            <td><a class="d-flex justify-content-center" href="/assets/{{ $t->image }}"
                                    target="__blank"><i data-feather="image"></i></a></td>
                            <td class="text-center">{{ $t->urutan }}</td>
                            <td class="text-center">{{ $t->name_user }}</td>
                            <td class="text-center">{{ $t->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>
@endsection

@push('script')
    <script>
        const successAlertBeranda = () => {
            Swal.fire({
                icon: "success",
                title: "Berhasil mengubah data!",
            });
        }

        $(document).on('click', '#edit-link', function() {
            const url = $('#link').val() ?? ''

            fetch('/admin/beranda/link/edit', {
                method: 'PUT',
                headers: {
                    'content-type': 'application/json',
                    'X-CSRF-TOKEN': @json(csrf_token())
                },
                body: JSON.stringify({
                    'url': url
                })
            }).then(res => {
                if (!res.ok) {
                    throw new Error('Gagal!')
                }

                return res.json()
            }).then(d => {
                successAlertBeranda()

            })

        })
    </script>
@endpush
