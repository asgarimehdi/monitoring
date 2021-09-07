@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 mt-2">
<h1> پوشش واکسیناسیون تا 13 شهریور</h1>
                <ul class="nav nav-pills">
                    <li  class="btn btn-default"><a data-toggle="pill" href="#home">زنجان</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu1">ابهر</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu2">خدابنده</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu3">خرم دره</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu4">ایجرود</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu5">ماهنشان</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu6">سلطانیه</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu7">طارم</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <h3>زنجان</h3>
                        <img src="/images/vaccine/zanjan1.jpg" width="100%"/>
                        <img src="/images/vaccine/zanjan2.jpg" width="100%"/>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <h3>ابهر</h3>
                        <img src="/images/vaccine/abhar1.jpg" width="100%"/>
                        <img src="/images/vaccine/abhar2.jpg" width="100%"/>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <h3>خدابنده</h3>
                        <img src="/images/vaccine/khodabande1.jpg" width="100%"/>
                        <img src="/images/vaccine/khodabande2.jpg" width="100%"/>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <h3>خرمدره</h3>
                        <img src="/images/vaccine/khoramdare1.jpg" width="100%"/>
                        <img src="/images/vaccine/khoramdare2.jpg" width="100%"/>
                    </div>
                    <div id="menu4" class="tab-pane fade">
                        <h3>ایجرود</h3>
                        <img src="/images/vaccine/ijrood1.jpg" width="100%"/>
                    </div>
                    <div id="menu5" class="tab-pane fade">
                        <h3>ماهنشان</h3>
                        <img src="/images/vaccine/mahneshan1.jpg" width="100%"/>
                    </div>
                    <div id="menu6" class="tab-pane fade">
                        <h3>سلطانیه</h3>
                        <img src="/images/vaccine/soltanie1.jpg" width="100%"/>
                    </div>
                    <div id="menu7" class="tab-pane fade">
                        <h3>طارم</h3>
                        <img src="/images/vaccine/tarom1.jpg" width="100%"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
