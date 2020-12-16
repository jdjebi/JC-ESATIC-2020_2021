@extends('admin.page2')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('admin.flash.side_nav')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      @include('admin.flash.main_creator')
    </main>
  </div>
</div>
@endsection
