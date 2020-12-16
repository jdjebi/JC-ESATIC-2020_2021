@extends('app.page')

@section('extras_style')
  @include("app.index.styles")
@endsection

@section('content')
<div>
  <?php foreach (Flash::get() as $notif): ?>
  <div class="alert alert-<?= $notif["type"] ?> mb-0">
    <div class="text-center">
      <?= $notif["message"] ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
  <?php endforeach;  ?>
</div>

<div id="landing-page">

  <div class="overlay"></div>

  <div class="container">
    <div class="row align-items-center">
      <div class="col-sm-12 col-md-12 col-lg-8">
        <div class="text-white">
          <h1 id="well" class="text-white">Bienvenue sur RESAC<br>La Plate-forme du Réseau des Anciens Caimans</h1>
          <div id="landing-footer">
            <div id="slogan-style" class="resac-d-sm-none mt-3 text-white pl-2">
              <span class="align-middle">Caimans, cherche, trouve et jamais n'abandonne.</span>
            </div>
            <div id="landing-btn" class="pt-3">
              <div class="resac-d-none resac-d-lg-block">
                <a class="btn btn-primary btn-lg resac-btn-primary" href="{{ route('login') }}" role="button">Se connecter</a>
              </div>
              <div class="resac-d-lg-none">
                <a class="btn btn-primary btn-lg resac-btn-primary" href="{{ route('register') }}" role="button">Rejoindre</a>
                <a class="btn btn-primary btn-lg resac-btn-back-white" href="{{ route('annuaire') }}" role="button">Annuaire des caïmans</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="pt-3">
  <div class="container">
    <div class="text-center">
      <h4 class="mb-4 resac-text-dark">Les Académies du Réseau</h4>
    </div>
    <section class="customer-logos slider">
      <div class="slide"><img class="resac-w-200" title="Lycéé Classique d'Abidjan" src="{{ cdn_asset('asset/imgs/intro/e-logos/lca.png') }}" alt=""></div>
      <div class="slide"><img class="resac-w-150" title="Science Po bordeaux" src="{{ cdn_asset('asset/imgs/intro/e-logos/sc-po.jpg') }}" alt=""></div>
      <div class="slide"><img class="resac-w-200" title="ESATIC" src="{{ cdn_asset('asset/imgs/intro/e-logos/esatic.png') }}" alt=""></div>
      <div class="slide"><img class="resac-w-150" title="INPHB" src="{{ cdn_asset('asset/imgs/intro/e-logos/inp.png') }}" alt=""></div>
      <div class="slide"><img class="resac-w-150" title="Université Félix Houphouet-Boigny" src="{{ cdn_asset('asset/imgs/intro/e-logos/min/ufb.png') }}" alt=""></div>
      <div class="slide"><img class="resac-w-150" title="IUGB" src="{{ cdn_asset('asset/imgs/intro/e-logos/IUGB.jpg') }}" alt=""></div>
    </section>
  </div>
</div>
<div class="">

</div>

@endsection

@section('scripts')
<script src="{{ cdn_asset('asset/js/lib/slick/slick.js') }}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.customer-logos').slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 1500,
      arrows: false,
      dots: false,
      pauseOnHover: false,
      responsive: [{
          breakpoint: 768,
          settings: {
              slidesToShow: 4
          }
      }, {
          breakpoint: 520,
          settings: {
              slidesToShow: 3
          }
      }]
  });
});
</script>
@endsection
