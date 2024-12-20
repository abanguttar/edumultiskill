<div class="position-relative p-2" style="max-width: 796px">

    <div class="d-flex  flex-nowrap overflow-x-scroll gap-4 no-scrollbar" id="recomend-class">
        @for ($i = 0; $i < 4; $i++)
            @foreach ($data as $item)
                @include("components/$component", ['item' => $item, 'tipe' => $program])
            @endforeach
        @endfor

    </div>
    <div class="container position-absolute top-50 start-50 translate-middle" style="max-width: 796px">
        <div class="position-relative">
            <div class="position-absolute top-50 start-0 translate-middle">
                <button class="btn border-0 btn-sm btn-scroll" data-id="left" style="margin-left: -20px">
                    <img width="30px" src="/main-assets/arrow-left.webp" alt="arrow left">
                </button>
            </div>
            <div class="position-absolute top-50 start-100 translate-middle">
                <button class="btn border-0 btn-sm btn-scroll" data-id="right" style="margin-right: -20px "><img
                        width="30px" src="/main-assets/arrow-right.webp" alt="arrow right"></button>
            </div>
        </div>
    </div>

</div>
