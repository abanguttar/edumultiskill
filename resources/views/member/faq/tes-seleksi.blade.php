@extends('member/main')
@section('body')
    <section>
        <div class="container-xl d-flex flex-column mt-4 pt-3 gap-2">
            <div>
                <h1>{{ ucwords($title) }}</h1>
                <span class="text-primary fw-bold">Diperbaharui 06 November 2023</span>
            </div>

            <div>
                @php
                    $faq_contents = [
                        (object) [
                            'title' => 'Apakah saya harus menjalani tes untuk mendapatkan bantuan dari Kartu Prakerja?',
                            'desc' =>
                                'Iya, kamu harus mengikuti Tes Kemampuan Dasar (TKD)/Soal Kemampuan Belajar (SKB) pada situs resmi Kartu Prakerja untuk memenuhi keseluruhan proses pendaftaran. Pertanyaan dalam Tes tidak dapat disebarluaskan.',
                        ],

                        (object) [
                            'title' => 'Apakah tes mempengaruhi kelolosan saya?',
                            'desc' =>
                                'Tes merupakan salah satu komponen yang wajib kamu ikuti untuk mendaftar Kartu Prakerja.',
                        ],
                        (object) [
                            'title' => 'Berapa lama pengerjaan tes?',
                            'desc' =>
                                'Tes Kemampuan Dasar (TKD)/Soal Kemampuan Belajar (SKB) berdurasi kurang lebih 40 (empat puluh) menit dan terdiri dari 2 (dua) bagian, yaitu tes penalaran verbal dan tes penalaran kuantitatif. Kamu bisa menggunakan alat bantu (kertas, pensil/pulpen) untuk menyelesaikan soal tes. Jika kamu mengalami kendala dalam melakukan tes, kamu dapat menghubungi kami di Formulir Pengaduan.. Pertanyaan dalam Tes tidak dapat disebarluaskan.',
                        ],
                        (object) [
                            'title' => 'Apa yang perlu saya siapkan sebelum tes?',
                            'desc' => '
                                <p>Untuk membantu mengerjakan tes, kamu bisa menyiapkan alat bantu (kertas, pensil/pulpen) untuk menyelesaikan soal.</p>
                                      <ol>
                        <li>Kamu bisa menyiapkan alat bantu (kertas, pensil/pulpen)</li>
                        <li>Pimpinan dan Anggota Dewan Perwakilan Rakyat Daerah</li>
                        <li>
                            Pastikan kamu berada di tempat yang kondusif agar kamu fokus dalam pengerjaan tes
                        </li>
                        <li>
                            Pastikan koneksi internet yang stabil</li>
                        <li>
                            Demi kelancaran pengerjaan tes, kami sarankan untuk menggunakan browser Google Chrome, Mozilla Firefox, atau Safari.</li>
                        <li>
                            Jika halaman tes tertutup, kamu harus mengulang pengerjaan tes dari awal</li>
                    </ol>
                    <p>Tes hanya dapat dilakukan 1 (satu) kali dan tidak ada pengulangan. Jadi, pastikan kamu mempersiapkan diri untuk mengerjakan tes sebaik mungkin, ya! . <span class="fw-bold">Pertanyaan dalam Tes tidak dapat disebarluaskan.</span></p>

                    ',
                        ],
                        (object) [
                            'title' => 'Di mana saya bisa mendapatkan informasi mengenai pembukaan Gelombang?',
                            'desc' =>
                                '<p>Kamu bisa mengikuti sosial media resmi Program Kartu Prakerja yang ada di <a href="https://www.facebook.com/prakerja.go.id/">Facebook</a>, <a href="https://www.instagram.com/prakerja.go.id/">Instagram</a> dan <a href="https://www.youtube.com/channel/UCXU-nRpRs5Hk9bF3r28rSDA">YouTube</a> untuk mengetahui informasi pembukaan gelombang.</p>',
                        ],
                        (object) [
                            'title' => 'Apakah yang mempengaruhi kelolosan saya dalam seleksi Gelombang?',
                            'desc' => '
                            Setiap seleksi Gelombang mempunyai periode dan kuota tertentu. Pada saat kamu melakukan proses pendaftaran, jangan lupa untuk segera ikut seleksi Gelombang agar tidak ketinggalan kuota, ya!
                            ',
                        ],
                        (object) [
                            'title' => 'Apakah setiap gelombang mempunyai kuota?',
                            'desc' => '

Ya, setiap Gelombang mempunyai kuota dan periode tertentu. Cek dashboard akun kamu untuk cek Gelombang yang sedang dibuka.
                            ',
                        ],
                        (object) [
                            'title' => 'Kok di dashboard saya tertulis ‘Gelombang belum ditemukan?',
                            'desc' => '

Jika ada informasi demikian, artinya kamu belum dapat bergabung ke Gelombang Kartu Prakerja karena belum ada pembukaan Gelombang baru. Cek terus informasi terbaru mengenai pembukaan gelombang dari media sosial resmi Kartu Prakerja.
                            ',
                        ],
                        (object) [
                            'title' => 'Apakah setiap gelombang mempunyai kuota?',
                            'desc' => '
Ya, setiap Gelombang mempunyai kuota dan periode tertentu. Cek dashboard akun kamu untuk cek Gelombang yang sedang dibuka.
                            ',
                        ],
                        (object) [
                            'title' =>
                                'Kalau saya tidak dapat kuota Gelombang, apakah saya bisa ikut seleksi Gelombang berikutnya?',
                            'desc' => '
Tentu kamu boleh mengikuti seleksi Gelombang periode berikutnya. Di setiap Gelombang yang kamu pilih, kamu akan menerima notifikasi apakah kamu lolos atau tidak di dashboard akun kamu.
                            ',
                        ],
                    ];
                @endphp
                @foreach ($faq_contents as $faq)
                    <div class="mt-4">
                        <h5>{{ $faq->title }}</h5>
                        <p>{!! $faq->desc !!}</p>
                    </div>
                @endforeach
                <div class="mt-4">
                    <h5>Apa maksudnya ‘Dalam Proses Seleksi’ di keterangan dashboard saya?</h5>
                    <p>Itu berarti proses seleksi untuk menjadi Penerima Kartu Prakerja sedang berjalan. Kamu bisa memantau
                        secara berkala dashboard kamu untuk mengetahui status kelolosan kamu.</p>
                    <img src="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=194,h=307,fit=crop/YBgrpNB4o4IBBZ6w/8-mnlvqoQ0kksOOGv1.webp"
                        alt="image">
                </div>
                <div class="mt-4">
                    <h5>Lho, kok saya tidak bisa gabung gelombang?</h5>
                    <p>
                        Ada beberapa hal yang membuat kamu tidak bisa gabung gelombang :</p>
                    <ol>
                        <li>Dalam 1 Kartu Keluarga sudah ada 2 (dua) NIK yang menjadi Penerima Kartu Prakerja</li>
                        <li>Berusia kurang dari 18 (delapan belas) tahun</li>
                        <li>Berusia lebih dari 64 (enam puluh empat) tahun</li>
                        <li>Sedang mengikuti pendidikan formal (sekolah/kuliah)</li>
                        <li>Terdaftar sebagai pihak yang tidak bisa mendapat Kartu Prakerja sesuai dengan peraturan
                            yang
                            berlaku,
                            yaitu:
                            <ul>
                                <li>Pejabat Negara;</li>
                                <li>Pimpinan dan Anggota Dewan Perwakilan Rakyat Daerah;</li>
                                <li>Aparatur Sipil Negara;</li>
                                <li>Prajurit Tentara Nasional Indonesia;</li>
                                <li>Anggota Kepolisian Negara Republik Indonesia;</li>
                                <li>Kepala Desa dan perangkat desa; dan</li>
                                <li>Direksi, Komisaris, dan Dewan Pengawas pada Badan Usaha Milik Negara (BUMN) atau Badan
                                    Usaha
                                    Milik
                                    Daerah (BUMD).</li>
                            </ul>
                        </li>
                    </ol>
                    <img src="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=194,h=307,fit=crop/YBgrpNB4o4IBBZ6w/gelombang-01-Y4LVxweP5qf973jb.jpg"
                        alt="image">
                </div>
            </div>
        </div>
    </section>
@endsection
