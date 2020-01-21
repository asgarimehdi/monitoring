<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'سامانه جامع مانیتورینگ') }}</title>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{ asset("PersianAdminLTE/plugins/font-awesome/css/font-awesome.min.css") }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset("PersianAdminLTE/dist/css/adminlte.min.css") }}>
    <!-- leaflet -->
    <link rel="stylesheet" href="{{asset('/css/leaflet.css')}}">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href={{ asset("PersianAdminLTE/dist/css/bootstrap-rtl.min.css") }}>
    <!-- template rtl version -->
    <link rel="stylesheet" href={{ asset("PersianAdminLTE/dist/css/custom-style.css") }}>
    <link rel="icon" href="{{asset('/images/favicon.ico')}}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{asset('/images/favicon.ico')}}" type="image/x-icon"/>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>

        </ul>
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" @keyup="searchit" v-model="search" type="search"
                       placeholder="جستجو" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" @click="searchit" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">
        <a href="/changepassword">
            <li class="nav-item mt-2">

                {{Auth::user()->name}}


            </li>
        </a>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link"
                   onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off nav-icon"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                        class="fa fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src={{ asset("images/zums.png") }} alt="zums logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
            <span class="brand-text font-weight-light">سامانه جامع مانیتورینگ</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    مانیتورینگ
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @canany(['isBimaGVagir','isAdmin'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-heartbeat nav-icon"></i>
                                        <p>
                                            مبارزه با بیماریهای واگیر
                                        </p>
                                    </a>
                                </li>


                                    <li class="nav-item">
                                        <a href="\coldchain"
                                           class="nav-link {{ (request()->is('coldchain')) ? 'active' : '' }}">
                                            <i class="fa fa-snowflake-o nav-icon"></i>
                                            <p>زنجیره سرما
                                                <span class="right badge badge-success">توسعه</span>
                                            </p>
                                        </a>
                                    </li>
                                @endcanany
                                @canany(['isAdmin'])
                                    <li class="nav-item">
                                        <a href="\regions"
                                           class="nav-link {{ (request()->is('regions')) ? 'active' : '' }}">
                                            <i class="fa fa-map-marker nav-icon"></i>
                                            <p>مدیریت مناطق
                                                <span class="right badge badge-danger">تکمیل</span>
                                            </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="\users"
                                           class="nav-link {{ (request()->is('users')) ? 'active' : '' }}">
                                            <i class="fa fa-users nav-icon"></i>
                                            <p>مدیریت کاربران
                                                <span class="right badge badge-danger">تکمیل</span>
                                            </p>
                                        </a>
                                    </li>
                                @endcanany

                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
    @yield('content')
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5> اطلاعات کاربر </h5>
            نقش کاربر:{{Auth::user()->role->name}}
            <br/>
            شهرستان کاربر:{{Auth::user()->region_point->region_center->region_county->name}}
            <br/>
            گروه کاربر:{{Auth::user()->group->name}}
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">

        </div>
        <!-- Default to the
        <strong>CopyRight &copy; 2019 <a href="#">M.Asgari</a>.</strong> left-->
    </footer>
</div>
<!-- ./wrapper -->
@auth
    <script>
        window.user = @json(auth()->user())
    </script>
@endauth
<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- jQuery -->

</body>
</html>
