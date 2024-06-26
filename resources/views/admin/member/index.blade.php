@extends('layouts.admin')


@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Button trigger modal -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3>Member</h3>
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Cari Member"
                                    aria-label="Search" name="q" value="{{ request()->q }}">
                                <button class="btn btn-primary my-2 my-sm-0" type="submit">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($members as $no => $member)
                        <div class="col-md-3 col-4 mb-4 d-flex">
                            <div class="card w-100 border-0 shadow-sm">
                                <div class="card-body text-center py-5">
                                    <img width="90" class="mb-3  border rounded" src="{{ $member->avatar }}"
                                        alt="{{ $member->name }}">
                                    <h5 class="font-weight-bold text-dark mb-1">
                                        {{ Str::limit($member->username, 5) }}
                                    </h5>
                                    <p>
                                        {{ $member->name }}
                                    </p>
                                    <a href="" class="btn btn-primary px-lg-4">Detail</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="card bg-white border-0 shadow-sm">
                                <div class="card-body py-5">
                                    <p class="text-danger text-center p-0 m-0">User tidak ada</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                @if ($members->total() > 8)
                    <div class="card">
                        <div class="card-body pt-3 pb-0">
                            {{ $members->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                @endif
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
