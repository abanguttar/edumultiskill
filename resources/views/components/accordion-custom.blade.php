<div class="custom-accor" id="custom-accor-{{ $accordion->id }}">
    <div class="custom-accor-item">
        <div class="custom-accor-content d-flex align-items-center {{ $key < 2 ? 'show' : 'd-none' }}"
            id="content-{{ $accordion->id }}">
            <div class="custom-accor-body px-4">
                <div class="text-white">
                    <h4 class="montserrat-600 fw-bold">{{ $accordion->title }}</h4>
                    <p class="m-0 p-0 text-wrap">{{ $accordion->description }}
                    </p>
                </div>
            </div>
        </div>
        <h2 id="{{ $accordion->id }}" class="custom-accor-header mb-3 p-0">
            <img src="/main-assets/{{ $accordion->image }}.webp" width="60px" height="auto"
                data-id="{{ $accordion->id }}" alt="{{ $accordion->id }}" class="custom-accor-button" type="button"
                data-bs-toggle="show" aria-expanded="false">
        </h2>
    </div>
</div>
