@extends('layouts.master')

@section('content')
  <div class="content-wrapper" id="app">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت کاربران</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">صفحه سریع</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><button class="btn btn-success">ایجاد کاربر جدید <i class="fa fa-user-plus fa-fw"></i></button></h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>ردیف</th>
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>نقش</th>
                                <th>زمان ثبت نام</th>
                                <th>تغییر</th>

                            </tr>
                            <tr>
                                <td>1</td>
                                <td>a</td>
                                <td>b</td>
                                <td>c</td>
                                <td>d</td>


                                <td>
                                    <a href="#">
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                    /
                                    <a href="#" >
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                </td>
                            </tr>

                            </tbody></table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
					<example-component></example-component>
                       <!-- <pagination :data="users" @pagination-change-page="getResults"></pagination> -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
@endsection
