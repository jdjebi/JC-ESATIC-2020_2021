@extends('admin.base')

@section('main-content')
@include('admin.features.dashboard_nav')

<div>

  <div id="v-table" class="mt-3 container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="d-flex justify-content-between">
          <div class="h3">Nouveautés</div>
          <div class="text-right">
            <a href="{{ route("admin.feature.create") }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Créer </a>
          </div>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="">
          <table class="table bg-white table-hover table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Auteur</th>
                <th scope="col">Date</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody id="v-table-row">

              @foreach ($features as $index => $feature)
                <tr v-for="(pub,index) in pubs" v-bind:id="pub.id">
                  <td>{{ $index + 1 }}</td>
                  <td>
                      <a href="{{ route("admin.feature.show",$feature->id) }}">{{ $feature->title }}</a></td>
                  <td>
                    {{ $feature->author->fullname }}
                  </td>
                  <td>{{ $feature->get_sm_created_at() }}</td>
                  <td class="text-center">
                    <a class="confirm-toggler text-danger"  data-href="{{ route('admin.feature.delete',$feature->id) }}" href="#"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>

              @endforeach

            </tbody>
          </table>
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
