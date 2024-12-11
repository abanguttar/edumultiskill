<div class="testimoni-user d-flex flex-column align-items-baseline p-4">
    <p class="mt-5 pt-3" style="font-size: 16px">{{ $testimoni->ulasan }}</p>
    <div class="mt-1">
        <img src="/assets/{{ $testimoni->image }}" class="rounded-circle" width="70px" height="auto" alt="thumb">
        <div class="d-flex flex-column mt-1">
            <p style="font-size: 15px" class="fw-bold p-0 m-0">{{ $testimoni->image }}</p>
            <span style="font-size: 12px"><i>{{ $testimoni->profesi }}</i></span>
            <span style="font-size: 13px">{{ $testimoni->kelas }}</span>
        </div>
    </div>
</div>
