@extends('app.page')

@section('extras_style')
  @include("app.params.style")
  <link rel="stylesheet" href="{{ cdn_asset('asset/js/lib/croppie/croppie.css') }}">
@endsection

@section('content')
<div class="container mt-4">
  <div class="row">
    <div class="col-sm-12 col-md-5 col-lg-3">    
      <nav class="menu mb-3">
        <div class="menu-heading d-flex">
          <img id="account-user-photo" class="avatar avatar-user mr-2" src="{{ photos_cdn_asset($user) }}" width="32" height="32" alt="{{ $user->fullname }}">
          <div class="flex-1 lh-condensed">
            <div class="f5 text-gray-dark text-bold css-truncate css-truncate-target">{{ $user->prenom }}</div>
            <div class="f6 text-gray text-normal">Mon compte</div>
          </div>
        </div>
        <a class="menu-item {{ is_current_url('compte.index') }}" href="{{ route('compte.index') }}">Général</a>
        <a class="menu-item {{ is_current_url('compte.photo') }}" href="{{ route('compte.photo') }}">Photo de profil</a>
        <a class="menu-item {{ is_current_url('compte.pass') }}" href="{{ route('compte.pass') }}">Mot de passe</a>
      </nav>
    </div>
    <div class="col-sm-12 col-md-7 col-lg-8">
      
      @include('flash')

      @yield('params-content')

    </div>
  </div>


  @yield('extern-notif-content')

</div>
@endsection

@section('scripts')

@endsection
