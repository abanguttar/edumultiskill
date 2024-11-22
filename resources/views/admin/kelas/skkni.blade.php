@extends('admin/main')

@push('link')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endpush

@section('body')
    <div class="container border p-4 mt-3 w-75 mb-5">
        <form action="" method="POST" enctype="multipart/form-data" id="kelasForm">

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
                    <div class="col-md-3 col-sm-12"><label class="fw-bold">Judul SKKNI</label>
                        <p class="text-dark" style="font-weight: lighter; font-size: 14px">Maks. 50 karakter</p>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="sertifikat_judul_skkni"
                            value="{{ old('sertifikat_judul_skkni', $kelas->deskripsi->sertifikat_judul_skkni) }}" 
                            class="form-control form-input" disabled>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <label class="fw-bold mt-1">SKKNI</label>
                    </div>
                    <div class="col-md-9 col-sm-12" id="skkni-container">
                        @if(isset($kelas->skknis) && !empty($kelas->skknis))
                            @foreach($kelas->skknis as $skkni)
                                <div class="input-group mt-1">
                                    <input type="hidden" name="skkni_ids[]" value="{{ $skkni->id }}">
                                    <input type="text" class="form-control form-input" name="skkni[]" value="{{ $skkni->skkni }}" maxlength="50" disabled>
                                    <button type="button" class="btn btn-danger btn-delete-skkni" disabled>

                                        <i data-feather="trash-2"></i>
                                    </button>
                                </div>
                            @endforeach
                        @endif
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-btn" id="btn-tambah-skkni" disabled>

                            <i data-feather="plus"></i> Tambah SKKNI
                        </button>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-3 col-sm-12"><label class="fw-bold">Judul Kode Unit</label>
                        <p class="text-dark" style="font-weight: lighter; font-size: 14px">Maks. 50 karakter</p>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="sertifikat_judul_kode_unit"
                            value="{{ old('sertifikat_judul_kode_unit', $kelas->deskripsi->sertifikat_judul_kode_unit) }}" 
                            class="form-control form-input" disabled>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <label class="fw-bold mt-1">Kode Unit</label>
                    </div>
                    <div class="col-md-9 col-sm-12" id="kode-unit-container">
                        @if(isset($kelas->kodeUnits) && !empty($kelas->kodeUnits))
                            @foreach($kelas->kodeUnits as $kodeUnit)
                                <div class="input-group mt-1">
                                    <input type="hidden" name="kode_unit_ids[]" value="{{ $kodeUnit->id }}">
                                    <input type="text" class="form-control form-input" name="kode_unit[]" value="{{ $kodeUnit->kode_unit }}" maxlength="50" placeholder="Kode Unit" disabled>
                                    <input type="text" class="form-control form-input" name="keterangan[]" value="{{ $kodeUnit->keterangan }}" maxlength="100" placeholder="Keterangan" disabled>
                                    <button type="button" class="btn btn-danger btn-delete-kode-unit" disabled>

                                        <i data-feather="trash-2"></i>
                                    </button>
                                </div>
                            @endforeach
                        @endif
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-btn" id="btn-tambah-kode-unit" disabled>

                            <i data-feather="plus"></i> Tambah Kode Unit
                        </button>
                    </div>
                </div>


                <hr>
                <div class="mt-3">
                    <a type="button" class="btn btn-secondary" href="{{ route('list-kelas') }}">
                        <i class="feather-16" data-feather='x-square'></i> Kembali
                    </a>
                    <button type="button" class="btn btn-warning" id="btnEdit">
                        <i class="feather-16" data-feather="edit"></i> Edit
                    </button>
                    <button type="submit" class="btn btn-danger" id="btnSave" style="display: none;">
                        <i class="feather-16" data-feather="save"></i> Simpan
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

            $(`#btn-group-${@json($btn_group)}`).removeClass('btn-outline-danger').addClass('btn-danger');
            
            feather.replace();


            // Toggle edit mode
            $('#btnEdit').click(function() {
                $('.form-input').prop('disabled', false);
                $('.btn-delete-skkni, .btn-delete-kode-unit').prop('disabled', false);
                $('.add-btn').prop('disabled', false);
                $('#btnEdit').hide();
                $('#btnSave').show();
            });

            // Add SKKNI with limit
            $(document).on('click', '#btn-tambah-skkni', function() {
                const skkniCount = $('#skkni-container .input-group').length;
                if (skkniCount >= 5) {
                    alert('Maksimal 5 SKKNI yang dapat ditambahkan');
                    return;
                }
                
                const newRow = `
                    <div class="input-group mt-1">
                        <input type="text" class="form-control form-input" name="skkni[]" maxlength="50">

                        <button type="button" class="btn btn-danger btn-delete-skkni">
                            <i data-feather="trash-2"></i>
                        </button>
                    </div>
                `;
                $(newRow).insertBefore('#btn-tambah-skkni');
                feather.replace();
            });


            // Add Kode Unit with limit
            $(document).on('click', '#btn-tambah-kode-unit', function() {
                const kodeUnitCount = $('#kode-unit-container .input-group').length;
                if (kodeUnitCount >= 10) {
                    alert('Maksimal 10 Kode Unit yang dapat ditambahkan');
                    return;
                }

                const newRow = `
                    <div class="input-group mt-1">
                        <input type="text" class="form-control form-input" name="kode_unit[]" maxlength="50" placeholder="Kode Unit">
                        <input type="text" class="form-control form-input" name="keterangan[]" maxlength="100" placeholder="Keterangan">

                        <button type="button" class="btn btn-danger btn-delete-kode-unit">
                            <i data-feather="trash-2"></i>
                        </button>
                    </div>
                `;
                $(newRow).insertBefore('#btn-tambah-kode-unit');
                feather.replace();
            });


            // Delete buttons
            $(document).on('click', '.btn-delete-skkni', function() {
                $(this).closest('.input-group').remove();
            });

            $(document).on('click', '.btn-delete-kode-unit', function() {
                $(this).closest('.input-group').remove();
            });
        });
    </script>
@endpush

