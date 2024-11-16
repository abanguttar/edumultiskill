@extends('admin/main')

@section('body')
    <div class="container border p-4 mt-5 w-75">
        <form action="/admin/kelas/kategori/create" method="POST" enctype="multipart/form-data">
            @csrf

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
                        <input type="text" class="form-control" name="nama_kategori" value="{{ old('nama_kategori') }}"
                            maxlength="25">
                        <small class="text-muted">Maksimal 25 karakter</small>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class="fw-bold">Icon Kategori <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="file" class="form-control" id="icon_kategori" name="icon_kategori" accept="image/*">
                        </div>
                        <small class="text-muted">Format: PNG, JPG, JPEG. Maksimal 2MB</small>
                        
                        <div class="mt-2">
                            <img id="preview_icon" src="#" alt="Preview Icon" class="mt-2 img-thumbnail" style="max-width: 100px; display: none;">
                        </div>
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
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#preview_icon")
                            .attr("src", event.target.result)
                            .css("display", "block");
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush