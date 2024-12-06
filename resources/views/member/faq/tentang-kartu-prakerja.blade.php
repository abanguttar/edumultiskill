@extends('member/main')
@section('body')
    <section>
        <div class="container-xl d-flex flex-column mt-4 pt-3 gap-2">
            <div>
                <h1>Tentang Kartu Prakerja</h1>
                <span class="text-primary fw-bold">Diperbaharui 20 Februari 2024</span>
            </div>
            @php
                $faq_contents = [
                    (object) [
                        'title' => 'Apa itu Program Kartu Prakerja?',
                        'desc' => 'Program Kartu Prakerja adalah program beasiswa pelatihan untuk meningkatkan kompetensi kerja dan
                        kewirausahaan. Program ini ditujukan bukan hanya untuk pencari kerja, tapi juga mereka yang sudah
                        bekerja maupun buruh yang ingin mendapatkan peningkatan skill atau kompetensi, juga pekerja/buruh
                        yang terkena pemutusan hubungan kerja, termasuk pelaku usaha mikro dan kecil.',
                    ],
                    (object) [
                        'title' => 'Apa sih tujuan Program Kartu Prakerja?',
                        'desc' =>
                            'Program Kartu Prakerja bertujuan untuk mengembangkan kompetensi angkatan kerja, meningkatkan produktivitas dan daya saing angkatan kerja, serta mengembangkan kewirausahaan.',
                    ],
                    (object) [
                        'title' => 'Apakah Kartu Prakerja menggaji pengangguran?',
                        'desc' =>
                            'Tidak. Kartu Prakerja adalah program bantuan biaya pelatihan untuk meningkatkan kompetensi kerja. Jadi, bukan untuk menggaji pengangguran, ya!',
                    ],
                    (object) [
                        'title' => 'Apakah ada batasan umur untuk menjadi Penerima Kartu Prakerja?',
                        'desc' =>
                            'Tentu ada. Hanya warga negara Indonesia yang berumur minimal 18 (delapan belas) tahun dan maksimal 64 (enam puluh empat) tahun yang dapat menjadi Penerima Kartu Prakerja.',
                    ],
                    (object) [
                        'title' => 'Apakah harus menganggur atau korban PHK?',
                        'desc' =>
                            'Tidak, kok! Kartu Prakerja ditujukan untuk angkatan kerja sepanjang memenuhi persyaratan dengan tujuan untuk meningkatkan kompetensi.',
                    ],
                    (object) [
                        'title' =>
                            'Apakah lulusan universitas unggulan dan sudah bekerja bisa dapat manfaat Kartu Prakerja?',
                        'desc' =>
                            'Tentu saja bisa! Pekerja, baik itu lulusan universitas unggulan ataupun tidak, juga butuh peningkatan kompetensi kerja dan keahlian.',
                    ],
                    (object) [
                        'title' =>
                            'Apakah hanya Penerima Kartu Prakerja yang dapat membeli pelatihan di Platform Digital?',
                        'desc' =>
                            'Tentu tidak. Masyarakat umum, bahkan kelompok yang dilarang menjadi Penerima Kartu Prakerja, tetap dapat membeli pelatihan di Platform Digital namun dengan biaya sendiri yang menggunakan alat pembayaran selain Kartu Prakerja. Kartu Prakerja hanya dapat digunakan sebagai alat pembayaran oleh Penerima Kartu Prakerja.',
                    ],
                    (object) [
                        'title' => 'Apakah masyarakat umum juga mendapat sertifikat setelah menyelesaikan pelatihan?',
                        'desc' =>
                            'Masyarakat umum juga akan mendapat sertifikat jika sudah mengikuti pelatihan sampai selesai. Ingat ya, Kartu Prakerja hanya berperan sebagai alat pembayaran di Platform Digital!',
                    ],
                    (object) [
                        'title' =>
                            'Apakah ada jaminan mendapat pekerjaan setelah mengikuti pelatihan di Kartu Prakerja?',
                        'desc' =>
                            'Mendapatkan pekerjaan ditentukan oleh banyak hal selain mengikuti pelatihan di Kartu Prakerja. Kartu Prakerja hanya membantu kamu untuk mendorong kebekerjaan melalui akses untuk skilling, reskilling dan upskilling. Jadi, tetap semangat ya untuk mendapatkan pekerjaan!',
                    ],
                    (object) [
                        'title' => 'Apakah Kartu Prakerja menyediakan kesempatan untuk magang?',
                        'desc' =>
                            'Kartu Prakerja tidak menyediakan kesempatan untuk magang. Ada tidaknya magang ditentukan oleh masing-masing Lembaga Pelatihan.',
                    ],
                    (object) [
                        'title' =>
                            'Apakah saya bisa mendapat Kartu Prakerja jika sudah mendapat bantuan sosial lain dari pemerintah?',
                        'desc' =>
                            'Sejak tahun 2023, kamu tetap bisa menjadi penerima Kartu Prakerja kok meskipun kamu atau keluarga sudah terdaftar sebagai penerima bantuan sosial pemerintah lainnya.',
                    ],
                    (object) [
                        'title' =>
                            'Siapa yang akan melaksanakan operasional Kartu Prakerja dan memberikan persetujuan manfaat Kartu Prakerja?',
                        'desc' =>
                            'Manajemen Pelaksana sebagai unit yang melaksanakan Program Kartu Prakerja dan berada di bawah Kementerian Koordinator Bidang Perekonomian Republik Indonesia yang akan melaksanakan operasional Kartu Prakerja. Semua kebijakan Kartu Prakerja dirumuskan oleh Komite Cipta Kerja yang diketuai oleh Menteri Koordinator Bidang Perekonomian dan Kepala Staf Kepresiden sebagai Wakil Ketua, terdiri dari 12 (dua belas) menteri dan kepala lembaga sebagai anggota dan Sekretaris Kementerian Koordinator Bidang Perekonomian sebagai Sekretaris Komite.',
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
                <div>
                    <h5>Siapa saja sih yang bisa menerima manfaat Kartu Prakerja?</h5>
                    <p>Kamu bisa mendaftar Kartu Prakerja jika kamu adalah pencari kerja, pekerja/buruh yang terkena PHK,
                        atau pekerja/buruh yang membutuhkan peningkatan kompetensi kerja, seperti pekerja/buruh yang
                        dirumahkan dan pekerja bukan penerima upah, termasuk pelaku usaha mikro dan kecil. Untuk itu, kamu
                        harus memenuhi persyaratan sebagai warga negara Indonesia berusia paling rendah 18 (delapan belas)
                        tahun dan paling tinggi 64 (enam puluh empat) tahun yang tidak sedang mengikuti pendidikan formal.
                    </p>

                    <p>Namun, jika kamu adalah salah satu dari pekerjaan di bawah ini, maka kamu tidak bisa mendaftar
                        Program Kartu Prakerja:</p>
                    <ol>
                        <li>Pejabat Negara</li>
                        <li>Pimpinan dan Anggota Dewan Perwakilan Rakyat Daerah</li>
                        <li>
                            Aparatur Sipil Negara</li>
                        <li>
                            Prajurit Tentara Nasional Indonesia
                        </li>
                        <li>
                            Anggota Kepolisian Negara Republik Indonesia</li>
                        <li>
                            Kepala Desa dan perangkat desa</li>
                        <li>
                            Direksi, Komisaris, dan Dewan Pengawas pada badan usaha milik negara atau badan usaha milik
                            daerah.</li>
                    </ol>
                    <p>Selain itu, dalam 1 (satu) Kartu Keluarga hanya diperbolehkan maksimal 2 (dua) NIK yang menjadi
                        Penerima Kartu Prakerja. Jadi, pastikan kalau hanya ada maksimal 2 (dua) anggota keluarga kamu yang
                        menjadi Penerima Kartu Prakerja, ya!</p>
                </div>
            </div>
        </div>
    </section>
@endsection
