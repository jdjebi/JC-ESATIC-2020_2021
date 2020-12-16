@extends('app.page')

@section('extras_style')
<link rel="stylesheet" href="{{ cdn_asset("asset/css/placeholder-loading.min.css") }}">
<link rel="stylesheet" href="{{ cdn_asset("asset/css/resac/pubs.css") }}">
<style media="screen">
body{
  background-image: url('{{cdn_asset('asset/imgs/bgs/mur_abobo.jpg')}}');
  background-size: cover;
}

.wellcome{
    padding: 3em;
}

.wellcome .content{
    font-size: 1.3em; 
    word-break: break-word;
}

@media (max-width: 960px){
    .wellcome .content{
        font-size: 1.1em; 
    }
    .wellcome{
        padding: 2em;
    }
}

@media (max-width: 768px){
    .wellcome .content{
        font-size: 1em; 
    }
    .wellcome{
        padding: 1.3em;
    }

    .wellcome h2{
        font-size: 1.6em; 
    }
}
</style>
@endsection

@section('content')
@include('flash')
<div class="container mt-4">
    <div class="wellcome bg-white shadow-lg rounded">
        <div>
            <h2>Bienvenue sur RESAC</h2>
            <p class="content mt-4">
                RESAC à pour but de réunir tous les caïmans du monde entier sur une seule et même plateforme de sorte à créer un réseau à la fois proféssionnel et académique. Et c'est pourquoi nous sommes heureux de vous accueilir, car par votre inscription vous participer à l'extension du réseau. <br> <br>
                Toutefois, le projet est toujours en cours de réalisation et manque encore de fonctionnalités d'interaction. Mais rassurez nous y travaillons ! Ainsi vous pouvez consulter les publications venant des modérateurs de la plateforme(Bourse,Stage,Evènement,Promotion) et visiter le profil d'autres caïmans.
                <br><br>Surtout n'hésitez pas à faire des remarques et suggestions.<br> <br>
                
                Merci, <i>l'Equipe RESAC</i>
            </p>
        </div>
        <div class="text-right">
            <a class="btn btn-primary" href="{{ route("login") }}">Continuer</a>
        </div>
    </div>
</div>
@endsection