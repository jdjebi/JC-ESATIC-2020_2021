@extends('app.params.base')

@section('params-content')

<div class="card resac-account-card-support">
  <div class="card-header">
    Changement du mot de passe
  </div>
  <div class="card-body">
    @if(isset($FormPass->errors))

      @if(isset($FormPass->errors["required"]))
        <div class="alert alert-danger">
          Veuiller remplir tous les champs.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      @if(isset($FormPass->errors["global"]))
        <div class="alert alert-danger">
          {{ $FormPass->errors["messages"]["global"] }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

    @endif
      <form method="post" action="{{ route('backend.compte.pass') }}">
      @csrf
      <div class="form-group">
        <label for="pass">Confirmer votre mot de passe</label>
        <input type="password" class="form-control" name="pass" value="" id="nom">
      </div>

      <div class="form-group">
        <label for="nw_pass">Nouveau mot de passe</label>
        <input type="text" class="form-control" name="nw_pass" value="" id="nw_pass">
      </div>

      <div class="form-group">
        <label for="conf_pass">Confirmer le nouveau mot de passe</label>
        <input type="password" class="form-control" name="conf_pass" value="" id="conf_pass">
      </div>

      <button type="submit" class="btn btn-sm btn-primary" name="change_pass">Envoyer</button>
    </form>
  </div>
</div>

@endsection

