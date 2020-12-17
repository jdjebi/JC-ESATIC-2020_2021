<style media="screen">
    .nav-extras-items{
      visibility: visible;
      display: block;
    }
  
    .notif-badge{
      font-size: 11px;
      padding: 1px 3px 1px 3px;
      border-radius: 2px;
      background-color: #2196f3;
      color: #fff
    }
    @media (min-width: 992px){
      .nav-extras-items{
        visibility: hidden;
        display: none;
      }
    }
  </style>
  <nav class="navbar navbar-expand-lg navbar-dark resac-bg-dark fixed-top">
    <a class="navbar-brand" 
      href="
      @guest{{ route("app.index") }}@endguest
      @auth{{ route("app.activites.index") }}@endauth
      ">
    <span>JC</span>
    </a>
    <div class="d-flex align-items-center">
      <div class="nav-extras-items">
        <ul class="nav">
        </ul>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border-color: transparent;">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  
    <div class="collapse navbar-collapse" id="navbarNav">
  
  
      <ul class="navbar-nav mr-auto">
  
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route("app.index") }}"><i class="fa fa-home"></i> Accueil</a>
        </li>
        @endguest
  
        @auth
        <li class="nav-item d-none d-md-block d-lg-block">
          <a class="nav-link" href="{{ route("app.activites.index") }}">Activités</a>
        </li>
  
        @endauth

      </ul>
  
      @guest
      <ul  class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route("app.login") }}"><i class="fa fa-sign-in-alt"></i> Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route("app.register") }}"><i class="fas fa-user"></i> Créer un compte</a>
        </li>
      </ul>
      @endguest
  
      @auth
      <ul  class="navbar-nav">
        @if(Resac\Auth2::is_admin_logged())
          <li class="nav-item">
            <a class="nav-link" href="{{ route("admin.users.index") }}"><i class="fa fa-tachometer-alt"></i> Administration</a>
          </li>
        @endif
  
  
        <li class="nav-item">
          <a class="nav-link" href="{{ route("logout") }}"><i class="fa fa-sign-out-alt"></i> Déconnexion</a>
        </li>
      </ul>
      @endauth
  
    </div>
  </nav>
  
  