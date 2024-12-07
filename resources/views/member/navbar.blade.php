<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center gap-4 gap-lg-0" href="/"><img src="/main-assets/logos.webp"
                alt="logo edu" width="80px">
            <h6 class="montserrat-600 d-lg-none">Edu Multi Skill</h6>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav  montserrat-600 mb-2 mb-lg-0">

                <li class="nav-item dropdown-program dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Program Kelas
                    </a>
                    <ul class="dropdown-menu" style="min-width: 300px!important">
                        <li><a class="dropdown-item" href="/program/prakerja">
                                <div class="d-flex gap-2 border-bottom border-2 pb-2 pt-1">
                                    <div class="border-block-mini-1"></div>
                                    <div>
                                        <h6 class="montserrat-600 fw-bold p-0 m-0">Kelas <img
                                                src="/main-assets/prakerja-logo.webp" width="100px" height="auto"
                                                alt="prakerja logo">
                                        </h6>
                                        <p class="m-0 p-0 text-wrap text-justify" style="font-size: 10px">Lorem ipsum
                                            dolor sit amet
                                            consectetur adipisicing elit. Minus beatae quas magnam, ut magni at.
                                        </p>
                                    </div>
                                </div>
                            </a></li>

                        <li><a class="dropdown-item" href="/program/prakerja">
                                <div class="d-flex gap-2 border-bottom border-2 pb-2 pt-1">
                                    <div class="border-block-mini-2"></div>
                                    <div>
                                        <h6 class="montserrat-600 fw-bold p-0 m-0">Kelas Reguler
                                        </h6>
                                        <p class="m-0 p-0 text-wrap text-justify" style="font-size: 10px">Lorem ipsum
                                            dolor sit amet
                                            consectetur adipisicing elit. Minus beatae quas magnam, ut magni at.
                                        </p>
                                    </div>
                                </div>
                            </a></li>

                        <li><a class="dropdown-item" href="/program/prakerja">
                                <div class="d-flex gap-2">
                                    <div class="border-block-mini-3 pt-1"></div>
                                    <div>
                                        <h6 class="montserrat-600 fw-bold p-0 m-0">Pekerja Luar Negeri
                                        </h6>
                                        <p class="m-0 p-0 text-wrap text-justify" style="font-size: 10px">Lorem ipsum
                                            dolor sit amet
                                            consectetur adipisicing elit. Minus beatae quas magnam, ut magni at.
                                        </p>
                                    </div>
                                </div>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown-program dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        FAQ
                    </a>
                    @php
                        $faqs = [
                            'Tentang Kartu Prakerja',
                            'Akun Saya',
                            'Pendaftaran',
                            'Tes & Seleksi',
                            'Hasil Seleksi',
                            'Penyambungan Rekening/e-Money',
                            'Bantuan Biaya Pelatihan',
                            'Pelaksanaan Pelatihan',
                            'Insentif',
                        ];
                    @endphp
                    <ul class="dropdown-menu">
                        @foreach ($faqs as $key => $faq)
                            <li><a class="dropdown-item  {{ $key < 8 ? 'pb-2 border-bottom border-2' : '' }} montserrat-600 {{ Str::slug(strtolower($faq)) }}"
                                    style="font-size: 14px"
                                    href="/faq/{{ Str::slug(strtolower($faq)) }}">{{ $faq }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown-program dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Tentang Kami
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item pb-2 border-bottom border-2 montserrat-600"
                                href="/company-profile">Profile</a></li>
                        <li><a class="dropdown-item pb-2 border-bottom border-2 montserrat-600"
                                href="/company-profile#sarana-prasarana">Sarana &
                                Prasarana</a>
                        </li>
                        <li><a class="dropdown-item montserrat-600" href="/company-profile#galeri">Galeri</a></li>
                    </ul>
                </li>

            </ul>

            <div class="d-flex ms-auto gap-1 gap-md-4">
                <div class="position-relative">
                    <input type="text" class="form-control rounded-4" id="input-navbar">
                    <img src="/main-assets/search.webp" class="position-absolute w-5 top-50 end-0 ms-4 translate-middle"
                        alt="search" id="search-navbar">
                </div>
                <a href="/authenticate" class="btn btn-light rounded-4">Masuk</a>
                <a href="/daftar" class="btn btn-primary-2 rounded-4 "><span class="pe-2 ps-2">Daftar</span></a>
            </div>
        </div>
    </div>
</nav>
