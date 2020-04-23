@extends('layouts.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">زنجیره سرما</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

<div   style="width: 100%;height: 600px">
    <cold-chain></cold-chain>

</div>


    <vue-progress-bar></vue-progress-bar>

@endsection
