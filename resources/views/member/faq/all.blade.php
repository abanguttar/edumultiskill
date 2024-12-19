@extends('member/main')
@push('style')
    <style>
        img {
            max-width: 300px !important;
        }

        article>.mb-4 {
            margin-top: 10px !important;
        }
    </style>
@endpush
@section('body')
    <section>
        <div class="container-xl d-flex flex-column align-items-center mt-4 pt-3 gap-2">
            <div class="justify-content-start">
                <h1>{{ ucwords($title) }}</h1>
                @php

                    $bulan = [
                        1 => 'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember',
                    ];
                    $date = date('d-m-Y', strtotime($faqs[0]->updated_at));
                    $exp_tanggal = explode('-', $date);
                    $tanggal = implode(' ', [$exp_tanggal[0], $bulan[$exp_tanggal[1]], $exp_tanggal[2]]);
                @endphp
                <span class="text-primary fw-bold">Diperbaharui {{ $tanggal }}</span>
            </div>

            <div class="container-fluid row mt-5 gap-2 justify-content-center">
                @foreach ($faqs as $faq)
                    <a href="/faq/{{ $faq->slug }}"
                        class="card col-sm-5 col-md-3  p-2 text-decoration-none d-flex justify-content-center ">
                        @php

                            $array = [
                                'penyambungan-rekeninge-money' => 'penyambungan-rekening',
                                'pelatihan' => 'pembelian-pelatihan',
                                'tes-seleksi' => 'tes-_-seleksi',
                            ];

                            $slug = $faq->slug;
                            if (array_key_exists($faq->slug, $array)) {
                                $slug = $array[$faq->slug];
                            }

                        @endphp
                        <figure class="d-flex justify-content-center">
                            <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq/{{ $slug }}.png"
                                style="max-width: 100%; object-fit: contain" height="130" alt="{{ $slug }}">
                        </figure>
                        <span class="fw-semibold text-center mt-2">{{ $faq->title }}</span>
                    </a>
                @endforeach
            </div>


            <div>
                <h3 class="text-center text-info mb-4 mt-5">Pertanyaan Paling Populer</h3>
                @foreach ($faqs[0]->content as $fc)
                    <div class="mt-4">
                        <h5>{{ $fc->title_content }}</h5>
                        {!! $fc->content !!}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


{{-- @push('script')
    <script>
        $(document).ready(function() {
            $(`.${@json($slug)}`).addClass('text-primer')
        })
    </script>
@endpush --}}
