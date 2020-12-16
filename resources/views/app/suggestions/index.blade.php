@extends('app.page')

@section('extras_style')
  @include('app.publications.style')
@endsection

@section('content')

<div class="container-fluid mt-3">

  <div class="row">
    <div class="col-lg-2 col-sm-12">

      @include('app.suggestions.nav')

    </div>

    <div class="col-lg-10 col-sm-12">
      <div class="container-fluid">

        <div class="row">
          <div class="col-sm-12">
            @include('flash')
          </div>
          <div class="col-sm-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active breadcrumb-item-resac-support"><a href="#">Suggestions</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-sm-12">
            <div class="d-flex align-items-center justify-content-between">
              <div class="">
                @if($request->has('certified'))
                <h3>Suggestions notées</h3>
                @elseif ($request->has('not-certified'))
                  <h3>Suggestions non notées</h3>
                @else
                  <h3>Mes Suggestions</h3>
                @endif
              </div>
              <div class="">
                <a class="btn btn-success btn-sm" href="{{ route('app.post.hub') }}"><i class="fa fa-plus"></i> Créer une Publication</a>
              </div>
            </div>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col">
            @include('app.publications.my.all')
          </div>
        </div>

      </div>
    </div>

  </div>

</div>

@endsection


@section('scripts')
<script type="module" src="{{ asset('asset/js/resac/init.timeago.js') }}"></script>
@endsection
