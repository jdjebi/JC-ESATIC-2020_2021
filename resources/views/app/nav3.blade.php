<nav>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <img src="{{ asset("asset/imgs/logo.png") }}" alt="logo">
    <ul>
        @auth
            <li><a href="{{ route("app.activites.index") }}">Activités</a></li>
            @if(UserAuth()->staff_role_name == "admin" || UserAuth()->staff_role_name == "accueil")
            <li class="nav-item">
              <a class="nav-link" href="{{ route("admin.users.index") }}">Administration</a>
            </li>
            @endif
            <li><a href="{{ route("logout") }}">Déconnexion</a></li>
        @endauth
        @guest
            <li><a href="{{ route("app.index") }}">Accueil</a></li>
            <li><a href="{{ route("app.login") }}">Connexion</a></li>   
        @endguest
    </ul>
</nav>