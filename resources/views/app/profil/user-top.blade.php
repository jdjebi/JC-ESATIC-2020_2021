<div class="section-box">
    <div class="profile">
      <div class="row">
        <div class="col-sm-12 col-md-4 mb-3">
          <div class="profile-photo d-flex justify-content-center">
            <div class="d-flex justify-content-center">
              <div class="resac-w-200 resac-h-150 text-center">
                <img class="rounded-circle border resac-w-150 resac-h-150" src="{{ photos_cdn_asset($user) }}" alt="Photo de {{ $user->fullname }}">
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-8">
          <div class="profile-info">
            <div class="profile-items clearfix">
            </div>
            <h1 class="profile-title text-dark">
            {{ $user->fullname }}
            </h1>
            <small class="profile-position">Promo
              <span>
                @if(empty($user->pays))
                  <a style="font-size: 15px" href="{{ route("compte.index") }}#promo1"><i class="fa fa-plus"></i> Ajouter une promotion</a>
                @else
                  {{ $user->promo1 }} - {{ $user->promo2 }}
                @endif
              </span>
            </small>
            <div class="mt-2">
              <a class="btn btn-sm btn-primary" href="{{ route('compte.index') }}"><i class="fa fa-edit"></i> Mettre à jour</a>
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <div>
              <ul class="profile-list">
                <li class="clearfix">
                  <strong class="title">Université/Ecole</strong>
                  <span class="cont">
                    @if(empty($user->universite))
                      Lycée Classique d'Abidjan
                    @else
                      {{ $user->universite }}
                    @endif
                  </span>
                </li>
                <li class="clearfix">
                  <strong class="title">Emploi</strong>
                  <span class="cont">
                    @if(empty($user->emploi))
                      Etudiant
                    @else
                      {{ $user->emploi }}
                    @endif
                  </span>
                </li>                  
              </ul>
            </div>
            <div>
              <ul class="profile-list">
                <li class="clearfix">
                  <strong class="title">Pays</strong>
                  <span class="cont">
                    @if(empty($user->pays)): ?>
                      <a href="{{ route("compte.index") }}#pays"><i class="fa fa-plus"></i> Ajouter un pays</a>
                    @else
                      {{ $user->pays }}
                    @endif
                  </span>
                </li>
                <li class="clearfix">
                  <strong class="title">Ville</strong>
                  <span class="cont">
                    @if(empty($user->ville) && empty($user->commune))
                      <a href="{{ route("compte.index") }}#ville"><i class="fa fa-plus"></i> Ajouter une ville</a>
                    @elseif(empty($user->commune))
                      {{ $user->ville }}
                    @elseif(empty($user->ville))
                      {{ $user->commune }}
                    @else
                      {{ $user->ville }}, {{ $user->commune }}
                    @endif
                  </span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>