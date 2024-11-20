@extends('admin/main')

@push('link')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}
    {{-- Tag input library --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" /> --}}
@endpush
@section('body')
    <div class="container border p-4 mt-3 w-75 mb-5">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            @include('components/button-group-create-kelas')


            <div>
                <div class="row">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Judul Kelas <span
                                class="text-danger">*</span></label></div>
                    <div class="col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" name="judul_kelas" class="form-control" value="{{ old('judul_kelas') }}"
                                id="judul_kelas" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2"><span id="limit-judul-kelas"></span>/110</p>
                            </span>
                        </div>
                        @error('judul_kelas')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mt-2 bg-danger p-4">
                    <div class="col-md-3 col-sm-12"><label class=" text-white fw-bold">File Image <br>
                            <span class="fw-light" style="font-size: 12px">File hanya berekstensi jpg,png max:
                                2MB</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12"><input type="file" class="form-control" name="image">
                        @error('image')
                            <p class="text-white">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mt-2 bg-danger p-4">
                    <div class="col-md-3 col-sm-12"><label class=" text-white fw-bold">File Video <br>
                            <span class="fw-light" style="font-size: 12px">File hanya berekstensi .mp4/mkv max:
                                10MB</span></label>
                    </div>
                    <div class="col-md-9 col-sm-12"><input type="file" class="form-control" name="video_file">
                        @error('video_file')
                            <p class="text-white">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Course Code</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="course_code" class="form-control" value="{{ old('course_code') }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Status</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <select name="status_kelas" class="form-select" id="status_kelas">
                            <option value="1">Dalam Rencana</option>
                        </select>
                    </div>
                </div>


                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Jenis</label></div>
                    <div class="col-md-9 col-sm-12">
                        <select class="form-select" name="jenis" id="jenis">
                            <option value="umum">Umum</option>
                            <option value="prakerja">Prakerja</option>
                        </select>
                    </div>
                </div>

                {{-- <div class="row mt-2 d-none" id="select-dudika">
                    <div class="col-md-3 col-sm-12"> <label class="fw-bold">Sertifikat DUDIKA</label></div>
                    <div class="col-md-9 col-sm-12">
                        <select class="form-select" name="is_dudika" id="is_dudika">

                        </select>
                    </div>
                </div> --}}



                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12">
                        <label class=" fw-bold">Program</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <select name="program" class="form-select" id="program">
                            <option value="0">-- Pilih Nama Program --</option>
                            <option value="1">Indonesia Skill Week</option>
                            <option value="2">Program 2</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Kategori Kelas <span
                                class="text-danger">*</span></label></div>
                    <div class="col-md-9 col-sm-12">
                        <select class="form-select" name="kelas_kategori_id" id="kelas_kategori_id">
                            <option value="">-- Pilih Kategori Kelas --</option>
                            @foreach ($kelas_kategories as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>

                        @error('kelas_kategori_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Metode Pelatihan</label></div>
                    <div class="col-md-9 col-sm-12">
                        <select class="form-select" name="metode_pelatihan" id="metode_pelatihan">
                            @foreach ($metode_pelatihans as $x)
                                <option value="{{ $x->name }}">{{ $x->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Level</label></div>
                    <div class="col-md-9 col-sm-12">
                        <select class="form-select" name="level" id="level">
                            <option value="pemula">Pemula</option>
                            <option value="menengah">Menengah</option>
                            <option value="profesional">Profesional</option>
                        </select>
                    </div>
                </div>

                {{-- <div class="row mt-2">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Okupasi</label></div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="okupasi" id="okupasi"
                            value="{{ old('okupasi') }}">
                    </div>
                </div> --}}
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Jenjang Pendidikan <span
                                class="text-danger">*</span></label></div>
                    <div class="col-md-9 col-sm-12">
                        <div class="d-flex">

                            <input type="checkbox" name="jenjang_pendidikan[]" value="SD"
                                class
                            ="jenjang_pendidikan"><label class="mx-1">SD</label>
                            <input type="checkbox" name="jenjang_pendidikan[]" value="SMP"
                                class="jenjang_pendidikan"><label class="mx-1">SMP</label>
                            <input type="checkbox" name="jenjang_pendidikan[]" value="SMU/SMK"
                                class="jenjang_pendidikan"><label class="mx-1">SMU/SMK</label>
                            <input type="checkbox" name="jenjang_pendidikan[]" value="D3"
                                class="jenjang_pendidikan"><label class="mx-1">D3</label>
                            <input type="checkbox" name="jenjang_pendidikan[]" value="D4/S1"
                                class="jenjang_pendidikan"><label class="mx-1">D4/S1</label>
                            <input type="checkbox" name="jenjang_pendidikan[]" value="S2"
                                class="jenjang_pendidikan"><label class="mx-1">S2</label>
                        </div>
                        @error('jenjang_pendidikan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Unggulan</label></div>
                    <div class="col-md-9 col-sm-12">
                        <select class="form-select" name="unggulan" id="unggulan">
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Best Seller</label></div>
                    <div class="col-md-9 col-sm-12">
                        <select class="form-select" name="best_seller" id="best_seller">
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                    </div>
                </div>

                {{-- <div class="row mt-2">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Tag Kelas</label></div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="tag_kelas" value="{{ old('tag_kelas') }}">
                    </div>
                </div> --}}

                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Harga Reguler <span
                                class="text-danger">*</span></label></div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" value="{{ old('harga_reguler', 0) }}"
                            name="harga_reguler">

                        @error('harga_reguler')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Harga Discount <span
                                class="text-danger">*</span>
                        </label></div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" value="{{ old('harga_discount', 0) }}"
                            name="harga_discount">
                        @error('harga_discount ')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Aktifkan Discount? </label></div>
                    <div class="col-md-9 col-sm-12">
                        <select class="form-select" name="is_discount" id="is_discount">
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3 col-sm-12"> <label class=" fw-bold">Gratis by Approval <p class="fw-light">
                                (Harga reguler = 0)</p></label></div>
                    <div class="col-md-9 col-sm-12">
                        <select class="form-select" name="approval_free" id="approval_free">
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold">Nama Tutor</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <select name="tutor_id" id="tutor_id" class="form-control" disabled>
                            {{-- @foreach ($data_tutor as $tutor)
                                <option value="{{ $tutor->id }}">{{ $tutor->nama }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold">Profesi Tutor</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="tutor_profesi" class="form-control"
                            value="{{ old('tutor_profesi') }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold">Tutor Penilai 1</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <select name="tutor_penilai_satu" id="tutor_penilai_satu" class="form-control" disabled>
                            {{-- @foreach ($data_tutor as $tutor)
                                <option value="{{ $tutor->id }}">{{ $tutor->nama }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold">Tutor Penilai 2</label>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <select name="tutor_penilai_dua" id="tutor_penilai_dua" class="form-control" disabled>
                            {{-- @foreach ($data_tutor as $tutor)
                                <option value="{{ $tutor->id }}">{{ $tutor->nama }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>


                <hr>
                @include('components/submit-button');
            </div>

        </form>

    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            $(`#btn-group-${@json($btn_group)}`).removeClass('btn-outline-danger').addClass(
                'btn-danger');
        })
    </script>
    <script>
        $(document).ready(function() {
            var limit = 110;
            let nama_kelas = $('#judul_kelas').val().length;
            var result = limit - nama_kelas;
            const KEY_MP_SELECT = 'MP-SELECT';
            const KK_CREATE_SELECT = 'KK_CREATE_SELECT';
            const MP_CREATE_SELECT = 'MP_CREATE_SELECT';
            const L_CREATE_SELECT = 'L_CREATE_SELECT';
            const U_CREATE_SELECT = 'U_CREATE_SELECT';
            const BS_CREATE_SELECT = 'BS_CREATE_SELECT';
            const NT_CREATE_SELECT = 'NT_CREATE_SELECT';
            const AF_CREATE_SELECT = 'AF_CREATE_SELECT';
            const TP1_CREATE_SELECT = 'TTP1_CREATE_SELECT';
            const TP2_CREATE_SELECT = 'TTP2_CREATE_SELECT';

            const value_mp = sessionStorage.getItem(KEY_MP_SELECT);
            const VALUE_KK_CREATE_SELECT = sessionStorage.getItem(KK_CREATE_SELECT);
            const VALUE_MP_CREATE_SELECT = sessionStorage.getItem(MP_CREATE_SELECT);
            const VALUE_L_CREATE_SELECT = sessionStorage.getItem(L_CREATE_SELECT);
            const VALUE_U_CREATE_SELECT = sessionStorage.getItem(U_CREATE_SELECT);
            const VALUE_BS_CREATE_SELECT = sessionStorage.getItem(BS_CREATE_SELECT);
            const VALUE_AF_CREATE_SELECT = sessionStorage.getItem(AF_CREATE_SELECT);
            const VALUE_NT_CREATE_SELECT = sessionStorage.getItem(NT_CREATE_SELECT);
            const VALUE_TP1_CREATE_SELECT = sessionStorage.getItem(TP1_CREATE_SELECT);
            const VALUE_TP2_CREATE_SELECT = sessionStorage.getItem(TP2_CREATE_SELECT);


            $('#limit-judul-kelas').text(result);
            $(document).on('keyup', '#judul_kelas', function() {
                var limit = 110;
                let nama_kelas = $('#judul_kelas').val().length;
                var result = limit - nama_kelas;

                if (nama_kelas > limit) {
                    return alert('Anda tidak boleh menginput judul melebihi maksimal!');
                    $('#judul_kelas').val($(this).val().substring(0, limit));
                }
                $('#limit-judul-kelas').text(result);
            })

            const fetchTutor = (mpid) => {
                fetch(`/ajax/tutor?mp_id=${mpid}`, {
                        method: 'GET',
                        headers: {
                            'content-type': 'application/json'
                        }
                    }).then(res => {
                        if (!res.ok) {
                            throw new Error('Gagal')
                        }
                        return res.json()
                    })
                    .then(d => {
                        // console.log(d);
                        const tutor_array = d.data.map(x => {
                            return {
                                id: x.id,
                                text: x.nama
                            }
                        })
                        $('#tutor_id').empty().append(
                                `<option value="" class="text-dark">--- Pilih Tutor ---</option>`)
                            .attr('disabled', false).select2({
                                data: tutor_array
                            })
                        $('#tutor_penilai_satu').empty().append(
                            `<option value="" class="text-dark">--- Pilih Tutor Penilai Satu ---</option>`
                        ).attr('disabled', false).select2({
                            data: tutor_array
                        })
                        $('#tutor_penilai_dua').empty().append(
                            `<option value="" class="text-dark">--- Pilih Tutor Penilai Dua ---</option>`
                        ).attr('disabled', false).select2({
                            data: tutor_array
                        })

                        if (VALUE_NT_CREATE_SELECT !== null) {
                            $('#tutor_id').val(VALUE_NT_CREATE_SELECT).trigger('change')
                        }
                        if (VALUE_TP1_CREATE_SELECT !== null) {
                            $('#tutor_penilai_satu').val(VALUE_TP1_CREATE_SELECT).trigger('change')
                        }
                        if (VALUE_TP2_CREATE_SELECT !== null) {
                            $('#tutor_penilai_dua').val(VALUE_TP2_CREATE_SELECT).trigger('change')
                        }

                    })
            }

            // session storage for kategori kelas, metode pelatihan, tutor penilai satu, dua

            $(document).on('change', '#kelas_kategori_id', function() {
                const value = $(this).val()
                sessionStorage.setItem(KK_CREATE_SELECT, value);
            })

            $(document).on('change', '#metode_pelatihan', function() {
                const value = $(this).val()
                sessionStorage.setItem(MP_CREATE_SELECT, value);
            })

            $(document).on('change', '#level', function() {
                const value = $(this).val()
                sessionStorage.setItem(L_CREATE_SELECT, value);
            })

            $(document).on('change', '#unggulan', function() {
                const value = $(this).val()
                sessionStorage.setItem(U_CREATE_SELECT, value);
            })

            $(document).on('change', '#best_seller', function() {
                const value = $(this).val()
                sessionStorage.setItem(BS_CREATE_SELECT, value);
            })

            $(document).on('change', '#tutor_id', function() {
                const value = $(this).val()
                sessionStorage.setItem(NT_CREATE_SELECT, value);
            })

            $(document).on('change', '#tutor_penilai_satu', function() {
                const value = $(this).val()
                sessionStorage.setItem(TP1_CREATE_SELECT, value);
            })

            $(document).on('change', '#tutor_penilai_dua', function() {
                const value = $(this).val()
                sessionStorage.setItem(TP2_CREATE_SELECT, value);
            })
            $(document).on('change', '#approval_free', function() {
                const value = $(this).val()
                sessionStorage.setItem(AF_CREATE_SELECT, value);
            })

            if (value_mp !== null) {
                $('#master_partner_id').val(value_mp)
                fetchTutor(value_mp);
            }

            if (VALUE_KK_CREATE_SELECT !== null) {
                $('#kelas_kategori_id').val(VALUE_KK_CREATE_SELECT)
            }

            if (VALUE_MP_CREATE_SELECT !== null) {
                $('#metode_pelatihan').val(VALUE_MP_CREATE_SELECT)
            }
            if (VALUE_L_CREATE_SELECT !== null) {
                $('#level').val(VALUE_L_CREATE_SELECT)
            }
            if (VALUE_U_CREATE_SELECT !== null) {
                $('#unggulan').val(VALUE_U_CREATE_SELECT)
            }

            if (VALUE_BS_CREATE_SELECT !== null) {
                $('#best_seller').val(VALUE_BS_CREATE_SELECT)
            }
            if (VALUE_AF_CREATE_SELECT !== null) {
                $('#approval_free').val(VALUE_AF_CREATE_SELECT)
            }


            // $(document).on('change', '#jenis', function() {

            //     if ($(this).val() === 'prakerja') {
            //         fetch('/superadmin/fetch-dudika').then(res => res.json()).then(d => {

            //             $('#is_dudika').append(
            //                 `<option value="0">Tidak</option>`
            //             );

            //             d.data.forEach(element => {
            //                 $('#is_dudika').append(`
        //                 <option value="${element.id}">${element.name_asosiation}</option>`)
            //             });
            //         })


            //         $('#select-dudika').removeClass('d-none')

            //     } else {
            //         $('#select-dudika').addClass('d-none')
            //     }
            // })




        })

        // The DOM element you wish to replace with Tagify
        // var okupasi = document.getElementById('okupasi');
        // var okupasi = document.querySelector('input[id=okupasi]');
        // var okupasi = document.querySelector('input[name=okupasi]');
        // var tag_kelas = document.querySelector('input[name=tag_kelas]');
        // console.log(okupasi.length);
        // initialize Tagify on the above input node reference
        // new Tagify(okupasi)
        // new Tagify(tag_kelas)
        // const CHECK_VALUE = 'CHECK_VALUE';
        // const EXIST_CHECK_VALUE = sessionStorage.getItem(CHECK_VALUE);

        // let value_array = [];
        // if (EXIST_CHECK_VALUE !== null) {
        //     const params = EXIST_CHECK_VALUE.split(',');
        //     $('.jenjang_pendidikan').each(function() {
        //         params.includes($(this).val()) ? $(this).prop('checked', true) : null;
        //     })
        //     value_array.push(params);
        // }


        $(document).on('change', '.jenjang_pendidikan', function() {
            if ($(this).is(':checked')) {
                now_value = [$(this).val()];
                value_array.push(now_value);
                value = value_array.join(',');

                sessionStorage.setItem(CHECK_VALUE, value);
            } else {
                now_value = [$(this).val()];
                value_array.pop(now_value);
                value = value_array.join(',');

                sessionStorage.setItem(CHECK_VALUE, value);
            }
        })
    </script>
@endpush
