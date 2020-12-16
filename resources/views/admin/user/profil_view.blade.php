<div class="section section-about">
  <div class="section-box resac-linkedin-shadow">
    <div class="profile">
      <div class="row">
        <div class="col-sm-12">
          <ul class="profile-list">
            <li class="clearfix">
              <strong class="title">Nom</strong>
              <span class="cont">
                {{ $user_visited->nom }} 
              </span>
            </li>
            <li class="clearfix">
              <strong class="title">Prénom</strong>
              <span class="cont">
                {{ $user_visited->prenom }} 
              </span>
            </li>
            <li class="clearfix">
              <strong class="title">Identifiant</strong>
              <span class="cont">
                {{ $user_visited->username }} 
              </span>
            </li>
            <li class="clearfix">
              <strong class="title">Code de connexion</strong>
              <span class="cont">
                {{ $user_visited->login_code }} 
              </span>
            </li>
            <li class="clearfix">
              <strong class="title">E-mail</strong>
              <span class="cont"><?= $user_visited->email ?></span>
            </li>
            <li class="clearfix">
              <strong class="title">Rôle</strong>
              <span class="cont">
                {{ $user_visited->staff_role }} 
              </span>
            </li>
            <li class="clearfix">
              <strong class="title">Type</strong>
              <span class="cont">
                {{ $user_visited->type }} 
              </span>
            </li>
            <li class="clearfix">
              <strong class="title">Date Inscription</strong>
              <span class="cont">
                {{ $user_visited->created_at }} 
              </span>
            </li>
          </ul>
          <div class="text-right mt-4">
            <a href="{{ route("admin.users.account",$user_visited->id) }}" class="btn btn-primary"><i class="fa fa-cog"></i> Paramètre du compte</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
