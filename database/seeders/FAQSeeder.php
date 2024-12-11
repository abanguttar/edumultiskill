<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\FAQ;
use App\Models\FAQContent;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        FAQ::truncate();
        FAQContent::truncate();

        $faqs = [
            (object)[
                'id' => 'Tentang Kartu Prakerja',
                'content' => [
                    (object) [
                        'title' => 'Apa itu Program Kartu Prakerja?',
                        'desc' => '<p>Program Kartu Prakerja adalah program beasiswa pelatihan untuk meningkatkan kompetensi kerja dan
            kewirausahaan. Program ini ditujukan bukan hanya untuk pencari kerja, tapi juga mereka yang sudah
            bekerja maupun buruh yang ingin mendapatkan peningkatan skill atau kompetensi, juga pekerja/buruh
            yang terkena pemutusan hubungan kerja, termasuk pelaku usaha mikro dan kecil.</p>',
                    ],
                    (object) [
                        'title' => 'Apa sih tujuan Program Kartu Prakerja?',
                        'desc' =>
                        '<p>Program Kartu Prakerja bertujuan untuk mengembangkan kompetensi angkatan kerja, meningkatkan produktivitas dan daya saing angkatan kerja, serta mengembangkan kewirausahaan.</p>',
                    ],
                    (object) [
                        'title' => 'Apakah Kartu Prakerja menggaji pengangguran?',
                        'desc' =>
                        '<p>Tidak. Kartu Prakerja adalah program bantuan biaya pelatihan untuk meningkatkan kompetensi kerja. Jadi, bukan untuk menggaji pengangguran, ya!</p>',
                    ],
                    (object) [
                        'title' => 'Apakah ada batasan umur untuk menjadi Penerima Kartu Prakerja?',
                        'desc' =>
                        '<p>Tentu ada. Hanya warga negara Indonesia yang berumur minimal 18 (delapan belas) tahun dan maksimal 64 (enam puluh empat) tahun yang dapat menjadi Penerima Kartu Prakerja.</p>',
                    ],
                    (object) [
                        'title' => 'Apakah harus menganggur atau korban PHK?',
                        'desc' =>
                        '<p>Tidak, kok! Kartu Prakerja ditujukan untuk angkatan kerja sepanjang memenuhi persyaratan dengan tujuan untuk meningkatkan kompetensi.</p>',
                    ],
                    (object) [
                        'title' =>
                        'Apakah lulusan universitas unggulan dan sudah bekerja bisa dapat manfaat Kartu Prakerja?',
                        'desc' =>
                        '<p>Tentu saja bisa! Pekerja, baik itu lulusan universitas unggulan ataupun tidak, juga butuh peningkatan kompetensi kerja dan keahlian.</p>',
                    ],
                    (object) [
                        'title' =>
                        'Apakah hanya Penerima Kartu Prakerja yang dapat membeli pelatihan di Platform Digital?',
                        'desc' =>
                        '<p>Tentu tidak. Masyarakat umum, bahkan kelompok yang dilarang menjadi Penerima Kartu Prakerja, tetap dapat membeli pelatihan di Platform Digital namun dengan biaya sendiri yang menggunakan alat pembayaran selain Kartu Prakerja. Kartu Prakerja hanya dapat digunakan sebagai alat pembayaran oleh Penerima Kartu Prakerja.</p>',
                    ],
                    (object) [
                        'title' => 'Apakah masyarakat umum juga mendapat sertifikat setelah menyelesaikan pelatihan?',
                        'desc' =>
                        '<p>Masyarakat umum juga akan mendapat sertifikat jika sudah mengikuti pelatihan sampai selesai. Ingat ya, Kartu Prakerja hanya berperan sebagai alat pembayaran di Platform Digital!</p>',
                    ],
                    (object) [
                        'title' =>
                        'Apakah ada jaminan mendapat pekerjaan setelah mengikuti pelatihan di Kartu Prakerja?',
                        'desc' =>
                        '<p>Mendapatkan pekerjaan ditentukan oleh banyak hal selain mengikuti pelatihan di Kartu Prakerja. Kartu Prakerja hanya membantu kamu untuk mendorong kebekerjaan melalui akses untuk skilling, reskilling dan upskilling. Jadi, tetap semangat ya untuk mendapatkan pekerjaan!</p>',
                    ],
                    (object) [
                        'title' => 'Apakah Kartu Prakerja menyediakan kesempatan untuk magang?',
                        'desc' =>
                        '<p>Kartu Prakerja tidak menyediakan kesempatan untuk magang. Ada tidaknya magang ditentukan oleh masing-masing Lembaga Pelatihan.</p>',
                    ],
                    (object) [
                        'title' =>
                        'Apakah saya bisa mendapat Kartu Prakerja jika sudah mendapat bantuan sosial lain dari pemerintah?',
                        'desc' =>
                        '<p>Sejak tahun 2023, kamu tetap bisa menjadi penerima Kartu Prakerja kok meskipun kamu atau keluarga sudah terdaftar sebagai penerima bantuan sosial pemerintah lainnya.</p>',
                    ],
                    (object) [
                        'title' =>
                        'Siapa yang akan melaksanakan operasional Kartu Prakerja dan memberikan persetujuan manfaat Kartu Prakerja?',
                        'desc' =>
                        '<p>Manajemen Pelaksana sebagai unit yang melaksanakan Program Kartu Prakerja dan berada di bawah Kementerian Koordinator Bidang Perekonomian Republik Indonesia yang akan melaksanakan operasional Kartu Prakerja. Semua kebijakan Kartu Prakerja dirumuskan oleh Komite Cipta Kerja yang diketuai oleh Menteri Koordinator Bidang Perekonomian dan Kepala Staf Kepresiden sebagai Wakil Ketua, terdiri dari 12 (dua belas) menteri dan kepala lembaga sebagai anggota dan Sekretaris Kementerian Koordinator Bidang Perekonomian sebagai Sekretaris Komite.</p>',
                    ],
                    (object) [
                        'title' =>
                        'Siapa saja sih yang bisa menerima manfaat Kartu Prakerja?',
                        'desc' =>
                        '<p>Kamu bisa mendaftar Kartu Prakerja jika kamu adalah pencari kerja, pekerja/buruh yang terkena PHK,
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
                        menjadi Penerima Kartu Prakerja, ya!</p>',
                    ],
                ]
            ],
            (object)[
                'id' => 'Akun Saya',
                'content' => [
                    (object)[
                        'title' => 'Bagaimana cara daftar akun?',
                        'desc' => '
                        <article><p>Daftar akun Kartu Prakerja sangat mudah, lho! Kamu bisa pakai email kamu yang masih aktif. Berikut panduannya: Masukkan email dan password kamu, lalu klik <strong>Daftar</strong>.</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/01.png" classname="img-fluid"></div><p>Kamu akan menerima notifikasi via email.</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/02.png" classname="img-fluid"></div><p>Selanjutnya buka email kamu dan lakukan verifikasi yang telah dikirimkan via email.</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-verifikasi-email.png" classname="img-fluid"></div><p>Pendaftaran berhasil. Selamat, kamu telah berhasil membuat akun Kartu Prakerja!</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/04.png" classname="img-fluid"></div></article>
                        ',
                    ],
                    (object)[
                        'title' => 'Apa yang harus saya lakukan jika saya tidak menerima email verifikasi?',
                        'desc' => '
                        <article><p>Kamu bisa cek kotak masuk email atau kotak spam email kamu dan cari kata kunci “Prakerja”. Pastikan email yang kamu daftarkan masih aktif, ya! Jika email verifikasi masih belum diterima, silakan hubungi kami di <a href="/pengaduan"> Formulir Pengaduan.</a></p></article>
                        '
                    ],
                    (object)[
                        'title' => 'Bagaimana ya cara masuk ke akun?',
                        'desc' => '
                        <article><p>Buka laman <a href="/">www.prakerja.go.id</a>. <br>Klik <strong>Masuk</strong> pada halaman depan.<br>Masukkan email dan password akun yang sudah kamu daftarkan serta kode captcha yang kamu lihat. Klik <strong>Masuk</strong>. </p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/alun-login-captcha.png" classname="img-fluid"></div>Kamu akan diarahkan untuk melakukan verifikasi dengan memasukkan kode OTP yang telah dikirim melalu email. Silakan cek <strong>kotak masuk dan spam</strong> email kamu untuk menemukan kode OTP. <p></p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/template_design_email_otp.png" classname="img-fluid"></div><p>Masukkan 6 digit kode OTP dengan benar</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/verifikasi-otp-new.png?v=1" classname="img-fluid"></div><p>Jika kamu salah memasukkan kode OTP atau kode OTP yang dikirim ke email sudah kedaluwarsa, kamu bisa meminta kode baru sebanyak 5 kali. Jika lebih dari 5 kali, kamu harus menunggu selama 2 jam untuk mendapatkan kode yang baru.</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/verifikasi-limit-otp.png?v=1" classname="img-fluid"></div><p>Jika kamu sudah memasukkan kode OTP dengan benar, klik <strong>Verifikasi</strong> dan kamu berhasil masuk ke akunmu</p></article>
                        ',
                    ],
                    (object)[
                        'title' => 'Bagaimana jika saya lupa password',
                        'desc' => '
                        <article><p>Klik <strong>"Lupa <em> Password </em>"</strong> untuk masuk ke Halaman Lupa <em> Password </em></p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/lupa-pw-01.png" classname="img-fluid"></div><p>Kamu dapat memasukkan salah 1 dari opsi berikut untuk dapat memperoleh <em> link reset password </em>:</p><ul><li>Nomor Handphone</li><li>NIK</li><li>E-mail</li></ul><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/lupa-pw-02.png" classname="img-fluid"></div><ul class="listDecimal"><li><em> Input </em> No <em> Handphone </em> untuk <em> Reset Password </em><ul class="alpabhet"><li>Masukkan no <em> handphone </em> beserta tanggal lahir (DD/MM/YYYY) terdaftar Prakerja, kemudian klik tombol Kirim</li><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/lupa-pw-07.png" classname="img-fluid"></div><li>Muncul <em> pop up </em> informasi untuk cek <em> E-mail </em>/SMS, klik tombol Kembali ke <em> Login </em> untuk <em> login </em> ulang setelah <em> Reset Password </em></li><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/lupa-pw-06.png" classname="img-fluid"><li><em> Link reset password </em> akan dikirimkan melalui <em> email </em> dan sms ke no <em> handphone </em> pemilik akun Prakerja</li></div></ul></li><li><em> Input </em> NIK untuk <em> Reset Password </em><ul class="alpabhet"><li>Masukkan NIK beserta tanggal lahir (DD/MM/YYYY) terdaftar Prakerja, kemudian <em> klik </em> tombol Kirim</li><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/lupa-pw-05.png" classname="img-fluid"></div><li>Muncul <em> pop up </em> informasi untuk cek <em> E-mail </em>/SMS, klik tombol Kembali ke <em> Login </em> untuk <em> login </em> ulang setelah <em> Reset Password </em></li><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/lupa-pw-06.png" classname="img-fluid"><li><em> Link reset password </em> akan dikirimkan melalui email dan sms ke no handphone pemilik akun Prakerja</li></div></ul></li><li>Input <em> Email </em> untuk <em> Reset Password </em><ul class="alpabhet"><li>Masukkan alamat <em> email </em> terdaftar Prakerja dan klik tombol Kirim</li><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/lupa-pw-03.png" classname="img-fluid"></div><li>Muncul <em> pop up </em> informasi untuk cek <em> E-mail </em>: <em> “Email reset password kamu sudah terkirim ke [alamat email lengkap]” </em>, klik tombol Kembali ke <em> Login </em> untuk <em> login </em> ulang setelah <em> Reset Password </em></li><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/lupa-pw-04.png" classname="img-fluid"><li><em> Link reset password </em> akan dikirim melalui <em> email </em></li></div></ul></li><li><em> Email </em> &amp; SMS <em> Reset Password </em><ul class="alpabhet"><li><em> Link Reset Password </em> akan dikirimkan melalui:<ul><li><em> Email </em>: ketika pemilik akun input <em> Email </em>/NIK/No. Hp</li><li>SMS: ketika pemilik akun input NIK &amp; No Hp</li></ul></li><li>Alamat <em> Email </em> lengkap terdaftar Prakerja juga akan diinformasikan melalui SMS <em> Reset Password </em></li><div classname="mb-4" style="display: flex;gap: 10px;"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/lupa-pw-09-1.png" classname="img-fluid"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/lupa-pw-09-2.png" classname="img-fluid"></div></ul></li></ul></article>
                        ',
                    ],
                    (object)[
                        'title' => 'Bagaimana jika saya tidak bisa masuk ke akun Prakerja?',
                        'desc' => '
<article><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-bagaimana-jika-tidak-bisa-masuk.png" classname="img-fluid"></div><p>Apabila kamu tidak bisa masuk ke akun Prakerja karena akun gagal terverifikasi dan diblokir seperti tampilan di atas, kamu bisa hubungi kami melalui <a href="https://www.prakerja.go.id/formulir-pengaduan">Formulir Pengaduan</a>dengan melampirkan:</p><ul class="listDecimal"><li>Foto e-KTP asli terdaftar</li><li>Foto KK asli terdaftar</li><li>Swafoto dengan memegang e-KTP asli terdaftar</li><li>Swafoto dengan memegang KK asli terdaftar</li></ul><p>Jika data yang kamu berikan sudah lengkap, akan segera dilakukan pengecekan. Mohon ditunggu ya sampai kamu bisa masuk kembali ke akun Prakerja!</p></article>
                        ',
                    ],
                    (object)[
                        'title' => 'Kok saya tidak menerima kode verifikasi atau OTP?',
                        'desc' => '
<article><p>Kode Verifikasi atau OTP (One-Time Password) adalah password dinamis yang terdiri dari 4 maupun 6 digit angka unik dan rahasia yang biasanya dikirimkan melalui SMS atau email yang tercantum pada akun Kartu Prakerja kamu. Kode ini berfungsi sebagai alat validasi untuk mencegah adanya tindakan penyalahgunaan akun. Setiap kode yang dikirimkan ini umumnya hanya berlaku selama beberapa menit.</p><p>Kamu tidak akan menerima kode OTP apabila nomor telepon atau email yang tercantum pada akun sudah tidak digunakan atau sudah tidak aktif. Untuk itu, kamu harus pastikan bahwa nomor telepon maupun email yang terdaftar pada akun kamu sudah sesuai dengan yang digunakan saat ini.</p><p>Apabila nomor telepon dan email yang kamu gunakan saat ini masih aktif namun kamu tidak menerima kode OTP, silakan hubungi kami di <a href="https://www.prakerja.go.id/formulir-pengaduan">Formulir Pengaduan</a>.</p></article>
                        ',
                    ],
                    (object)[
                        'title' => 'Mengapa akun saya diblokir?',
                        'desc' => '
<article><p>Manajemen Pelaksana sebagai pengelola situs Kartu Prakerja berhak memblokir akun pengguna yang melanggar Syarat dan Ketentuan. Pastikan bahwa kamu telah membaca, mengerti, memahami dan menyetujui semua isi di dalam <br><a href="https://www.prakerja.go.id/syarat-ketentuan">Syarat dan Ketentuan</a>.</p><p>Apabila kamu merasa tidak melakukan pelanggaran yang ada di bagian Syarat dan Ketentuan Kartu Prakerja namun akun kamu diblokir, silakan hubungi kami di <a href="https://www.prakerja.go.id/formulir-pengaduan">Formulir Pengaduan</a>.</p></article>
                        ',
                    ],
                    (object)[
                        'title' => 'Mengapa saya mendapatkan pemberitahuan "Akun kamu terindikasi melakukan kecurangan" pada dashboard saya?',
                        'desc' => '
<article><p>Jika kamu mendapatkan pemberitahuan tersebut di dashboard kamu, berarti akun kamu terdeteksi melakukan kecurangan karena proses verifikasi wajah tidak sesuai dengan ketentuan. Pastikan kamu melakukan verifikasi wajah dengan wajah kamu sendiri, tidak diwakili oleh orang lain, dan scan wajah melalui kamera handphone atau laptop kamu langsung.</p></article>
                        ',
                    ],
                    (object)[
                        'title' => 'Apakah saya bisa mengubah nama akun?',
                        'desc' => '
<p>Nama pada akun Kartu Prakerja kamu akan otomatis terdaftar sesuai dengan nama yang ada di Kartu Tanda Penduduk dan tidak dapat diubah.</p>
                        ',
                    ],
                    (object)[
                        'title' => 'Apakah saya bisa mengubah password akun?',
                        'desc' => '
<article><p>Password merupakan hal penting saat kamu ingin login ke akun Kartu Prakerja. Apabila kamu merasa passwordmu mudah ditebak atau sudah tidak aman, kamu dapat melakukan perubahan password secara berkala.</p><p>Apabila kamu ingin mengubah password, silakan ikuti langkah-langkah berikut ini:</p><ul><li><p>Login atau masuk ke akun Kartu Prakerja kamu</p></li><li><p>Pilih <strong>Profile</strong>, lalu klik <strong>Ubah Password/Password</strong></p></li><li><p>Masukkan password lama, lalu masukkan password baru</p></li><li><p>Klik <strong>Ubah/Atur Ulang</strong></p></li></ul><p>Tolong diingat bahwa password merupakan hal rahasia. Oleh karena itu, jangan memberikan atau menyebarkan password akunmu kepada pihak lain.</p></article>
                        ',
                    ],
                    (object)[
                        'title' => 'Apakah saya bisa mengubah nomor HP?',
                        'desc' => '
<article><p>Kamu bisa mengubah nomor HP jika kamu merupakan Penerima Prakerja di tahun berjalan.</p><p>Di dashboard kamu, pilih <strong>Profil</strong>. Klik Ubah pada bagian Nomor Handphone</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-ubah-no-handphone-01.png?v=1.1" classname="img-fluid"></div><p>Sebelum ubah nomor HP, kamu harus putuskan rekening terlebih dahulu agar tetap bisa menerima insentif</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-ubah-no-handphone-02.png" classname="img-fluid"></div><p>Klik <strong>Ya, Putuskan Rekening</strong></p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-ubah-no-handphone-03.png" classname="img-fluid"></div><p>Kamu berhasil memutuskan rekening. Selanjutnya klik <strong>Ganti Nomor</strong></p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-ubah-no-handphone-04.png" classname="img-fluid"></div><p>Masukkan nomor HP kamu yang baru, lalu klik <strong>Lanjutkan</strong></p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-ubah-no-handphone-05.png" classname="img-fluid"></div><p>Masukkan 6 (enam) digit kode OTP yang sudah dikirimkan ke nomor HP terbaru kamu. Klik <strong>Verifikasi</strong></p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-ubah-no-handphone-06.png" classname="img-fluid"></div><p>Nomor HP kamu berhasil diubah! Jangan lupa sambungkan akun e-wallet kamu dengan nomor HP yang baru agar tetap bisa menerima insentif.</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-ubah-no-handphone-07.png" classname="img-fluid"></div></article>
                        ',
                    ],
                    (object)[
                        'title' => 'Bagaimana kalau akun saya disalahgunakan orang lain?',
                        'desc' => '
<p>Apabila kamu merasa ada orang lain yang menggunakan akun kamu atau ada perubahan password tanpa sepengetahuan kamu, segera ubah password di halaman Profil kamu. Apabila terdapat perubahan password tanpa sepengetahuan kamu sebagai pemilik akun, silakan klik tombol <strong>Lupa password?</strong> yang ada di halaman awal login/masuk. Saat mengganti password, jangan pernah membagikan link verifikasi atau kode verifikasi/OTP atau password kepada orang lain untuk menghindari kebocoran akun.</p>
                        ',
                    ],
                    (object)[
                        'title' => 'Bagaimana ya cara menjaga keamanan akun saya?',
                        'desc' => '
<article><p>Untuk mencegah penipuan oleh pihak yang tidak bertanggung jawab, pastikan kamu memahami panduan keamanan berikut:</p><ul><li><p>Kode one-time password (OTP) atau kode verifikasi adalah informasi rahasia. Jangan bagikan kode tersebut ke pihak manapun, termasuk ke pihak yang mengaku sebagai karyawan Manajemen Pelaksana atau Pemerintah.</p></li><li><p>Jangan mudah percaya pada pihak yang mengaku sebagai karyawan Manajemen Pelaksana atau Pemerintah, dan jangan memberitahukan data pribadi atau mentransfer sejumlah dana ke pihak tersebut.</p></li><li><p>Waspadalah apabila kamu diminta untuk mengakses sebuah link oleh pihak lain. Jangan mengakses link yang mengharuskan kamu untuk memberikan nama akun dan password.</p></li><li><p>Ganti password akun Kartu Prakerja dan akun email pribadi kamu secara berkala dan jangan menggunakan password yang sama dan mudah ditebak.</p></li><li><p>Semua informasi akan dipublikasikan melalui kanal resmi Kartu Prakerja, yaitu di website <a href="/">www.prakerja.go.id</a>, email dengan domain @prakerja.go.id, atau lewat media sosial resmi Kartu Prakerja.</p></li><li><p>Kenali akun resmi Kartu Prakerja dengan baik.</p></li></ul></article>
                        ',
                    ],
                    (object)[
                        'title' => 'Apakah saya bisa menghapus akun Kartu Prakerja?',
                        'desc' => '
<p>Sekali terdaftar, kamu tidak bisa menghapus akun Kartu Prakerja kamu.</p>
                        ',
                    ],
                ]
            ],
            (object)[
                'id' => 'Pendaftaran',
                'content' => [
                    (object)[
                        'title' => 'Apa saja tahap pendaftaran Kartu Prakerja?',
                        'desc' => '
                        <article><p>Masukkan <em> email </em> dan <em> password </em> akun kamu untuk bisa mendaftar Kartu Prakerja.</p><div class="mb-6"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-pendaftaran-01.png?v=1.1" classname="img-fluid"></div><p>Isi NIK, nomor KK dan tanggal lahir kamu, lalu klik <strong>Lanjut</strong></p><div classname="mb-6"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-pendaftaran-02.png?v=1.1" classname="img-fluid"></div><p>Lengkapi data diri kamu. Pastikan data yang kamu masukkan sudah sesuai.</p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-pendaftaran-03.png?v=1.1" classname="img-fluid"></div><p>Saat kamu memasukkan alamat sesuai KTP, pastikan alamat yang kamu masukkan sudah <strong>sama persis dengan kolom Alamat di KTP</strong> seperti yang bisa dilihat dibawah ini: </p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/16.0.0a_OCR_datadiri_update.png" class="img-fluid img-ktp"></div><p>Ingat ya, kamu hanya perlu memasukkan alamat kamu seperti yang ada didalam <strong>kotak merah</strong> tersebut!</p><p>Pastikan juga nama lengkap dan nama ibu kandung yang kamu masukkan sudah sesuai. Jika data tidak sesuai, kamu dapat menghubungi Dukcapil melalui telepon <a href="tel:1500537">1500537</a>, Whatsapp/SMS <a target="_blank" href="https://wa.me/628118005373">08118005373</a>, email <a target="_blank" href="mailto:callcenter@dukcapil.kemendagri.go.id">callcenter@dukcapil.kemendagri.go.id</a>, atau kunjungi kantor Dukcapil terdekat untuk dilakukan pengecekan lebih lanjut.</p><p>Saat menghubungi Dinas Kependudukan dan Pencatatan Sipil (“Dukcapil”), kamu akan diminta untuk memberikan data berupa NIK, nama lengkap sesuai dengan KTP, nomor kartu keluarga, nomor telepon, domisili kota/kabupaten, serta detil permasalahan kamu.</p><p> Pastikan kamu memberikan data yang benar. Setelah itu kamu akan disambungkan dengan customer service Dukcapil. Mohon untuk menunggu jawaban dari pihak Dukcapil.</p><p>Untuk dapat melanjutkan ke verifikasi foto e-KTP, kamu harus mengambil foto dari <em> handphone </em> kamu. Jika kamu mengakses dengan komputer, segera lanjutkan pendaftaran melalui browser HP, ya!</p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/verify-ktp.png" classname="img-fluid"></div><p>Saat mengunggah foto KTP, perhatikan ketentuan yang tercantum agar proses verifikasi e-KTP kamu berjalan lancar</p><div classname="mb-6"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-pendaftaran-04.png?v=1.1" classname="img-fluid"></div><p>Pastikan kamu mengunggah <strong>foto yang diambil langsung dari kamera HP</strong> kamu, ya! </p><div classname="mb-6"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/16.0.1_OCR_update.png" classname="img-fluid"></div><p>Sesuaikan foto yang kamu ambil dengan memperhatikan panduan</p><div classname="mb-6"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/16.0.6_OCR_update2.png" classname="img-fluid"></div><p>Jika foto KTP kamu sudah susuai ketentuan, klik <strong>Gunakan Foto</strong></p><div classname="mb-6"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/16.0.7_OCR_update2.png" classname="img-fluid"></div><p>Tunggu sebentar sampai sistem selesai memverifikasi foto KTP yang kamu unggah</p><div classname="mb-6"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/16.0.8_OCR_update2.png" classname="img-fluid"></div><p>Langkah berikutnya adalah verifikasi dengan cara <i>scan</i> (pindai) wajah sambil berkedip. Pastikan kamu memerhatikan ketentuan yang tercantum agar proses verifikasi berjalan lancar, ya! </p><div classname="mb-6"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-pendaftaran-05.png?v=1.1" classname="img-fluid"></div><p>Klik <strong>Scan Wajah</strong>, lalu ikuti arahan agar verifikasi berjalan lancar. Pastikan kamu mengatur bagian wajah agar sesuai dengan area yang disediakan dan mengedipkan mata. </p><div classname="mb-6"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-pendaftaran-06.png?v=1.1" classname="img-fluid"></div><p>Pastikan kamu mengikuti panduan verifikasi wajah berikut ini:</p><ul class="listDecimal"> <li>Pastikan kamu melakukan verifikasi wajah dengan wajah kamu sendiri, tidak diwakili oleh orang lain, dan scan wajah melalui kamera handphone atau laptop kamu langsung.</li><li>Seluruh wajah kamu harus masuk ke dalam frame yang tersedia dan terlihat jelas pada <em> frame </em>.</li><li>Pastikan wajah terlihat dengan pencahayaan yang cukup, tidak buram dan tidak gelap.</li><li>Pastikan verifikasi wajah dengan posisi lurus atau tidak miring.</li><li>Pastikan area wajah terlihat jelas tanpa menggunakan aksesoris (kacamata, masker dan sebagainya).</li><li>Kedipkan mata untuk verifikasi wajah. </li><li>Verifikasi wajah yang diambil tidak perlu disertai KTP.</li><li>Pastikan saat melakukan verifikasi wajah tidak ada orang lain di belakangmu.</li></ul><div classname="mb-6"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/17.0.6_Selfie3.png" classname="img-fluid"></div><p>Sistem sedang melakukan pengecekan wajah. Silakan menunggu untuk lanjut ke tahap berikutnya.</p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-minat-keterampilan-01.png?v=1.2" classname="img-fluid"></div><p>Jawab pertanyaan mengenai alasan kamu ikut Kartu Prakerja sesuai dengan keadaan kamu sesungguhnya.</p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-minat-keterampilan-02.png?v=1.2" classname="img-fluid"></div><p>Selanjutnya, kamu harus mengisi pertanyaan mengenai minat dan keterampilan pelatihan. Kamu akan ditanyakan mengenai status pekerjaan, jenis pekerjaan, jenjang pendidikan dan keterampilan yang kamu minati. Ingat ya, kamu harus menjawab semua pertanyaan dengan jujur!</p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-otp-handphone-01.png?v=1.2" classname="img-fluid"></div><p>Selanjutnya, kamu harus melakukan verifikasi nomor handphone. Masukkan 6 (enam) digit kode OTP yang sudah dikirimkan ke nomor HP kamu. Klik <strong>Kirim OTP</strong>.</p><p>Jika kamu telah salah memasukkan OTP lebih dari 3 (tiga) kali, maka kamu harus menunggu dan mencoba kembali setelah 24 (dua puluh empat) jam untuk mengirimkan ulang OTP yang benar.</p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-otp-handphone-02.png?v=1.2" classname="img-fluid"></div><p>Selanjutnya, isi Pernyataan Pendaftar sesuai dengan kondisi kamu</p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-user-agreement-01.png?v=1.1" classname="img-fluid"></div><p>Isi sampai selesai, jika sudah selesai klik <strong>Lanjut</strong>. </p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/16.png" classname="img-fluid"></div><p> Berikutnya, kamu wajib mengerjakan Tes Kemampuan Dasar (TKD)/Soal Kemampuan Belajar (SKB).<strong> Pertanyaan dalam Tes tidak dapat disebarluaskan.</strong> </p><div class="row"> <div class="mb-4 col-6"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-user-tkd-01.png?v=1.1" class="img-fluid img-100"> </div></div><p>Klik <strong>Lanjut</strong>. </p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/18.png" classname="img-fluid"></div><p>Pendaftaran kamu sedikit lagi selesai dan kamu tinggal ikut seleksi Gelombang. <br>Pilih Gelombang yang tersedia di dashboard sesuai dengan alamat KTP kamu, lalu klik <strong>Gabung Gelombang</strong>. </p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/19a.png" classname="img-fluid"></div><p>Selanjutnya akan muncul konfirmasi pilihan Gelombang kamu. <br>Bila sudah sesuai, klik <strong>Gabung</strong>.</p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/20a.png" classname="img-fluid"></div><p>Akan muncul Persetujuan Prakerja yang berisi beberapa pernyataan. Kamu harus klik <strong>Saya Menyetujui</strong> untuk dapat lanjut ke tahap berikutnya. </p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/21.png" classname="img-fluid"></div><p>Tahap pendaftaran kamu selesai!</p><div classname="mb-4"> <img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/22a.png" classname="img-fluid"></div><p>Selanjutnya kamu akan menerima notifikasi kelolosan melalui SMS dan email setelah penutupan Gelombang. Jika kamu belum lolos, kamu bisa ikut Gelombang berikutnya yang dapat dipilih kembali di dashboard akun kamu.</p></article>

                        ',
                    ],
                    (object)[
                        'title' => 'Apakah saya bisa mengganti data pendaftaran saya?',
                        'desc' => '<article><p>Apabila akun kamu telah terdaftar di tahun sebelumnya, kamu dapat mengganti data pendaftaran yang sudah kamu isi jika memang ada perubahan. Setelah kamu login, kamu harus harus konfirmasi apakah NIK kamu masih sama dengan sebelumnya.</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-user-confirmation-01.png?v=1.1" classname="img-fluid"></div><p>Jika NIK kamu masih sesuai, klik Ya, Benar. Namun, jika ada pembaruan pada NIK dan/atau nomor KK kamu, silakan klik Ganti dan isi kembali data diri kamu.</p></article>
                        ',
                    ],
                    (object)[
                        'title' => 'Bagaimana cara saya mengecek status pendaftaran Gelombang?',
                        'desc' => '
<article><p>Pada tanggal pengumuman seleksi Gelombang, login ke akun kamu untuk melihat hasil pengumuman. Jika lolos seleksi Gelombang, kamu juga akan menerima notifikasi kelolosan melalui SMS dan email. Jika kamu tidak lolos, akan ada notifikasi “Kamu Belum Lolos Gelombang” pada dashboard akun kamu.</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/24a.png" classname="img-fluid"></div></article>
                        ',
                    ],
                    (object)[
                        'title' => 'Apa yang harus saya lakukan jika NIK saya sudah terdaftar?',
                        'desc' => '
<article><p>Jika NIK kamu sudah terdaftar, artinya kamu sudah pernah melakukan pendaftaran Kartu Prakerja sebelumnya. Pastikan kamu telah mengecek kotak masuk e-mail dengan mencari kata kunci “Prakerja” untuk mengetahui akun mana yang sudah pernah didaftarkan ke Kartu Prakerja. Selain itu, kamu juga bisa klik <strong>Lupa Password</strong> dan masukkan NIK yang terdaftar.</p></article>
                        ',
                    ],
                    (object)[
                        'title' => 'Apa yang harus saya lakukan jika tidak bisa  mengaktifkan lokasi saya?',
                        'desc' => '
                        <article><p>  Kamu harus mengizinkan untuk mengaktifkan lokasi perangkat kamu. Jika kamu belum tahu bagaimana    cara untuk mengaktifkannya, silakan lihat panduan di bawah ini: </p> <p> <strong> 1. Android </strong> </p> <p> Ketika masuk ke laman login, akan langsung muncul notifikasi untuk mengizinkan lokasi perangkat kamu. Klik <strong>  Izinkan </strong> </p> <div classname="mb-4"><img src=" https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/loc-1.png" classname="img-fluid"></div> <p> Jika kamu ingin melihat bagaimana cara untuk izinkan lokasi, kamu akan mendapat notifikasi lalu <strong> Klik Cara Izinkan Lokasi</strong> </p> <div classname="mb-4"><img src=" https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/loc-2.png" classname="img-fluid"></div> <p> Klik ikon gembok yang ada di kolom pencarian browser perangkat kamu. Jika lokasi kamu diblokir, klik menu Izin seperti yang bertanda merah di bawah ini </p> <div classname="mb-4"><img src=" https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/loc-3.png" classname="img-fluid"></div> <p> Geser <strong> tombol bulat </strong> untuk mengaktifkan izin lokasi. Lalu klik <strong> Sudah Izinkan Lokasi </strong> untuk kembali ke laman login. </p> <div classname="mb-4"><img src=" https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/loc-4.png" classname="img-fluid"></div> <p>   <strong> 2.Iphone </strong> </p> <p> Jika kamu menggunakan perangkat iPhone, untuk mengaktifkan lokasi kamu harus masuk ke menu Pengaturan atau <strong>Settings</strong>, lalu pilih <strong>Privacy</strong> </p> <div classname="mb-4"><img src=" https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-izinkan-lokasi-01.png" classname="img-fluid"></div> <p> Geser <strong> tombol bulat </strong> untuk mengaktifkan izin lokasi </p> <div classname="mb-4"><img src=" https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/loc-6.png" classname="img-fluid"></div> </article>
                        ',
                    ],
                ]
            ],
            (object)[
                'id' => 'Penyambungan Rekening/E-Money',
                'content' => [

                    (object) [
                        'title' => 'Bagaimana cara saya menyambungkan nomor rekening atau akun e-money untuk insentif?',
                        'desc' => '
                        <article><p>Sebelum menyambungkan rekening bank atau e-money, pastikan:</p> <ul> <li> <p>Rekening bank/e-money kamu masih aktif</p> </li> <li> <p>Rekening bank dalam mata uang Rupiah;</p> </li> <li> <p>Nomor rekening bank/e-money kamu merupakan atas nama kamu sendiri yang sesuai dengan KTP atau sesuai dengan terdaftar di Kartu Prakerja dan menggunakan NIK yang sama dengan NIK yang terdaftar di Kartu Prakerja;</p> </li> <li> <p>Jika memilih e-money, pastikan kamu telah mempunyai akun e-money di salah satu mitra kami (OVO, LinkAja, GoPay dan DANA);</p> </li> <li> <p>Pastikan nomor HP yang teregistrasi di Kartu Prakerja merupakan nomor telepon akun e-money kamu;</p> </li> <li> <p>Akun e-money kamu sudah di-upgrade atau akun e-money yang KYC (verifikasi KTP &amp; swafoto).</p> </li> </ul> <p><strong>Cara sambung rekening/e-money:</strong></p> <p>Setelah menonton 3 video tentang Kartu Prakerja, kamu akan diarahkan untuk melakukan penyambungan rekening/e-money. Klik <strong>Sambungkan Sekarang</strong>.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/38-1.png" classname="img-fluid"></div> <p>Jika kamu mau menyambungkan dengan rekening bank, pilih bank yang diinginkan lalu klik <strong>Sambungkan</strong>.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/0.0.0.1.1_bni2_wallet.png" classname="img-fluid"></div> <p>Masukkan data rekening kamu. Pastikan kamu memasukkan data yang benar. Lalu klik <strong>Sambungkan </strong>.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/40-1.png" classname="img-fluid"></div> <p>Klik <strong>Ya, Sambungkan. </strong>Pastikan data rekening yang kamu masukkan selalu aktif.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/45-2.png" classname="img-fluid"></div> <p>Selamat! Rekening bank kamu sudah tersambung ke akun Prakerja.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/45-1.png" classname="img-fluid"></div> <p>Jika kamu memilih e-money, pilih e-money yang diinginkan lalu klik <strong>Sambungkan</strong>. Pastikan nomor HP yang teregistrasi di akun Kartu Prakerja merupakan nomor HP e-money kamu yang telah KYC atau e-money yang sudah di-upgrade atau premium.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/11.1.0.1.2.png" classname="img-fluid"></div> <p>Masukkan nomor HP kamu. Pastikan kamu memasukkan data yang benar. Lalu klik <strong>Sambungkan</strong>.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/11-11-0.png" classname="img-fluid"></div> <p>Klik <strong>Ya, Sambungkan </strong>. Pastikan data nomor HP yang kamu masukkan selalu aktif.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/11-11-3A.png" classname="img-fluid"></div> <p>Masukkan nomor OTP yang telah dikirimkan via SMS ke nomor HP kamu.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/popup_verifikasi_otp.png" classname="img-fluid"></div> <p>Jika kamu telah salah memasukkan OTP lebih dari 3 (tiga) kali, maka kamu harus menunggu dan mencoba kembali setelah 1 (satu) jam untuk mengirimkan ulang OTP yang benar.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/popup_pendaftaran_berhasil-2.png" classname="img-fluid"></div> <p>Selanjutnya, masukkan security code akun e-money yang kamu pilih untuk disambungkan.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/popup_OVO_filled.png" classname="img-fluid"></div> <p>Selamat, kamu berhasil menyambungkan akun e-money kamu!.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/45-3.png" classname="img-fluid"></div></article>
                        '
                    ],
                    (object) [
                        'title' => 'Bagaimana jika saya gagal menyambungkan nomor rekening atau e-money saya?',
                        'desc' => '
                        <article><p><b>Jika kamu adalah pemilik e-money silakan ikuti tahapan berikut untuk proses sambung rekening:</b></p><ul><li>Pastikan nomor telepon yang kamu miliki aktif dan sama dengan yang terdaftar pada Akun Prakerja</li><li>Akun e-money harus aktif</li><li>Status e-money sudah KYC (upgrade) dengan NIK dan nama yang terdaftar sesuai pada Akun Prakerja</li></ul><p><b>Apabila nomor HP yang kamu miliki belum terdaftar, silakan lakukan konfirmasi ke pihak ke e-money berikut:</b></p><p>GoPay : Hubungi email customerservice@gojek.com atau melalui menu bantuan di aplikasi Gojek</p><p>OVO : Download aplikasi OVO di Play Store atau App Store dan ikuti instruksi selanjutnya untuk mendaftarkan nomor HP yang kamu miliki</p><p>LinkAja : Download aplikasi LinkAja di Play Store atau App Store dan lakukan upgrade ke full service</p><p>DANA : Download aplikasi DANA di Play Store atau App Store dan ikuti instruksi selanjutnya untuk mendaftarkan nomor HP yang kamu miliki</p><p><b>Apabila kamu masih mengalami kendala pada saat menyambungkan rekening bank atau e-money, kamu dapat menghubungi customer service mitra e-money berikut:</b></p><p>OVO : 1500696/cs@ovo.id</p><p>GoPay : customerservice@gojek.com</p><p>LinkAja : 150911</p><p>DANA: 1500445/help@dana.id</p><p>Jika kamu adalah pemilik <b>rekening bank</b> pastikan bahwa NIK dan Nama yang terdaftar pada rekening bank harus sama dengan yang didaftarkan pada akun Prakerja</p><p><b>Untuk mendaftarkan rekening bank kamu juga bisa ikuti cara berikut:</b></p><p>BNI : Hubungi BNI Call 1500046 atau kunjungi cabang BNI terdekat</p><p>BCA : Hubungi Halo BCA 1500888 atau kunjungi cabang BCA terdekat</p><p><b>Apabila kamu masih mengalami kendala pada saat menyambungkan rekening bank atau e-money, kamu dapat menghubungi customer service mitra bank berikut:</b></p><p>BCA : 1500888</p><p>BNI : 1500046</p><p><b>Rekening bank/e-money akan gagal tersambung jika:</b></p><ul><li>NIK dan nama di rekening bank atau e-money tidak sama dengan yang didaftarkan pada akun Kartu Prakerja. </li><li>Menggunakan NIK yang bukan milik pribadi </li><li>Akun e-money belum KYC (upgrade)</li></ul></article>
                        '
                    ],
                    (object) [
                        'title' => 'Bagaimana cara saya upgrade akun e-money?',
                        'desc' => '<article><p>Kamu dapat melakukan upgrade akun e-money di aplikasi e-money pilihan kamu (OVO, LinkAja, Gopay, DANA). Ikuti langkah-langkah upgrade di aplikasi e-money tersebut.</p> <p>Jika kamu masih mengalami kendala, kamu dapat menghubungi customer service e-money di:</p> <ul> <li> <p>OVO: <a href="tel:1500696">1500696</a> / <a href="mailto:cs@ovo.id">cs@ovo.id</a></p> </li> <li> <p>GoPay: <a href="mailto:customerservice@gojek.com">customerservice@gojek.com</a></p> </li> <li> <p>LinkAja: <a href="tel:150911">150911</a></p> </li> <li> <p>DANA: <a href="tel:1500445">1500445</a> / <a href="mailto:help@dana.id">help@dana.id</a></p> </li> </ul></article>
                        '
                    ],
                    (object) [
                        'title' => 'Apakah ada batas waktu penyambungan rekening?',
                        'desc' => '<p>Tentu saja ada! Pastikan kamu sudah menyambungkan rekening bank/e-money yang masih aktif ke akun Prakerja kamu <strong>paling lambat tanggal 3 Desember</strong> pada tahun anggaran berjalan.</p>
                        '
                    ],
                    (object) [
                        'title' => 'Bagaimana jika saya belum upgrade akun e-money?',
                        'desc' => '
                        <article><p>Jika kamu belum melakukan melakukan upgrade akun e-money kamu, akan muncul tampilan seperti ini:</p> <div classname="mb-4 col-6 col-md5"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/81.png" classname="img-fluid"></div> <div classname="mb-4 col-6 col-md5"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/82.png" classname="img-fluid"></div> <div classname="mb-4 col-6 col-md5"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/83.png" classname="img-fluid"></div> <div classname="mb-4 col-6 col-md5"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/84.png" classname="img-fluid"></div> <p>Segera lakukan upgrade e-money agar kamu dapat menerima insentif, ya!</p></article>
                        '
                    ],
                    (object) [
                        'title' => 'Bagaimana jika akun bank atau e-money saya tidak aktif atau terblokir?',
                        'desc' => '
                        <article><p>Jika akun bank atau e-money kamu terblokir, kamu dapat menghubungi customer service bank atau e-money yang kamu gunakan atau kamu dapat menghubungi kami di <a href="https://bantuan.prakerja.go.id/hc/id/requests/new" target="_blank"><strong>Formulir Pengaduan</strong></a></p><p>Mitra Pembayaran:</p><ul><li>OVO: 1500696/cs@ovo.id</li><li>GoPay: customerservice@gojek.com</li><li>LinkAja: 150911</li><li>DANA: 1500445/help@dana.id</li><li>BCA: 1500888</li><li>BNI: 1500046</li></ul></article>
                        '
                    ],
                    (object) [
                        'title' => 'Bagaimana jika data rekening saya sudah pernah didaftarkan?',
                        'desc' => '
                        <article><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/rekening-sudah-terdaftar.png" classname="img-fluid"></div> <p>Jika rekening bank yang kamu daftarkan sudah pernah didaftarkan sebelumnya, kamu bisa menggantinya dengan rekening bank yang lain.</p></article>
                        '
                    ],
                    (object) [
                        'title' => 'Bagaimana jika nama saya tidak sesuai dengan rekening bank/e-money?',
                        'desc' => '
                        <article><p>Nama kamu harus sesuai antara akun prakerja dan e-money/bank yang kamu daftarkan.</p><p>Jika kamu masih mengalami kendala, contact center ke masing-masing mitra pembayaran</p><ul><li>OVO: 1500696/cs@ovo.id</li><li>GoPay: customerservice@gojek.com</li><li>LinkAja: 150911</li><li>DANA: 1500445/help@dana.id</li><li>BCA: 1500888</li><li>BNI: 1500046</li></ul></article>
                        '
                    ],
                    (object) [
                        'title' => 'Bagaimana cara saya melakukan pemutusan nomor rekening atau akun e-money untuk insentif?',
                        'desc' => '
                        <article><p>Jika kamu telah menyambungkan rekening e-money, kamu bisa mengikuti langkah berikut:</p> <p>Pada tampilan dashboard rekening kamu, pilih <strong>Ubah</strong>.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/54.png" classname="img-fluid"></div> <p>Klik <strong>Ya, Putuskan Rekening</strong> untuk memutuskan rekening kamu.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/55.png" classname="img-fluid"></div> <p>Sistem akan memproses pemutusan rekening</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/56.png" classname="img-fluid"></div> <p>Rekening berhasil diputuskan. Kamu harus segera menyambung ulang rekening sesuai langkah penyambungan rekening.</p> <p>Jika sebelumnya kamu telah menyambungkan rekening bank, kamu bisa ikuti langkah berikut:</p> <p>Pada tampilan dashboard rekening kamu, pilih <strong>Ubah</strong>.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/0.0.0_unlink_wallet.png" classname="img-fluid"></div> <p>Klik <strong>Ya, Putuskan Rekening</strong> untuk memutuskan rekening kamu.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/putuskan-rekening.png" classname="img-fluid"></div> <p>Sistem akan memproses pemutusan rekening</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/56.png" classname="img-fluid"></div> <p>Rekening berhasil diputuskan. Kamu harus menyambung ulang rekening sesuai langkah penyambungan rekening.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/success-unlink.png" classname="img-fluid"></div></article>
                        '
                    ],

                ]
            ],


            (object)[
                'id' => 'Tes & Seleksi',
                'content' => [
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
                    (object) [
                        'title' =>
                        'Apa maksudnya ‘Dalam Proses Seleksi’ di keterangan dashboard saya?',
                        'desc' => '<p>
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
                        alt="image">',
                    ],
                ]
            ],
            (object)[
                'id' => 'Hasil Seleksi',
                'content' => [
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
                ]
            ],
            (object)[
                'id' => 'bantuan biaya pelatihan',
                'content' =>  [
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
                    (object) [
                        'title' => 'Apakah saldo bantuan pelatihan ada masa kedaluwarsanya?',
                        'desc' => '
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
                    </p>',
                    ],

                ],


            ],
            (object)[
                'id' => 'pelatihan',
                'content' => [
                    (object) [
                        'title' => 'Di mana saja saya dapat menggunakan saldo pelatihan untuk membeli/membayar pelatihan?',
                        'desc' => '
                        <article><p>Kamu dapat menggunakan saldo pelatihan Kartu Prakerja hanya di Platform Digital yang resmi bekerja sama, yaitu:</p> <span><a href="https://www.tokopedia.com/kartu-prakerja" target="_blank" rel="noopener noreferrer"><img class="img-fluid img-faq-logo" src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/28.png"></a></span> <span><a href="https://m.bukalapak.com/kartu-prakerja" target="_blank" rel="noopener noreferrer"><img class="img-fluid img-faq-logo" src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/30.png"></a></span> <span><a href="https://pintar.co/kartuprakerja" target="_blank" rel="noopener noreferrer"><img class="img-fluid img-faq-logo" src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/31.png"></a></span> <span><a href="https://prakerja.karier.mu/" target="_blank" rel="noopener noreferrer"><img class="img-fluid img-faq-logo" src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/32.png"></a></span> <span><a href="https://skillhub.kemnaker.go.id/pelatihan/prakerja" target="_blank" rel="noopener noreferrer"><img class="img-fluid img-faq-logo" src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/logo-siapkerja.png"></a></span> <span><a href="https://pijarmahir.id/category/kartu-prakerja" target="_blank" rel="noopener noreferrer"><img class="img-fluid img-faq-logo" src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/34.png"></a></span> <link><br>Kamu dapat membaca tutorial pembelian pelatihan menggunakan Kartu Prakerja sebagai metode pembayaran pada mitra Platform Digital, <a href="https://www.prakerja.go.id/artikel/tutorial-pembelian-pelatihan-di-mitra-platform-digital">di sini.</a> <p></p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Apa saja syarat yang perlu diperhatikan untuk membeli pelatihan di Platform Digital?',
                        'desc' => '
                        <article><ul> <li>1 (satu) akun atau user ID di Platform Digital hanya dapat menggunakan 1 (satu) nomor Kartu Prakerja sebagai metode pembayaran pembelian pelatihan pada Platform Digital dan/atau tidak dapat menggunakan lebih dari 1 (multiple) nomor Kartu Prakerja.</li> <li>Pastikan kamu memasukkan OTP yang benar saat membeli pelatihan di Platform Digital.</li> <li>Memenuhi persyaratan usia yaitu berusia minimal 18 (delapan belas) tahun dan maksimal 64 (enam puluh empat) tahun.</li> <li>Tidak sedang mengikuti pendidikan formal.</li></ul></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Bagaimana Cara Membeli Pelatihan di Platform Digital?',
                        'desc' => '
                        <article><p><strong>Mencari dan Memilih Pelatihan</strong></p><p>Kamu dapat mencari pelatihan dengan mengetikkan kata kunci atau melalui fitur filter pencarian di menu pelatihan dashboard Prakerja kamu.</p><p></p><div class="mb-4"> <img alt="image83a.png" src="https://public-prakerja.oss-ap-southeast-5.aliyuncs.com/landing-page/faq-mencari-dan-memilih-pelatihan/image83a.png" title=""></div><p></p><p></p><div class="mb-4"> <img alt="image83b.png" src="https://public-prakerja.oss-ap-southeast-5.aliyuncs.com/landing-page/faq-mencari-dan-memilih-pelatihan/image83b.png" title="image83b.png"></div><p></p><p></p><div class="mb-4"> <img alt="image83c.png" src="https://public-prakerja.oss-ap-southeast-5.aliyuncs.com/landing-page/faq-mencari-dan-memilih-pelatihan/image83c.png" title="image83c.png"></div><p></p><p>Perlu diketahui bahwa pelatihan daring dapat dibeli paling lambat 1 (satu) hari kalender dari tanggal pelatihan dimulai. Sedangkan untuk pelatihan luring dapat dibeli paling lambat 3 (tiga) hari kalender dari tanggal pelatihan dimulai.</p><p><strong>Membeli Pelatihan</strong></p><p>Setelah menemukan pelatihan yang diinginkan, kamu dapat melihat detail pelatihan di dashboard dan klik "Beli Pelatihan".</p><p></p><div class="mb-4"> <img alt="image83d.png" src="https://public-prakerja.oss-ap-southeast-5.aliyuncs.com/landing-page/faq-mencari-dan-memilih-pelatihan/image83d.png" title="image83d.png"></div><p></p><p></p><div class="mb-4"> <img alt="image83e.png" src="https://public-prakerja.oss-ap-southeast-5.aliyuncs.com/landing-page/faq-mencari-dan-memilih-pelatihan/image83e.png" title="image83e.png"></div><p></p><p>Kamu akan diminta untuk memilih Platform Digital untuk membeli pelatihan kamu</p><p></p><div class="mb-4"> <img alt="image83f.png" src="https://public-prakerja.oss-ap-southeast-5.aliyuncs.com/landing-page/faq-mencari-dan-memilih-pelatihan/image83f.png" title="image83f.png"></div><p></p><p>Kamu akan diminta untuk memilih jadwal pertemuan yang kamu inginkan, kemudian klik "Beli&amp;" untuk melakukan transaksi pembelian pelatihan.</p><p> </p><div class="mb-4"> <img alt="image83g.png" src="https://public-prakerja.oss-ap-southeast-5.aliyuncs.com/landing-page/faq-mencari-dan-memilih-pelatihan/image83g.png" title="image83g.png"> </div><p></p><p>Pilih Kartu Prakerja sebagai metode pembayaran, lalu masukkan nomor Kartu Prakerja kamu. Klik "Bayar" untuk melanjutkan transaksi pembelian pelatihan.</p><p> </p><div class="mb-4"> <img alt="image83h.png" src="https://public-prakerja.oss-ap-southeast-5.aliyuncs.com/landing-page/faq-mencari-dan-memilih-pelatihan/image83h.png" title="image83h.png"> </div><p></p><p>Masukkan kode OTP yang dikirimkan ke nomor handphone yang terdaftar pada akun kamu.</p><p> </p><div class="mb-4"> <img alt="image83i.png" src="https://public-prakerja.oss-ap-southeast-5.aliyuncs.com/landing-page/faq-mencari-dan-memilih-pelatihan/image83i.png" title="image83i.png"> </div><p></p><p>Kamu akan mendapatkan informasi pembelian berhasil. Kode redeem dan kode voucher dapat dicek pada detail pembelian di dashboard kamu untuk digunakan saat redeem pelatihan.</p><p> </p><div class="mb-4"> <img alt="image83j.png" src="https://public-prakerja.oss-ap-southeast-5.aliyuncs.com/landing-page/faq-mencari-dan-memilih-pelatihan/image83j.png" title="image83j.png"> </div><p></p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Mengapa saya mendapatkan pemberitahuan "Akun kamu terindikasi melakukan kecurangan" pada dashboard saya?',
                        'desc' => '
                        <article><p>Jika kamu mendapatkan pemberitahuan tersebut di dashboard kamu, berarti akun kamu terdeteksi melakukan kecurangan karena proses verifikasi wajah tidak sesuai dengan ketentuan. Pastikan kamu melakukan verifikasi wajah dengan wajah kamu sendiri, tidak diwakili oleh orang lain, dan scan wajah melalui kamera handphone atau laptop kamu langsung.</p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Apa saja jenis pelatihan yang bisa saya beli/bayar dengan Kartu Prakerja?',
                        'desc' => '
                        <article><p> Ada 3 jenis pelatihan yang tersedia, yaitu:</p><ul class="listDecimal"><li><strong>Pelatihan Webinar</strong><p>Kegiatan pelatihan <em> synchronous </em> yang dilakukan secara <em> online </em> dimana peserta pelatihan dan instruktur melaksanakan kegiatan belajar mengajar pada waktu yang bersamaan dengan metode <em> live </em> webinar.</p></li><li><strong>Pelatihan Pembelajaran Mandiri</strong><p>Kegiatan pelatihan <em> asynchronous </em> dimana seluruh materi disampaikan secara <em> online </em> melalui platform LMS (<em> Learning Management System </em>) dan peserta tidak harus berinteraksi <em> real-time </em> dengan tenaga pelatih atau peserta lainnya dalam waktu yang sama.</p></li><li><strong>Pelatihan Tatap Muka</strong><p>Pelatihan yang disampaikan secara <em> synchronous </em> dan bertemu secara tatap muka dimana peserta pelatihan dan instruktur hadir di dalam satu ruangan dan waktu yang sama.</p></li></ul></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Apa saja kategori pelatihan yang bisa saya beli/bayar dengan Kartu Prakerja?',
                        'desc' => '
                        <p>Ada banyak kategori pelatihan yang bisa kamu beli dengan Kartu Prakerja, mulai dari keterampilan teknis sampai cara memulai dan membangun usaha. Pelatihan yang bisa kamu pilih, antara lain cara berjualan secara online, menjadi fotografer, menguasai aplikasi komputer, kursus bahasa, keterampilan perawatan kecantikan, menjadi pelatih kebugaran, cara mendapatkan penghasilan dari media sosial dan lain-lain. Kamu bisa cek kategori pelatihan lainnya yang tersedia di situs Platform Digital.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Apakah ada batas waktu pembelian pelatihan?',
                        'desc' => '
                        <article><p>Ya, kamu hanya dapat membeli pelatihan pertamamu dalam waktu 15 (lima belas) hari kalender setelah kamu mendapatkan pemberitahuan penetapan sebagai Penerima Kartu Prakerja dari Manajemen Pelaksana. Jika melebihi batas waktu tersebut dan kamu belum membeli pelatihan, Kartu Prakerja kamu akan dinonaktifkan/dicabut kepesertaannya dan kamu tidak dapat mengikuti kembali Program Kartu Prakerja. Saldo bantuan pelatihanmu juga akan hangus dan akan dikembalikan ke Rekening Negara.</p> <p>Jika kamu ingin membeli pelatihan online, pastikan pembelian dilakukan minimal 1 (satu) hari kalender sebelum tanggal pelatihan dimulai. Sedangkan untuk Pelatihan Tatap Muka, batas waktu pembelian pelatihan adalah minimal 3 (tiga) hari kalender sebelum tanggal pelatihan dimulai.</p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Apakah saya dapat membeli lebih dari satu pelatihan?',
                        'desc' => '
                        <article><p>Bisa, namun kamu hanya boleh membeli pelatihan yang kedua setelah kamu menyelesaikan pelatihan pertama kamu dan mengisi rating ulasan. Pastikan kamu masih mempunyai sisa saldo yang cukup dan membeli pelatihan kedua dalam kurun waktu 15 (lima belas) hari kalender setelah penyelesaian pelatihan pertama dan mengisi rating ulasan.</p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Bagaimana jika saldo pelatihan saya tidak cukup untuk membeli pelatihan yang saya mau?',
                        'desc' => '
                        <article><p>Saat ini, kamu hanya dapat membeli pelatihan dengan besaran sama atau kurang dari jumlah pagu kamu. Jadi, pastikan saldo kamu cukup ya untuk membeli pelatihan yang kamu mau!</p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Bagaimana jika saya gagal menggunakan saldo pelatihan di Platform Digital?',
                        'desc' => '
                        <article><p>Kamu dapat menghubungi customer service Platform Digital atau kamu dapat menghubungi kami di <a href="https://bantuan.prakerja.go.id/hc/id/requests/new" target="_blank">Formulir Pengaduan.</a> Tetapi sebelumnya pastikan kamu telah memasukkan nomor Kartu Prakerja dan OTP yang benar pada saat membeli pelatihan di Platform Digital. Selain itu, pastikan juga kamu telah memenuhi kriteria untuk mengikuti pelatihan, seperti batas minimal usia dan batas minimal pendidikan.</p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Bagaimana jika pembelian pelatihan saya bermasalah?',
                        'desc' => '
                        <article><p>Saat membeli pelatihan, pastikan saldo pelatihan kamu cukup. Gunakan koneksi internet yang stabil dan pastikan memasukkan nomor Kartu Prakerja dan OTP yang benar.</p><p>Selain itu, kamu juga harus memenuhi kriteria untuk mengikuti pelatihan, seperti batas minimal usia dan batas minimal pendidikan. Jika masih mengalami kendala, hubungi customer service Mitra Platform Digital sesuai dengan pelatihan yang ingin kamu beli.</p><ul><li><p>Bukalapak:&nbsp;<a href="tel:02150813333">021 508 13333</a></p></li><li><p>Pijar Mahir:&nbsp;<a href="https://wa.me/6282111113630" target="_blank">+62 821 1111 3630</a>&nbsp;(WhatsApp)</p></li><li><p>Pintar:&nbsp;<a href="https://support.pintar.co/id" target="_blank">https://support.pintar.co/id</a></p></li><li><p>Sekolahmu:&nbsp;<a href="https://wa.me/62 81315792171" target="_blank">+62 813 1579 2171</a>&nbsp;(WhatsApp)</p></li><li><p>SIAPkerja:&nbsp;<a href="tel:+622150816000">021-508 16000</a></p></li><li><p>Tokopedia:&nbsp;<a href="https://www.tokopedia.com/help" target="_blank">www.tokopedia.com/help</a></p></li></ul></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Mengapa saya tidak bisa melakukan pembelian pelatihan dan mendapatkan pemberitahuan "Akun kamu terindikasi melakukan kecurangan"?',
                        'desc' => '
                        <article><p>Jika kamu mendapatkan pemberitahuan tersebut, berarti akun kamu terdeteksi melakukan kecurangan karena proses verifikasi wajah tidak sesuai dengan ketentuan. Akibatnya, kamu sudah tidak dapat membeli pelatihan kembali.</p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Apakah pelatihan yang sudah dibeli bisa diganti?',
                        'desc' => '
                        <article><p>Pelatihan yang sudah dibeli harus diikuti, namun kamu bisa membatalkan pelatihan selama memenuhi syarat dan ketentuan. Untuk syarat ketentuan dan cara pembatalan pelatihan silakan cek <a href="#" class="toSlide" id="13">Apakah pelatihan yang sudah dibeli bisa dibatalkan?</a> dan <a href="#" class="toSlide" id="14"> Bagaimana jika saya ingin melakukan pembatalan untuk pelatihan yang sudah saya beli?</a></p><p>Jika pelatihan sudah berhasil dibatalkan, kamu dapat membeli pelatihan kembali dengan mengikuti <a href="#" class="toSlide" id="2">Bagaimana Cara Membeli Pelatihan di Platform Digital?</a> </p><p></p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Apakah pelatihan yang sudah dibeli bisa dibatalkan?',
                        'desc' => '
                        <article><p>Pelatihan yang sudah kamu beli bisa dibatalkan selama memenuhi syarat dan ketentuan yang berlaku.</p><p>Syarat dan ketentuan pembatalan pelatihan adalah sebagai berikut:</p><ul class="listDecimal"> <li>Pelatihan belum diikuti.</li><li>Pembatalan pelatihan dilakukan paling lambat 3 Hari Kalender setelah transaksi pembelian dilakukan.</li><li>Pembatalan pelatihan dilakukan paling lambat 3 Hari Kalender sebelum pelatihan dimulai.</li><li>Pelatihan yang sebelumnya sudah dibatalkan, tidak dapat dibeli lagi.</li></ul><p>Contoh skenario batas maksimal melakukan pembatalan pelatihan:</p><ul> <li>Skenario 1<p>Peserta membeli pelatihan pada tanggal 19 Juli 2023, pelatihan dimulai pada tanggal 22 Juli 2023. Peserta hanya bisa membatalkan pelatihan 3 Hari Kalender sebelum tanggal 22 Juli 2023 sehingga peserta harus membatalkan pelatihan yang sudah dibeli pada tanggal 19 Juli 2023.</p></li><li>Skenario 2<p>Peserta membeli pelatihan pada tanggal 19 Juli 2023, pelatihan dimulai pada tanggal 23 Juli 2023. Peserta dapat melakukan pembatalan pelatihan pada tanggal 19 sampai 20 Juli 2023.</p></li><li>Skenario 3<p>Peserta membeli pelatihan pada tanggal 19 Juli 2023, pelatihan dimulai pada tanggal 31 Juli 2023. Peserta dapat melakukan pembatalan pelatihan pada tanggal 19 sampai 22 Juli 2023.</p></li><li>Skenario 4<p>Peserta membeli pelatihan pada tanggal 19 Juli 2023, pelatihan dimulai pada tanggal 20 Juli 2023. Peserta sudah tidak bisa membatalkan pelatihan karena pembatalan pelatihan bisa dilakukan paling lambat 3 Hari Kalender sebelum pelatihan dilakukan.</p></li></ul></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Bagaimana jika saya ingin melakukan pembatalan untuk pelatihan yang sudah saya beli?',
                        'desc' => '
                        <article><p>Untuk melakukan pembatalan pelatihan, kamu dapat mengikuti langkah berikut:</p><p>Klik tombol <strong>Cek Detail Transaksi</strong> atau <strong>Lihat Detail</strong> pada dashboard akun Prakerja</p><div classname="mb-4" style="display: flex;gap: 10px; flex-wrap: wrap;"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/pelatihan-01.png" classname="img-fluid"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/pelatihan-02.png" classname="img-fluid"></div><p>Klik <strong>Batalkan Pelatihan</strong> untuk membatalkan transaksi pelatihan yang sudah dibeli.</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/pelatihan-03.png" classname="img-fluid"></div><p>Lalu kamu akan diminta untuk melakukan konfirmasi pembatalan pelatihan. Klik <strong>Batalkan Pelatihan</strong>.</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/pelatihan-04.png" classname="img-fluid"></div><p>Pilih alasan mengapa kamu ingin melakukan pembatalan pelatihan.</p><div classname="mb-4" style="display: flex;gap: 10px;flex-wrap: wrap;"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/pelatihan-05-01.png" classname="img-fluid"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/pelatihan-05-02.png" classname="img-fluid"></div><p>Pelatihan berhasil dibatalkan</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/pelatihan-06.png" classname="img-fluid"></div><p>Setelah pembatalan transaksi pelatihan berhasil, kamu dapat melihat riwayat pembatalan pelatihan kamu pada <strong>Riwayat Transaksi</strong>.</p><div classname="mb-4" style="display: flex;gap: 10px;flex-wrap: wrap;"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/pelatihan-07-01.png" classname="img-fluid"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/pelatihan-07-02.png" classname="img-fluid"></div><p>Kamu juga akan mendapatkan pemberitahuan mengenai pembatalan pelatihan melalui email.</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/pelatihan-08.png" classname="img-fluid"></div><p>Saldo pelatihan akan langsung dikembalikan ke akun prakerja kamu dan silahkan untuk segera melakukan pembelian pelatihan kembali <a href="#" class="toSlide" id="2">Bagaimana Cara Membeli Pelatihan di Platform Digital?</a>.</p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Bagaimana jika saya tidak tahu pelatihan mana yang saya harus beli?',
                        'desc' => '
                        <article><p>Kamu bisa mengunjungi situs Digital Platform untuk mencari pelatihan yang sesuai dengan minat dan kebutuhanmu. Selain itu, kamu juga bisa melihat rekomendasi pelatihan di dashboard kamu, lho!</p><div classname="mb-4"><img src="https://public-prakerja.oss-ap-southeast-5.aliyuncs.com/landing-page/images/faq-new/UI%20terbaru.png" classname="img-fluid"></div> <p>Kamu juga bisa langsung memilih rekomendasi pelatihan yang tersedia di beberapa mitra Platform Digital.</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/faq-new-pembelian-pelatihan-popup.png" classname="img-fluid"></div></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Apakah saya bisa mencari pelatihan yang ingin saya ikuti?',
                        'desc' => '
                        <article><p>Tentu saja bisa! Sekarang kamu bisa mencari pelatihan yang kamu inginkan di dashboard pelatihan kamu, lho!</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/0.0.0_jobs_search.png" classname="img-fluid"></div> <p>Ketik nama atau judul pelatihan yang kamu minati</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/0.0.0_search_job.png" classname="img-fluid"></div> <p>Lalu, akan muncul pelatihan sesuai dengan kata kunci yang kamu ketik</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/0.0.0_result_job_search.png" classname="img-fluid"></div> <p>Kamu juga bisa menggunakan filter agar hasil pencarian pelatihan kamu lebih akurat. Kamu bisa menggunakan filter berdasarkan harga pelatihan, rating, durasi pelatihan, tingkat materi dan cara mengajar</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/0.0.0.0_filter_job_search.png" classname="img-fluid"></div> <p>Selanjutnya akan muncul hasil pencarian pelatihan sesuai filter yang telah kamu aplikasikan</p> <div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/0.0.0_job_search.png" classname="img-fluid"></div></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Apakah saya bisa minta refund saldo pelatihan yang tidak bisa saya akses?',
                        'desc' => '
                        <p>Pengembalian atau refund saldo pelatihan yang tidak bisa diakses tergantung pada kebijakan masing-masing Platform Digital tempat kamu membeli pelatihan. Silakan hubungi customer service Platform Digital untuk informasi lebih lanjut.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Selain kode redeem, mengapa saya juga harus memasukkan kode voucher untuk mengakses pelatihan?',
                        'desc' => '
                        <p>Kode voucher digunakan untuk memverifikasi pelatihan yang akan kamu ikuti. Jika kamu membeli pelatihan dari Digital Platform yang memberikan kode voucher, maka kamu harus memasukkan kode tersebut bersama dengan kode redeem untuk dapat mengakses pelatihan kamu.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Bagaimana jika saya tidak dapat melanjutkan pelatihan karena ada kendala di video/webinar saya?',
                        'desc' => '
                        <p>Pastikan menggunakan koneksi jaringan yang stabil pada saat mengikuti pelatihan dan kamu dapat mencoba menggunakan perangkat lain terlebih dahulu. Jika masih terdapat kendala, hubungi Lembaga Pelatihan terkait.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Bagaimana cara melakukan redeem untuk pelatihan?',
                        'desc' => '
                        <article><p>Peserta yang berhasil<em> redeem </em>pelatihan adalah peserta yang memasukkan<em> redeem code </em>pelatihan yang sesuai &amp; verifikasi wajah telah berhasil, pada saat sebelum memulai pelatihan.</p><p><strong>Pelatihan Webinar dan Pelatihan Pembelajaran Mandiri</strong><br>Gunakan kode<em> redeem </em>yang ada pada detail pelatihan di dashboard Prakerja kamu atau yang dikirim ke<em> email </em>kamu.</p><ul class="listDecimal"><li>Kamu bisa melihat kode<em> redeem </em>pada dashboard kamu. Klik pelatihan yang sudah kamu beli di Pelatihan Saya.<div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-02.jpg" classname="img-fluid"></div><p>Kamu bisa melihat kode<em> redeem </em>dengan tampilan di bawah ini.</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-03.png" classname="img-fluid"></div><p>Atau buka kotak masuk<em> email </em>yang kamu daftarkan ke akun Prakerja. Cari<em> email </em>dengan kata kunci “Pembelian Pelatihan” seperti di bawah ini. Kamu akan menemukan kode<em> redeem </em>yang bisa kamu gunakan untuk<em> redeem </em>pelatihan.</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-01.png" classname="img-fluid"></div></li><li>Masukkan kode<em> redeem </em>di LMS (<em> Learning Management System/Website </em>) Lembaga Pelatihan.<div classname="mb-4" style="display:flex;gap:10px;flex-wrap:wrap"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-04-01.png" classname="img-fluid"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-04-02.png" classname="img-fluid"></div></li><li>Setelah kode<em> redeem </em>diinputkan di LMS<em> (Learning Management System)/Website </em>Lembaga Pelatihan, kamu akan diarahkan ke halaman<em> login </em>di<em> Website </em>Prakerja untuk melakukan verifikasi wajah</li><li>Kamu akan diminta untuk<em> login </em>ke akun prakerja. Masukan<em> email </em>dan<em> password </em>akun Prakerja kamu. Masukkan kode<em> OTP </em>yang telah dikirim melalui<em> email </em>. Klik Ya, Berikan Akses untuk melanjutkan ke proses verifikasi wajah. Pastikan kamu ter-<em> login </em>dengan akun Prakerja atas nama kamu sendiri.<div classname="mb-4" style="display:flex;gap:10px;flex-wrap:wrap"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-05-01.png" classname="img-fluid"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-05-02.png" classname="img-fluid"></div><div classname="mb-4" style="display:flex;gap:10px;flex-wrap:wrap"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-06-01.png" classname="img-fluid"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-06-02.png" classname="img-fluid"></div></li><li>Setelah berhasil<em> login </em>dan memberikan akses, kamu dapat melakukan verifikasi wajah. Klik Scan Wajah untuk membuka kamera, dan lakukan verifikasi wajah sesuai instruksi.<ul><li>Scan wajah sesuai instruksi. Untuk Pelatihan Pembelajaran Mandiri, maksimal 3x pengulangan scan wajah dalam 1 hari dan untuk Webinar, maksimal 5x pengulangan scan wajah dalam 1 hari.<div classname="mb-4" style="display:flex;gap:10px;flex-wrap:wrap"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-07-01.png" classname="img-fluid"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-07-02.png" classname="img-fluid"></div></li></ul></li><li>Jika scan wajah berhasil maka akan menampilkan halaman<em> Redeem </em>Berhasil, dan kamu sudah dapat memulai pelatihan di situs lembaga pelatihan.<div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-08.png" classname="img-fluid"></div></li></ul><p><strong>Pelatihan Tatap Muka</strong></p><ul class="listDecimal"><li>Apabila kamu membeli pelatihan yang diselenggarakan secara Tatap Muka, kamu bisa<em> redeem </em>pelatihan dengan mendatangi lokasi pelatihan dan tunjukkan kode<em> QR </em>dengan klik tombol Lihat<em> QR </em>.<div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-09.jpg" classname="img-fluid"></div></li><li>Tunjukkan kode<em> QR </em>ke lembaga pelatihan untuk verifikasi pelatihan yang akan kamu ikuti.<div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-10.jpg" classname="img-fluid"></div></li><li>Sistem sedang memverifikasi kode<em> QR </em>kamu.<div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-11.jpg" classname="img-fluid"></div></li><li>Kode<em> QR </em>kamu berhasil terverifikasi. Kamu bisa mengikuti Pelatihan Tatap Muka dengan jadwal yang sudah ditentukan.<div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/redem-pelatihan-12.jpg" classname="img-fluid"></div></li><li>Kamu akan diminta untuk melakukan verifikasi dengan scan wajah menggunakan<em> device </em>milik Lembaga Pelatihan.</li></ul><p>Selain pada saat memulai pelatihan, kamu juga akan diminta melakukan verifikasi wajah pada saat:</p><p><strong>Pelatihan Webinar</strong></p><ul><li>Setiap sebelum pertemuan dimulai dan sebelum<em> post test. </em></li></ul><p><strong>Pelatihan Pembelajaran Mandiri</strong></p><ul><li>Setiap sebelum sesi pelatihan dan sebelum<em> post test. </em></li></ul><p><strong>Pelatihan Tatap Muka</strong></p><ul><li>Setiap sebelum pertemuan dimulai.</li></ul></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Kapan saya harus melakukan verifikasi wajah pada saat pelatihan?',
                        'desc' => '
                        <article><p>Verifikasi wajah harus dilakukan pada setiap pertemuan atau sesi pelatihan, dengan detil sebagai berikut:</p><p><strong>Pelatihan Webinar</strong></p><ul><li><em> Redeem </em> pelatihan atau sebelum mulai pelatihan;</li><li>Setiap sebelum pertemuan dimulai dan sebelum <em> post test. </em></li></ul><p><strong>Pelatihan Pembelajaran Mandiri</strong></p><ul><li><em> Redeem </em> pelatihan atau sebelum mulai pelatihan;</li><li>Setiap sebelum sesi pelatihan dan sebelum <em> post test. </em></li></ul><p><strong>Pelatihan Tatap Muka</strong></p><ul><li>Setiap sebelum pertemuan dimulai.</li></ul></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Bagaimana jika redeem pelatihan saya bermasalah?',
                        'desc' => '
                        <article><p>Jika kamu mengalami kendala saat redeem pelatihan, pastikan lagi bahwa:</p><strong><p>Pelatihan Webinar</p></strong><ul><li>Kode redeem adalah kode yang sesuai dengan pelatihan yang kamu beli</li><li>Kode redeem yang benar sesuai tertera pada dashboard Prakerja kamu</li><li>Kode redeem belum pernah digunakan dan/atau belum pernah dibatalkan</li><li>Lakukan verifikasi wajah. Ingat, wajah yang diverifikasi harus sesuai dengan yang ada pada sistem Prakerja</li><li><p>Lakukan <em> redeem </em> sesuai batas waktu yaitu 1 jam sebelum webinar dimulai sampai dengan 1 jam setelah webinar dimulai</p><p>Skenario</p><p>Pertemuan webinar kamu dijadwalkan pada tanggal 1 Maret 2024 pada pukul 09:00. Kamu harus melakukan redeem dengan cara verifikasi wajah yang harus dilakukan pada tanggal 1 Maret 2024 mulai pukul 08:00 hingga pukul 10:00.</p></li></ul><strong><p>Pelatihan Pembelajaran Mandiri</p></strong><ul><li>Kode redeem adalah kode yang sesuai dengan pelatihan yang kamu beli</li><li>Kode redeem yang benar sesuai tertera pada dashboard Prakerja kamu</li><li>Kode redeem belum pernah digunakan dan/atau belum pernah dibatalkan</li><li>Lakukan verifikasi wajah. Ingat, wajah yang diverifikasi harus sesuai dengan yang ada pada sistem Prakerja</li><li><p>Lakukan <em> redeem </em> sebelum kamu memulai pelatihan dan pastikan kamu melakukan redeem paling lambat 15 (lima belas) hari dari tanggal pembelian pelatihan</p><p>Skenario</p><p>Kamu membeli pelatihan pembelajaran mandiri pada tanggal 1 Maret 2024. Kamu harus memulai sesi pertama sekaligus redeem pelatihan kamu paling lambat pada tanggal 15 Maret 2024.</p></li></ul><strong><p>Pelatihan Tatap Muka</p></strong><ul><li>QR Code sesuai dengan pelatihan yang akan kamu ikuti</li><li>QR Code adalah milik lembaga pelatihan yang kamu pilih</li><li>Pelatihan belum pernah digunakan dan/atau belum pernah dibatalkan</li><li><p>Lakukan <em> redeem </em> sesuai batas waktu yaitu 1 jam sebelum pertemuan dimulai sampai dengan 2 jam setelah pertemuan dimulai</p><p>Skenario</p><p>Pelatihan tatap muka kamu dijadwalkan pada tanggal 1 Maret 2024 pada pukul 09:00. Kamu harus melakukan redeem dengan cara verifikasi wajah yang harus dilakukan pada tanggal 1 Maret 2024 mulai pukul 08:00 hingga pukul 11:00.</p></li></ul><p>Pastikan kamu sudah mengisi kode <em> redeem </em> atau menunjukkan <em> QR Code </em> sesuai yang tertera di email dan detail pelatihan di dashboard kamu. Jika masih ada kendala, silakan isi&nbsp;<a href="https://bantuan.prakerja.go.id/hc/id/requests/new">Formulir Pengaduan</a>.</p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Mengapa saya tidak bisa melakukan verifikasi wajah dan mendapatkan pemberitahuan "Akun terindikasi melakukan kecurangan"?',
                        'desc' => '
                        <p>Jika kamu mendapatkan pemberitahuan tersebut, berarti akun kamu terdeteksi melakukan kecurangan karena proses verifikasi wajah tidak sesuai dengan ketentuan. Pastikan kamu melakukan verifikasi wajah dengan wajah kamu sendiri, tidak diwakili oleh orang lain, dan scan wajah melalui kamera handphone atau laptop kamu langsung.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Lho, kok saya tidak bisa akses pelatihan yang sudah saya beli?',
                        'desc' => '
                        <article><p>Ada beberapa penyebab kamu tidak bisa akses pelatihan yang sudah dibeli, seperti:</p><ul class="listDecimal"><li>Gagal melakukan redeem pelatihan dan/atau verifikasi wajah pada saat redeem.</li><li>Belum berhasil melakukan verifikasi wajah. Kamu perlu melakukan verifikasi wajah saat redeem pelatihan dan setiap masing-masing pertemuan/sesi pelatihan.</li><li>Mungkin saja kamu diharuskan untuk memasukkan kode voucher dari Platform Digital tempat kamu membeli pelatihan. Kamu bisa mengecek email yang terdaftar saat membeli pelatihan tersebut. Kamu juga dapat melakukan konfirmasi langsung ke Platform Digital.</li><li>Lupa akun atau password di Platform Digital dan Lembaga Pelatihan. Kamu bisa reset password di situs Platform Digital dan Lembaga Pelatihan yang kamu gunakan.</li><li>Belum menyelesaikan pelatihan sebelumnya. Kamu harus menyelesaikan pelatihan sebelumnya terlebih dahulu agar kamu bisa melakukan akses ke pelatihan berikutnya.</li></ul></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Mengapa saya tidak bisa melanjutkan pelatihan dan mendapatkan pemberitahuan "Akun kamu terindikasi melakukan kecurangan" pada menu pelatihan saya?',
                        'desc' => '
                        <p>Jika kamu mendapatkan pemberitahuan tersebut di menu pelatihan kamu, berarti akun kamu terdeteksi melakukan kecurangan karena proses verifikasi wajah tidak sesuai dengan ketentuan. Akibatnya, kamu sudah tidak dapat melanjutkan pelatihan kamu.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Bagaimana cara melakukan verifikasi wajah pada pelatihan?',
                        'desc' => '
                        <article><p>Untuk Pelatihan Pembelajaran Mandiri, kamu harus melakukan verifikasi wajah setiap sebelum masuk ke sesi pelatihan. Untuk Webinar, kamu harus melakukan verifikasi wajah setiap sebelum hari pertemuan</p><ul class="listDecimal"><li>Sebelum kamu mulai sesi (Pelatihan Pembelajaran Mandiri) atau pertemuan (Webinar), kamu akan diminta untuk melakukan verifikasi wajah.<div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/verif-sesi-01.png" classname="img-fluid"></div></li><li>Kamu akan diminta untuk login ke akun prakerja. Masukan email dan password akun Prakerja kamu. Masukkan kode OTP yang telah dikirim melalui email. Klik Ya, Berikan Akses untuk melanjutkan ke proses verifikasi wajah. Pastikan kamu ter-login dengan akun Prakerja atas nama kamu sendiri.<div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/verif-sesi-02.png" classname="img-fluid"></div></li><li>Setelah berhasil login dan memberikan akses, kamu dapat melakukan verifikasi wajah. Klik Scan Wajah untuk membuka kamera, dan lakukan verifikasi wajah sesuai instruksi.<ul><li>Klik Scan Wajah untuk membuka kamera.</li><li>Scan wajah sesuai instruksi. Untuk Pembelajaran Mandiri, maksimal 3x pengulangan scan wajah dalam 1 hari dan untuk Webinar, maksimal 5x pengulangan scan wajah dalam 1 hari.</li><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-2024/verif-sesi-03.png" classname="img-fluid"></div></ul></li><li>Bila scan wajah berhasil maka akan menampilkan halaman verifikasi wajah berhasil, lalu akan diteruskan kembali ke website lembaga pelatihan</li></ul><p><strong>Pelatihan Tatap Muka</strong></p><p></p><p>Setelah kamu melakukan redeem dengan menunjukkan kode QR, kamu akan diminta untuk melakukan verifikasi wajah dengan scan wajah menggunakan <em> device </em> milik Lembaga Pelatihan.</p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Bagaimana agar verifikasi wajah saya sebelum memulai pelatihan berhasil?',
                        'desc' => '
                        <article><p>Pastikan kamu mengikuti panduan ini:</p><ul class="listDecimal"><li>Pastikan kamu melakukan verifikasi wajah dengan wajah kamu sendiri, tidak diwakili oleh orang lain, dan scan wajah melalui kamera handphone atau laptop kamu langsung, sebelum mulai pelatihan di setiap tanggal jadwal pertemuan atau sesi pelatihan.</li><li>Seluruh wajah kamu harus masuk ke dalam frame yang tersedia dan terlihat jelas pada <em>frame.</em></li><li>Pastikan wajah terlihat dengan pencahayaan yang cukup, tidak buram dan tidak gelap.</li><li>Pastikan verifikasi wajah dengan posisi lurus atau tidak miring.</li><li>Pastikan area wajah terlihat jelas tanpa menggunakan aksesoris (kacamata, masker dan sebagainya).</li><li>Kedipkan mata untuk verifikasi wajah.</li><li>Verifikasi wajah yang diambil tidak perlu disertai KTP.</li><li>Pastikan saat melakukan verifikasi wajah tidak ada orang lain di belakangmu.</li></ul></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Mengapa saya tidak bisa melakukan proses verifikasi wajah?',
                        'desc' => '
                        <article><p></p><ul class="listDecimal"> <li>Pastikan kamu melakukan verifikasi wajah dengan wajah kamu sendiri, tidak diwakili oleh orang lain, dan scan wajah melalui kamera handphone atau laptop kamu langsung, sebelum mulai pelatihan di setiap tanggal jadwal pertemuan atau sesi pelatihan. </li><li> Lakukan proses verifikasi dengan jujur dan ikuti seluruh aturan verifikasi wajah dan ikuti <a href="#" class="toSlide" id="27">panduan</a> dan <a href="#" class="toSlide" id="26">langkah-langkah</a> verifikasi wajah dengan benar. </li></ul><p></p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Kok saya tidak bisa mengerjakan post test untuk pelatihan online (Webinar dan Pembelajaran Mandiri)?',
                        'desc' => '
                        <article><p>Jika kamu tidak bisa mengakses <em> post test </em> pada LMS/Website Lembaga Pelatihan, pastikan kamu telah berhasil melakukan verifikasi wajah untuk <em> post test </em> dan sudah mengumpulkan semua TPM (Tugas Praktik Mandiri) kepada Lembaga Pelatihan.</p><p>Selain itu, pastikan juga hal-hal berikut:</p><p><strong>Pelatihan Webinar: </strong>Kamu harus melakukan verifikasi wajah di semua pertemuan dan mengerjakan <em> post test </em> paling lambat 30 (tiga puluh) hari setelah jadwal pertemuan terakhir.</p><p>Skenario</p><p>Kamu telah menyelesaikan pertemuan terakhir webinar kamu pada tanggal 1 April 2024. Kamu harus mengerjakan <em> post test </em> dan melakukan verifikasi wajah untuk <em> post test </em> paling lambat pada tanggal 30 April 2024.</p><p><strong>Pelatihan Pembelajaran Mandiri: </strong>Kamu harus melakukan verifikasi wajah di semua sesi pelatihan dan mengerjakan <em> post </em> test paling lambat 60 (enam puluh) hari setelah tanggal <em> redeem </em> atau verifikasi wajah sesi pertama.</p><p>Skenario</p><p>Kamu melakukan <em> redeem </em> pelatihan pada tanggal 1 April 2024. Kamu harus mengerjakan <em> post test </em> dan melakukan verifikasi wajah untuk <em> post test </em> paling lambat pada tanggal 30 Mei 2024.</p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Mengapa saya tidak bisa mengumpulkan Unjuk Keterampilan pada LMS/Website Lembaga Pelatihan?',
                        'desc' => '
                        <article><p>Agar berhasil mengumpulkan Unjuk Keterampilan pada LMS/Website Lembaga Pelatihan, pastikan kamu sudah mengumpulkan seluruh TPM (Tugas Praktik Mandiri),  berhasil melakukan post test dan Lembaga Pelatihan sudah memberikan feedback untuk TPM (Tugas Praktik Mandiri) kamu.</p><p>Jika belum menerima feedback untuk keseluruhan TPM (Tugas Praktik Mandiri), mohon menghubungi Lembaga Pelatihan terkait.</p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Apakah akan ada tes untuk pelatihan yang saya ikuti?',
                        'desc' => '
                        <article><p>Kamu wajib mengikuti tes sesuai dengan jenis pelatihan yang kamu ikuti.</p><div><p><strong>Pelatihan Tatap Muka</strong></p><ul class="listDecimal"><li><em> Pre-Test </em></li><li>Kuis</li><li><em> Post-Test </em></li><li>Unjuk Keterampilan</li></ul><p><strong>Pelatihan Webinar</strong></p><ul class="listDecimal"><li><em> Pre-Test </em></li><li>Kuis</li><li>Tugas Praktik Mandiri</li><li><em> Post-Test </em></li><li>Unjuk Keterampilan</li></ul><p><strong>Pelatihan Pembelajaran Mandiri</strong></p><ul class="listDecimal"><li><em> Pre-Test </em></li><li>Kuis</li><li><em> Pop-Up </em> Kuis</li><li>Tugas Praktik Mandiri</li><li><em> Post-Test </em></li><li>Unjuk Keterampilan</li></ul><p></p></div><ul><li><em> Pre-Test </em>: Dilakukan untuk mengukur tingkat pengetahuan terhadap program pelatihan yang dipilih oleh peserta sebelum sesi pelatihan dimulai.</li><li>Kuis: Dilakukan untuk mengukur pemahaman peserta secara berkala di akhir setiap sesi pelatihan.</li><li>Kuis <em> Pop-Up </em>: Bertujuan untuk mengukur pemahaman peserta dan meningkatkan engagement terhadap materi pelatihan di akhir setiap konten/video pelatihan.</li><li>Tugas Praktik Mandiri: Diberikan setiap akhir sesi pelatihan dan bertujuan untuk memberikan kesempatan berlatih keterampilan bagi peserta atas materi yang telah dilatih ataupun mempersiapkan materi pelatihan selanjutnya.</li><li><em> Post-Test </em>: Dilakukan untuk mengukur peningkatan pengetahuan peserta setelah mengikuti pelatihan.</li><li>Unjuk Keterampilan: Merupakan evaluasi akhir dari seluruh rangkaian pelatihan.</li></ul></article>
                        ',
                    ],

                ],
            ],
            (object)[
                'id' => 'insentif',
                'content' => [
                    (object) [
                        'title' => 'Siapa saja yang bisa mendapatkan insentif?',
                        'desc' => '
                       <p>Insentif hanya diberikan kepada pemegang Kartu Prakerja yang sah yang telah menyelesaikan pelatihan pertama, mengisi rating dan ulasan pelatihan pertama dan telah menyambungkan rekening bank atau e-money.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Apa saja jenis insentif dan berapa jumlahnya?',
                        'desc' => '
                       <article><p>Insentif terdiri dari 2 (dua) jenis</p> <ul> <li> <p>Insentif biaya mencari kerja sebanyak 1 (satu) kali sebesar Rp600.000 (enam ratus ribu Rupiah)</p> </li> <li> <p>Insentif pengisian survei evaluasi sebesar Rp50.000 (lima puluh ribu Rupiah) yang diberikan paling banyak 2 (dua) kali.</p> </li> </ul></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Kapan saya mendapatkan insentif?',
                        'desc' => '
                       <article><ul> <li> <p>Insentif biaya mencari kerja</p> <p>Jika kamu lolos menjadi Penerima Kartu Prakerja, kamu akan menerima insentif biaya mencari kerja setelah:</p> <ul> <li> <p>Telah menyelesaikan Pelatihan yang ditandai dengan adanya sertifikat</p> </li> <li> <p>Telah memberikan ulasan (review) dan penilaian (rating) terhadap pelatihan di dashboard kamu.</p> </li> <li> <p>Jika Penerima Kartu Prakerja mengikuti lebih dari satu pelatihan, insentif biaya mencari kerja hanya diberikan pada saat penyelesaian pelatihan yang pertama. Tidak ada insentif untuk pelatihan kedua dan seterusnya.</p> </li> <li> <p>Telah berhasil menyambungkan nomor rekening bank atau e-money di akun situs <a href="https://www.prakerja.go.id/">www.prakerja.go.id</a></p> </li> <li> <p>Nomor rekening bank atau e-money yang didaftarkan telah tervalidasi (menggunakan NIK yang sama dengan NIK terdaftar di Kartu Prakerja dan sudah KYC atau akun e-money sudah premium/upgrade) oleh bank/perusahaan e-money terkait.</p> </li> </ul> </li> <li> <p>Insentif pengisian survei evaluasi</p> </li> <p>Akan diterima jika Penerima Kartu Prakerja telah mengisi survei evaluasi pada dashboard akun kamu di situs <a href="https://www.prakerja.go.id/">www.prakerja.go.id</a> untuk mengetahui evaluasi efektivitas Program Kartu Prakerja.</p> </ul></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Kapan paling lambat saya harus menyelesaikan pelatihan untuk mendapatkan insentif?',
                        'desc' => '
                       <article><p>Untuk mendapatkan insentif, kamu harus segera menyelesaikan pelatihan pertama dan memberikan <i>rating</i> dan <i>review</i> pelatihan.</p><p> Jika kamu mengikuti Pelatihan Tatap Muka, kamu harus menyelesaikan pelatihan pertama kamu dan mengerjakan <i>post test</i> pada jadwal pertemuan pelatihan terakhir. </p> <p> Jika kamu mengikuti Pelatihan Webinar, kamu harus menyelesaikan pelatihan pertama kamu dan mengerjakan <i>post test</i> paling lambat 30 (tiga puluh) hari setelah jadwal pertemuan pelatihan terakhir. </p> <p> <b>Skenario</b> </p> <p> Kamu telah menyelesaikan pertemuan terakhir Pelatihan Webinar kamu pada tanggal 1 April 2024. Kamu harus menyelesaikan pelatihan pertama kamu dan mengerjakan <i>post test</i> paling lambat pada tanggal 30 April 2024. </p> <p> Jika kamu mengikuti Pelatihan Pembelajaran Mandiri, kamu harus menyelesaikan pelatihan pertama kamu dan mengerjakan <i>post test</i> paling lambat 60 (enam puluh) hari setelah tanggal <i>redeem</i> atau verifikasi wajah sesi pertama. </p> <p> <b>Skenario</b> </p> <p> Kamu melakukan <i>redeem</i> pelatihan pada tanggal 1 April 2024. Kamu harus menyelesaikan pelatihan pertama kamu dan mengerjakan <i>post test</i> paling lambat pada tanggal 30 Mei 2024. </p> <p> Pastikan kamu memberikan <i>rating</i> dan <i>review</i> secepatnya untuk pelatihan yang sudah kamu ikuti agar insentif kamu tidak hangus, ya! </p></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Apakah saya bisa mendapatkan insentif jika belum menjadi Penerima Kartu Prakerja?',
                        'desc' => '
                       <p>Tidak, kamu hanya bisa mendapatkan insentif ketika kamu telah menjadi Penerima Kartu Prakerja yang sah, telah menyelesaikan pelatihan pertama kamu dan memenuhi persyaratan sebagaimana disebutkan di atas.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Di mana saya bisa mengecek jumlah insentif yang akan saya terima?',
                        'desc' => '
                       <p>Kamu bisa cek pada akun dashboard kamu. Pastikan kamu cek statusnya secara berkala, ya.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Apa saja yang membuat insentif saya gagal dicairkan?',
                        'desc' => '
                       <article><p>Insentif kamu bisa gagal dicairkan apabila:</p> <ul class="alpabhet"><li> <p>Tidak menyelesaikan pelatihan pertama atau tidak menghadiri semua pertemuan sesuai jadwal atau verifikasi wajah tidak lengkap.</p> </li> <li> <p>Belum mengisi ulasan (<em> review </em>) pelatihan di dashboard kamu.</p> </li> <li> <p>Belum memberikan penilaian (<em> rating </em>) pelatihan di dashboard kamu.</p> </li> <li> <p>Nomor rekening bank atau akun <em> e-money </em> yang kamu daftarkan pada Kartu Prakerja tidak aktif atau bermasalah.</p> </li> <li> <p>Akun <em> e-money </em> kamu belum di-<em> upgrade </em> atau melakukan <em> KYC </em> (verifikasi KTP dan swafoto).</p> </li> <li> <p>Batas transaksi dalam 1 (satu) bulan dan saldo akun <em> e-money </em> kamu melebihi batas maksimum yang diperbolehkan oleh penyelenggara <em> e-money </em> atau ketentuan peraturan perundang-undangan.</p> </li> <li> <p>Data diri yang didaftarkan pada <em> e-money </em> tidak sesuai dengan yang didaftarkan pada akun Kartu Prakerja.</p> </li> </ul></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Apakah insentif diberikan secara tunai atau non-tunai?',
                        'desc' => '
                       <p>Insentif kamu akan diberikan non-tunai dengan cara ditransfer ke rekening bank atau akun <em> e-money </em> yang telah kamu daftarkan.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Bagaimana insentif saya akan disalurkan?',
                        'desc' => '
                       <p>Insentif akan disalurkan melalui akun <em> e-money </em> atau rekening bank yang telah kamu daftarkan di akun kamu melalui situs <a href="https://www.prakerja.go.id/">www.prakerja.go.id</a></p>
                        ',
                    ],
                    (object) [
                        'title' => 'Berapa lama proses pencairan insentif ke rekening atau e-money saya?',
                        'desc' => '
                       <p>Pencairan insentif ke rekening atau e-wallet kamu membutuhkan waktu 3-5 hari kerja sejak tanggal penjadwalan insentif muncul di dashboard akun kamu. Jika lebih dari 5 (lima) hari kerja kamu masih belum menerima insentif, silakan hubungi kami melalui <a href="https://www.prakerja.go.id/formulir-pengaduan">Formulir Pengaduan</a>.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Mengapa pencairan insentif saya belum terjadwal?',
                        'desc' => '
                       <p>Pastikan kamu sudah mengikuti seluruh rangkaian pelatihan dan mengumpulkan unjuk keterampilan kepada Lembaga Pelatihan yang kamu ikuti. Setelah itu kamu akan diminta untuk memberikan rating dan ulasan pelatihan. Jika sudah menyelesaikan semua tahapan tersebut, silahkan menunggu 1x24 jam untuk sinkronisasi jadwal pencairan insentif kamu.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Bagaimana jika saya belum menerima insentif padahal sudah ada jadwal pencairan insentif di dashboard saya?',
                        'desc' => '
                       <p>Pencairan insentif dilakukan secara bertahap. Oleh karena itu, pastikan kamu sudah memenuhi seluruh syarat dan ketentuan yang berlaku untuk mendapatkan insentif. Lakukan juga pengecekan berkala di dashboard akun kamu dan riwayat rekening bank/e-wallet yang telah terhubung dengan akun Prakerja. Jika dalam waktu 5 hari kerja kamu masih belum menerima insentif, silakan hubungi kami melalui <a href="https://www.prakerja.go.id/formulir-pengaduan">Formulir Pengaduan</a>.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Insentif yang saya terima bisa digunakan untuk apa, ya?',
                        'desc' => '
                       <p>Kamu bebas menggunakan insentif untuk apa saja, lho! Bisa untuk meringankan biaya yang sudah kamu habiskan ketika pelatihan seperti makan, transportasi dan pulsa. Kamu juga bisa menggunakan insentif untuk meringankan biaya selama mencari pekerjaan.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Apakah saya bisa mengecek riwayat insentif yang saya terima?',
                        'desc' => '
                       <article><p>Kamu bisa melihat informasi mengenai riwayat semua insentif yang sudah atau akan kamu terima di laman insentif seperti di bawah ini.</p><div classname="mb-4"><img src="https://static-asset-cdn.prakerja.go.id/landing-page/images/faq-new/11-0-2.png" classname="img-fluid"></div></article>
                        ',
                    ],
                    (object) [
                        'title' => 'Apakah saya mendapatkan insentif lain setelah mendapatkan insentif biaya mencari kerja?',
                        'desc' => '
                       <p>Setelah mendapat insentif biaya mencari kerja, kamu juga dapat memperoleh insentif pengisian survei evaluasi dengan mengisi survei evaluasi sesuai jadwal yang tersedia di dashboard kamu. Insentif ini hanya diberikan kepada penerima Kartu Prakerja yang mengisi survei evaluasi <strong>paling lambat tanggal 10 Desember</strong> tahun anggaran berjalan. Ingat ya, isi survei evaluasi kamu dengan jujur sesuai dengan keadaan kamu!.</p>
                        ',
                    ],
                    (object) [
                        'title' => 'Mengapa saya tidak mendapat jadwal pengisian survei evaluasi?',
                        'desc' => '
                       <article><p>Jadwal Pengisian Survei Evaluasi akan kamu dapatkan paling cepat 30 (tiga puluh hari) setelah insentif biaya mencari kerja diterima.</p><p>Sebagai contoh, Insentif Biaya Mencari Kerja kamu diterima pada tanggal 1 Maret 2024, maka Jadwal Pengisian Survei Evaluasi kamu adalah pada tanggal 30 Maret 2024.</p><p>Jadwal pengisian survei evaluasi dapat dilihat pada dashboard Prakerja. Pastikan kamu selalu mengakses Dashboard Prakerjamu!</p><p>Untuk ketentuan cara mendapatkan Insentif Biaya Mencari Kerja silakan klik link berikut <a href="#" class="toSlide" id="2">Kapan saya mendapatkan insentif?</a></p></article>
                        ',
                    ],

                ],
            ],
        ];
        $array_content_faqs = [];

        foreach ($faqs as $key => $faq) {
            $data_faqs = [
                'title' => ucwords($faq->id),
                'slug' => Str::slug(strtolower($faq->id)),
                'user_create' => 4,
                'user_update' => 4
            ];
            $f =  FAQ::create($data_faqs);

            foreach ($faq->content as $key => $c) {
                $data_faq_contents = [
                    'title_content' => $c->title,
                    'content' => $c->desc,
                    'faq_id' => $f->id,
                    'user_create' => 4,
                    'user_update' => 4,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
                array_push($array_content_faqs, $data_faq_contents);
            }
        }

        FAQContent::insert($array_content_faqs);
    }
}
