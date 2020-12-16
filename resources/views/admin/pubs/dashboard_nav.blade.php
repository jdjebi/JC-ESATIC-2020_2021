<div class="nav-scroller bg-white shadow-sm">
  <nav class="nav nav-underline">
    <a class="nav-link active" href="{{ route("admin.pubs_dashboard") }}">Publications</a>
    <a class="nav-link" href="{{ route("admin.pubs_dashboard") }}">
      Toutes
      <span class="badge badge-pill bg-light align-text-bottom">?</span>
    </a>
    <a class="nav-link" href="#">
      Valides
      <span class="badge badge-pill bg-light align-text-bottom">?</span>
    </a>
    <a class="nav-link" href="#">
      Non valides
      <span class="badge badge-pill bg-light align-text-bottom">?</span>
    </a>
  </nav>
</div>
@include('flash')