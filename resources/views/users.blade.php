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
@section('left-panel')
      <aside class="control-sidebar control-sidebar-dark">
          <div class="container">
              <h4>
                  کاربران آنلاین
              </h4>
            @php $users = DB::table('users')->get(); @endphp
            @foreach($users as $user)

                        @if(Cache::has('user-is-online-' . $user->id))
                            <div class="row">
                                <div class="col-sm-12">
                                    @php echo $user->username.' - '.$user->name; @endphp
                                </div>
                            </div>

                        @endif

            @endforeach

          </div>

      </aside>
@endsection
