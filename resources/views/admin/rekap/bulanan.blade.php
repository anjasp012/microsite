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
                        <h3>Rekap Periode</h3>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Periode</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($periode as $no => $item)
                                        <tr>
                                            <td class="text-center">{{ $no + 1 }}</td>
                                            <td>
                                                {{ Date::parse($item->tgl_mulai)->format('j F') }} -
                                                {{ Date::parse($item->tgl_berakhir)->format('j F') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.rekap.bulanan.show', $item->id) }} "
                                                    class="btn btn-info">Lihat Rekapan Poin</a>
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
