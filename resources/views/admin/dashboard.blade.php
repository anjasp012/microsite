@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 overflow-hidden border-0">
                    <div class="card-body border-0" style="background-color: #22C55E">
                        <div class="h3 mb-2 font-weight-bold text-white">{{ $jumlahMember }}</div>
                        <div class="text-xs font-weight-bold text-white text-uppercase">
                            Jumlah Member</div>
                    </div>
                    <a href="{{ route('admin.daftar-member.index') }}"
                        class="card-footer border-0 text-center text-white font-weight-bold text-decoration-none"
                        style="background-color: #16A34A">
                        Lihat
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 overflow-hidden border-0">
                    <div class="card-body border-0" style="background-color: #06B6D4">
                        <div class="h3 mb-2 font-weight-bold text-white">{{ $jumlahPostingan }}</div>
                        <div class="text-xs font-weight-bold text-white text-uppercase">
                            Jumlah Postingan</div>
                    </div>
                    <a href="{{ route('admin.postingan-member.index') }}"
                        class="card-footer border-0 text-center text-white font-weight-bold text-decoration-none"
                        style="background-color: #0891B2">
                        Lihat
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 overflow-hidden border-0">
                    <div class="card-body border-0" style="background-color: #EC4899">
                        <div class="h3 mb-2 font-weight-bold text-white">{{ $jumlahPostinganBelumDireview }}</div>
                        <div class="text-xs font-weight-bold text-white text-uppercase">
                            Jumlah Postingan yang belum di review</div>
                    </div>
                    <a href="{{ route('admin.postingan-member.index') }}"
                        class="card-footer border-0 text-center text-white font-weight-bold text-decoration-none"
                        style="background-color: #DB2777">
                        Lihat
                    </a>
                </div>
            </div>

        </div>


    </div>
@endsection

@push('script')
    <script src="/vendor/sb-admin/vendor/chart.js/Chart.min.js"></script>

    <script src="/vendor/sb-admin/js/demo/chart-area-demo.js"></script>
    <script src="/vendor/sb-admin/js/demo/chart-pie-demo.js"></script>
@endpush
