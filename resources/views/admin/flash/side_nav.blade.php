<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky">
    
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span><i class="fa fa-users"></i> UTILISATEURS</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.users.index') }}" href="{{ route('admin.users.index') }}">
          Membres
        </a>
      </li>
    </ul>

    <hr>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>VOTES</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.votes.index') }}" href="{{ route('admin.votes.index') }}">
          Panneau de control
        </a>
      </li>
    </ul>

    <hr>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>CODES ET COMPTES</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.codes.index') }}" href="{{ route('admin.codes.index') }}">
          Codes
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.codes.verif') }}" href="{{ route('admin.codes.verif') }}">
          Vérification
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.codes.pdf') }}" href="{{ route('admin.codes.pdf') }}">
          PDF
        </a>
      </li>
    </ul>
    <hr>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>OUTILS DEVELOPPEUR</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.webengine.show') }}" href="{{ route('admin.webengine.show') }}">
          Index de recherche
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.dev.create_flash') }}" href="{{ route('admin.dev.create_flash') }}">
          <span data-feather="file-text"></span>
          Flash Generator
        </a>
      </li>
    </ul>


  </div>
</nav>
