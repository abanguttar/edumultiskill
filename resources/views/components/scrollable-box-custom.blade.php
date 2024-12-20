<div class="position-relative p-2" {{ $component === 'card' ? 'style="max-width: 796px"' : '' }}>

    <div class="d-flex flex-nowrap overflow-x-scroll gap-4 no-scrollbar" id="{{ $id }}">
        @for ($i = 0; $i < 4; $i++)
            @foreach ($data as $item)
                @include("components/$component", ['item' => $item, 'tipe' => $program ?? null])
            @endforeach
        @endfor

    </div>
    <div class="container-xl position-absolute top-50 start-50 translate-middle">
        <div class="position-relative">
            <div class="position-absolute top-50 start-0 translate-middle">
                <button class="btn border-0 btn-sm btn-scroll" data-value="left" data-id="{{ $id }}"
                    style="margin-left: -20px">
                    <img width="30px" src="/main-assets/arrow-left.webp" alt="arrow left">
                </button>
            </div>
            <div class="position-absolute top-50 start-100 translate-middle">
                <button class="btn border-0 btn-sm btn-scroll" data-value="right" data-id="{{ $id }}"
                    style="margin-right: -20px "><img width="30px" src="/main-assets/arrow-right.webp"
                        alt="arrow right"></button>
            </div>
        </div>
    </div>

</div>
