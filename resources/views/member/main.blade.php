<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <title>Edu Multi Skill | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    {{-- Font --}}

    @stack('link')
</head>
@stack('style')
<style>
    :root {
        --primary1: #F58634;
        --subprimary1: #e27c33;
        --primary2: #414393;
        --primary2Hover: #5253b6;
        --primary3: #007DD1;
        --primary3Hover: #1c7dbe;
        --footerColor: #f3f7ff;
        --cal: 0.25rem;
        /* Each "cal" unit equals 0.25rem */
    }

    .text-primer {
        color: var(--primary1);
    }

    .text-primer-2 {
        color: var(--primary2);
    }

    .bg-primer {
        background-color: var(--primary1);
    }

    .text-primer2 {
        color: var(--primary2);
    }

    .hind-light {
        font-family: "Hind", sans-serif;
        font-weight: 300;
        font-style: normal;
    }

    .hind-regular {
        font-family: "Hind", sans-serif;
        font-weight: 400;
        font-style: normal;
    }


    .no-scrollbar {
        scroll-snap-type: x mandatory;
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        scroll-behavior: smooth;
        /* Firefox */
    }

    .no-scrollbar::-webkit-scrollbar {
        display: none;
        /* Chrome, Safari, and Opera */
    }



    .hind-medium {
        font-family: "Hind", sans-serif;
        font-weight: 500;
        font-style: normal;
    }

    .hind-semibold {
        font-family: "Hind", sans-serif;
        font-weight: 600;
        font-style: normal;
    }

    .hind-bold {
        font-family: "Hind", sans-serif;
        font-weight: 700;
        font-style: normal;
    }

    /* // <uniquifier>: Use a unique and descriptive class name */
    /* // <weight>: Use a value from 100 to 900 */

    .montserrat-100 {
        font-family: "Montserrat", sans-serif;
        font-optical-sizing: auto;
        font-weight: 100;
        font-style: normal;
    }

    .montserrat-200 {
        font-family: "Montserrat", sans-serif;
        font-optical-sizing: auto;
        font-weight: 200;
        font-style: normal;
    }

    .montserrat-600 {
        font-family: "Montserrat", sans-serif;
        font-optical-sizing: auto;
        font-weight: 600;
        font-style: normal;
    }

    body {
        min-height: 100vh !important;
        font-family: "Hind", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .w-5 {
        width: calc(5 * var(--cal));
    }

    #input-navbar {
        width: 30dvw;
    }

    #search-navbar:hover {
        cursor: pointer;
        transform: scale(1.2);
    }

    footer {
        background-color: var(--footerColor);
    }

    .transparent {
        background: inherit;
    }

    .btn-primary-2 {
        --bs-btn-color: #fff;
        --bs-btn-bg: var(--primary2);
        --bs-btn-border-color: var(--primary2);
        --bs-btn-hover-color: #fff;
        --bs-btn-hover-bg: var(--primary2Hover);
        --bs-btn-hover-border-color: var(--primary2);
        --bs-btn-focus-shadow-rgb: 49, 132, 253;
        --bs-btn-active-color: #fff;
        --bs-btn-active-bg: var(--primary2);
        --bs-btn-active-border-color: #0a53be;
        --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        --bs-btn-disabled-color: #fff;
        --bs-btn-disabled-bg: var(--primary2);
        --bs-btn-disabled-border-color: var(--primary2);
    }

    .btn-primary-3 {
        --bs-btn-color: #fff;
        --bs-btn-bg: var(--primary3);
        --bs-btn-border-color: var(--primary3);
        --bs-btn-hover-color: #fff;
        --bs-btn-hover-bg: var(--primary3Hover);
        --bs-btn-hover-border-color: var(--primary3);
        --bs-btn-focus-shadow-rgb: 49, 132, 253;
        --bs-btn-active-color: #fff;
        --bs-btn-active-bg: var(--primary3);
        --bs-btn-active-border-color: #0a53be;
        --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        --bs-btn-disabled-color: #fff;
        --bs-btn-disabled-bg: var(--primary3);
        --bs-btn-disabled-border-color: var(--primary3);
    }

    .py-6 {
        padding-top: 4em;
        padding-bottom: 4em;
    }

    .testimoni-user {
        background-image: url('main-assets/testi-large.webp');
        /* width: 360px; */
        max-width: 290px;
        min-height: 400px;
        background-size: contain;
        background-position: start;
        background-repeat: no-repeat;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Montserrat", sans-serif;
        font-optical-sizing: auto;
        font-weight: 600;
        font-style: normal;
    }

    .mt-10 {
        margin-top: 10rem !important;
    }

    .mb-10 {
        margin-bottom: 10rem !important;
    }

    .pt-10 {
        padding-top: 10rem !important;
    }

    .pb-10 {
        padding-bottom: 10rem !important;
    }

    .text-kelas-terbaik {
        color: var(--primary1)
    }

    .border-block-mini-1 {
        width: 6px;
        min-height: 50px;
        background-color: var(--primary3)
    }

    .border-block-mini-2 {
        width: 6px;
        min-height: 50px;
        background-color: var(--primary2)
    }

    .border-block-mini-3 {
        width: 6px;
        min-height: 50px;
        background-color: var(--primary1)
    }

    .border-block-mini-4 {
        width: 6px;
        min-height: 50px;
        background-color: #4f941c
    }

    .scroller {
        scrollbar-color: var(--primary2) var(--primary1);
        scrollbar-width: 6px !important;
        -ms-overflow-style: 6px !important;
    }

    /* ::-webkit-scrollbar {
        width: 6px;
    }

    .scroller::-webkit-scrollbar {
        width: 6px;
    } */

    @media only screen and (max-width: 992px) {
        #input-navbar {
            width: 70dvw;
        }

        .no-scrollbar {
            scrollbar-width: none;
            scroll-snap-type: x mandatory;

        }
    }

    @media only screen and (max-width: 576px) {
        #input-navbar {
            max-width: 40dvw;
        }


    }
</style>

<body>

    <main class="container-fluid m-0 p-0" style="min-height: 100vh">
        <aside>
            @include('member/navbar')
        </aside>
        <div class="container-fluid m-0 p-0">
            @yield('body')
        </div>
    </main>

    <a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="WhatsApp EDU"
        href="https://api.whatsapp.com/send?phone=6282255194864&amp;text=Hallo Admin Kita Kompeten" target="_blank"
        class="btn-wa-contact" id="btn-wa-contact" style=" bottom: 5%; right: 3%; z-index: 9999; position: fixed;"
        aria-describedby="tooltip8867">
        <img src="/main-assets/sticky-wa.webp" style="width: 100px;">
    </a>

    @include('member/footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @stack('script')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script>
        $(document).on('click', '.btn-scroll', function() {
            const value = $(this).data('id')
            const container = $('#recomend-class');
            const amount = 200;
            console.log({
                value
            });

            if (value === 'left') {
                container.scrollLeft(container.scrollLeft() - amount)
            } else {
                container.scrollLeft(container.scrollLeft() +
                    amount)
            }

        })
    </script>

</body>

</html>
