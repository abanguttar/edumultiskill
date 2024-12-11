@extends('admin/main')

@section('body')
    <div class="container border p-4 mt-3 w-100 w-md-75 mb-5">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Judul</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $image_sarana->title) }}">
                    </div>
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row mt-2 bg-danger p-4">
                    <div class="col-md-3 col-sm-12"><label class=" text-white fw-bold">File Image <br>
                            <span class="fw-light" style="font-size: 12px">File hanya berekstensi jpg,png max:
                                2MB</span></label>
                    </div>

                    <div class="col-md-9 col-sm-12"><input type="file" class="form-control" name="image">
                        @if (!empty($image_sarana->image))
                            <a class="text-white d-inline-flex mt-1" style="text-decoration: none"
                                href="/image-sarana/{{ $image_sarana->image }}" target="__blank"><i class="me-1"
                                    data-feather="image"></i> Lihat
                                file</a>
                        @endif
                        @error('image')
                            <p class="text-white">{{ $message }}</p>
                        @enderror
                        <input type="text" name="old_image" value="{{ $image_sarana->image }}" hidden>
                    </div>
                </div>
                <hr>
                @include('components/submit-button')
            </div>

        </form>

    </div>
@endsection
