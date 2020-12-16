<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <a class="navbar-brand" href="{{ route("home") }}">RESAC Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    @if(Auth::check())
    <form action="{{ route("admin_search",[],false) }}" method="GET" class="has-search form-inline my-2 my-lg-0">
      <input name="q" type="text" class="form-control form-control-sm" placeholder="Rechercher un utilisateur" value="{{ isset($_GET['q']) ? $_GET['q'] : '' }}">
    </form>
    @endif
    <ul class="navbar-nav mr-auto">
      @if(Auth::check())
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users.index') }}">Gestion des utilisateurs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pubs_dashboard') }}">Espace publications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.feature.all') }}">Espace nouveautés</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.webengine.show') }}">Index de recherche</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dev.create_flash') }}">Flash</a>
      </li>
      @endif
    </ul>

    @if(Auth::check())

    <ul  class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route("profil") }}"><i class="fa fa-user-circle"></i> {{ $user->prenom }}</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route("compte.index") }}"><i class="fa fa-user-cog"></i> Paramètres</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route("admin_logout") }}"><i class="fa fa-sign-out-alt"></i> Déconnexion</a>
      </li>
    </ul>

    @endif
  </div>
</nav>
