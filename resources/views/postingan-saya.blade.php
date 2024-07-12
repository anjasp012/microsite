@extends('layouts.app')


@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center position-relative mb-3 mt-3"
            style="z-index: 100; min-height: 80vh">
            <div class="col-12 col-md-8">
                <div class="leaderboard position-relative">
                    <div class="bg-primary position-absolute rounded-3 top-0 start-0 bottom-0 end-0 rotate-2"
                        style="transform: rotate(1.5deg)"></div>
                    <div class="card rounded-3 border-0">
                        <div class="card-body p-2">
                            <div class="text-center">
                                <div class="row justify-content-center mt-2 mb-2">
                                    <div class="col-9 col-md-6">
                                        <img src="/images/postingan-saya.png" class="w-100" alt="leaderboard">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-leaderboard">
                                    <thead>
                                        <tr>
                                            <th class="bg-info text-light text-center">#</th>
                                            <th class="bg-info text-light text-center">Link IG</th>
                                            <th class="bg-info text-light text-center">Link Post</th>
                                            <th class="bg-info text-light text-center">Periode</th>
                                            <th class="bg-info text-light text-center">Tgl Upload</th>
                                            <th class="bg-info text-light text-center">Status</th>
                                            <th class="bg-info text-light text-center">Poin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($postingan as $no => $post)
                                            <tr>
                                                <td class="text-center">{{ $no + 1 }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-success" target="_blank"
                                                        href="{{ $post->instagram }}">Buka</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-success" target="_blank"
                                                        href="{{ $post->link }}">Buka</a>
                                                </td>
                                                <td class="text-center">
                                                    {{ Date::parse($post->periode->tgl_mulai)->format('j') }} -
                                                    {{ Date::parse($post->periode->tgl_berakhir)->format('j F') }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $post->created_at->format('d-m-Y') }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($post->status)
                                                        <div class="badge bg-success">Sudah direview</div>
                                                    @else
                                                        <div class="badge bg-danger">Belum direview</div>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $post->point }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
