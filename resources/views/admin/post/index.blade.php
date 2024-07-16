@extends('layouts.admin')


@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h3>Postingan Member</h3>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Member</th>
                                        <th>Link IG</th>
                                        <th>Link Post</th>
                                        <th class="text-center">Periode</th>
                                        <th class="text-center">Tanggal Upload</th>
                                        <th>Status</th>
                                        <th class="text-center">Poin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $no => $post)
                                        <tr>
                                            <td class="text-center">{{ $no + 1 }}</td>
                                            <td>
                                                {{ $post->member->username }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success" target="_blank"
                                                    href="https://www.instagram.com/{{ str_replace('@', '', $post->instagram) }}">Buka</a>
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
                                            <td>
                                                @if ($post->status)
                                                    <div class="badge badge-success">Sudah direview</div>
                                                @else
                                                    <div class="badge badge-danger">Belum direview</div>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $post->point }}</td>
                                            <td>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#beriPoint{{ $post->id }}">
                                                    Beri Skor
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="beriPoint{{ $post->id }}"
                                                    data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                    aria-labelledby="beriPoint{{ $post->id }}Label" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fs-5"
                                                                    id="beriPoint{{ $post->id }}Label">Beri Skor</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('admin.postingan-member.update', $post->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="mb-0">
                                                                        <label for="point"
                                                                            class="form-label">point</label>
                                                                        <input type="number" required class="form-control"
                                                                            name="point" id="point"
                                                                            value="{{ $post->point != 0 ? $post->point : '' }}">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
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
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js">
    </script>

    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>
@endpush
