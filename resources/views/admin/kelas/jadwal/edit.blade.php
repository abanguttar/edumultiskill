@extends('admin/main')

@push('link')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('body')
    <div class="container border p-4 mt-3 w-75 mb-5">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($errors->any())
                @include('components/alert-danger', ['errors' => $errors])
            @endif

            @include('components/button-group-create-kelas')

            <div>
                <input type="hidden" name="kelas_id" value="{{ $kelas_id }}">
                
                <div class="mb-3 row">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Judul Jadwal</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="judul_jadwal_pelatihan" value="{{ old('judul_jadwal_pelatihan', $jadwal->judul_jadwal_pelatihan) }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Kode Jadwal</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="schedule_code" value="{{ old('schedule_code', $jadwal->schedule_code) }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Status</label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-select" name="status" required>
                            <option value="aktif" {{ old('status', $jadwal->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="tidak aktif" {{ old('status', $jadwal->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Tanggal Mulai</label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" class="form-control" name="tanggal_mulai" 
                            value="{{ old('tanggal_mulai', $jadwal->tanggal_mulai ? date('Y-m-d', strtotime($jadwal->tanggal_mulai)) : '') }}" 
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Tanggal Selesai</label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" class="form-control" name="tanggal_selesai" 
                            value="{{ old('tanggal_selesai', $jadwal->tanggal_selesai ? date('Y-m-d', strtotime($jadwal->tanggal_selesai)) : '') }}" 
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Waktu Pelaksanaan</label>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai" 
                                        value="{{ old('waktu_mulai', substr($jadwal->waktu_mulai, 0, 5)) }}" required>
                                    <select class="form-select" name="zona_waktu" id="zona_waktu" style="max-width: 100px;">
                                        @php
                                            $zonaWaktu = strpos($jadwal->waktu_pelaksanaan, 'WITA') !== false ? 'WITA' : 
                                                    (strpos($jadwal->waktu_pelaksanaan, 'WIT') !== false ? 'WIT' : 'WIB');
                                        @endphp
                                        <option value="WIB" {{ $zonaWaktu === 'WIB' ? 'selected' : '' }}>WIB</option>
                                        <option value="WITA" {{ $zonaWaktu === 'WITA' ? 'selected' : '' }}>WITA</option>
                                        <option value="WIT" {{ $zonaWaktu === 'WIT' ? 'selected' : '' }}>WIT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto pt-2">
                                s/d
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="time" class="form-control" name="waktu_selesai" id="waktu_selesai" 
                                        value="{{ old('waktu_selesai', substr($jadwal->waktu_selesai, 0, 5)) }}" required>
                                    <span class="input-group-text zona-waktu-text">{{ $zonaWaktu }}</span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="waktu_pelaksanaan" id="waktu_pelaksanaan" value="{{ $jadwal->waktu_pelaksanaan }}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Kuota Maksimal</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" name="kuota_max" value="{{ old('kuota_max', $jadwal->kuota_max) }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Kuota</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" name="kuota" value="{{ old('kuota', $jadwal->kuota) }}" disabled>
                    </div>
                </div>

                <hr>
                <div class="mt-3">
                    <a type="button" class="btn btn-secondary" href="{{ route('view-jadwal', $kelas_id) }}"> 
                        <i class="feather-16" data-feather='x-square'></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-danger"> 
                        <i class="feather-16" data-feather="save"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
   <script>
        $(document).ready(function() {
            $(`#btn-group-${@json($btn_group)}`).removeClass('btn-outline-danger').addClass('btn-danger');

            // Handle zona waktu change
            $('#zona_waktu').change(function() {
                const selectedZone = $(this).val();
                $('.zona-waktu-text').text(selectedZone);
                updateWaktuPelaksanaan();
            });

            // Fungsi untuk update waktu pelaksanaan
            function updateWaktuPelaksanaan() {
                const waktuMulai = $('#waktu_mulai').val();
                const waktuSelesai = $('#waktu_selesai').val();
                const zonaWaktu = $('#zona_waktu').val();
                
                if(waktuMulai && waktuSelesai) {
                    const formatWaktu = (time) => {
                        const [jam, menit] = time.split(':');
                        return `${jam}.${menit} ${zonaWaktu}`;
                    };

                    const waktuPelaksanaan = `${formatWaktu(waktuMulai)} s/d ${formatWaktu(waktuSelesai)}`;
                    $('#waktu_pelaksanaan').val(waktuPelaksanaan);
                }
            }

            // Update waktu pelaksanaan saat waktu mulai atau selesai berubah
            $('#waktu_mulai, #waktu_selesai').on('change', function() {
                updateWaktuPelaksanaan();
            });

            // Masih tetap handle saat submit untuk memastikan
            $('form').on('submit', function() {
                updateWaktuPelaksanaan();
            });
        });
   </script>
@endpush