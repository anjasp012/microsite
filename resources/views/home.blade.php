@extends('layouts.app')


@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endpush
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide mb-2">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/KV1.png" class="d-block w-100" alt="kv1">
            </div>
            <div class="carousel-item">
                <img src="/images/KV1.png" class="d-block w-100" alt="kv1">
            </div>
            <div class="carousel-item">
                <img src="/images/KV1.png" class="d-block w-100" alt="kv1">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="steps mb-3">
            <div class="row g-1">
                <div class="col-12">
                    <img src="/images/step.png" class="w-100" alt="step">
                </div>
            </div>
        </div>
        <div class="informasi d-flex gap-1 justify-content-center align-items-center mb-3">
            <p class="p-0 m-0">
                Untuk info lebih lengkap, <strong>klik tombol ini!</strong>
            </p>
            <a href="{{ route('informasi') }}" class="btn btn-sm btn-info btn-informasi shadow-sm">Informasi</a>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-7 col-md-4">
                @auth
                    @if (auth()->user()->role != 'admin')
                        <a type="button" data-bs-toggle="modal" class="bg-transparent p-0 m-0 w-auto"
                            data-bs-target="#uploadModal">
                            <img src="/images/upload.png" class="w-100" alt="upload">
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="bg-transparent p-0 m-0 w-auto">
                        <img src="/images/upload.png" class="w-100" alt="upload">
                    </a>
                @endauth
            </div>
        </div>
        <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-transparent border-0">
                    <div class="row justify-content-center">
                        <div class="col-9 col-md-12">
                            <div class="upload position-relative">
                                <div class="bg-primary position-absolute rounded-3 top-0 start-0 bottom-0 end-0 rotate-2"
                                    style="transform: rotate(1.5deg)"></div>
                                <div class="header-popup">
                                    <img src="/images/ayo.png" class="ayo" alt="popup1">
                                </div>
                                <div class="card rounded-3 border-0">
                                    <div class="card-body">
                                        <div class="smax-wrapper mb-2">
                                            <img src="/images/smaxXquby.png" class="smax" width="80%" alt="smaxXquby">
                                        </div>
                                        <form id='form-post' action="{{ route('post') }}" method="POST">
                                            @csrf
                                            <input type="text" class="form-control form-control-sm bg-secondary mb-1"
                                                placeholder="Instagram ID" name="instagram" required>
                                            <input type="text" class="form-control form-control-sm bg-secondary mb-2"
                                                placeholder="Link Postingan" name="link" required>
                                            @if (@$postMingguIni == null)
                                                <button
                                                    class="btn btn-primary border-warning w-100 border-2 rounded-3 mb-2">Upload</button>
                                            @else
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#yakinModal"
                                                    class="btn btn-primary border-warning w-100 border-2 rounded-3 mb-2">Upload</button>
                                            @endif
                                            <p class="starmoly">Starmoly.All rights reserved.</p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="yakinModal" tabindex="-1" aria-labelledby="yakinModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-transparent border-0">
                    <div class="row justify-content-center">
                        <div class="col-9 col-md-12">
                            <div class="upload position-relative">
                                <div class="bg-primary position-absolute rounded-3 top-0 start-0 bottom-0 end-0 rotate-2"
                                    style="transform: rotate(1.5deg)"></div>
                                <div class="header-popup">
                                    <img src="/images/kamu-yakin.png" class="kamu" alt="yakin">
                                </div>
                                <div class="card rounded-3 border-0">
                                    <div class="card-body">
                                        <p style="line-height:18px" class="text-primary text-center fw-bold mt-4">
                                            Kamu ada postingan koleksi <br class="d-md-none"> baru ya? <br
                                                class="d-none d-md-block"> Dengan upload<br class="d-md-none"> lagi,
                                            kami akan
                                            pakai
                                            entry<br> kamu yang baru dan hapus<br> yang lama, ya!
                                            Lanjut?
                                        </p>
                                        <div class="d-flex gap-3 justify-content-center">
                                            <button data-bs-dismiss="modal"
                                                class="btn btn-primary border-warning border-2 rounded-3 mb-2">Nanti
                                                Deh</button>
                                            <button id="lanjut"
                                                class="btn btn-primary border-warning border-2 rounded-3 mb-2">Lanjut
                                                !</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center position-relative mb-3" style="z-index: 100">
            <div class="col-9 col-md-5">
                <div class="leaderboard position-relative">
                    <div class="bg-primary position-absolute rounded-3 top-0 start-0 bottom-0 end-0 rotate-2"
                        style="transform: rotate(1.5deg)"></div>
                    <div class="card rounded-3 border-0">
                        <div class="card-body p-2">
                            <input id="leaderboardSearch" type="text" class="form-control form-control-sm border-0"
                                style="background-color: #f7f7f7" placeholder="Cari posisi kamu di sini">
                            <div class="text-center">
                                <div class="row justify-content-center mt-2 mb-2">
                                    <div class="col-9 col-md-6">
                                        <img src="/images/leaderboard.png" class="w-100" alt="leaderboard">
                                    </div>
                                </div>
                                <p class="m-0 p-0">
                                    @if ($periode)
                                        Periode {{ Date::parse($periode->tgl_mulai)->format('j F') }} -
                                        {{ Date::parse($periode->tgl_berakhir)->format('j F') }}
                                    @endif
                                </p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-leaderboard">
                                    <thead>
                                        <tr>
                                            <th class="bg-info text-light text-center">Rk</th>
                                            <th class="bg-info text-light text-center">Username</th>
                                            <th class="bg-info text-light text-center">Periode</th>
                                            <th class="bg-info text-light text-center">Poin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $no => $member)
                                            @if ($member->id == auth()->id())
                                                <tr>
                                                    <th class="bg-warning text-center">
                                                        <a class="w-100 text-decoration-none"
                                                            href="{{ route('postingan-saya') }}">{{ $no + 1 }}</a>
                                                    </th>
                                                    <th class="bg-warning">
                                                        <a class="w-100 text-decoration-none"
                                                            href="{{ route('postingan-saya') }}">{{ '@' . $member->username }}</a>
                                                    </th>
                                                    <th class="bg-warning text-center">
                                                        <a class="w-100 text-decoration-none"
                                                            href="{{ route('postingan-saya') }}">{{ $member->latestPost != null ? $member->latestPost->updated_at->format('d M') : '-' }}</a>
                                                    </th>
                                                    <th class="bg-warning text-center">
                                                        <a class="w-100 text-decoration-none"
                                                            href="{{ route('postingan-saya') }}">{{ $member->point }}</a>
                                                    </th>
                                                </tr>
                                            @else
                                                <tr>
                                                    <th class="bg-secondary text-center">{{ $no + 1 }}</th>
                                                    <th class="bg-secondary">
                                                        {{ Str::limit('@' . $member->username, '5', '***') }}
                                                    </th>
                                                    <th class="bg-secondary text-center">
                                                        {{ $member->latestPost != null ? $member->latestPost->updated_at->format('d M') : '-' }}
                                                    </th>
                                                    <th class="bg-secondary text-center">{{ $member->point }}</th>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="icon-white">
                        <img src="/images/leaderboard-icon-white.png" alt="white">
                    </div>
                    <div class="icon-blue">
                        <img src="/images/leaderboard-icon-blue.png" alt="white">
                    </div>
                </div>
                <small class="fw-bold ms-4"><i>Update {{ $updated->updated_at->format('d/m/Y') }}</i></small>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-11 col-md-7">
                <img src="/images/terus.png" alt="terus-kumpulkan" class="w-100">
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-5 col-md-3"> <a href="https://id.shp.ee/iS2FqYY" target="_blank" class="text-end"><img
                        src="/images/button-ecommerce.png" class="w-100" alt="ecommerce"></a></div>
            <div class="col-5 col-md-3"> <a href="https://www.tiktok.com/@smaxindonesia?_t=8nWGGcMqy8m&_r=1"
                    target="_blank"><img src="/images/button-tiktok.png" class="w-100" alt="tiktok"></a></div>
        </div>
    </div>
    <footer class="mt-3 py-2 bg-success">
        <div class="container">
            <h5 class="text-center text-light fw-bold">Cek juga ya postingan teman lainnya!</h5>
        </div>

        <div class="owl-carousel py-2 py-md-4">
            @foreach ($galleries as $gallery)
                <div class="item"><img class="w-100" src="{{ asset('storage/gallery/' . $gallery->file) }}"
                        alt=""></div>
            @endforeach
        </div>
        <div class="container">
            <p class="text-center text-light p-0 m-0">Starmoly.All rights reserved.</p>
        </div>
    </footer>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <script>
        $(document).ready(function() {
            oTable = $('table')
                .DataTable({
                    "language": {
                        "sEmptyTable": "Tidak ada data"
                    },
                    dom: 't',
                    paging: false
                });
            $('#leaderboardSearch').keyup(function() {
                oTable.search($(this).val()).draw();
            })
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @session('error')
        <script>
            // Example of a basic SweetAlert alert
            Swal.fire({
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endsession

    <script>
        $('#lanjut').on('click', function() {
            $('#form-post').submit()
        })
    </script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                center: true,
                responsive: {
                    0: {
                        items: 3.5
                    },
                    600: {
                        items: 3.5
                    },
                    1000: {
                        items: 5.5
                    }
                }
            });
        });
    </script>

@endpush
