<div class="resac-d-none resac-d-lg-block mb-3">
  <ul class="nav nav-tabs">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Publications</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('app.post') }} ">Toutes ({{ $count['posts'] }})</a>
        <a class="dropdown-item" href="{{ route('app.post') }}?certified">Certifiées ({{ $count['posts_certified'] }})</a>
        <a class="dropdown-item" href="{{ route('app.post') }}?not-certified">Non-certifiées ({{ $count['posts_not_certified'] }})</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link" href="{{ route('app.post.hub') }}">Création</a>
    </li>
  </ul>
</div>

<div class="resac-d-lg-none">
  
<ul class="nav flex-column">
  <li class="nav-item nav-pills">
    <a class='small nav-link {{ is_current_url('app.post') }}' href="{{ route('app.post') }}">Mes publications ({{ $count['posts'] }})</a>
  </li>
  <li class="nav-item nav-pills">
    <a class='small nav-link {{ $request->has('certified') ? 'active' : '' }}' href="{{ route('app.post') }}?certified">Certifiées ({{ $count['posts_certified'] }})</a>
  </li>
  <li class="nav-item nav-pills">
    <a class='small nav-link {{ $request->has('not-certified') ? 'active' : '' }}' href="{{ route('app.post') }}?not-certified">Non-certifiées ({{ $count['posts_not_certified'] }})</a>
  </li>
</ul>

<hr>

<h6>Publications</h6>

<ul class="nav flex-column">
  <li class="nav-item nav-pills">
    <a class='small nav-link {{ is_current_url('app.post.hub') }}' href="{{ route('app.post.hub') }}">Créer une publication </a>
  </li>
  <li class="nav-item nav-pills">
    <a class='small nav-link {{ is_current_url('app.post.create.free') }}' href="{{ route('app.post.create.free') }}">Publication libre </a>
  </li>
</ul>

</div>