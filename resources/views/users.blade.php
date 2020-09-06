@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت کاربران</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<users-component></users-component>
<vue-progress-bar></vue-progress-bar>

@endsection
@section('search-form')
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
@endsection
