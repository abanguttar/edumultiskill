@extends('admin/main')

@section('body')
    <div class="container  border p-4 mt-5 w-75 mb-5">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-3">
                    <label class=" fw-bold">Username</label>
                </div>
                <div class="col-9">
                    <input type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}"
                        disabled>
                </div>
            </div>
            @php
                $permissions_length = 0;
            @endphp
            <div class="row mt-2">
                <div class="col-12  mt-3 mb-1"> <span class="fw-bold me-5">Izin Akses</span> <input type="checkbox"
                        class="me-1" name="all_check" id="all_check">Cek semua opsi</div>
                @foreach ($permissions as $key => $group)
                    <h6 class="mt-4">--- {{ ucwords(str_replace('_', ' ', $key)) }} </h6>
                    <div class="row">
                        @foreach ($group as $key => $name)
                            <div class="col-3 mt-2">
                                <p style="font-size: 15px" class="mb-1">{{ ucwords(str_replace('_', ' ', $key)) }} </p>
                                @foreach ($name as $key => $access)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="access[]"
                                            value="{{ $access->id }}" id="{{ $access->id }}">
                                        <label class="form-check-label" style="font-size: 14px" for="{{ $access->id }}">
                                            {{ $access->name }}
                                        </label>
                                    </div>
                                    @php
                                        $permissions_length++;
                                    @endphp
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <hr>
            @include('components/submit-button')
        </form>
    </div>
@endsection

@push('script')
    <script>
        const permissions_length = @json($permissions_length);
        const user_permissions = @json($user_permissions);
        user_permissions.forEach(el => {
            $(`#${el}`).attr('checked', true)
        });



        if (permissions_length === user_permissions.length) {
            $('#all_check').prop('checked', true)
        }

        $(document).on('change', '#all_check', function() {
            const iSChecked = $(this).prop('checked')
            if (iSChecked) {
                $('input[type="checkbox"]').prop('checked', true)
            } else {
                $('input[type="checkbox"]').prop('checked', false)
            }
        })
    </script>
@endpush
