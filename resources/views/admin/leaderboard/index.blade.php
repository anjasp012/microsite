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
                        <div class="d-flex align-items-center justify-content-between">
                            <h3>Leaderboard Member
                                @if ($periode)
                                    <small>
                                        (Periode {{ Date::parse($periode->tgl_mulai)->format('j') }} -
                                        {{ Date::parse($periode->tgl_berakhir)->format('j F') }})
                                    </small>
                                @endif

                            </h3>
                            <!-- Button trigger modal -->
                            <div class="d-flex">
                                @if ($periode)
                                    <form action="{{ route('admin.periode.stop') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-danger mr-2">Stop Periode</button>
                                    </form>
                                @endif
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Mulai Periode Baru
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> Reset Poin & Mulai Periode Baru
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.periode.store') }}" method="POST">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="tgl_mulai" class="form-label">Tanggal Mulai Periode</label>
                                                    <input type="date" name="tgl_mulai" id="tgl_mulai"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_berakhir" class="form-label">Tanggal Berakhir
                                                        Periode</label>
                                                    <input type="date" name="tgl_berakhir" id="tgl_berakhir"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        @if ($periode)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Rk</th>
                                            <th>Member</th>
                                            <th class="text-center">Point</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($leaderboard as $no => $item)
                                            <tr>
                                                <td class="text-center">{{ $no + 1 }}</td>
                                                <td>
                                                    {{ $item->username }}
                                                </td>
                                                <td class="text-center">{{ $item->point }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center">Tidak ada Periode Aktif, silahkan klik mulai periode baru</div>
                        @endif
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
