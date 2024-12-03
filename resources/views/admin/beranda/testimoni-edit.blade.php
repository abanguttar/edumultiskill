@extends('admin/main')

@push('link')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- Tag input library --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" /> --}}
@endpush
@section('body')
    <div class="container border p-4 mt-3 w-100 w-md-75 mb-5">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Nama</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="nama" class="form-control"
                            value="{{ old('nama', $testimoni->nama) }}">
                    </div>
                    @error('nama')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Nama Kelas</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="kelas" class="form-control"
                            value="{{ old('kelas', $testimoni->kelas) }}">
                    </div>
                    @error('kelas')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Profesi</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="profesi" class="form-control"
                            value="{{ old('profesi', $testimoni->profesi) }}">
                    </div>
                    @error('profesi')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Ulasan</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <textarea name="ulasan" id="ulasan" class="form-control" cols="30" rows="10">{{ old('ulasan', $testimoni->ulasan) }}</textarea>
                    </div>
                    @error('ulasan')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row  bg-danger p-4">
                    <div class="col-md-3 col-sm-12"><label class=" text-white fw-bold">File Image <br>
                            <span class="fw-light" style="font-size: 12px">File hanya berekstensi jpg,png max:
                                2MB</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12"><input type="file" class="form-control" name="image">
                        @if (!empty($testimoni->image))
                            <a class="text-white d-inline-flex mt-1" style="text-decoration: none"
                                href="/assets/{{ $testimoni->image }}" target="__blank"><i class="me-1"
                                    data-feather="image"></i> Lihat
                                file</a>
                        @endif
                        @error('image')
                            <p class="text-white">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="text" name="old_image" value="{{ $testimoni->image }}" hidden>

                </div>


                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Urutan</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="urutan" class="form-control" inputmode="numeric"
                            value="{{ old('urutan', $testimoni->urutan) }}">
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
