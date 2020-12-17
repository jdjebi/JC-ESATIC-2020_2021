<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('asset/imgs/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('asset/imgs/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/imgs/icons/favicon-16x16.png') }}">

    <link rel="manifest" href="{{ asset('asset/imgs/icons/site.webmanifest') }}">
    <title>
      @if(isset($title))
        {{ $title }}
      @elseif(isset($title2))
        RESAC Admin - {{ $title2 }}
      @else
        RESAC Admin
      @endif
    </title>
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/fontawsome/all.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/resac/admin/dashboard.css') }}">
    <style media="screen">
      body{
        background-color: #f1f3f6
      }
    </style>
    @yield('extras_style')
  </head>
  <body>
    @include('admin.nav2')
    @yield('content')
    <script src="{{ asset('asset/js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset("asset/js/extras/sweetalert2.all.min.js") }}" type="text/javascript"></script>
    @yield('scripts')
  </body>
</html>
