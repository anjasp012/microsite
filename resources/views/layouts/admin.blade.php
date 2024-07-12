<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="/vendor/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="/vendor/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">

    @stack('style')
</head>

<body id="page-top">
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Microsite</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Menu
            </div>
            <li class="nav-item {{ request()->routeIs('admin.leaderboard-member.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.leaderboard-member.index') }}">
                    <i class="fas fa-fw fa-arrow-up"></i>
                    <span>Ranking Member</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.daftar-member.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.daftar-member.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Daftar Member</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.postingan-member.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.postingan-member.index') }}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Postingan Member</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Rekap Poin</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Rekap Poin:</h6>
                        {{-- <a class="collapse-item" href="{{ route('admin.rekap.mingguan') }}">Per Mingguan</a> --}}
                        <a class="collapse-item" href="{{ route('admin.rekap.bulanan') }}">Per Bulan/Periode</a>
                    </div>
                </div>
            </li>

            <div class="sidebar-heading">
                Lainnya
            </div>
            <li class="nav-item {{ request()->routeIs('admin.leaderboard-member.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.informasi.index') }}">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Informasi</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle" src="/vendor/sb-admin/img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                @yield('content')

            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/vendor/sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/vendor/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="/vendor/sb-admin/js/sb-admin-2.min.js"></script>

    @stack('script')
</body>

</html>
