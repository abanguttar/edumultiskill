<div class="container overflow-y-scroll scroller mt-3" style="max-height: 800px">
    <div class="row">
        @php
            $kategories = ['Customer Service', 'K3', 'Bahasa', 'Tata Busana', 'Desain Grafis', 'Welding'];
        @endphp
        @for ($i = 0; $i < 2; $i++)
            @foreach ($kategories as $item)
                <div class=" d-flex position-relative col-12 col-md-6 col-xl-4 p-3">
                    <img src="/assets/sample-1.webp" class="rounded-5" alt="sample" width="100%">
                    <h3 class="position-absolute end-0 bottom-0 text-white mb-4 pb-3 me-5">{{ $item }}</h3>
                </div>
            @endforeach
        @endfor
    </div>
