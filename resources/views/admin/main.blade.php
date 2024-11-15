<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edu Multi Skill | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

    @stack('link')
</head>
@stack('style')
<style>
    body {
        min-height: 100vh;
    }

    .nav-link.active {
        background-color: aqua !important;
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
        <div class="container-xl mt-5">
            <h3 class="text-center">{{ $title }}</h3>
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
                'active')
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



</body>

</html>
