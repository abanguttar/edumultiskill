@extends('admin/main')

@push('link')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
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

            <!-- Judul Kelas (Disabled) -->
            <div class="row mt-3">
                <div class="col-md-3 col-sm-12">
                    <label class="fw-bold">Judul Kelas</label>
                </div>
                <div class="col-md-9 col-sm-12">
                    <input type="text" class="form-control" value="{{ $kelas->judul_kelas }}" disabled>
                </div>
            </div>

            <!-- Judul SKKNI -->
            <div class="row mt-3">
                <div class="col-md-3 col-sm-12">
                    <label class="fw-bold">Judul SKKNI</label>
                    <p class="text-dark" style="font-weight: lighter; font-size: 14px">Maks. 50 karakter</p>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="input-group">
                        <input type="text" 
                            class="form-control skkni-title-input"
                            name="sertifikat_judul_skkni"
                            value="{{ $kelas->deskripsi->sertifikat_judul_skkni }}"
                            data-field="sertifikat_judul_skkni"
                            data-original="{{ $kelas->deskripsi->sertifikat_judul_skkni }}"
                            maxlength="50">
                        <button type="button" class="btn btn-warning btn-edit" disabled>
                            <i data-feather="edit-2"></i> Edit
                        </button>
                        <button type="button" class="btn btn-success btn-save" style="display: none;">
                            <i data-feather="check"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>

            <!-- SKKNI List -->
            <div class="row mt-3">
                <div class="col-md-3 col-sm-12">
                    <label class="fw-bold">SKKNI</label>
                    <p class="text-dark" style="font-weight: lighter; font-size: 14px">Maksimal 2 SKKNI</p>
                </div>
                <div class="col-md-9 col-sm-12" id="skkni-container">
                    @foreach($kelas->skknis as $skkni)
                    <div class="input-group mt-2">
                        <input type="text" 
                            class="form-control skkni-input"
                            name="skkni"
                            value="{{ $skkni->skkni }}"
                            data-field="skkni"
                            data-id="{{ $skkni->id }}"
                            data-original="{{ $skkni->skkni }}"
                            maxlength="50">
                        <button type="button" class="btn btn-warning btn-edit" disabled>
                            <i data-feather="edit-2"></i> Edit
                        </button>
                        <button type="button" class="btn btn-success btn-save" style="display: none;">
                            <i data-feather="check"></i> Simpan
                        </button>
                        <button type="button" class="btn btn-danger btn-delete">
                            <i data-feather="trash-2"></i>
                        </button>
                    </div>
                    @endforeach
                    <button type="button" class="btn btn-primary btn-sm mt-2" id="btn-add-skkni" 
                            {{ count($kelas->skknis) >= 2 ? 'style=display:none' : '' }}>
                        <i data-feather="plus"></i> Tambah SKKNI
                    </button>
                </div>
            </div>

            <!-- Judul Kode Unit -->
            <div class="row mt-3">
                <div class="col-md-3 col-sm-12">
                    <label class="fw-bold">Judul Kode Unit</label>
                    <p class="text-dark" style="font-weight: lighter; font-size: 14px">Maks. 50 karakter</p>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="input-group">
                        <input type="text" 
                            class="form-control kode-unit-title-input"
                            name="sertifikat_judul_kode_unit"
                            value="{{ $kelas->deskripsi->sertifikat_judul_kode_unit }}"
                            data-field="sertifikat_judul_kode_unit"
                            data-original="{{ $kelas->deskripsi->sertifikat_judul_kode_unit }}"
                            maxlength="50">
                        <button type="button" class="btn btn-warning btn-edit" disabled>
                            <i data-feather="edit-2"></i> Edit
                        </button>
                        <button type="button" class="btn btn-success btn-save" style="display: none;">
                            <i data-feather="check"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>

            <!-- Kode Unit List -->
            <div class="row mt-3">
                <div class="col-md-3 col-sm-12">
                    <label class="fw-bold">Kode Unit & Keterangan</label>
                    <p class="text-dark" style="font-weight: lighter; font-size: 14px">Maksimal 5 Kode Unit</p>
                </div>
                <div class="col-md-9 col-sm-12" id="kode-unit-container">
                    @foreach($kelas->kodeUnits as $kodeUnit)
                    <div class="input-group mt-2">
                        <input type="text" 
                            class="form-control kode-unit-input"
                            name="kode_unit"
                            value="{{ $kodeUnit->kode_unit }}"
                            data-field="kode_unit"
                            data-id="{{ $kodeUnit->id }}"
                            data-original="{{ $kodeUnit->kode_unit }}"
                            placeholder="Kode Unit"
                            maxlength="50">
                        <input type="text" 
                            class="form-control keterangan-input"
                            name="keterangan"
                            value="{{ $kodeUnit->keterangan }}"
                            data-field="keterangan"
                            data-id="{{ $kodeUnit->id }}"
                            data-original="{{ $kodeUnit->keterangan }}"
                            placeholder="Keterangan"
                            maxlength="100">
                        <button type="button" class="btn btn-warning btn-edit" disabled>
                            <i data-feather="edit-2"></i> Edit
                        </button>
                        <button type="button" class="btn btn-success btn-save" style="display: none;">
                            <i data-feather="check"></i> Simpan
                        </button>
                        <button type="button" class="btn btn-danger btn-delete">
                            <i data-feather="trash-2"></i>
                        </button>
                    </div>
                    @endforeach
                    <button type="button" class="btn btn-primary btn-sm mt-2" id="btn-add-kode-unit"
                            {{ count($kelas->kodeUnits) >= 5 ? 'style=display:none' : '' }}>
                        <i data-feather="plus"></i> Tambah Kode Unit
                    </button>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-3">
                <a href="{{ route('list-kelas') }}" class="btn btn-secondary">
                    <i data-feather="arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            feather.replace();

            // Monitor input changes
            $(document).on('input', '.skkni-input, .kode-unit-input, .keterangan-input, .skkni-title-input, .kode-unit-title-input', function() {
                const group = $(this).closest('.input-group');
                const originalValue = $(this).data('original');
                const currentValue = $(this).val();
                
                if (currentValue !== originalValue) {
                    // Langsung sembunyikan tombol edit dan tampilkan tombol save
                    group.find('.btn-edit').hide();
                    group.find('.btn-save').show();
                } else {
                    group.find('.btn-save').hide();
                    group.find('.btn-edit').show().prop('disabled', true);
                }
            });

            // Handle Save button
            $(document).on('click', '.btn-save', function() {
                const group = $(this).closest('.input-group');
                const input = group.find('input:first');
                const saveBtn = $(this);
                
                saveBtn.prop('disabled', true);

                const data = {
                    _token: "{{ csrf_token() }}",
                    field: input.data('field'),
                    id: input.data('id'),
                    value: input.val()
                };

                // Tambahkan keterangan jika ada
                const keteranganInput = group.find('.keterangan-input');
                if (keteranganInput.length) {
                    data.keterangan = keteranganInput.val();
                }

                // Tambahkan action jika record baru
                if (!input.data('id') && !input.hasClass('skkni-title-input') && !input.hasClass('kode-unit-title-input')) {
                    data.action = 'create';
                }

                $.ajax({
                    url: "{{ route('update-field', ['id' => $kelas->id]) }}",
                    method: 'PUT',
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            // Update original values
                            input.data('original', input.val());
                            if (keteranganInput.length) {
                                keteranganInput.data('original', keteranganInput.val());
                            }
                            
                            // Update ID jika ini record baru
                            if (response.id) {
                                input.data('id', response.id);
                                if (keteranganInput.length) {
                                    keteranganInput.data('id', response.id);
                                }
                            }
                            
                            // Hide save button, show edit button
                            group.find('.btn-save').hide();
                            group.find('.btn-edit').show().prop('disabled', true);
                            
                            toastr.success('Data berhasil disimpan');
                        } else {
                            toastr.error(response.message || 'Terjadi kesalahan saat menyimpan data');
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr);
                        toastr.error('Terjadi kesalahan saat menyimpan data');
                    },
                    complete: function() {
                        saveBtn.prop('disabled', false);
                    }
                });
            });

            // Handle Delete button
            $(document).on('click', '.btn-delete', function() {
                if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) return;

                const group = $(this).closest('.input-group');
                const input = group.find('input:first');
                const container = group.closest('.col-md-9');
                
                // Only proceed with delete if we have an ID
                if (!input.data('id')) {
                    group.remove();
                    updateAddButtons();
                    return;
                }

                $.ajax({
                    url: "{{ route('update-field', ['id' => $kelas->id]) }}",
                    method: 'PUT',
                    data: {
                        _token: "{{ csrf_token() }}",
                        field: input.data('field'),
                        id: input.data('id'),
                        action: 'delete'
                    },
                    success: function(response) {
                        if (response.success) {
                            group.remove();
                            updateAddButtons();
                            toastr.success('Data berhasil dihapus');
                        }
                    },
                    error: function() {
                        toastr.error('Terjadi kesalahan saat menghapus data');
                    }
                });
            });

            // Function to update add buttons visibility
            function updateAddButtons() {
                const skkniCount = $('#skkni-container .input-group').length;
                const kodeUnitCount = $('#kode-unit-container .input-group').length;

                $('#btn-add-skkni').toggle(skkniCount < 2);
                $('#btn-add-kode-unit').toggle(kodeUnitCount < 5);
            }

            // Add SKKNI
            $('#btn-add-skkni').click(function() {
                const container = $('#skkni-container');
                if (container.find('.input-group').length >= 2) return;

                const newRow = `
                    <div class="input-group mt-2">
                        <input type="text" class="form-control skkni-input" name="skkni" maxlength="50"
                            data-field="skkni" data-original="" placeholder="SKKNI">
                        <button type="button" class="btn btn-warning btn-edit" style="display: none;">
                            <i data-feather="edit-2"></i> Edit
                        </button>
                        <button type="button" class="btn btn-success btn-save">
                            <i data-feather="check"></i> Simpan
                        </button>
                        <button type="button" class="btn btn-danger btn-delete">
                            <i data-feather="trash-2"></i>
                        </button>
                    </div>
                `;
                
                $(newRow).insertBefore('#btn-add-skkni');
                feather.replace();
                updateAddButtons();
            });

            // Add Kode Unit
           $('#btn-add-kode-unit').click(function() {
               const container = $('#kode-unit-container');
               if (container.find('.input-group').length >= 5) return;

               const newRow = `
                   <div class="input-group mt-2">
                       <input type="text" class="form-control kode-unit-input" name="kode_unit" maxlength="50"
                           data-field="kode_unit" data-original="" placeholder="Kode Unit">
                       <input type="text" class="form-control keterangan-input" name="keterangan" maxlength="100"
                           data-field="keterangan" data-original="" placeholder="Keterangan">
                       <button type="button" class="btn btn-warning btn-edit" style="display: none;">
                           <i data-feather="edit-2"></i> Edit
                       </button>
                       <button type="button" class="btn btn-success btn-save">
                           <i data-feather="check"></i> Simpan
                       </button>
                       <button type="button" class="btn btn-danger btn-delete">
                           <i data-feather="trash-2"></i>
                       </button>
                   </div>
               `;
               
               $(newRow).insertBefore('#btn-add-kode-unit');
               feather.replace();
               updateAddButtons();
           });

           // Initialize feather icons
           feather.replace();

           // Initialize toastr options
           toastr.options = {
               "closeButton": true,
               "progressBar": true,
               "positionClass": "toast-top-right",
               "timeOut": "3000"
           };
       });
   </script>
@endpush