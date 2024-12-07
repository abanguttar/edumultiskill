<div class="container overflow-y-scroll scroller mt-3" style="max-height: 800px">
    <div class="row">
        @php
            $kategories = ['Customer Service', 'K3', 'Bahasa', 'Tata Busana', 'Desain Grafis', 'Welding'];
        @endphp
        @for ($i = 0; $i < 2; $i++)
            @foreach ($kategories as $item)
                <div class="d-flex flex-column align-items-center position-relative col-12 col-md-6 col-xl-4 p-3">
                    <img src="/assets/sample-1.webp" class="rounded-top-5" alt="sample" width="100%">
                    <div
                        class="mt-2 d-flex flex-column align-items-center rounded-bottom-5 border-bottom border-3 w-100">
                        <h6 class="m-0 p-0 text-primer2">{{ $item }}</h6>
                        <p class="m-0 p-0">{{ $item }}</p>
                    </div>
                </div>
            @endforeach
        @endfor
    </div>
