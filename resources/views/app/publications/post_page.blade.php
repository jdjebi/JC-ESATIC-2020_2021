@extends('app.page')

@section('content')

<div class="container-fluid mt-3">

  <div class="row">
    <div class="col-lg-2 col-sm-12">

      @include('app.publications.nav')

    </div>

    <div class="col-lg-10 col-sm-12">
        @yield('main-content')
    </div>

  </div>

</div>

@endsection

@section('scripts')
<script type="module" src="{{ asset('asset/js/resac/init.timeago.js') }}"></script>
@endsection


