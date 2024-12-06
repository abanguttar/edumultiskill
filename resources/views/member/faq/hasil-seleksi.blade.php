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
                    <p class="mt-2">Jika kamu tidak lolos, akan ada notifikasi "Kamu Belum Berhasil” pada dashboard akun kamu.</p>
                ',
                        ],
                        (object) [
                            'title' => 'Apakah saya bisa tahu alasan saya tidak lolos Gelombang?',
                            'desc' => '
                    <p>Kamu bisa melihat alasan tidak lolos Gelombang pada dashboard Prakerja dengan masuk ke menu <span class="fw-bold">Info Gelombang</span>, lalu klik <span class="fw-bold">Riwayat Gelombang</span>.

</p>
                    <img src="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=194,h=432,fit=crop/YBgrpNB4o4IBBZ6w/gelombang-02-AGB6nD995yupW7gx.webp" alt="image">
                ',
                        ],
                        (object) [
                            'title' => 'Bagaimana jika saya tidak dapat melihat nomor Kartu Prakerja?',
                            'desc' => '
                            <p>
                                Pastikan kamu telah menonton 3 (tiga) video tentang Kartu Prakerja untuk dapat melihat nomor Kartu Prakerja kamu. Video tersebut berisi informasi dasar mengenai Kartu Prakerja, mulai dari mengenali tantangan di dunia kerja sampai penjelasan manfaat Kartu Prakerja. Setelah menonton 3 (tiga) video, lakukan penyambungkan rekening bank/atau e-money yang merupakan milik kamu sendiri atau atas nama kamu sendiri serta menggunakan NIK kamu sesuai dengan yang terdaftar pada Kartu Prakerja. Setelah menonton video dan berhasil menyambungkan rekening bank/e-money, kamu dapat melihat nomor Kartu Prakerja dan menggunakannya untuk membeli pelatihan pada Platform Digital.

                                </p>
                                ',
                        ],
                        (object) [
                            'title' => 'Apakah saya wajib menonton video pada dashboard akun?',
                            'desc' => '
                        <p>
Ya, kamu wajib menonton keseluruhan 3 video sampai selesai untuk dapat melihat nomor Kartu Prakerja pada menu dashboard. Kamu juga tidak dapat menutup video jika belum selesai menonton atau mempercepat laju video. Apabila kamu mengalami kendala saat menonton video, kamu dapat menghubungi CS Prakerja dan mengisi                     <a href="https://www.prakerja.go.id/formulir-pengaduan">Formulir Pengaduan</a>
.

    </p>
                        <img src="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=194,h=544,fit=crop/YBgrpNB4o4IBBZ6w/27-ALpn71loGyU3w864.webp" alt="image">
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
