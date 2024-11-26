@extends('admin/main')

@push('link')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    {{-- Tag input library --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" /> --}}
@endpush
@section('body')
    <div class="container border p-4 mt-3 w-100 w-md-75 mb-5">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($errors->any())
                @include('components/alert-danger', ['errors' => $errors])
            @endif

            @include('components/button-group-create-kelas')

            <div>
                <div class="row">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Judul Kelas</label></div>
                    <div class="col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" name="judul_kelas" class="form-control"
                                value="{{ old('judul_kelas', $kelas->judul_kelas) }}" id="judul_kelas"
                                aria-describedby="basic-addon2" disabled>
                            <span class="input-group-text" id="basic-addon2"><span id="limit-judul-kelas"></span>
                                {{ 110 - (int) strlen($kelas->judul_kelas) }}/110</p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold">Gambaran Umum Pelatihan</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <textarea class="summernotes" name="judul_keterangan" id="judul_keterangan">{{ old('judul_keterangan', $kelas->deskripsi->judul_keterangan) }}</textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold">Detail Kelas</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <textarea class="summernotes" name="deskripsi" id="deskripsi">{{ old('deskripsi', $kelas->deskripsi->deskripsi) }}</textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold">Metode Pembelajaran</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <textarea class="summernotes" name="metode_pembelajaran" id="metode_pembelajaran">{{ old('metode_pembelajaran', $kelas->deskripsi->metode_pembelajaran) }}</textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold">Fasilitator</label>
                        <p class="text-dark" style="font-weight: lighter; font-size: 14px">Maks. 30 karakter</p>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="fasilitator"
                            value="{{ old('fasilitator', $kelas->deskripsi->fasilitator) }}" class="form-control">
                    </div>
                </div>

                @php

                    $durasi = explode(',',$kelas->deskripsi->durasi_pelatihan);
                @endphp

                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold">Durasi Pelatihan</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="input-group">
                                <input type="text" name="jam" value="{{ old('jam', $durasi[0] ?? '') }}" placeholder="Jam"
                            class="form-control"  aria-describedby="jam">
                            <span class="input-group-text" id="jam">
                               Jam
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" name="menit" value="{{ old('menit',$durasi[1] ?? '') }}" placeholder="Menit"
                            class="form-control " aria-describedby="menit">
                            <span class="input-group-text" id="menit">
                               Menit
                            </span>
                        </div>


                    </div>
                </div>
                <div class="row mt-2 bg-danger p-2">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold text-white mt-1">Judul Sertifikat</label>
                        <p class="text-white" style="font-weight: lighter; font-size: 14px">Maks. 30 karakter</p>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        {{-- <input type="text" class="form-control mt-1" name="sertifikat_judul"
                            value="{{ old('sertifikat_judul', $kelas->deskripsi->sertifikat_judul) }}"> --}}
                        <select name="sertifikat_judul" class="form-select" id="sertifikat_judul">
                            <option value="Penyelesaian Pelatihan">Penyelesaian Pelatihan</option>
                            <option value="Kehadiran Pelatihan">Kehadiran Pelatihan</option>
                        </select>

                        @if ($kelas->deskripsi->sertifikat_judul != null)
                            <a class="border border-2 p-1 rounded-3 text-white d-inline-flex mt-2"
                                style="text-decoration: none" href="/admin/certificate/preview/{{ $kelas_id }}/header/79"
                                target="__blank"><i class="me-1" data-feather="file"></i> Preview Tanpa
                                Predikat</a>
                            <a class="border border-2 p-1 rounded-3 text-white d-inline-flex mt-2"
                                style="text-decoration: none" href="/admin/certificate/preview/{{ $kelas_id }}/header/100"
                                target="__blank"><i class="me-1" data-feather="file-plus"></i> Preview Dengan
                                Predikat Sangat Baik</a>
                        @endif
                    </div>
                </div>


                {{-- <div class="row mt-3">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold">Metode Baris 1</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="sertifikat_metode_satu"
                            value="{{ old('sertifikat_metode_satu', $kelas->deskripsi->sertifikat_metode_satu) }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold">Metode Baris 2</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="sertifikat_metode_dua"
                            value="{{ old('sertifikat_metode_dua', $kelas->deskripsi->sertifikat_metode_dua) }}">
                    </div>
                </div> --}}

                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold mt-1">Tenaga Pelatih (Sertifikat)</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        @php
                            $tenaga_pelatih = null;
                        @endphp
                        @if ($kelas->deskripsi->sertifikat_tenaga_pelatih != null)
                            @php
                                $tenaga_pelatih = explode(',', $kelas->deskripsi->sertifikat_tenaga_pelatih);
                                $sisa = 6;
                            @endphp
                            @for ($i = 1; $i <= count($tenaga_pelatih); $i++)
                                <input maxlength="30" type="text" class="form-control mt-1"
                                    name="sertifikat_tenaga_pelatih[]"
                                    value="{{ old('sertifikat_tenaga_pelatih[]', $tenaga_pelatih[$i - 1]) }}"
                                    placeholder='Tenaga Pelatih {{ $i }}'
                                    id="sertifikat_tenaga_pelatih_{{ $i }}">
                                @php
                                    $sisa--;
                                @endphp
                            @endfor
                            @if ($sisa > 0)
                                @for ($i = 7 - $sisa; $i < 7; $i++)
                                    <input maxlength="30" type="text" class="form-control mt-1"
                                        name="sertifikat_tenaga_pelatih[]"
                                        value="{{ old('sertifikat_tenaga_pelatih[]') }}"
                                        placeholder='Tenaga Pelatih {{ $i }}'
                                        id="sertifikat_tenaga_pelatih_{{ $i }}">
                                @endfor
                            @endif
                        @else
                            @for ($i = 1; $i <= 6; $i++)
                                <input maxlength="30" type="text" class="form-control mt-1"
                                    name="sertifikat_tenaga_pelatih[]" value="{{ old('sertifikat_tenaga_pelatih[]') }}"
                                    placeholder='Tenaga Pelatih {{ $i }}'
                                    id="sertifikat_tenaga_pelatih_{{ $i }}">
                            @endfor
                        @endif

                        <button type="button" class="btn btn-primary btn-sm mt-2" id="btn-tambah-tenaga-pelatih"> <i
                                data-feather="plus"></i>Tambah Tenaga Pelatih</button>
                    </div>
                </div>


                <hr>
                <div class="mt-3">
                    <a type="button" class="btn btn-secondary" href="{{ route('list-kelas') }}"> <i class="feather-16"
                            data-feather='x-square'></i> Kembali</a>
                    <button type="submit" class="btn btn-danger "> <i class="feather-16" data-feather="save"></i>
                        Simpan</button>
                    <a href="/admin/kelas/preview/{{ $kelas->deskripsi->slug }}"
                        target="__{{ $kelas->deskripsi->slug }}" class="btn btn-info text-white"><i
                            data-feather="command" class="me-1"></i>Lihat
                        Preview
                        Kelas</a>
                </div>
            </div>

        </form>

    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    <script>
        $(document).ready(function() {

            $(`#btn-group-${@json($btn_group)}`).removeClass('btn-outline-danger').addClass(
                'btn-danger');

            $('.summernotes').summernote({
                height: 300
            });



        })
    </script>

    <script>
        $(document).ready(function() {

            const tenaga_pelatih = @json($kelas->deskripsi->sertifikat_tenaga_pelatih);
            let count_btn = 2;
            if (tenaga_pelatih != null) {
                const tArray = tenaga_pelatih.split(',');
                count_btn = tArray.length + 1;
                for (let x = tArray.length + 1; x < 7; x++) {
                    $('#sertifikat_tenaga_pelatih_' + x).addClass('d-none').attr('disabled', true);
                }
            } else {
                for (let i = 2; i <= 6; i++) {
                    $('#sertifikat_tenaga_pelatih_' + i).addClass('d-none').attr('disabled', true);
                }
            }


            $(document).on('click', '#btn-tambah-tenaga-pelatih', function() {
                if (count_btn <= 6) {
                    $('#sertifikat_tenaga_pelatih_' + count_btn).removeClass('d-none').attr('disabled',
                        false);
                    count_btn++;
                    return;
                }
                return alert('Tenaga pelatih maks 6 orang!')
            })
        })
    </script>
@endpush
