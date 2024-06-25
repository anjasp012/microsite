@extends('layouts.app')


@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    <img src="/images/KV1.png" class="w-100 mb-3" alt="KV1">
    <div class="container">
        <div class="row g-1 steps mb-3">
            <div class="col-4">
                <div class="card rounded-3">
                    <div class="card-body py-2">
                        Upload foto stiker kamu di IG feed dengan hashtag <strong>#KolektorPentolan</strong>, dan tag 2
                        temen kamu, terus follow IG <strong>@SmaxIndonesia</strong>
                    </div>
                    <div class="emott">
                        <img src="/images/emott1.png" class="w-100" alt="emott1">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card rounded-3">
                    <div class="card-body py-2">
                        Register di website <strong>kolektorpentolan.com</strong> dan upload link postingan IG kamu untuk
                        konfirmasi
                        keikutsertaan kamu
                    </div>
                    <div class="emott">
                        <img src="/images/emott2.png" class="w-100" alt="emott2">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card rounded-3">
                    <div class="card-body py-2">
                        Tunggu pengumumannya di akhir minggu dan akhir bulan, semoga beruntung!

                    </div>
                    <div class="emott">
                        <img src="/images/emott3.png" class="w-100" alt="emott3">
                    </div>
                </div>
            </div>
            <div class="next-1">
                <img src="/images/next-1.png" alt="next1">
            </div>
            <div class="next-2">
                <img src="/images/next-2.png" alt="next2">
            </div>
        </div>
        <div class="informasi d-flex gap-1 justify-content-center align-items-center mb-3">
            <p class="p-0 m-0">
                Untuk info lebih lengkap, <strong>klik tombol ini!</strong>
            </p>
            <a href="{{ route('informasi') }}" class="btn btn-sm btn-info btn-informasi shadow-sm">Informasi</a>
        </div>
        <div class="action-upload mb-3">
            <a type="button" data-bs-toggle="modal" class="bg-transparent p-0 m-0 w-auto" data-bs-target="#uploadModal">
                <img src="/images/upload.png" width="80%" alt="upload">
            </a>
            <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-transparent border-0">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="upload position-relative">
                                    <div class="bg-primary position-absolute rounded-3 top-0 start-0 bottom-0 end-0 rotate-2"
                                        style="transform: rotate(1.5deg)"></div>
                                    <div class="header-popup">
                                        <img src="/images/popup1.png" width="94%" alt="popup1">
                                    </div>
                                    <div class="card rounded-3 border-0">
                                        <div class="card-body">
                                            <img src="/images/smaxXquby.png" class="mb-2" style="margin-top: 48px"
                                                width="80%" alt="smaxXquby">
                                            <form action="">
                                                <input type="text" class="form-control form-control-sm bg-secondary mb-1"
                                                    placeholder="Instagram ID">
                                                <input type="text" class="form-control form-control-sm bg-secondary mb-2"
                                                    placeholder="Link Postingan">
                                                <button
                                                    class="btn btn-primary border-warning w-100 border-2 rounded-3 mb-2">Upload</button>
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

        </div>
        <div class="row justify-content-center position-relative mb-3" style="z-index: 100">
            <div class="col-9">
                <div class="leaderboard position-relative">
                    <div class="bg-primary position-absolute rounded-3 top-0 start-0 bottom-0 end-0 rotate-2"
                        style="transform: rotate(1.5deg)"></div>
                    <div class="card rounded-3 border-0">
                        <div class="card-body p-2">
                            <input type="text" class="form-control form-control-sm border-0"
                                style="background-color: #f7f7f7" placeholder="Cari posisi kamu di sini">
                            <div class="text-center">
                                <img src="/images/leaderboard.png" class="w-75 mt-1 mb-2" alt="leaderboard">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-leaderboard">
                                    <thead>
                                        <tr>
                                            <th class="bg-info text-light text-center">Rk</th>
                                            <th class="bg-info text-light text-center">Username</th>
                                            <th class="bg-info text-light text-center">Share</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="bg-secondary text-center">1</th>
                                            <th class="bg-secondary">@anjas</th>
                                            <th class="bg-secondary text-center">100</th>
                                        </tr>
                                        <tr>
                                            <th class="bg-secondary text-center">2</th>
                                            <th class="bg-secondary">@anjas</th>
                                            <th class="bg-secondary text-center">100</th>
                                        </tr>
                                        <tr>
                                            <th class="bg-secondary text-center">3</th>
                                            <th class="bg-secondary">@anjas</th>
                                            <th class="bg-secondary text-center">100</th>
                                        </tr>
                                        <tr>
                                            <th class="bg-secondary text-center">4</th>
                                            <th class="bg-secondary">@anjas</th>
                                            <th class="bg-secondary text-center">100</th>
                                        </tr>
                                        <tr>
                                            <th class="bg-secondary text-center">5</th>
                                            <th class="bg-secondary">@anjas</th>
                                            <th class="bg-secondary text-center">100</th>
                                        </tr>
                                        <tr>
                                            <th class="bg-secondary text-center">6</th>
                                            <th class="bg-secondary">@anjas</th>
                                            <th class="bg-secondary text-center">100</th>
                                        </tr>
                                        <tr>
                                            <th class="bg-secondary text-center">7</th>
                                            <th class="bg-secondary">@anjas</th>
                                            <th class="bg-secondary text-center">100</th>
                                        </tr>
                                        <tr>
                                            <th class="bg-secondary text-center">8</th>
                                            <th class="bg-secondary">@anjas</th>
                                            <th class="bg-secondary text-center">100</th>
                                        </tr>
                                        <tr>
                                            <th class="bg-secondary text-center">9</th>
                                            <th class="bg-secondary">@anjas</th>
                                            <th class="bg-secondary text-center">100</th>
                                        </tr>
                                        <tr>
                                            <th class="bg-secondary text-center">10</th>
                                            <th class="bg-secondary">@anjas</th>
                                            <th class="bg-secondary text-center">100</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-center gap-4">
            <a href="" class="text-end"><img src="/images/button-ecommerce.png" width="80%"
                    alt="ecommerce"></a>
            <a href=""><img src="/images/button-tiktok.png" width="80%" alt="tiktok"></a>
        </div>
    </div>
    <footer class="mt-3 bg-success">
        <div class="container">
            <h5 class="text-center text-light fw-bold">Cek juga ya postingan teman lainnya!</h5>
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

    <script>
        $(document).ready(function() {
            $('table').DataTable({
                dom: 't'
            });
        });
    </script>
@endpush
