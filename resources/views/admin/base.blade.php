@extends('admin.page2')

@section('extras_style')
  @include('admin.pubs.dashboard_style')
  <link rel="stylesheet" href="{{ cdn_asset("asset/css/placeholder-loading.min.css") }}">
  <style media="screen">
  body{
    background-color: #f1f3f6;
    
  }
  </style>
  <style media="screen">
    .ph-item>* {
      flex: 1 1 auto;
      display: flex;
      flex-flow: column;
      padding-right: 0px;
      padding-left: 0px;
    }

    .ph-item {
        direction: ltr;
        position: relative;
        display: flex;
        flex-wrap: wrap;
        padding: 0px;
        overflow: hidden;
        margin-bottom: 30px;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 2px;
    }
    .user-photo {
        width: 30px;
        height: 30px;
        background: #eee;
        border-radius: 50%;
    }
  </style>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    @include('admin.flash.side_nav')
    <main id="v-main" role="main" class="resac-padding-no-left-right col-md-9 ml-sm-auto col-lg-10 px-md-4">
        @yield('main-content')
    </main>
  </div>
</div>
@endsection
