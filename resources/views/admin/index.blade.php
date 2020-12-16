@extends('admin.page')

@section('content')
<div class="container mt-5">
  @include('flash')
</div>
@endsection

@section('scripts')
<script src="{{ asset("asset/js/vue.js") }}" type="text/javascript"></script>
@endsection
