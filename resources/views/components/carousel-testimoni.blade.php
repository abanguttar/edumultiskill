<div id="carousel-testi" class="splide splide-banner container-fluid" role="group" aria-label="Splide Basic HTML Example">
    <div class="splide__track mt-5">
        <ul class="splide__list">
            @foreach ($testimonies as $testimoni)
                <li class="splide__slide d-flex justify-content-center">
                    <div style="min-width: 290px;"
                        class="testimoni-user d-flex flex-column align-items-center justify-content-between p-4">
                        <p class="mt-5 pt-3" style="font-size: 13px">{{ $testimoni->ulasan }}</p>
                        <div class="mt-1 w-100">
                            <figure class="d-flex justify-content-center align-items-center"
                                style="width: 50px; height: 50px">
                                <img src="/assets/{{ $testimoni->image }}" width="100%" height="50px"
                                    class="rounded-circle" alt="thumb">
                            </figure>
                            <div class="d-flex flex-column mt-1">
                                <p style="font-size: 15px" class="fw-bold p-0 m-0">{{ $testimoni->nama }}</p>
                                <span style="font-size: 12px"><i>{{ $testimoni->profesi }}</i></span>
                                <span style="font-size: 13px">{{ $testimoni->kelas }}</span>
                            </div>
                        </div>
                    </div>
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
