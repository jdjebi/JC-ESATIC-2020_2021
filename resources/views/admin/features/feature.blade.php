@extends('admin.base')

@section('main-content')
@include('admin.features.dashboard_nav')

<div class="mt-3 container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div>
        <div class="h4 mb-4">Nouveauté #{{ $feature->id }}</div>
        <hr>
      </div>
      <div class="border">
        <div class="p-3 bg-white border-bottom">
          <span class="h5">{{ $feature->title }}</span>
        </div>

        <div class="p-3 bg-white">
          <form method="post">
            @csrf
            <input type="hidden" name="user_author_id" value="{{ $user->id }}">
            <input type="hidden" name="feature_id" value="{{ $feature->id }}">
            <div class="form-group">
              <label for="title">Titre:</label>
              <input class="form-control" type="text" name="title" value="{{ $feature->title }}" placeholder="Titre de la nouveau" id="title" {{ !$is_author  ? "disabled" : ""}}>
            </div>
            <div class="form-group">
              <label for="content">Contenu:</label>
              <textarea class="form-control" id="content" rows="5" name="content" placeholder="Description des nouvelles fonctionnalités" {{ !$is_author  ? "disabled" : ""}}>{{ $feature->content }}</textarea>
            </div>
            <div class="form-group">
              <label for="created_at">Date:</label>
              <input class="form-control" type="date" name="created_at" value="{{ $feature->get_form_created_at() }}" id="created_at" {{ !$is_author  ? "disabled" : ""}}>
            </div>
            <div>
              <div class="text-muted">
                 Créer par {{ $feature->author->fullname }}
              </div>
              @if($is_author)
              <div class="text-right">
                <button class="btn btn-sm btn-success" type="submit" name="button"><i class="fa fa-edit"></i> Mettre à jour</button>
                <a class="confirm-toggler btn btn-sm btn-danger" href="#" data-href="{{ route("admin.feature.delete",$feature->id) }}">Supprimer</a>
              </div>
              @endif
            </div>
          </form>
        </div>
      </div>


    </div>
  </div>
</div>

@endsection

@section("scripts")
<script src="{{ asset("asset/js/resac/swal2.confirm.js") }}" type="text/javascript"></script>
<script type="text/javascript">
setup_confirm_dialog(".confirm-toggler",'Voulez vous vraiment supprimer cette nouveauté ?')
</script>
@endsection
