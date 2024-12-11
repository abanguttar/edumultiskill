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
                <span class="text-primary fw-bold">Diperbaharui {{ date('d m Y', strtotime($faq->updated_at)) }}</span>
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
