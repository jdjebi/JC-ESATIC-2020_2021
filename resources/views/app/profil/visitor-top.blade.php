<div class="section-box">
    <div class="profile">
      <div class="row">
        <div class="col-sm-12 col-md-4 mb-3">
          <div class="profile-photo d-flex justify-content-center">
            <div class="d-flex justify-content-center">
              <div class="resac-w-200 resac-h-200 text-center">
                <img class="rounded-circle border resac-w-150 resac-h-150" src="{{ photos_cdn_asset($user_visited) }}" alt="Photo de {{ $user->fullname }}">
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-8">
          <div class="profile-info">
            <div class="profile-items clearfix">
            </div>
            <h1 class="profile-title text-dark">
            {{ $user_visited->fullname }}
            </h1>
            <small class="profile-position">Promo
              <span>
                @if(empty($user->pays))
                  xxxx-xxxx
                @else
                  {{ $user_visited->promo1 }} - {{ $user_visited->promo2 }}
                @endif
              </span>
            </small>
          </div>
          <div class="d-flex justify-content-between">
            <div>
              <ul class="profile-list">
                <li class="clearfix">
                  <strong class="title">Université/Ecole</strong>
                  <span class="cont">
                    @if(empty($user_visited->universite))
                      Lycée Classique d'Abidjan
                    @else
                      {{ $user_visited->universite }}
                    @endif
                  </span>
                </li>
                <li class="clearfix">
                  <strong class="title">Emploi</strong>
                  <span class="cont">
                    @if(empty($user_visited->emploi))
                      Etudiant
                    @else
                      {{ $user_visited->emploi }}
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
                    {{ Country::get($user_visited->code_pays) }}
                  </span>
                </li>
                <li class="clearfix">
                  <strong class="title">Ville</strong>
                  <span class="cont">
                    @if(empty($user_visited->commune))
                      {{ $user_visited->ville }}
                    @elseif(empty($user_visited->ville))
                      {{ $user_visited->commune }}
                    @else
                      {{ $user_visited->ville }}, {{ $user->commune }}
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