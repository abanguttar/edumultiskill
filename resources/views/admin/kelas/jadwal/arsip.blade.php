@extends('admin/main')

@push('link')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('body')
    <div class="container border p-4 mt-3 w-75 mb-5">
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

        <!-- Daftar Jadwal -->
            <div class="mt-3">
                @if(isset($kelas->JadwalPelatihans) && count($kelas->JadwalPelatihans) > 0)
                    @foreach($kelas->JadwalPelatihans as $j)
                        @if($j->diarsipkan == 1)
                            <div class="card mb-2">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>{{ $j->judul_jadwal_pelatihan }}</div>
                                    <div>
                                        <a href="{{ route('edit-jadwal', ['id' => $kelas->id, 'jadwal_id' => $j->id]) }}" 
                                        class="btn btn-warning btn-sm">
                                            <i class="feather-16" data-feather="edit"></i> Edit
                                        </a>
                                        <form action="{{ route('arsip-jadwal', ['id' => $kelas->id, 'jadwal_id' => $j->id]) }}" 
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-info btn-sm"
                                                    onclick="return confirm('Apakah anda yakin ingin manampilkan jadwal ini?')">
                                                <i class="feather-16" data-feather="archive"></i> Tampilkan
                                            </button>
                                        </form>
                                        <form action="{{ route('destroy-jadwal', ['id' => $kelas->id, 'jadwal_id' => $j->id]) }}" 
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus jadwal ini?')">
                                                <i class="feather-16" data-feather="trash-2"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="alert alert-info">Belum ada jadwal pelatihan</div>
                @endif
            </div>

            <hr>
            <div class="mt-3">
                <a type="button" class="btn btn-secondary" href="{{ route('view-jadwal', $kelas_id) }}"> 
                    <i class="feather-16" data-feather='x-square'></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(`#btn-group-${@json($btn_group)}`).removeClass('btn-outline-danger').addClass('btn-danger');
        })
    </script>
@endpush