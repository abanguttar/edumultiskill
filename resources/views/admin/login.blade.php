@extends('admin/main')
@section('body')
    <div class="container-fluid d-flex justify-content-center align-items-center p-0" style="height: 100vh">

        <div class="border border-3 rounded-4 d-flex justify-content-center align-items-center p-4">
            <form action="" method="POST">
                @csrf

                <div class="row d-flex justify-content-center">
                    <div class="col-12 border border-2 border-top-0 border-start-0 border-end-0">
                        <img width="180px" src="/logo.png" class="mb-3" alt="kitakompeten-logo">
                    </div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Username</label>
                    <input type="text" id="username" class="form-control @error('username') is-invalid  @enderror"
                        name="username" value="{{ old('username') }}">
                    @error('username')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row d-flex justify-content-center mt-3">
                    <div>
                        <label class="form-label">Password</label>
                        <div class="d-flex">
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"
                                name="password">
                            <i style="cursor: pointer; margin-left: -30px; margin-top: 7px" class="bi bi-eye-slash"
                                id="togglePassword"></i>
                        </div>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row d-flex justify-content-center mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-danger w-100">Login</button>
                    </div>
                    <div class="col-12 text-center mt-4"><span class="fw-light" style="font-size: 13px">Copyright © EduMultiSkill
                            2024</span></div>

                </div>
        </div>


        </form>
    </div>
@endsection
