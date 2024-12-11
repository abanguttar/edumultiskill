@extends('admin/main')
@push('link')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@push('style')
    <style>
        .btn-danger-2 {
            --bs-btn-active-bg: #da6c1e !important;
            --bs-btn-bg: #F58634 !important;
            --bs-btn-hover-bg: #e27c33 !important;
            --bs-btn-border-color: #944710 !important;
        }

        #new-faq-content {
            border: 2px solid #F58634;
        }

        .container-faq-content {
            border: 2px solid #414393;
        }
    </style>
@endpush
@section('body')
    <div class="container border p-4 mt-3 w-100 w-md-75 mb-5">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Judul FAQ</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="title" class="form-control" value="{{ old('title', $faq->title) }}">
                    </div>
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    @include('components/submit-button')
                </div>
                <hr>
            </div>
        </form>
        {{-- Container Buat FAQ Edited --}}
        <div class="container-fluid">
            <h5>FAQ Content</h5>


            <div class="container-lg overflow-y-scroll" style="max-height: 80vh">
                @foreach ($faq_contents as $item)
                    <div class="container-faq-content mt-2  rounded-4 d-flex flex-column p-3">
                        <div class="mt-2 wrapper-title-content-{{ $item->id }}">
                            <label class=" fw-semibold">Judul Content</label>
                            <input class="form-control title-content-{{ $item->id }}" aria-label="With textarea"
                                value="{{ $item->title_content }}">

                        </div>
                        <div class="mt-2 wrapper-content-{{ $item->id }}">
                            <label class="fw-semibold">Deskripsi Content</label>
                            <textarea class="summernote content-{{ $item->id }}" name="content" aria-label="With textarea">{{ $item->content }}</textarea>
                        </div>
                        <div class="mt-2">
                            <button type="button" class="btn btn-sm btn-primary rounded-4 btn-edit-faq-content"
                                data-id="{{ $item->id }}"><span class="m-2">Ubah</span></button>
                            <button type="button" class="btn btn-sm btn-danger rounded-4 btn-delete"
                                data-id="{{ $item->id }}"><span class="m-2">Hapus</span></button>
                        </div>
                    </div>
                @endforeach
            </div>



            {{-- Container Buat FAQ Baru --}}

            <button class="btn btn-sm btn-danger btn-danger-2 rounded-3 mt-5" id="add-faq-content"> <i
                    data-feather="plus-circle"></i>
                Tambah Baru</button>
            <div id="new-faq-content" class="new-faq-content mt-2 d-none rounded-4 d-flex flex-column p-3">
                <div class="mt-2 wrapper-title-content">
                    <label class=" fw-semibold">Judul Content</label>
                    <input class="form-control" aria-label="With textarea" name="title_content" id="title_content">

                </div>
                <div class="mt-2 wrapper-content">
                    <label class="fw-semibold">Deskripsi Content</label>
                    <textarea class="summernote" name="content" aria-label="With textarea" id="content"></textarea>
                </div>
                <div class="mt-2">
                    <button type="button" class="btn btn-sm btn-danger" id="btn-create-faq-content">Simpan</button>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();


        })
        $(document).on('click', '#add-faq-content', function() {
            $('#new-faq-content').toggleClass('d-none')
        })
        $(document).on('click', '#btn-create-faq-content', function() {
            const titleContent = $('#title_content').val();
            const content = $('#content').val();
            console.log({
                titleContent,
                content
            });

            fetch('/admin/faq/content/create', {
                method: 'POST',
                headers: {
                    'content-type': 'applications/json',
                    'X-CSRF-TOKEN': @json(csrf_token())
                },
                body: JSON.stringify({
                    title_content: titleContent,
                    content: content,
                    faq_id: @json($faq->id)
                })
            }).then(res => {
                $(`.wrapper-title-content>p`).remove()
                $(`.wrapper-content>p`).remove()
                if (res.status === 400) {

                    return res.json().then(e => {
                        if (e.errors.title_content) {
                            $(`.wrapper-title-content`).append(
                                `<p class="text-danger">${e.errors.title_content}</p>`)
                        }

                        if (e.errors.content) {
                            $(`.wrapper-content`).append(
                                `<p class="text-danger">${e.errors.content}</p>`)
                        }

                        throw new Error("Gagal!");

                    })
                }
                return res.json()
            }).then(d => {
                location.reload()
            })

        })
    </script>
    <script>
        $(document).on('click', '.btn-edit-faq-content', function() {
            const id = $(this).data('id')
            const titleContent = $(`.title-content-${id}`).val();
            const content = $(`.content-${id}`).val();

            fetch(`/admin/faq/content/${id}/edit`, {
                method: 'PUT',
                headers: {
                    'content-type': 'application/json',
                    'X-CSRF-TOKEN': @json(csrf_token())
                },
                body: JSON.stringify({
                    title_content: titleContent,
                    content: content,
                    faq_id: @json($faq->id),
                })
            }).then(res => {
                $(`.wrapper-title-content-${id}>p`).remove()
                $(`.wrapper-content-${id}>p`).remove()
                if (res.status === 400) {
                    return res.json().then(e => {
                        if (e.errors.title_content) {
                            $(`.wrapper-title-content-${id}`).append(
                                `<p class="text-danger">${e.errors.title_content}</p>`)
                        }

                        if (e.errors.content) {
                            $(`.wrapper-content-${id}`).append(
                                `<p class="text-danger">${e.errors.content}</p>`)
                        }

                        throw new Error("Gagal!");

                    })
                }
                return res.json()
            }).then(d => {

                location.reload()
            })

        })


        $(document).on('click', '.btn-delete', function() {
            const id = $(this).data('id')
            console.log({
                id
            });

            showAlertConfirm().then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire({
                    //     title: "Berhasil!",
                    //     text: "Data berhasil dihapus!",
                    //     icon: "success"
                    // });
                    fetch(`/admin/faq/content/${id}/delete`, {
                        method: 'DELETE',
                        headers: {
                            'content-type': 'application/json',
                            'X-CSRF-TOKEN': @json(csrf_token())
                        },
                        body: JSON.stringify({
                            faq_id: @json($faq->id),
                        })
                    }).then(res => {
                        if (!res.ok) {
                            throw new Error('Gagal')
                        }
                        return res.json()
                    }).then(d => {
                        location.reload()
                    })
                }
            });



        })
    </script>
@endpush
