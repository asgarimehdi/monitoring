@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت مناطق</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<regions-component></regions-component>
<vue-progress-bar></vue-progress-bar>

@endsection
@section('left-panel')
    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
            <h5> اطلاعات کاربر </h5>
            نقش کاربر:{{Auth::user()->role->name}}
            <br/>
            شهرستان کاربر:{{Auth::user()->region_point->region_center->region_county->name}}
            <br/>
            گروه کاربر:{{Auth::user()->group->name}}
        </div>
    </aside>
@endsection
