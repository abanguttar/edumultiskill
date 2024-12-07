@extends('member/main')
@section('body')
    <section>
        <div class="container-xl d-flex flex-column mt-4 pt-3 gap-5">
            <div>
                <h1>{{ ucwords($title) }}</h1>
                <span class="text-primary fw-bold">Diperbaharui 06 November 2023</span>
            </div>

            <div>
                @php
                    $faq_contents = [
                        (object) [
                            'title' => 'Bagaimana cara untuk tahu saya lolos atau tidak?',
                            'desc' => '
                    <p>Jika lolos seleksi Gelombang, kamu akan menerima notifikasi kelolosan melalui SMS dan email. Pada tanggal pengumuman Gelombang, login ke akun kamu untuk melihat hasil pengumunan, jika kamu lolos akan muncul 3 (tiga) video tentang Kartu Prakerja. Pastikan kamu menonton ketiga video tersebut untuk dapat melihat nomor Kartu Prakerja kamu.</p>
                    <img src="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=194,h=432,fit=crop/YBgrpNB4o4IBBZ6w/7-YrDlqEOW8aszD2lM.webp" alt="image">

                ',
                        ],
                    ];
                @endphp
                @foreach ($faq_contents as $faq)
                    <div class="mt-4">
                        <h5>{{ $faq->title }}</h5>
                        {!! $faq->desc !!}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
