@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 mt-2">
<h1> پوشش واکسیناسیون تا 27 آبان</h1>
                <ul class="nav nav-pills">

                    <li  class="btn btn-default"><a data-toggle="pill" href="#menu0">زنجان</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu1">ابهر</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu2">خدابنده</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu3">خرم دره</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu4">ایجرود</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu5">ماهنشان</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu6">سلطانیه</a></li>
                    <li class="btn btn-default"><a data-toggle="pill" href="#menu7">طارم</a></li>
                </ul>

                <div class="tab-content">

                    <div id="menu0" class="tab-pane fade in active">
                        <h3>زنجان</h3>
                        <hr/>

                        <img src="/images/vaccine/Slide1.PNG" width="100%"/>
                        <hr/>
                        <h4>پایگاهها</h4>
                        <img src="/images/vaccine/Slide2.PNG" width="100%"/>

                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <h3>ابهر</h3>
                        <hr/>

                        <img src="/images/vaccine/Slide3.PNG" width="100%"/>
                        <hr/>
                        <h4>پایگاهها</h4>
                        <img src="/images/vaccine/Slide4.PNG" width="100%"/>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <h3>خدابنده</h3>
                        <hr/>

                        <img src="/images/vaccine/Slide5.PNG" width="100%"/>
                        <hr/>
                        <h4>پایگاهها</h4>
                        <img src="/images/vaccine/Slide6.PNG" width="100%"/>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <h3>خرمدره</h3>
                        <hr/>

                        <img src="/images/vaccine/Slide7.PNG" width="100%"/>
                        <hr/>
                        <h4>پایگاهها</h4>
                        <img src="/images/vaccine/Slide8.PNG" width="100%"/>
                    </div>
                    <div id="menu4" class="tab-pane fade">
                        <h3>ایجرود</h3>
                        <hr/>

                        <img src="/images/vaccine/Slide11.PNG" width="100%"/>
                    </div>
                    <div id="menu5" class="tab-pane fade">
                        <h3>ماهنشان</h3>
                        <hr/>

                        <img src="/images/vaccine/Slide12.PNG" width="100%"/>
                    </div>
                    <div id="menu6" class="tab-pane fade">
                        <h3>سلطانیه</h3>
                        <hr/>

                        <img src="/images/vaccine/Slide10.PNG" width="100%"/>
                    </div>
                    <div id="menu7" class="tab-pane fade">
                        <h3>طارم</h3>
                        <hr/>

                        <img src="/images/vaccine/Slide9.PNG" width="100%"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
