<nav>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <img src="{{ asset("asset/imgs/logo.png") }}" alt="logo">
    <ul>
        <li><a href="{{ route("app.index") }}">Accueil</a></li>
        <li><a href="{{ route("app.login") }}">Connexion</a></li>
    </ul>
</nav>