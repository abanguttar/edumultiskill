@extends('admin/main')

@section('body')
    <div class="container border p-4 mt-3 w-100 w-md-75 mb-5">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div class="row  bg-danger p-4">
                    <div class="col-md-3 col-sm-12"><label class=" text-white fw-bold">File Image Dekstop <br>
                            <span class="fw-light" style="font-size: 12px">File hanya berekstensi jpg,png max:
                                2MB</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12"><input type="file" class="form-control" name="dekstop">
                        @if (!empty($banner->dekstop))
                            <a class="text-white d-inline-flex mt-1" style="text-decoration: none"
                                href="/assets/{{ $banner->dekstop }}" target="__blank"><i class="me-1"
                                    data-feather="image"></i> Lihat
                                file</a>
                        @endif
                        @error('dekstop')
                            <p class="text-white">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="text" name="old_dekstop" value="{{ $banner->dekstop }}" hidden>
                </div>
                <div class="row mt-2 bg-danger p-4">
                    <div class="col-md-3 col-sm-12"><label class=" text-white fw-bold">File Image Mobile <br>
                            <span class="fw-light" style="font-size: 12px">File hanya berekstensi jpg,png max:
                                2MB</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12"><input type="file" class="form-control" name="mobile">
                        @if (!empty($banner->mobile))
                            <a class="text-white d-inline-flex mt-1" style="text-decoration: none"
                                href="/assets/{{ $banner->mobile }}" target="__blank"><i class="me-1"
                                    data-feather="image"></i> Lihat
                                file</a>
                        @endif
                        @error('mobile')
                            <p class="text-white">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="text" name="old_mobile" value="{{ $banner->mobile }}" hidden>
                </div>


                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Urutan</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="urutan" class="form-control" inputmode="numeric"
                            value="{{ old('urutan', $banner->urutan) }}">
                    </div>
                    @error('urutan')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Link</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="link" class="form-control" value="{{ old('link', $banner->link) }}">
                    </div>
                </div>

                <hr>
                @include('components/submit-button')
            </div>

        </form>

    </div>
@endsection