@extends('app.page2')

@section('extras_style')
<style media="screen">
  body{
    background-color: #f1f3f6;
    background-size: cover;
    background-repeat: no-repeat;
    border-color: transparent !important
  }
  @media(max-width: 768px) {
    body{
      background-color: #fff;
      background-image: none
    }
    #login-box{
      border-color: transparent !important
    }
  }
</style>
@endsection


@section('content')

@endsection