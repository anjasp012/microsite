@extends('layouts.app')


@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    <div class="container">
        <img src="/images/informasi.png" class="w-100 my-3" alt="informasi">
        <div class="accordion border-0 mb-4" id="accordionExample">
            @foreach ($informasi as $no => $item)
                <div class="accordion-item border-0">
                    <h2 class="accordion-header">
                        <button class="btn btn-transparent border-0 fw-bold fs-5 px-0 w-100 bg-white text-start"
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}"
                            aria-expanded="true" aria-controls="collapse{{ $item->id }}">
                            {{ $item->judul }}
                        </button>
                    </h2>
                    <div id="collapse{{ $item->id }}"
                        class="accordion-collapse collapse {{ $no + 1 == 1 ? 'show' : '' }}"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body p-0">
                            {!! $item->body !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-between align-items-center mb-5">
            <div class="col-3">
                <a href="{{ route('home') }}">
                    <img src="/images/kembali.png" class="w-100" alt="kembali">
                </a>
            </div>
            <div class="col-4">
                <a href="{{ route('home') }}">
                    <img src="/images/setuju.png" class="w-100" alt="kembali">
                </a>
            </div>
        </div>
    </div>
@endsection
