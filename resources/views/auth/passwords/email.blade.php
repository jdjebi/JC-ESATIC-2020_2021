@extends('app.page')

@section('extras_style')
<style media="screen">
  body{
    background-color: #f1f3f6
  }

  @media(max-width: 768px) {
    body{
      background-color: #fff;
    }
    #password-reset-box{
      border-color: transparent !important
    }
  }
</style>
@endsection

@section('content')
@include('flash')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="password-reset-box" class="card">

                <div class="card-body rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form  method="POST" action="{{ route('app.reset.email') }}">
                        @csrf
                        <div class="h5 text-muted p-2 text-center">
                          Réinitialisation du mot de passe
                        </div>
                        <div class="text-center mb-3">
                          <img class="resac-w-150" src="{{ cdn_asset("asset/imgs/icons/svg/password.svg") }}" alt="">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <input id="email" placeholder="Entrer votre adresse E-mail" type="email" class="form-control text-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="justify-content-center row mt-4 mb-2">
                            <div class="col-lg-6 text-center">
                                <button class="btn btn-primary btn-block" type="submit" class="btn btn-primary">
                                  Envoyer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
