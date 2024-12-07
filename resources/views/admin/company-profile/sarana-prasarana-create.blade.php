@extends('admin/main')

@section('body')
    <div class="container border p-4 mt-3 w-100 w-md-75 mb-5">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Nama Fasilitas</label>
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
                        <label class=" fw-bold">Jumlah</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="qty" class="form-control" value="{{ old('qty') }}">
                    </div>
                    @error('qty')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Kondisi</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <select name="condition" class="form-control" id="condition">
                            <option value="Baik">Baik</option>
                            <option value="Tidak Baik">Tidak Baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Hilang">Hilang</option>
                        </select>
                    </div>
                    @error('condition')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Status</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <select name="status" class="form-control" id="status">
                            <option value="Milik Sendiri">Milik Sendiri</option>
                            <option value="Sewa">Sewa</option>
                        </select>
                    </div>
                    @error('status')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <hr>
                @include('components/submit-button')
            </div>

        </form>

    </div>
@endsection
