<section id="section-partner-kami" class="pt-10 ">
    <div class="container-lg ">
        <h2 class="montserrat-600 fw-bold mb-0 text-center">
            Partner Kami</h2>
    </div>
    <div class="container-fluid p-0 m-0 mt-5 pt-4">
        <div id="splide-partner-kita-baris-1" class="splide pt-5 pb-2" role="group" aria-label="Partner KITA baris 1">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($dol->logo_1 as $do)
                        <li class="splide__slide d-flex justify-content-center">
                            <img src="/assets/{{ $do->logo }}" style="max-height: 60px;" alt="{{ $do->logo }}">
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div id="splide-partner-kita-baris-2" class="splide pt-4 pb-5 " role="group"
            aria-label="Partner KITA baris 1">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($dol->logo_2 as $dt)
                        <li class="splide__slide d-flex justify-content-center">
                            <img loading="lazy" src="/assets/{{ $dt->logo }}" style="max-height: 60px;"
                                alt="{{ $dt->logo }}">
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
