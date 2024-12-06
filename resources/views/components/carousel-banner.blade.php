<div id="{{ $id }}" class="splide splide-banner container-fluid" role="group"
    aria-label="Splide Basic HTML Example">
    <div class="splide__track mt-5">
        <ul class="splide__list">
            @foreach ($banners as $d)
                <li class="splide__slide d-flex justify-content-center">
                    <a href="{{ $d->link }}">
                        <img src="/assets/{{ $d->dekstop }}" width="100%" class="d-none d-md-block"
                            alt="{{ $d->id }}">

                        <img src="/assets/{{ $d->mobile }}" width="100%" class="d-block d-md-none"
                            alt="{{ $d->id }}">
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="splide__arrows">
        <button class="splide__arrow splide__arrow--prev">
            <img src="/main-assets/arrow-left.webp" width="30px" alt="Previous">
        </button>
        <button class="splide__arrow splide__arrow--next">
            <img src="/main-assets/arrow-right.webp" width="30px" alt="Next">
        </button>
    </div>
</div>
