@extends('member/main')
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
                <img src="/main-assets/image-1.webp" class="d-none d-show-912" height="300px" width="auto" alt="hero-single">
            </figure>
            <figure>
                <img src="/main-assets/hero-image.webp" class="d-none-912" id="hero-bg" width="100%" height="100%"
                    alt="">
            </figure>
            <div class="container-text-hero col-6">
                <h2 class="montserrat-600 fw-bold d-flex gap-0 flex-column">Kelas <br>
                    <img src="/main-assets/prakerja-logo.webp" width="200px" height="auto" alt="prakerja logo">
                </h2>
                <p class="fs-5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                    sed diam 3000+ classes nonummy nibh euismod.</p>
                <a href="" class="btn btn-primary-3 rounded-5">
                    <h6 class="m-0 p-0 mt-1">Cari Kelasmu!</h6>
                </a>
            </div>

            <div class="d-flex flex-column align-items-center  container-md mb-5 d-show-912 d-none">
                <h2 class="montserrat-600 fw-bold d-flex flex-column gap-0">Kelas <br>
                    <img src="/main-assets/prakerja-logo.webp" width="200px" height="auto" alt="prakerja logo">
                </h2>
                <p class="fs-5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                    sed diam 3000+ classes nonummy nibh euismod.</p>
                <a href="" class="btn btn-primary-3 rounded-5">
                    <h6 class="m-0 p-0 mt-1">Cari Kelasmu!</h6>
                </a>
            </div>
        </div>
    </section>
    <section class="kelas-prakerja mt-10">
        <h2 class="fw-bold text-center mb-5">Kelas-Kelas <span class="text-kelas-terbaik">Prakerja</span></h2>
        @include('components/scrollable-box')

        </div>

    </section>
@endsection