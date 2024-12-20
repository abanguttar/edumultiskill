<div class="container overflow-y-scroll scroller mt-3" style="max-height: 800px">
    <div class="row">
        @for ($i = 0; $i < 12; $i++)
            @foreach ($tutors as $tutor)
                <div class="d-flex flex-column align-items-center position-relative col-12 col-md-6 col-xl-4 p-3">

                    <figure class="w-100 d-flex justify-content-center align-items-end rounded-top-5 pt-3 "
                        style="background-image: url('main-assets/bg-tutor.webp');  background-position: center;">
                        <img src="{{ $tutor->foto === null ? '/main-assets/mock-image.webp' : '/user-image/' . $tutor->foto }}"
                            alt="sample" height="250px" style="object-fit: contain" width="200px">
                    </figure>
                    <div
                        class="mt-2 d-flex flex-column align-items-center justify-content-between rounded-bottom-5 border-bottom border-3 w-100">
                        <h6 class="m-0 p-0 text-primer2">{{ $tutor->name }}</h6>
                        <p class="m-0 p-0">{{ $tutor->job_title ?? 'Tenaga Pelatih' }}</p>
                    </div>
                </div>
            @endforeach
        @endfor
    </div>
