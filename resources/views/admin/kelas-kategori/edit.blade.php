@extends('admin/main')

@section('body')
    <div class="container border p-4 mt-5 w-75">
        <form action="{{ url('/admin/kelas/kategori/' . $kategori->id . '/edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div>
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <label class="fw-bold">Nama Kategori <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="nama_kategori" 
                            value="{{ old('nama_kategori', $kategori->nama_kategori) }}" maxlength="25">
                        <small class="text-muted">Maksimal 25 karakter</small>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class="fw-bold">Icon Kategori <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="icon_kategori" 
                            value="{{ old('icon_kategori', $kategori->icon_kategori) }}" maxlength="25">
                        <small class="text-muted">Maksimal 25 karakter</small>
                    </div>
                </div>

                <hr>
                @include('components/submit-button')
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            // Preview image before upload
            $("#icon_kategori").change(function() {
                const file = this.files[0];
                if (file) {
                    // Validate file size
                    const maxSize = 2 * 1024 * 1024; // 2MB
                    if (file.size > maxSize) {
                        Swal.fire({
                            icon: 'error',
                            title: 'File Terlalu Besar',
                            text: 'Ukuran file tidak boleh lebih dari 2MB'
                        });
                        this.value = '';
                        $("#preview_icon").css("display", "none");
                        return;
                    }

                    // Validate file type
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                    if (!validTypes.includes(file.type)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Format File Tidak Sesuai',
                            text: 'Format file harus PNG, JPG, atau JPEG'
                        });
                        this.value = '';
                        $("#preview_icon").css("display", "none");
                        return;
                    }

                    // Show preview
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#preview_icon")
                            .attr("src", event.target.result)
                            .css("display", "block");
                    };
                    reader.readAsDataURL(file);
                } else {
                    $("#preview_icon").css("display", "none");
                }
            });

            // Handle form submission
            $('form').on('submit', function() {
                // Disable submit button to prevent double submission
                $(this).find('button[type="submit"]').prop('disabled', true);
            });
        });
    </script>
@endpush

@push('style')
    <style>
        .img-thumbnail {
            cursor: zoom-in;
            transition: transform 0.3s ease;
        }
        .img-thumbnail:hover {
            transform: scale(2);
            z-index: 1000;
            position: relative;
        }
    </style>
@endpush