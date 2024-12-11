<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <title>Edu Multi Skill | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons@4.29.2/dist/feather.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

    @stack('link')
</head>
@stack('style')
<style>
    :root {
        --primary1: #F58634;
        --subprimary1: #e27c33;
        --primary2: #414393;
        --primary3: #007DD1;
    }

    #container-login {
        --bs-border-color: #414393 !important;
    }



    body {
        min-height: 100vh;
    }


    #footer-logo {
        margin-left: -2rem;
    }

    #btn-login.btn-danger,
    #sidebarToggleBtn.btn-danger {
        --bs-btn-active-bg: #da6c1e !important;
        --bs-btn-bg: #F58634 !important;
        --bs-btn-hover-bg: #e27c33 !important;
        --bs-btn-border-color: #944710 !important;
    }

    .accordion-button:not(.collapsed) {
        color: white !important;
        background-color: var(--primary1) !important;
        box-shadow: inset 0 calc(-1* var(--bs-accordion-border-width)) 0 var(--subprimary1) !important;
    }


    .nav-link.active {
        background-color: var(--primary3) !important;
    }

    @media only screen and (max-width: 576px) {
        .container.w-75 {
            width: 100% !important;
        }

        #footer-logo {
            margin-left: 0;
        }
    }
</style>

<body>

    <main class="container-fluid ">
        @if ($title !== 'Login' && $title !== 'Register')
            <aside>
                {{-- <div class="sidebar text-bg-white border-left border-3 bg-white off" id="sidebar">
                <!-- Sidebar content here -->
            </div> --}}
                @include('admin/sidebar')

            </aside>
        @endif
        <div class="container-fluid mt-5">
            @if ($title !== 'Login' && $title !== 'Register')
                <h3 class="text-center">{{ $title }}</h3>
            @endif
            @yield('body')
        </div>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    @stack('script')
    <script>
        feather.replace();
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        const showAlertError = () => {
            Swal.fire({
                icon: "error",
                title: "Mohon pilih data dengan benar!",
            });
        }


        const showAlertConfirm = () => {
            return Swal.fire({
                title: "Apakah anda yakin?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            })
        }

        let id = '';
        // Handle click table
        $(document).on('click', '.table-row', function() {
            id = $(this).data("id");
            if ($(this).hasClass('table-primary')) {
                $(this).removeClass('table-primary')
            } else {
                $('.table-row').removeClass('table-primary')
                $(this).toggleClass('table-primary')
            }
        })
        $(document).on('click', '#edit-kelas', function() {

            if (id === '') {
                showAlertError()
                return
            }
            window.location.href = `${id}/informasi`
        })

        $(document).on('click', '#btn-edit', function() {
            if (id === '') {
                showAlertError()
                return
            }
            window.location.href = `${id}/edit`
        })


        const title = @json($title)
    </script>

    @if ($title !== 'Login' && $title !== 'Register' && $title !== 'Dashboard')
        <script>
            $('.container.border').hasClass('border-3 rounded-4 shadow') == false ? $('.container.border').addClass(
                'border-3 rounded-4 shadow') : ''
            const dataNavArray = @json($data_nav);
            const sectionSideBar = dataNavArray[0]
            const elementSideBar = dataNavArray[1]
            $('#' + sectionSideBar).addClass('show')
            $('#' + sectionSideBar).closest('.accordion-item').find('.accordion-button').attr('aria-expanded',
                'true').toggleClass('collapsed')
            $('#' + sectionSideBar + ' [data-nav="' + elementSideBar + '"]').toggleClass(
                'active text-white')
        </script>
    @endif

    @if (session('success-status'))
        <script>
            const message = @json(session('success-status'));
            Swal.fire({
                icon: "success",
                title: message,
            });
        </script>
    @endif
    @if (session('error-permission'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Anda tidak memiliki akses membuka halaman ini!",
            });
        </script>
    @endif



</body>

</html>
