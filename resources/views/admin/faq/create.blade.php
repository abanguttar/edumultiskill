@extends('admin/main')

@section('body')
    <div class="container border p-4 mt-3 w-100 w-md-75 mb-5">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Judul FAQ</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <hr>
                @include('components/submit-button')
            </div>

        </form>

    </div>
@endsection
