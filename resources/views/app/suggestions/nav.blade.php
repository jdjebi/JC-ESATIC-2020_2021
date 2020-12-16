<ul class="nav flex-column">
    <li class="nav-item nav-pills">
      <a class='small nav-link {{ is_current_url('app.post') }}' href="{{ route('app.post') }}">Mes Suggestions ({{ $count['posts'] }})</a>
    </li>
    <li class="nav-item nav-pills">
      <a class='small nav-link {{ $request->has('certified') ? 'active' : '' }}' href="{{ route('app.post') }}?certified">Notées ({{ $count['posts_certified'] }})</a>
    </li>
    <li class="nav-item nav-pills">
      <a class='small nav-link {{ $request->has('not-certified') ? 'active' : '' }}' href="{{ route('app.post') }}?not-certified">Non-notées ({{ $count['posts_not_certified'] }})</a>
    </li>
  </ul>
  
  <hr>
  
  <h6>Suggestions</h6>
  
  <ul class="nav flex-column">
    <li class="nav-item nav-pills">
      <a class='small nav-link {{ is_current_url('app.post.hub') }}' href="{{ route('app.post.hub') }}">Créer une suggestion </a>
    </li>
    <li class="nav-item nav-pills">
      <a class='small nav-link {{ is_current_url('app.post.create.free') }}' href="{{ route('app.post.create.free') }}">Publication libre </a>
    </li>
  </ul>
  