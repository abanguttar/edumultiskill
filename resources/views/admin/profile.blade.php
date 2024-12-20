@extends('admin/main')
@section('body')
    <div class="container-fluid p-0" style="height: 100vh">
        <div class="container border d-flex flex-column justify-content-center align-items-center mt-5">
            <figure class="mt-3">
                <img class="rounded-4 border border-1" height="200px" style="object-fit: contain"
                    src="{{ Auth::user()->foto === null ? '/main-assets/mock-image.webp' : '/user-image/' . Auth::user()->foto }}"
                    alt="{{ Auth::user()->foto }}">
            </figure>

            <div class="container-name">
                <h4>{{ Auth::user()->name }}</h4>
            </div>

            <div class="container border border-1 mt-3 p-5 d-flex justify-content-between gap-3 mb-4">
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex gap-3">
                        <span class="fw-bold">Username</span>
                        {{ Auth::user()->username }}
                    </div>
                    <div class="d-flex gap-3">
                        <span class="fw-bold">No Hp</span>
                        {{ Auth::user()->phone ?? '-' }}
                    </div>
                    <div class="d-flex gap-3">
                        <span class="fw-bold">Pekerjaan</span>
                        {{ Auth::user()->job_title ?? '-' }}
                    </div>
                    <div class="d-flex gap-3">
                        <span class="fw-bold">Linkedin</span>
                        <a href="{{ Auth::user()->linkedin }}"
                            class="text-decoration-none">{{ Auth::user()->linkedin ?? '-' }}</a>
                    </div>
                    <div class="d-flex gap-3">
                        <span class="fw-bold">Alamat</span>
                        {{ Auth::user()->address ?? '-' }}
                    </div>

                    <div class="d-flex gap-3">
                        <span class="fw-bold">Deskripsi Diri</span>
                        {!! Auth::user()->deskripsi_diri ?? '-' !!}
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <a href="/admin/profile/edit" class="btn btn-sm btn-primer rounded-3">Ubah Data</a>
                </div>


            </div>

        </div>
    </div>
@endsection
