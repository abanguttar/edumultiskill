@extends('admin/main')

@section('body')
    <div class="container border p-4 mt-3 w-100 w-md-75 mb-5">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <div class="row  bg-danger p-4">
                    <div class="col-md-3 col-sm-12"><label class=" text-white fw-bold">File Logo <br>
                            <span class="fw-light" style="font-size: 12px">File hanya berekstensi jpg,png max:
                                2MB</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12"><input type="file" class="form-control" name="logo">
                        @error('logo')
                            <p class="text-white">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Nama Partner</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Urutan</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="urutan" class="form-control" inputmode="numeric"
                            value="{{ old('urutan') }}">
                    </div>
                    @error('urutan')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <hr>
                @include('components/submit-button')
            </div>

        </form>

    </div>
@endsection
