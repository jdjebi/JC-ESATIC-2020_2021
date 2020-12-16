@extends('admin.base')

@section('extras_style')
<style media="screen">
body{
  background-color: #f1f3f6
}
.search-user-photo{
  width: 100px;
  height: 100px;
}
</style>
@endsection

@section('main-content')

@include('flash')

<div class="container">

  @if(!empty($search_query))
    <div class=" mt-4 h5 mb-5">
      Recherche pour {{ $search_query }} - Résultats {{ count($results) }}
    </div>

    @foreach ($results as $u)
      <div class="mt-4 media">
        <img src="{{ photos_cdn_asset($u) }}" class="search-user-photo mr-3 rounded" alt="...">
        <div class="media-body">
          <h5 class="mt-0"><a href="{{ route('admin_user_profil',[ $u->id]) }}">{{ $u->fullname }}</a></h5>
          <div class="text-muted small">{{ $u->promo }}</div>
          <div class="text-muted">{{ $u->pays }} | {{ $u->emploi }} &middot {{ $u->universite }}</div>
          <div class="text-muted"><b>{{ $u->staff_role }}</b></div>
        </div>
      </div>
      <hr>
    @endforeach

    @if(count($results) == 0)
      <div class="h6 mt-4">
        Aucun utilisateur trouvé
      </div>
    @endif

  @else

  <div class="text-center mt-5">
    <div class="h3">
      <i class="fa fa-search"></i>
    </div>
    <div class="h3">
      Rechercher un utilisateur
    </div>
  </div>

  @endif




</div>




@endsection
