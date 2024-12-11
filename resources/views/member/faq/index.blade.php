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
        <div class="container-xl d-flex flex-column mt-4 pt-3 gap-2">
            <div>
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
                    $date = date('d-m-Y', strtotime($faq->updated_at));
                    $exp_tanggal = explode('-', $date);
                    $tanggal = implode(' ', [$exp_tanggal[0], $bulan[$exp_tanggal[1]], $exp_tanggal[2]]);
                @endphp
                <span class="text-primary fw-bold">Diperbaharui {{ $tanggal }}</span>
            </div>

            <div>
                @foreach ($faq->content as $fc)
                    <div class="mt-4">
                        <h5>{{ $fc->title_content }}</h5>
                        {!! $fc->content !!}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


@push('script')
    <script>
        $(document).ready(function() {
            $(`.${@json($slug)}`).addClass('text-primer')
        })
    </script>
@endpush
