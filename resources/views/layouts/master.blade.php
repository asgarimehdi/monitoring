<!DOCTYPE html>

<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'سامانه جامع مانیتورینگ') }}</title>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset("/css/adminlte.min.css") }}>
    <!-- leaflet -->
    <link rel="stylesheet" href="{{asset('/css/leaflet.css')}}">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href={{ asset("/css/bootstrap-rtl.min.css") }}>
    <!-- template rtl version -->
    <link rel="stylesheet" href={{ asset("/css/custom-style.css") }}>
    <link rel="icon" href="{{asset('/images/favicon.ico')}}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{asset('/images/favicon.ico')}}" type="image/x-icon"/>

</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
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
        @yield('search-form')


        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">
            <a href="/changepassword" title="{{Auth::user()->role->name}} - {{Auth::user()->group->name}} - {{Auth::user()->region_point->region_center->region_county->name}}">
                <li class="nav-item mt-2">
                    <i class="fa fa-user"></i>
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
            {{--<li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                        class="fa fa-th-large"></i></a>
            </li>--}}
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src={{ asset("images/zums.png") }} alt="zums" class="brand-image img-circle elevation-3"
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

                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-gear"></i>
                                    <p>
                                        مدیریت
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @canany(['isGostaresh','isAdmin'])
                                        <li class="nav-item">
                                            <a href="\developmanage"
                                               class="nav-link {{ (request()->is('developmanage')) ? 'active' : '' }}">
                                                <i class="fa fa-globe nav-icon"></i>
                                                <p>
                                                    توسعه شبکه

                                                </p>
                                            </a>
                                        </li>
                                    @endcanany
                                    @canany(['isBimaVagir','isAdmin'])
                                        <li class="nav-item">
                                            <a href="\cdcoronamanage"
                                               class="nav-link {{ (request()->is('cdcoronamanage')) ? 'active' : '' }}">
                                                <i class="fa fa-ambulance nav-icon"></i>
                                                <p>
                                                    مدیریت کرونا

                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="\cddiseasemanage"
                                               class="nav-link {{ (request()->is('cddiseasemanage')) ? 'active' : '' }}">
                                                <i class="fa fa-medkit nav-icon"></i>
                                                <p>
                                                    مدیریت بیماری واگیر

                                                </p>
                                            </a>
                                        </li>
                                        @endcanany
                                        @canany(['isBimaGVagir','isAdmin'])
                                        <li class="nav-item">
                                            <a href="\cdthyroidmanage"
                                               class="nav-link {{ (request()->is('cdthyroidmanage')) ? 'active' : '' }}">
                                                <i class="fa fa-address-card nav-icon"></i>
                                                <p>
                                                    مدیریت هایپوتیروئید

                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="\cdfinilmanage"
                                               class="nav-link {{ (request()->is('cdfinilmanage')) ? 'active' : '' }}">
                                                <i class="fa fa-bank nav-icon"></i>
                                                <p>
                                                    مدیریت فینیل

                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="\cdcancermanage"
                                               class="nav-link {{ (request()->is('cdcancermanage')) ? 'active' : '' }}">
                                                <i class="fa fa-bed nav-icon"></i>
                                                <p>
                                                    مدیریت سرطان

                                                </p>
                                            </a>
                                        </li>
                                    @endcanany
                                    @canany(['isEnvironment','isAdmin','isBehvarz'])
                                        <li class="nav-item">
                                            <a href="\environmentmanage"
                                               class="nav-link {{ (request()->is('environmentmanage')) ? 'active' : '' }}">
                                                <i class="fa fa-eyedropper nav-icon"></i>
                                                <p>
                                                    بهداشت محیط
                                                    <span class="right badge badge-info">توسعه</span>
                                                </p>
                                            </a>
                                        </li>
                                    @endcanany
                                    @canany(['isEnvironment','isAdmin'])
                                        <li class="nav-item">
                                            <a href="\environment\base"
                                               class="nav-link {{ (request()->is('environment\base')) ? 'active' : '' }}">
                                                <i class="fa fa-eyedropper nav-icon"></i>
                                                <p>
                                                     اطلاعات بهداشت محیط

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

                                                </p>
                                            </a>
                                        </li>
                                    @endcanany
                                    @canany(['isAdmin'])
                                        <li class="nav-item">
                                            <a href="\users"
                                               class="nav-link {{ (request()->is('users')) ? 'active' : '' }}">
                                                <i class="fa fa-users nav-icon"></i>
                                                <p>مدیریت کاربران

                                                </p>
                                            </a>
                                        </li>
                                    @endcanany
                                </ul>
                            </li>


                    </ul>

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview  menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    مانیتورینگ
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                @canany(['isBimaVagir','isAdmin','isRiasat','isBehvarz'])

                                    <li class="nav-item">
                                        <a href="\cdcorona"
                                           class="nav-link {{ (request()->is('cdcorona')) ? 'active' : '' }}">
                                            <i class="fa fa-ambulance nav-icon"></i>
                                            <p>کرونا
                                            </p>
                                        </a>
                                    </li>
                                @endcanany
                                @canany(['isBimaVagir','isAdmin','isRiasat'])
                                    <li class="nav-item">
                                        <a href="\coldchain"
                                           class="nav-link {{ (request()->is('coldchain')) ? 'active' : '' }}">
                                            <i class="fa fa-snowflake-o nav-icon"></i>
                                            <p>زنجیره سرما
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="\cddisease"
                                           class="nav-link {{ (request()->is('cddisease')) ? 'active' : '' }}">
                                            <i class="fa fa-medkit nav-icon"></i>
                                            <p>بیماری واگیر
                                            </p>
                                        </a>
                                    </li>
                                @endcanany
                                @canany(['isBimaGVagir','isAdmin','isRiasat'])
                                    <li class="nav-item">
                                        <a href="\cdthyroid"
                                           class="nav-link {{ (request()->is('cdthyroid')) ? 'active' : '' }}">
                                            <i class="fa fa-address-card nav-icon"></i>
                                            <p>تیروئید نوزادان

                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="\cdfinil"
                                           class="nav-link {{ (request()->is('cdfinil')) ? 'active' : '' }}">
                                            <i class="fa fa-bank nav-icon"></i>
                                            <p>فینیل

                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="\cdcancer"
                                           class="nav-link {{ (request()->is('cdcancer')) ? 'active' : '' }}">
                                            <i class="fa fa-bed nav-icon"></i>
                                            <p>سرطان

                                            </p>
                                        </a>
                                    </li>
                                @endcanany

                                @canany(['isEnvironment','isAdmin','isRiasat','isBehvarz'])
                                    <li class="nav-item">
                                        <a href="\environment"
                                           class="nav-link {{ (request()->is('environment')) ? 'active' : '' }}">
                                            <i class="fa fa-eyedropper nav-icon"></i>
                                            <p>کلرسنجی

                                            </p>
                                        </a>
                                    </li>
                                 @endcanany
                            </ul>
                        </li>

                    </ul>


                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-area-chart"></i>
                                <p>
                                    گزارشات
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @canany(['isAbhar'])
                                    @canany(['isBimaGVagir','isAdmin','isRiasat'])

                                        <li class="nav-item">
                                            <a href="\report\cdcorona"
                                               class="nav-link {{ (request()->is('\report\cdcorona')) ? 'active' : '' }}">
                                                <i class="fa fa-ambulance nav-icon"></i>
                                                <p>نمودار کرونا
                                                    <span class="right badge badge-success">توسعه</span>
                                                </p>
                                            </a>
                                        </li>
                                    @endcanany
                                @endcanany

                                    @canany(['isBimaGVagir','isAdmin','isRiasat','isBehvarz'])

                                        <li class="nav-item">
                                            <a href="\report\cdcorona1"
                                               class="nav-link {{ (request()->is('\report\cdcorona1')) ? 'active' : '' }}">
                                                <i class="fa fa-ambulance nav-icon"></i>
                                                <p>گزارش کرونا
                                                    <span class="right badge badge-success">توسعه</span>
                                                </p>
                                            </a>
                                        </li>
                                    @endcanany
                                @canany(['isEnvironment','isAdmin','isRiasat','isBehvarz'])
                                    <li class="nav-item">
                                        <a href="\report\environment"
                                           class="nav-link {{ (request()->is('\report\environment')) ? 'active' : '' }}">
                                            <i class="fa fa-eyedropper nav-icon"></i>
                                            <p>کلرسنجی

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

    <!-- Control sidebar content goes here -->
@yield('left-panel')


<!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <x-footer>

        </x-footer>
   </footer>
</div>
<!-- ./wrapper -->
@auth
    <script>
        window.user =@json(auth()->user())
    </script>
@endauth
<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/app.js?v=3') }}" defer></script>

<!-- jQuery -->

</body>
</html>
