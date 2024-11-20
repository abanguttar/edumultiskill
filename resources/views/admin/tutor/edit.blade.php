@extends('admin/main')

@section('body')
    <div class="container border p-4 mt-5 w-75">

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($errors->any())
                @include('components/alert-danger', ['error' => $errors])
            @endif


            <div>
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Username <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="username" value="{{ $user->username }}" disabled>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Nama <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Password <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12 d-flex">
                        <input type="password" name="password" class="form-control" id="password">
                        <i style="cursor: pointer; margin-left: -30px; margin-top: 7px" class="bi bi-eye-slash"
                            id="togglePassword"></i>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">No Hp Aktif <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Alamat <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <textarea name="address" class="form-control" cols="30" rows="10">{{ old('address', $user->address) }}</textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Linkedin <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="linkedin"
                            value="{{ old('linkedin', $user->linkedin) }}">
                    </div>
                </div>


                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Status Aktif</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <select id="is_active" name="is_active" class="form-control">
                            <option value="1" @if ($user->is_active === '1') selected @endif>Aktif</option>
                            <option value="0" @if ($user->is_active === '0') selected @endif>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <hr>
                @include('components/submit-button')
            </div>

        </form>

    </div>
@endsection
