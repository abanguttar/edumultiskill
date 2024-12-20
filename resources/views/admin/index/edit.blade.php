@extends('admin/main')

@section('body')
    <div class="container border p-4 mt-5 w-75">

        <form action="" method="POST" enctype="multipart/form-data">
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
                        <label class=" fw-bold">Username <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="username"
                            value="{{ old('username', $user->username) }}" readonly>
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
                        <label class=" fw-bold">Jenis</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <select name="tipe_user" class="form-control" id="tipe_user">
                            <option value="1">Admin</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Status Aktif</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <select id="is_active" name="is_active" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
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
            const is_active = @json($user->is_active);
            $("#is_active").val(is_active);
        })
    </script>
@endpush
