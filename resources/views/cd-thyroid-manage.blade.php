@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">مدیریت اطلاعات بیماری کم کاری تیروئید نوزادان</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <cd-thyroid-manage-component></cd-thyroid-manage-component>



    <vue-progress-bar></vue-progress-bar>

@endsection
