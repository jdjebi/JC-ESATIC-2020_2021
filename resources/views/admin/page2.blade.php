<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ cdn_asset('asset/imgs/icons/apple-touch-dark-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ cdn_asset('asset/imgs/icons/favicon-dark-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ cdn_asset('asset/imgs/icons/favicon-dark-16x16.png') }}">

    <title>
      @if(isset($title))
        {{ $title }}
      @elseif(isset($title2))
        RESAC Admin - {{ $title2 }}
      @else
        RESAC Admin
      @endif
    </title>
    <link rel="stylesheet" href="{{ cdn_asset('asset/css/bootstrap/4.5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ cdn_asset('asset/css/fontawsome/all.css') }}">
    <link rel="stylesheet" href="{{ cdn_asset('asset/css/resac/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ cdn_asset('asset/css/resac/resac.css') }}">

    <style media="screen">
      body{
        background-color: #f1f3f6;
        padding-top: 53px;
      }
    </style>
    @yield('extras_style')
    @stack('styles')
  </head>
  <body>
    @include('admin.nav2')
    @yield('content')
    <script src="{{ cdn_asset('asset/js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ cdn_asset('asset/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ cdn_asset("asset/js/extras/sweetalert2.all.min.js") }}" type="text/javascript"></script>
    <script src="{{ cdn_asset("asset/js/resac/swal2.tools.js") }}"></script>
    <script src="{{ cdn_asset("asset/js/vue.js") }}" type="text/javascript"></script>
    <script src="{{ cdn_asset("asset/js/resac/vue.truncate_filter.js") }}" type="text/javascript"></script>
    @yield('scripts')
    @stack('scripts')
  </body>
</html>