@extends('app.page')

@section('extras_style')
  @include('app.publications.style')
@endsection

@section('content')

<div class="container-fluid mt-3">
  <div class="row">
    <div class="resac-padding-left-right-on-sm offset-sm-12 offset-lg-3 col-lg-6 col-sm-12">
      @include("app.publications.templates.post_v2")
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="module" src="{{ asset('asset/js/resac/init.timeago.js') }}"></script>
@endsection


