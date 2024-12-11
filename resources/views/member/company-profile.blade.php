@extends('member/main')

@push('link')
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
@endpush
@push('style')
    <style>
        #text-kelas-terbaik {
            color: var(--primary1)
        }



        .container-text-hero {
            position: absolute;
            left: 10%;
            top: 20%;
        }

        element.style {
            margin-right: 0px !important;
            padding: 0 !important;
        }

        .table-primer-2 {
            --bs-table-color: #fff;
            --bs-table-bg: var(--primary2);
            --bs-table-border-color: var(--primary2);
            --bs-table-striped-bg: var(--primary2);
            --bs-table-striped-color: #fff;
            --bs-table-active-bg: var(--primary2);
            --bs-table-active-color: #fff;
            --bs-table-hover-bg: var(--primary2);
            --bs-table-hover-color: #fff;
            color: var(--primary2);
            border-color: var(--primary2);
        }

        .header-visi-misi {
            background-color: var(--primary2);
        }

        .splide__pagination {
            display: none !important;
        }


        @media only screen and (max-width: 912px) {

            #section-hero {
                background-image: url('/main-assets/hero-background.webp');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            .container-text-hero {
                display: none;
            }

            .d-show-912 {
                display: block !important;
            }

            .d-none-912 {
                display: none;
            }
        }
    </style>
@endpush
@section('body')
    <section id="section-hero" class="m-0 p-0">
        <div class="container-fluid p-0 m-0 position-relative d-flex flex-column justify-content-center  align-items-center">
            <figure>
                <img src="/main-assets/image-1.webp" class="d-none d-show-912" height="300px" width="auto" alt="hero-single">
            </figure>
            <figure>
                <img src="/main-assets/hero-image.webp" class="d-none-912" id="hero-bg" width="100%" height="100%"
                    alt="">
            </figure>
            <div class="container-text-hero col-6">
                <h2 class="montserrat-600 fw-bold d-flex gap-2 flex-column">
                    <span>
                        Mengenal Kami
                        <span class="position-relative" id="text-kelas-terbaik">Lebih Dalam! <img
                                src="/main-assets/circle.webp" class="position-absolute" style="top: -35%; left: -5%;"
                                width="250px" alt="circle">
                        </span>
                    </span>
                </h2>
                <p class="fs-5">Yayasan EMA (Edukasi Multi Anugerah) didirikan sebagai <span class="fw-bold">respons
                        terhadap meningkatnya angka pengangguran dan kebutuhan
                        masyarakat untuk meningkatkan keterampilan agar mampu
                        bersaing di pasar kerja.</span> Yayasan ini lahir dari keinginan sekelompok
                    individu peduli untuk memberikan solusi nyata melalui pelatihan
                    relevan dan berkualitas tinggi.</p>
                <p class="fs-5">Awalnya fokus pada tata busana dan tata boga, Yayasan EMA terus
                    berkembang dengan menambahkan program di bidang Teknologi
                    Informasi, Bisnis Manajemen, Keselamatan, dan Kesehatan Kerja (K3),
                    serta Kewirausahaan. Semua program dirancang bersama para ahli
                    industri dan akademisi untuk memastikan relevansi dan keberlanjutan
                    menghadapi tantangan dunia kerja.</p>
                <div class="d-flex gap-3">
                    <button type="button" class="btn btn-primary-2 rounded-5">
                        <h6 class="m-0 p-0 mt-1">Didirikan Tahun: 2015</h6>
                    </button>
                    <button type="button" class="btn btn-primary-2 rounded-5">
                        <h6 class="m-0 p-0 mt-1">Tempat Didirikan: Bontang</h6>
                    </button>
                </div>
            </div>

            <div class="d-flex flex-column align-items-center  container-md mb-5 d-show-912 d-none">
                <h2 class="montserrat-600 fw-bold d-flex gap-2 flex-column">Maksimalkan Potensi <br>
                    <span>dan Temukan <span id="text-kelas-terbaik">Kelas Terbaik</span> <br>
                    </span>
                    <span>
                        <i>untuk</i>
                        <span class="position-relative">Masa Depan! <img src="/main-assets/circle.webp"
                                class="position-absolute" style="top: -30%; left: -5%;" width="210px" alt="circle">
                        </span>
                    </span>
                </h2>
                <p class="fs-5">Yayasan EMA (Edukasi Multi Anugerah) didirikan sebagai <span class="fw-bold">respons
                        terhadap meningkatnya angka pengangguran dan kebutuhan
                        masyarakat untuk meningkatkan keterampilan agar mampu
                        bersaing di pasar kerja.</span> Yayasan ini lahir dari keinginan sekelompok
                    individu peduli untuk memberikan solusi nyata melalui pelatihan
                    relevan dan berkualitas tinggi.</p>
                <p class="fs-5">Awalnya fokus pada tata busana dan tata boga, Yayasan EMA terus
                    berkembang dengan menambahkan program di bidang Teknologi
                    Informasi, Bisnis Manajemen, Keselamatan, dan Kesehatan Kerja (K3),
                    serta Kewirausahaan. Semua program dirancang bersama para ahli
                    industri dan akademisi untuk memastikan relevansi dan keberlanjutan
                    menghadapi tantangan dunia kerja.</p>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-primary-2 rounded-5">
                        <h6 class="m-0 p-0 mt-1">Didirikan Tahun: 2015</h6>
                    </button>
                    <button type="button" class="btn btn-primary-2 rounded-5">
                        <h6 class="m-0 p-0 mt-1">Tempat Didirikan: Bontang</h6>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section id="visi-misi" class="mt-10 pt-10">
        <div class="container-xl d-flex flex-column flex-lg-row gap-4">
            <div>
                <div class="header-visi-misi rounded-4">
                    <h2 class="text-center text-white">Visi</h2>
                </div>
                <div class="border-3 rounded-bottom-4 p-3 desc-visi-misi border-bottom border-start border-end text-center">
                    Menjadi Yayasan Unggul untuk Peningkatan Sumber
                    Daya Manusia dalam Menciptakan Masyarakat yang
                    Berkualitas dan Berdaya Saing Global
                </div>
            </div>
            <div>
                <div class="header-visi-misi rounded-4">
                    <h2 class="text-center text-white">Misi</h2>
                </div>
                @php
                    $misies = [
                        'Peningkatan Akses Pendidikan Berkualitas',
                        'Pengembangan Program Pelatihan dan Pengembangan SDM',
                        'Kemitraan Strategis dengan Sektor Industri',
                        'Pengembangan Kurikulum yang Relevan',
                        'Pemberdayaan Komunitas Lokal',
                        'Penelitian dan Inovasi',
                        'Pengukuran dan Evaluasi Berkelanjutan',
                    ];
                @endphp
                <div class="border-3 rounded-bottom-4 p-3 desc-visi-misi border-bottom border-start border-end text-center">
                    @foreach ($misies as $key => $misi)
                        <p class="dropdown-item  {{ $key < 6 ? 'pb-2 border-bottom border-2' : '' }} montserrat-600 text-wrap"
                            style="font-size: 14px">{{ $misi }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section id="struktur-organisasi" class="mt-10">
        <div class="container-fluid d-flex flex-column">
            <h3 class="text-center fw-bold ">Struktur <span class="text-kelas-terbaik">Organisasi</span>
            </h3>
            <img src="" alt="">
        </div>
    </section>
    <section id="instruktur" class="mt-10">
        <div class="container-fluid d-flex flex-column">
            <h3 class="text-center fw-bold mb-5">Para Instruktur <span class="text-kelas-terbaik">Berbakat</span>
            </h3>
            @include('components/scrollable-box-instruktur')
        </div>
    </section>
    <section id="sarana-prasarana" class="mt-10">
        <div class="container d-flex flex-column">
            <h3 class="text-center fw-bold ">Sarana & <span class="text-kelas-terbaik">Prasarana</span>
            </h3>

            {{-- <div class="container mt-5 overflow-x-scroll d-flex flex-nowrap scroller   mt-3" style="height: 300px">


            </div> --}}
            @include('components/carousel-image-sarana', ['image_saranas' => $image_saranas])
            <div class="container-xl overflow-y-scroll scroller mt-3" style="max-height: 600px">

                <div class="">
                    <table class="table table-hover table-borderless">
                        <thead class="fs-5 table-primer-2">
                            <tr class="text-white">
                                <th class="border-0">Nama Fasilitas</th>
                                <th class="border-0">Kondisi</th>
                                <th class="border-0">Jumlah</th>
                                <th class="border-0">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 3; $i++)
                                @foreach ($sarana_prasaranas as $sarana_prasarana)
                                    <tr class="fw-semibold fs-6">
                                        <td><span class="text-primer2">{{ $sarana_prasarana->name }}</span></td>
                                        <td><span class="text-primer2">{{ $sarana_prasarana->condition }}</span></td>
                                        <td><span class="text-primer2">{{ $sarana_prasarana->qty }}</span></td>
                                        <td><span class="text-primer2">{{ $sarana_prasarana->status }}</span></td>
                                    </tr>
                                @endforeach
                            @endfor
                        </tbody>
                    </table>
                </div>

            </div>
    </section>
    <section id="galeri" class="mt-10">
        <div class="container-fluid d-flex flex-column">
            <h3 class="text-center fw-bold ">Gallery <span class="text-kelas-terbaik">Kami</span>
            </h3>
            <div class="container gap-2 mt-5">
                <div class="row justify-content-center mt-5">
                    @foreach ($gallery as $g)
                        <figure class="col-6 col-lg-4 justify-content-center d-flex">
                            <img width="100%" height="100%" src="/gallery/{{ $g->image }}"
                                alt="{{ $g->image }}">
                        </figure>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script defer>
        document.addEventListener('DOMContentLoaded', function() {
            const splideConfigs = [{
                selector: '#carousel-image-sarana',
                config: {
                    type: 'loop',
                    lazyLoad: 'nearby',
                    focus: 'center',
                    padding: {
                        left: '7rem',
                        right: '7rem'
                    },
                    gap: '10px',
                    perMove: 1,
                    perPage: 3,
                    autoScroll: {
                        speed: 0.3
                    },
                    breakpoints: {
                        1200: {
                            perPage: 3,
                            gap: '90px',


                        },
                        1100: {
                            perPage: 2,
                            gap: '0px',


                        },
                        768: {
                            perPage: 1,
                            gap: '0px',

                        },
                        576: {
                            perPage: 1,
                            gap: '0px',
                            padding: {
                                left: '6rem',
                                right: '6rem'
                            }
                        },
                        480: {
                            perPage: 1,
                            gap: '0px',
                            padding: {
                                left: '0rem',
                                right: '0rem'
                            }
                        }
                    },
                    pagination: true,
                },
                scroll: false
            }, ];

            splideConfigs.forEach(config => {
                const splide = new Splide(config.selector, config.config);
                splide.mount(config.scroll);
            });


        });
    </script>
@endpush
