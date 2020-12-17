@extends('app.page3')

@section('extras_style')
    @include('app.styles.accueil')
@endsection

@section('content')
<div class="doc">
    <div>
        <h2>Bienvenue à la journée culturelle</h2>
    </div>
    <br>
    <a class="btn" href="{{ route("app.login") }}"><b>Connexion</b></a>
</div>
@endsection