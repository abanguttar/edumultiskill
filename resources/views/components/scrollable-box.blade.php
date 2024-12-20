<div class="container overflow-y-scroll scroller mt-3" style="max-height: 800px">
    <div class="row">

        @for ($i = 0; $i < 12; $i++)
            @foreach ($kelas as $item)
                <div class="d-flex justify-content-center col-12 col-md-6 col-xl-4 p-3">
                    @include('components/card', ['item' => $item])
                </div>
            @endforeach
        @endfor
    </div>
