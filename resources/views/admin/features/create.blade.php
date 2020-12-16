@extends('admin.page')

@section('extras_style')
  @include('admin.pubs.dashboard_style')
  <style media="screen">
  body{
    background-color: #f1f3f6
  }
  </style>
 @endsection

@section('content')
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
<div class="mt-5 container">
  <div class="row">
    <div class="col-md-12">
      <div class="border">
        <div class="p-3 bg-white border-bottom">
          <span class="h5">Créer une nouveauté</span>
        </div>
        <div class="p-3 bg-white">
          <form method="post">
            @csrf
            <input type="hidden" name="user_author_id" value="{{ $user->id }}">
            <div class="form-group">
              <label for="title">Titre:</label>
              <input class="form-control" type="text" name="title" value="" placeholder="Titre de la nouveau" id="title">
              @error('title')
                  <div class="text-danger">Veuiller renseigner un titre.</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="content">Contenu:</label>
              <textarea class="form-control" id="content" rows="5" name="content" placeholder="Description des nouvelles fonctionnalités"></textarea>
              @error('title')
                  <div class="text-danger">Veuiller renseigner le contenu de la nouveauté.</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="created_at">Date (facultatif):</label>
              <input class="form-control" type="date" name="created_at" value="" id="created_at">
              @error('created_at')
                  <div class="text-danger">Format de la date incorrecte.</div>
              @enderror
            </div>
            <div class="text-right">
              <button class="btn btn-primary" type="submit" name="button"><i class="fa fa-plus"></i> Créer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
