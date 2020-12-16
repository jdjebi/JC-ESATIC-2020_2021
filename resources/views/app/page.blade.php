<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ cdn_asset('imgs/icons/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ cdn_asset('imgs/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ cdn_asset('imgs/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ cdn_asset('imgs/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('asset/imgs/icons/site.webmanifest') }}">
    <title>
      @if(isset($title))
        {{ $title }}
      @elseif(isset($title2))
        RESAC - {{ $title2 }}
      @else
        RESAC
      @endif
    </title>
    <link rel="stylesheet" href="{{ cdn_asset('asset/css/cerulean/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/fontawsome/all.css') }}">
    <link rel="stylesheet" href="{{ cdn_asset('asset/mobile/css/main.css') }}">
    <link rel="stylesheet" href="{{ cdn_asset('asset/css/resac/resac.css') }}">

    <style media="screen">
      body{
          padding-top: 60px
      }
      .resac-bg-light{
        background-color: #ffffff
      }
      .resac-bg-dark{
        background-color:#283e4a;
      }
      .resac-text-dark{
        color: #283e4a !important;
      }
      .resac-bg-dark .navbar-nav .nav-link {
          font-size: 14px;
          padding-top: 13px;
      }
      .resac-bg-dark .navbar-brand{
          padding-top: 2px;
      } 
      .resac-logo-25{
        font-size: 25px
      }
      .resac-logo-font{
        font-family: leckerli-one;
      }
      @@font-face {
        font-family: "leckerli-one";
        src: url({{ asset("asset/fonts/Leckerli_One/LeckerliOne-Regular.ttf") }});
      }
    </style>
    @yield('extras_style')
  </head>
  <body>
    @include('app.nav')
    @yield('content')
    @auth
      @include('app.mobile-nav992')
    @endauth
    <script src="{{ cdn_asset('asset/js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ cdn_asset('asset/js/bootstrap.min.js') }}" type="text/javascript"></script>
    @yield('scripts')
  </body>
</html>
