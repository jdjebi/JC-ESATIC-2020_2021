@extends('admin.page')

@section('extras_style')
  @include('admin.pubs.dashboard_style')
  <style media="screen">
  body{
    background-color: #f1f3f6
  }
  </style>
@endsection

@section('content')

  @include('admin.pubs.dashboard_nav')

  <div class="p-5 mt-5 text-center">
    <h2>Publication introuvable</h2>
  </div>

@endsection

@section('srcipts')

@endsection
