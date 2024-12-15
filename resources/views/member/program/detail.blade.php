@extends('member/main')

@push('style')
    <style>
        .accordion-button:not(.collapsed) {
            color: var(--bs-accordion-active-color);
            background-color: white !important;
            box-shadow: none !important;
        }

        .accordion-button:focus {
            box-shadow: var(--primary1) !important;
        }
    </style>
@endpush

@section('body')
    <section id="section-hero" class="m-0 p-0 d-flex  mt-4">
        <div class="container">
            <div class="mini-navigate" style="font-size: 14px">
                <a class="text-decoration-none text-primer-2 fw-semibold" href="/">Beranda</a>
                <i class="fa-solid fa-chevron-right"></i>
                <a class="text-decoration-none text-primer-2 fw-semibold"
                    href="/program/{{ $program }}">{{ ucwords($program) }}</a>
                <i class="fa-solid fa-chevron-right"></i>
                <a class="text-decoration-none text-secondary" style="pointer-events: none"
                    href="#">{{ Str::limit($kelas->judul_kelas, 25, '...') }}</a>
            </div>
            <div class="d-flex flex-column-reverse flex-lg-column">
                <div class="title-and-general mt-3" style="max-width: 796px">
                    <h4 style="letter-spacing: 2px">{{ $kelas->judul_kelas }}</h4>
                    <article class="text-justify">
                        {!! $kelas->deskripsi->judul_keterangan !!}
                    </article>
                </div>

                {{-- Image --}}
                <figure class="mt-3">
                    <img src="/kelas-image/{{ $kelas->image }}" class="rounded-4" width="100%" style="max-width: 796px"
                        alt="{{ $kelas->judul_kelas }}">
                </figure>
            </div>


            <div class="kategori-ulasan-dll">
                <i class="fa-solid fa-star text-warning"></i> <span>Rating 5.0</span> |
                <a class="text-decoration-none" href="{{ $kelas->slug }}/ulasan">1000 Ulasan</a>
            </div>

            <div class="apa-yang-didapatkan mt-5">
                <h4>Rp{{ $kelas->is_discount === '1' ? number_format($kelas->harga_discount) : number_format($kelas->harga_reguler) }}
                </h4>
                <h5>Fasilitas yang Peserta Dapatkan:</h5>
                <div class="d-flex flex-column gap-1" style="letter-spacing: 1px">
                    <span>
                        <i class="fa-solid fa-tablet-screen-button text-info"></i> LMS Interaktif
                    </span>
                    <span>
                        <i class="fa-solid fa-file-pen text-info"></i> Kuis Test antar Modul
                    </span>
                    <span>
                        <i class="fa-solid fa-file-pen text-info"></i> Pre Test, Post Test, Test Praktik Mandiri
                    </span>
                    <span>
                        <i class="fa-solid fa-book text-info"></i> Materi terbaru dan lengkap
                    </span>
                    <span>
                        <i class="fa-solid fa-award text-info"></i> Sertifikat Penyelesaian
                    </span>
                </div>

            </div>


            {{-- Deskripsi Program --}}

            <div class="deskripsi-program mt-5 pt-5" style="max-width: 796px">
                <h5>Deskripsi Program</h5>
                <article>
                    {!! $kelas->deskripsi->deskripsi !!}
                </article>
            </div>


            {{-- Materi --}}
            <div class="materi mt-5 pt-5" style="max-width: 796px">
                <h5>Materi Program</h5>
                <div><span>10 Topik</span>
                    | <span>70 Aktivitas</span>
                    | <span>17 Jam 20 Menit</span>
                </div>

                <div class="topik-aktivitas mt-3">
                    <div class="accordion" id="topik-aktivitas-accordion">
                        @foreach ($materi as $topik)
                            <div class="accordion-item  ">
                                <h2 class="accordion-header rounded-3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ 'topik-' . $topik->id }}" aria-expanded="false"
                                        aria-controls="{{ 'topik-' . $topik->id }}">
                                        <span class="fw-semibold"> {{ $topik->nama_topik }}</span>
                                    </button>
                                </h2>
                                <div id="{{ 'topik-' . $topik->id }}" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                        until the collapse plugin adds the appropriate classes that we use to style each
                                        element. These classes control the overall appearance, as well as the showing and
                                        hiding
                                        via CSS transitions. You can modify any of this with custom CSS or overriding our
                                        default variables. It's also worth noting that just about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Materi --}}
            {{-- Metode Pembelajaran --}}
            <div class="metode-pembelajaran mt-5 pt-5" style="max-width: 796px">
                <h5>Metode Pembelajaran</h5>
                <article>
                    {!! $kelas->deskripsi->metode_pembelajaran !!}
                </article>
            </div>


            {{-- SKKNI dan Kode Unit --}}
            <div class="skkni-kode-unit mt-5 pt-5" style="max-width: 796px">
                <h5>SKKNI dan Unit Kompetensi</h5>
                <article>
                    <ul style="list-style-type: none" class="m-0 p-0">
                        @foreach ($kelas->skknis as $skkni)
                            <li class="mt-1"><i class="fa-regular fa-circle-check text-info"></i> {{ $skkni->skkni }}
                            </li>
                        @endforeach
                        @foreach ($kelas->kodeUnits as $kodeunit)
                            <li class="mt-1"><i class="fa-regular fa-circle-check text-info"></i>
                                {{ $kodeunit->kode_unit . ' - ' . $kodeunit->keterangan }}</li>
                        @endforeach
                    </ul>
                </article>
            </div>

            {{-- Jadwal Tersedia --}}
            <div class="jadwal mt-5 pt-5" style="max-width: 796px">
                <h5>Jadwal Program</h5>
                <article>
                    <ul style="list-style-type: none" class="m-0 p-0">
                        <li class="mt-1">Tidak ada batch yang tersedia saat ini.</li>
                    </ul>
                </article>
            </div>

            {{-- Jadwal Tersedia --}}
            <div class="instruktur mt-5 pt-5" style="max-width: 796px">
                <h5>Tutor / Instruktur</h5>
                <article>
                    <div class="tutor-and-profesi d-flex justify-content-start gap-2">
                        <div>
                            <img src="/assets/assets17337277434testimoni.jpg" class="rounded-circle" width="56px"
                                height="56px" alt="">
                        </div>
                        <div class="d-flex flex-column">
                            {{-- Max 71 char --}}
                            <span class="fw-semibold">{{ Str::limit($kelas->tutor->name, 71, '...') }}</span>
                            <span class="fw-semibold">{{ Str::limit($kelas->tutor_profesi, 71, '...') }}</span>
                        </div>
                    </div>
                </article>
            </div>

            <div class="instruktur mt-5 pt-5" style="max-width: 796px">
                <h5>Fasilitator</h5>
                <article>
                    <p>{{ $kelas->deskripsi->fasilitator ?? 'Edu Multi Skill' }}</p>
                </article>
            </div>

        </div>
    </section>
@endsection
