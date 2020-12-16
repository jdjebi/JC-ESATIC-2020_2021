@extends('app.page')

@section('extras_style')
<style media="screen">
  body{
    background-color: #f1f3f6
  }
  .w-300{
    width: 300px
  }
  @media(max-width: 768px) {
    body{
      background-color: #fff;
    }
    #register-box{
      border-color: transparent !important
    }
    #register-title{
      text-align: center
    }
    #register-lca-logo{
      width: 150px
    }
  }
</style>
@endsection

@section('content')

<div class="container mt-5"></div>

<div class="container">
  <div id="register-box" class="row border">

    <div class="col-lg-4 bg-white d-flex flex-column justify-content-center align-items-center">
      <img id="register-lca-logo" class="w-300" src="{{ cdn_asset('asset/imgs/intro/e-logos/lca.png') }}">
      <div class="text-muted">
        Caïmans un jour, Caïmans toujours !
      </div>
    </div>

    <div class="col-lg-8 col-sm-10 bg-white border-left p-5">

      <form method="post" action="{{ route('backend.register.member') }}">
        @csrf
        <div class="mt-3 mb-4">
          <div id="register-title" class="fa-2x">Nouveau compte</div>
        </div>
        <hr>

        @if(isset($errors))

          @if(isset($errors["required"]))
            <div class="alert alert-danger">
              Veuiller remplir tous les champs.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

        @endif

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <label for="nom">Nom:</label>
            <input class="form-control" type="text" name="nom" value="{{ $form->get("nom") }}" id="nom">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <label for="prenom">Prénom:</label>
            <input class="form-control" type="text" name="prenom" value="{{ $form->get("prenom") }}" id="prenom">
          </div>
        </div>

        <div class="form-group">
          <label for="email">E-mail:</label>
          <input class="form-control {{ $form->isset('emails','email') ? 'is-invalid' : '' }}" type="text" name="email" value="{{ $form->get("email") }}" id="email">
          <span class="text-danger">
            {{ $form->get_error('emails','email') }}
            {{ $form->get_error('uniques','email') }}
          </span>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <label for="password">Mot de passe:</label>
            <input class="form-control {{ $form->isset('equals','password') ? 'is-invalid' : '' }}" type="password" name="password" value="" id="password">
            <span class="text-danger">{{ $form->get_error('equals','password') }}</span>
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <label for="conf_password">Confirmation du mot de passe:</label>
            <input class="form-control" type="password" name="conf_password" value="" id="conf_password">
          </div>
        </div>

        <div class="">
          <span class="text-dark">Déjà un compte ?</span> <a href="{{ route("login") }}">Connectez vous</a>.
        </div>

        <div class="row mt-3">
          <div class="col-md-12 col-lg-2">
            <button class="btn btn-primary btn-block" type="submit" name="button">Envoyer</button>
          </div>
        </div>
      </form>
    </div>

  </div>
</div>


@endsection
