<ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
        <button id="sidebarToggleBtn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample" class="btn btn-danger mt-2 mx-2"><i data-feather="menu"></i></button>

        <div class="offcanvas offcanvas-start" style="max-width: 300px!important;" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header ">
                <h5 class="offcanvas-title text-center" id="offcanvasExampleLabel">Edu Multi Skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="accordion" id="accordionSidebar">
                    <div class="accordion-item mb-1">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#cms" aria-expanded="false" aria-controls="cms">
                                <i data-feather="grid"></i><span class="mx-2">CMS</span>
                            </button>
                        </h2>
                        <div id="cms" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <a class="nav-link text-dark" data-nav='beranda' href="/admin/beranda">Beranda</a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-1">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#lms" aria-expanded="false" aria-controls="lms">
                                <i data-feather="grid"></i><span class="mx-2">LMS</span>
                            </button>
                        </h2>
                        <div id="lms" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <a class="nav-link text-dark" data-nav='kelas-kategori'
                                    href="/admin/kelas/kategori">Kategori
                                    Kelas</a>
                                <a class="nav-link text-dark mt-2" data-nav='kelas' href="/admin/kelas">List
                                    Kelas</a>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-1">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" {{-- accordion-button adalah icon panah, jika class collapsed ditambahkan maka akan memutar 180 derajat --}} type="button"
                                data-bs-toggle="collapse" data-bs-target="#data-master" aria-expanded="false"
                                aria-controls="data-master">
                                <i data-feather="grid"></i> <span class="mx-2">Data Master</span>
                            </button>
                        </h2>
                        <div id="data-master" class="accordion-collapse collapse" {{-- class show digunakan untuk menampilkan accordion item --}}>
                            <div class="accordion-body">

                                <a class="nav-link text-dark mt-2" data-nav='user-member' href="/admin/user-member">User
                                    Member</a>
                                <a class="nav-link text-dark mt-2" data-nav='list-tutor' href="/admin/list-tutor">List
                                    Tutor</a>
                                @if (Auth::user()->tipe_user === 99)
                                    <a class="nav-link text-dark mt-2" data-nav='list-admin' href="/admin/index">List
                                        Admin</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-1">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" {{-- accordion-button adalah icon panah, jika class collapsed ditambahkan maka akan memutar 180 derajat --}} type="button"
                                data-bs-toggle="collapse" data-bs-target="#user" aria-expanded="false"
                                aria-controls="user">
                                <i data-feather="user"></i> <span class="mx-2"></span> {{ Auth::user()->name }}
                            </button>

                        </h2>
                        <div id="user" class="accordion-collapse collapse" {{-- class show digunakan untuk menampilkan accordion item --}}>
                            <div class="accordion-body">
                                {{-- @if ($user->tipe_user == 3) --}}
                                <a class="nav-link text-dark" data-nav='profile' href="/admin/profile">Profile</a>
                                {{-- @endif --}}
                                <form action="/admin/logout" class="mt-2" method="POST">
                                    @csrf
                                    <button type="submit" class="nav-link text-dark" data-nav='berita-kategori'
                                        href="">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
</ul>
