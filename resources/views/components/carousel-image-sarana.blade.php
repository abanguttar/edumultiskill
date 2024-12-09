<div id="carousel-image-sarana" class="splide splide-banner container-fluid" role="group"
    aria-label="Splide Basic HTML Example">
    <div class="splide__track mt-5">
        <ul class="splide__list">

            @for ($i = 0; $i < 20; $i++)
                @foreach ($image_saranas as $image_sarana)
                    <li class="splide__slide d-flex justify-content-center">
                        <div class="image-sarana-user d-flex flex-column align-items-center justify-content-around p-4">
                            <div>
                                <div class="d-flex flex-column align-items-center position-relative p-3 h-100">
                                    <img {{-- src="/image-sarana/{{ $image_sarana->image }}" --}} src="https://placehold.co/600x400" class="rounded-top-4"
                                        alt="sample" width="280px">
                                    <div
                                        class="mt-2 d-flex flex-column align-items-center rounded-bottom-4 border-bottom border-3 w-100">
                                        <h6 class="mb-2 p-0 text-primer2">{{ $image_sarana->title }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endfor
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
