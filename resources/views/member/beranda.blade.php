@extends('member/main')
@push('link')
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js">
    </script>
@endpush
@push('style')
    <style>
        #text-kelas-terbaik {
            color: var(--primary1)
        }

        .text-kelas-terbaik {
            color: var(--primary1)
        }

        .container-text-hero {
            position: absolute;
            left: 10%;
            top: 20%;
        }

        #splide-partner-kita-baris-1 img,
        #splide-partner-kita-baris-2 img {
            filter: grayscale(1);
        }

        .accordion-button:not(.collapsed) {
            color: var(--bs-accordion-active-color);
            background-color: transparent !important;
            /* box-shadow: inset 0 calc(-1 * var(--bs-accordion-border-width)) 0 var(--bs-accordion-border-color); */
        }

        .accordion {
            --bs-accordion-border-width: 0 !important;
        }

        .border-block-1 {
            width: 12px;
            height: auto;
            background-color: var(--primary3)
        }

        .border-block-2 {
            width: 12px;
            height: auto;
            background-color: var(--primary2)
        }

        .border-block-3 {
            width: 12px;
            height: auto;
            background-color: var(--primary1)
        }

        .line-mengapa {
            width: 8px;
            height: auto;
            background-color: white;
        }

        #section-mengapa {
            background-image: url('/main-assets/bg-gradient.webp');
            background-size: cover;
            background-position: center;
            min-height: 700px;
        }


        .custom-accor {
            display: flex;
            flex-direction: row;
            align-items: center;
            /* justify-content: space-between; */
        }

        .custom-accor-item {
            display: flex;
            position: relative;
        }

        .custom-accor-content {
            flex: 1;
            max-width: 0;
            /* Hidden by default */
            overflow: hidden;
            transition: max-width 0.5s ease, opacity 0.5s ease;
            opacity: 0;
            /* Hidden initially */
        }

        .custom-accor-content.show {
            max-width: 600px;
            /* Adjust width as needed */
            opacity: 1;
            /* Reveal when active */
        }

        .custom-accor-header {
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            transition: transform 0.3s ease;
        }

        .custom-accor-header img {
            transition: transform 0.3s ease;
        }

        .custom-accor-header img.rotate {
            transform: rotate(180deg);
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
                <img src="/main-assets/hero-image-single.webp" class="d-none d-show-912" height="300px" width="auto"
                    alt="hero-single">
            </figure>
            <figure>
                <img src="/main-assets/hero-image.webp" class="d-none-912" id="hero-bg" width="100%" height="100%"
                    alt="">
            </figure>
            <div class="container-text-hero col-6">
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
                <p class="fs-5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                    sed diam 3000+ classes nonummy nibh euismod.</p>
                <a href="" class="btn btn-primary-2 rounded-5">
                    <h4 class="m-0 p-0 mt-1">Mulai Dari Sini</h4>
                </a>
            </div>

            <div class="d-flex flex-column align-items-center container-md mb-5 d-show-912 d-none">
                <h2 class="montserrat-600 fw-bold d-flex gap-2  flex-wrap"><span>
                        Maksimalkan Potensi
                        dan Temukan <span id="text-kelas-terbaik">Kelas Terbaik</span>
                        <span>
                        </span>
                        <i>untuk</i>
                        <span class="position-relative">Masa Depan! <img src="/main-assets/circle.webp"
                                class="position-absolute" style="top: -30%; left: -5%;" width="210px" alt="circle">
                        </span>
                    </span>
                </h2>
                <p class="fs-5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                    sed diam 3000+ classes nonummy nibh euismod.</p>
                <a href="" class="btn btn-primary-2 rounded-5">
                    <h4 class="m-0 p-0 mt-1">Mulai Dari Sini</h4>
                </a>
            </div>
        </div>
    </section>

    <section id="section-program-kelas" class="mt-5 pt-5">
        <h3 class="montserrat-600 fw-bold mb-0 text-center mt-5">Program Kelas</h3>
        <div class="container-fluid d-flex flex-nowrap overflow-x-scroll mt-4">
            <div class="accordion" id="accordion-prakerja">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header">
                        <img src="/main-assets/image-1.webp" width="auto" style="min-width: 320px" height="auto"
                            alt="Prakerja" class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#program-prakerja" aria-expanded="true" aria-controls="program-prakerja">
                    </h2>
                    <div id="program-prakerja" class="accordion-collapse collapse show"
                        data-bs-parent="#accordion-prakerja">
                        <div class="accordion-body px-4">
                            <div class="d-flex gap-2">
                                <div class="border-block-1"></div>
                                <div>
                                    <h4 class="montserrat-600 fw-bold">Kelas <img src="/main-assets/prakerja-logo.webp"
                                            width="100px" height="auto" alt="prakerja logo">
                                    </h4>
                                    <p class="m-0 p-0 text-wrap">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Ut, est.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordion-reguler">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header">
                        <img src="/main-assets/image-2.webp" width="auto" style="min-width: 320px" height="auto"
                            alt="reguler" class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#program-reguler" aria-expanded="true" aria-controls="program-reguler">
                    </h2>
                    <div id="program-reguler" class="accordion-collapse collapse show" data-bs-parent="#accordion-reguler">
                        <div class="accordion-body px-4">
                            <div class="d-flex gap-2">
                                <div class="border-block-2"></div>
                                <div>
                                    <h4 class="montserrat-600 fw-bold">Kelas Reguler</h4>
                                    <p class="m-0 p-0 text-wrap">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Ut, est.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordion-pekerja-luar-negeri">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header">
                        <img src="/main-assets/image-3.webp" width="auto" style="min-width: 320px" height="auto"
                            alt="pekerja-luar-negeri" class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#program-pekerja-luar-negeri" aria-expanded="true"
                            aria-controls="program-pekerja-luar-negeri">
                    </h2>
                    <div id="program-pekerja-luar-negeri" class="accordion-collapse collapse show"
                        data-bs-parent="#accordion-pekerja-luar-negeri">
                        <div class="accordion-body px-4">
                            <div class="d-flex gap-2">
                                <div class="border-block-3"></div>
                                <div>
                                    <h4 class="montserrat-600 fw-bold">Pekerja Luar Negeri</h4>
                                    <p class="m-0 p-0 text-wrap">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Ut, est.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="banner-jangan-lewatkan" class="mt-5 pt-5 mb-10">
        <div class="container-fluid mt-5 pt-5">
            <div class="container-fluid">
                <h3 class="montserrat-600 fw-bold mb-0 text-center">Jangan Lewatkan</h3>
            </div>
            @include('components/carousel-banner', [
                'id' => 'splide-jangan-lewatkan',
                'color' => 'merah',
                'banners' => $banners,
            ])
        </div>
    </section>


    <section id="section-mengapa" class="mt-5 pt-0 pt-xl-5 mt-10">
        <div class="container-fluid d-flex flex-column flex-xl-row align-items-center">
            <div class="d-flex mt-1 col-12 col-xl-6 flex-column-reverse align-items-center flex-sm-row">
                <figure class="mt-5 pt-3 d-flex align-items-end">
                    <img src="/main-assets/hero.webp" height="600px" width="auto" alt="hero img mengapa">
                </figure>
                <div class="gap-2 mt-sm-5 pt-sm-5">
                    <h2 class="montserrat-600 fw-bold text-white mt-5">
                        Mengapa
                    </h2>
                    <h2 class="montserrat-600 fw-bold text-white">Edu MultiSkill</h2>
                    <h1 style="font-size: 3.5rem!important;" class="montserrat-600 fw-bold text-kelas-terbaik">Terbaik
                    </h1>
                    <h2 class="montserrat-600 fw-bold text-white"> dari Yang Lain?</h2>
                </div>
            </div>
            <div class="d-flex col-12 col-xl-6">
                <div class="line-mengapa"></div>
                <div class="d-flex flex-column">
                    @foreach ($accordions as $key => $accordion)
                        @include('components/accordion-custom', [
                            'accordion' => $accordion,
                            'key' => $key,
                        ])
                    @endforeach
                </div>
            </div>
        </div>

    </section>



    <section id="section-cerita-mereka" class="mt-10 pt-5">
        <div class="container-fluid d-flex flex-column flex-lg-row ">
            <div class="col-12 col-lg-4 d-flex justify-content-center">
                <h2 class="montserrat-600 fw-bold d-flex gap-2 flex-column flex-wrap mt-lg-5"><span>
                        Cerita Mereka
                        <i>yang</i>
                    </span>
                    <span id="text-kelas-terbaik">Telah Berkembang</span>
                    <span>
                        <span class="position-relative">Bersama Kami<img src="/main-assets/circle.webp"
                                class="position-absolute" style="top: -30%; left: -5%;" width="210px" alt="circle">
                        </span>
                    </span>
                </h2>
            </div>
            <div class="container-fluid col-12 col-lg-8">
                @include('/components/carousel-testimoni', ['testimonies' => $testimonies])

            </div>
        </div>
    </section>
    <section id="section-butuh-info" class="mt-10 pt-5">
        <figure><a href=""> <img src="/main-assets/banner-1.webp" width="100%" height="auto"
                    alt="banner-1"></a>
        </figure>
    </section>



    <section id="section-mitra-kami" class="mt-10 pt-5">
        @include('/components/partner-kami', ['dol' => $dol, 'right' => false])
    </section>
@endsection



@push('script')
    <script defer>
        document.addEventListener('DOMContentLoaded', function() {
            // const changeIconSplide = (element, path) => {
            //     document.querySelectorAll(element).forEach(button => {
            //         // Remove the existing SVG
            //         button.innerHTML = '';

            //         // Add your PNG image
            //         const img = document.createElement('img');
            //         img.src = path; // Replace with the actual path to your image
            //         img.alt = 'Arrow'; // Set an alternative text for accessibility

            //         button.appendChild(img);
            //     });
            // }
            // Splide configurations
            const splideConfigs = [{
                    selector: '#splide-jangan-lewatkan',
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
                        autoScroll: {
                            speed: 0.3
                        },
                        breakpoints: {
                            768: {
                                gap: '10px',
                                padding: {
                                    left: '12rem',
                                    right: '12rem'
                                }
                            },
                            576: {
                                gap: '10px',
                                padding: {
                                    left: '6rem',
                                    right: '6rem'
                                }
                            },
                            480: {
                                gap: '0px',
                                padding: {
                                    left: '0rem',
                                    right: '0rem'
                                }
                            }
                        },
                        pagination: true,
                    },
                    scroll: true
                },

                {
                    selector: '#splide-partner-kita-baris-1',
                    config: {
                        type: 'loop',
                        lazyLoad: 'sequential',
                        drag: 'free',
                        focus: 'center',
                        perPage: 7,
                        autoScroll: {
                            speed: 0.3

                        },
                        breakpoints: {

                            480: {
                                perPage: 3
                            }
                        },
                        arrows: false,
                        pagination: false
                    },
                    scroll: true
                },
                {
                    selector: '#splide-partner-kita-baris-2',
                    config: {
                        type: 'loop',
                        lazyLoad: 'sequential',
                        drag: 'free',
                        focus: 'center',
                        perPage: 7,
                        autoScroll: {
                            speed: -0.6
                        },
                        breakpoints: {

                            480: {
                                perPage: 3
                            }
                        },
                        arrows: false,
                        pagination: false
                    },
                    scroll: true
                },
                {
                    selector: '#carousel-testi',
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
                        perPage: 2,
                        autoScroll: {
                            speed: 0.3
                        },
                        breakpoints: {
                            768: {
                                perPage: 1,
                                gap: '0px',

                            },
                            576: {
                                perPage: 1,
                                gap: '10px',
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
                    scroll: true
                },
            ];

            splideConfigs.forEach(config => {
                const splide = new Splide(config.selector, config.config);
                splide.mount(config.scroll && window.splide.Extensions);
            });







        });
    </script>

    <script>
        // document.addEventListener('DOMContentLoaded', () => {
        //     const header = document.querySelector('.custom-accor-header');
        //     const content = document.querySelector('.custom-accor-content');

        //     header.addEventListener('click', () => {
        //         const isExpanded = content.classList.contains('show');
        //         content.classList.toggle('show', !isExpanded);
        //         content.classList.toggle('d-none', isExpanded);
        //     });
        // });

        $(document).on('click', '.custom-accor-header', function() {
            const id = $(this).attr('id')
            $(`#content-${id}`).toggleClass('show d-none');
        })
    </script>
@endpush
