<a href="/program/{{ $tipe }}/{{ $item->slug }}"
    class="card rounded-2 flex-shrink-0 shadow text-decoration-none" style="width: 18rem;">
    <div class="card-img-top" style="height: 153px;">
        <img src="/kelas-image/{{ $item->image }}" width="100%" height="153" height="cover" alt="">
    </div>
    <div class="card-body">
        <h6 class="card-title">{{ $item->judul_kelas }}</h6>

        <div class="tutor-and-profesi d-flex justify-content-start gap-2">
            <div>
                <img src="{{ $item->tutor->foto === null ? '/main-assets/mock-image.webp' : '/user-image/' . $item->tutor->foto }}"
                    class="rounded-circle" style="object-fit: contain" width="36px" height="36px" alt="">
            </div>
            <div class="d-flex flex-column">
                <span class="font-monospace"
                    style="font-size: 12px">{{ Str::limit($item->tutor_profesi, 71, '...') }}</span>
                {{-- Max 71 char --}}
                <span class="font-monospace"
                    style="font-size: 12px">{{ Str::limit($item->tutor->name, 71, '...') }}</span>
            </div>
        </div>
        <div class="star-and-purchase d-flex gap-2 mt-2" style="font-size: 11px">

            <div class="star">
                <i class="fa-solid fa-star text-warning" style=" margin-right: 0.1px"></i>
                <i class="fa-solid fa-star text-warning" style=" margin-right: 0.1px"></i>
                <i class="fa-solid fa-star text-warning" style=" margin-right: 0.1px"></i>
                <i class="fa-solid fa-star text-warning" style=" margin-right: 0.1px"></i>
                <i class="fa-solid fa-star text-warning" style=" margin-right: 0.1px"></i>
                <span style="margin-left: 1px">5.0</span>
            </div>
            |
            <div class="purchase">1000 Terjual</div>

        </div>

        <div class="harga mt-4">


            @if ($item->is_discount === '1')
                <div class="harga-kelas-discount">
                    <div class="d-inline position-relative">
                        <del class="fw-bold">Rp{{ number_format((int) $item->harga_reguler) }}</del>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primer">
                            <span class="fw-bold">Rp{{ number_format((int) $item->harga_discount) }}</span>
                        </span>
                    </div>
                </div>
            @else
                <div class="harga-kelas">
                    <span class="fw-bold">Rp{{ number_format((int) $item->harga_reguler) }}</span>
                </div>
            @endif


        </div>

    </div>
</a>
