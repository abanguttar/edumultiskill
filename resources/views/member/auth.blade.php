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

    .text-primer-3 {
        color: var(--primary3);
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

    #container-auth {
        --bs-border-color: #414393 !important;
    }

    .no-scrollbar {
        scroll-snap-type: x mandatory;
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
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
</style>

<body>

    <main class="container-fluid m-0 p-0" style="min-height: 100vh">
        <aside>
            <div class="navbar">
                <a class="d-flex align-items-center ms-4" href="/"><img src="/main-assets/logo-ems.webp"
                        alt="logo edu" height="120px"></a>
            </div>
        </aside>
        <div class="container d-flex justify-content-center mt-5 pt-5">
            <div class="col-11 border p-3 rounded-4" style="max-width: 360px;" id="container-auth">
                <form action="">
                    <div>
                        <label for="inputPassword5" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword5" class="form-label">Password</label>
                        <input type="password" id="inputPassword5" class="form-control"
                            aria-describedby="passwordHelpBlock">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <a href="/lupa-sandi"
                            class="text-primer-3 fw-semibold link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Lupa
                            kata
                            sandi?</a>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary-2 w-100 p-2 rounded-2">Masuk</button>
                    </div>
                    <div class="register mt-4">
                        <span class="fw-normal">Belum punya akun?</span>
                        <a href="/daftar"
                            class="text-primer-3 fw-semibold link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Daftar
                            Akun</a>
                    </div>
                </form>
            </div>
        </div>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</body>

</html>
