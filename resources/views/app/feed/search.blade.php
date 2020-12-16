@extends('app.page')

@section('extras_style')
<link rel="stylesheet" href="{{ cdn_asset("asset/css/placeholder-loading.min.css") }}">
<style media="screen">
  body{
    background-color: #f1f3f6;
    padding-top: 55px
  }
  .search-user-photo{
    width: 100px;
    height: 100px;
  }
</style>
@endsection

@section('content')

@auth
<div class="container">
  <div class="row">
    <div class="col-md-12 resac-padding-no-left-right">
      <form action="{{ route("app.search",[],false) }}" method="GET" class="has-search form-inline">
        <input id="mobile-search-bar" name="q" type="text" class="form-control form-control-md" placeholder="Rechercher une personne" value="{{ isset($_GET['q']) ? $_GET['q'] : '' }}">
      </form>
    </div>
  </div>
</div>
@endauth


<div class="container">

  <div class="row">

    @if(!empty($search_query))
      <div class="col-sm-12 col-md-12 bg-white border">

        <div class=" mt-4 h5 mb-5 text-dark">
          Recherche pour "{{ $search_query }}" - Résultats {{ count($results) }}
        </div>

        @foreach ($results as $u)
          <div class="mt-4 media">
            <img src="{{ $u->photo }}" class="rounded search-user-photo mr-3" alt="...">
            <div class="media-body">
              <h5 class="mt-0"><a href="{{ route('profil') }}?id={{ $u->id }}">{{ $u->fullname }}</a></h5>
              <div class="text-muted small">{{ $u->promo }}</div>
              <div class="text-muted">{{ $u->pays }} | {{ $u->emploi }} &middot {{ $u->universite }}</div>
            </div>
          </div>
          <hr>
        @endforeach

        @if(count($results) == 0)
          <div class="h6 mt-4 text-dark">
            Aucun utilisateur trouvé
          </div>
        @endif

      </div>
    @else
    <div class="col-sm-12">
      <div class="text-center text-muted h3 mt-5">
        <div >
          <i class="fa fa-search"></i>
        </div>
        <div>
          Recherche
        </div>
      </div>
    </div>


    @endif

  </div>
</div>


@endsection

@section('scripts')
<script type="module" src="asset/js/resac/init.timeago.js"></script>
<script src="{{ cdn_asset("asset/js/vue.js") }}" type="text/javascript"></script>
<script src="{{ cdn_asset("asset/js/resac/vue.truncate_filter.js") }}" type="text/javascript"></script>
@endsection
