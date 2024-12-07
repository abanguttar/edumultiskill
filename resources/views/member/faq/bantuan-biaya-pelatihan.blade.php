@extends('member/main')
@section('body')
    <section>
        <div class="container-xl d-flex flex-column mt-4 pt-3 gap-2">
            <div>
                <h1>{{ ucwords($title) }}</h1>
                <span class="text-primary fw-bold">Diperbaharui 06 November 2023</span>
            </div>
            @php
                $faq_contents = [
                    (object) [
                        'title' => 'Apakah bantuan biaya pelatihan Kartu Prakerja diberikan secara tunai?',
                        'desc' => 'Tidak. Bantuan untuk biaya pelatihan diberikan secara nontunai.',
                    ],
                    (object) [
                        'title' => 'Berapa kali bantuan/manfaat Kartu Prakerja diberikan?',
                        'desc' =>
                            'Bantuan/manfaat Kartu Prakerja diberikan hanya sekali karena Kartu Prakerja hanya dapat diikuti sekali seumur hidup.',
                    ],
                    (object) [
                        'title' => 'Berapa jumlah saldo bantuan pelatihan yang akan saya terima?',
                        'desc' =>
                            'Jika kamu lolos menjadi Penerima Kartu Prakerja, kamu akan mendapat bantuan pelatihan sebesar Rp3.500.000 (tiga juta lima ratus ribu Rupiah).',
                    ],
                    (object) [
                        'title' =>
                            'Bagaimana saya mengetahui besarnya saldo pelatihan Kartu Prakerja yang diberikan pada saya?',
                        'desc' => '
                            Kamu dapat cek saldo bantuan pelatihan pada dashboard akun kamu. Pastikan kamu cek secara berkala di akun kamu, ya!
                            ',
                    ],
                    (object) [
                        'title' => 'Apakah saldo pelatihan Kartu Prakerja saya dapat dipakai oleh orang lain?',
                        'desc' => '
                            Tidak, saldo pelatihan hanya dapat dipakai oleh kamu sendiri sebagai penerima manfaat Kartu Prakerja. Saldo pelatihan tidak dapat dipindahtangankan kepada orang lain.
                            ',
                    ],
                    (object) [
                        'title' => 'Apakah sisa saldo bantuan pelatihan dapat diuangkan?',
                        'desc' => '
                            Tidak bisa. Oleh karena itu, beli pelatihan sebanyak-banyaknya untuk memaksimalkan saldo bantuan pelatihan kamu!
                            ',
                    ],
                    (object) [
                        'title' => 'Apakah saya dapat meminta penambahan saldo bantuan pelatihan?',
                        'desc' => '
                            Manajemen Pelaksana tidak dapat menambah saldo yang telah disetujui. Namun, Manajemen Pelaksana berhak membatalkan saldo secara sementara atau permanen jika ada indikasi kecurangan atau terbukti ada pelanggaran terhadap peraturan yang berlaku dan/atau Syarat dan Ketentuan Kartu Prakerja.

                            ',
                    ],
                ];
            @endphp
            <div>
                @foreach ($faq_contents as $faq)
                    <div class="mt-4">
                        <h5>{{ $faq->title }}</h5>
                        <p>{{ $faq->desc }}</p>
                    </div>
                @endforeach
                <div class="mt-4">
                    <h5>Apakah saldo bantuan pelatihan ada masa kedaluwarsanya?</h5>
                    <p>Kamu tidak bisa membeli pelatihan atau menggunakan saldo bantuan pelatihan jika:</p>
                    <p class="fw-bold">Tidak membeli pelatihan pertama hingga batas waktu</p>
                    <p>Setelah pengumuman penerima Kartu Prakerja pada dashboard, kamu punya waktu 15 (lima belas) hari
                        kalender untuk membeli pelatihan pertama. <br>
                        Skenario <br>
                        Kamu terpilih menjadi penerima Kartu Prakerja dan diumumkan pada tanggal 28 Februari 2024. Maka kamu
                        harus membeli pelatihan pertama kamu paling lambat pada tanggal 13 Maret 2024.</p>
                    <p class="fw-bold">Tidak membeli pelatihan kedua dan seterusnya hingga batas waktu</p>
                    <p>Jika kamu sudah menyelesaikan pelatihan pertama, kamu akan diminta untuk mengisi rating ulasan.
                        Setelah itu harus membeli kembali atau menggunakan sisa saldo bantuan pelatihan untuk membeli
                        pelatihan berikutnya dalam kurun waktu 15 (lima belas) hari kalender setelah mengisi rating dan
                        ulasan pelatihan sebelumnya. <br>

                        Skenario
                        <br>
                        Kamu telah mengisi rating dan ulasan pada tanggal 1 Maret 2024 untuk pelatihan pertama kamu. Maka
                        kamu harus membeli pelatihan kedua kamu paling lambat pada tanggal 15 Maret 2024.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
