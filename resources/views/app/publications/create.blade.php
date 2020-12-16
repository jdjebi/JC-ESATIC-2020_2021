@extends('app.page')

@section('extras_style')
@include('app.publications.style')
<style media="screen">
  .resac-w-100{
    width: 100px
  }
  .resac-h-100{
    height: 100px;
  }
  .post-tool-link:hover{
    text-decoration: none;
  }
  .post-tool{
    margin-bottom: 20px
  }
  .post-tool:hover{
    box-shadow: 1px 1px 1px 1px #f1efef;
  }
  .post-tool.unable{
    background: #f1f1f1 !important;
  }
  .post-tool.unable h5{
    color: gray
  }
  .post-tool.unable:hover{
    box-shadow: none;
    cursor: default;
  }
</style>
@endsection

@section('content')
<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-lg-2 col-sm-12">
      @include('app.publications.nav')
    </div>

    <div class="col-lg-10 col-sm-12">
      <div class="container-fluid">

        <div class="row">
          <div class="col-sm-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('app.post') }}">Publications</a></li>
                <li class="breadcrumb-item active breadcrumb-item-resac-support">Créer</li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h3>Nouvelle publication</h3>
            <hr>
          </div>

          <div class="col-sm-12 col-lg-4 col-md-6">
            <a class="post-tool-link" href="{{ route('app.post.create.free') }}">
              <div class="post-tool bg-white border p-3">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <img class="resac-w-100  resac-h-100" src="{{ asset('asset/imgs/posts/post-free.svg') }}" alt="">
                    </div>
                    <div class="pl-3">
                      <h5>Publication libre</h5>
                      <p class="text-muted">
                        Publier des informations simples sans contrainte rédactionnelle
                      </p>
                    </div>
                  </div>
              </div>
            </a>
          </div>

          <div class="col-sm-12 col-lg-4 col-md-6">
            <a class="post-tool-link" href="#">
              <div class="post-tool unable bg-white border p-3">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <img class="resac-w-100  resac-h-100" src="{{ asset('asset/imgs/posts/post-free-advance.svg') }}" alt="">
                    </div>
                    <div class="pl-3">
                      <h5>Publication libre avancée</h5>
                      <p class="text-muted small">
                        Utiliser un éditeur plus fournit pour créer des publications libres
                      </p>
                    </div>
                  </div>
              </div>
            </a>
          </div>

          <div class="col-sm-12 col-lg-4 col-md-6">
            <a class="post-tool-link" href="#">
              <div class="post-tool unable bg-white border p-3">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <img class="resac-w-100  resac-h-100" src="{{ asset('asset/imgs/posts/post-stage.svg') }}" alt="">
                    </div>
                    <div class="pl-3">
                      <h5>Offre de stage</h5>
                      <p class="text-muted">
                        Indisponible pour l'instant
                      </p>
                    </div>
                  </div>
              </div>
            </a>
          </div>

          <div class="col-sm-12 col-lg-4 col-md-6">
            <a class="post-tool-link" href="#">
              <div class="post-tool unable bg-white border p-3">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <img class="resac-w-100  resac-h-100" src="{{ asset('asset/imgs/posts/post-job.svg') }}" alt="">
                    </div>
                    <div class="pl-3">
                      <h5>Offre d'emploi</h5>
                      <p class="text-muted">
                        Indisponible pour l'instant
                      </p>
                    </div>
                  </div>
              </div>
            </a>
          </div>

          <div class="col-sm-12 col-lg-4 col-md-6">
            <a class="post-tool-link" href="#">
              <div class="post-tool unable bg-white border p-3">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <img class="resac-w-100  resac-h-100" src="{{ asset('asset/imgs/posts/post-bourse.svg') }}" alt="">
                    </div>
                    <div class="pl-3">
                      <h5>Bourse d'étude</h5>
                      <p class="text-muted">
                        Indisponible pour l'instant
                      </p>
                    </div>
                  </div>
              </div>
            </a>
          </div>

          <div class="col-sm-12 col-lg-4 col-md-6">
            <a class="post-tool-link" href="#">
              <div class="post-tool unable bg-white border p-3">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <img class="resac-w-100 resac-h-100" src="{{ asset('asset/imgs/posts/post-ask-job.svg') }}" alt="">
                    </div>
                    <div class="pl-3">
                      <h5>Demande d'emploi</h5>
                      <p class="text-muted">
                        Indisponible pour l'instant
                      </p>
                    </div>
                  </div>
              </div>
            </a>
          </div>

          <div class="col-sm-12 col-lg-4 col-md-6">
            <a class="post-tool-link" href="#">
              <div class="post-tool unable bg-white border p-3">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <img class="resac-w-100 resac-h-100" src="{{ asset('asset/imgs/posts/post-ask-stage.svg') }}" alt="">
                    </div>
                    <div class="pl-3">
                      <h5>Demande de stage</h5>
                      <p class="text-muted">
                        Indisponible pour l'instant
                      </p>
                    </div>
                  </div>
              </div>
            </a>
          </div>


        </div>
      </div>
    </div>

  </div>

</div>
@endsection
