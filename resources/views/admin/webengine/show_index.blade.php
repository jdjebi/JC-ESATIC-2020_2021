@extends('admin.base')

@section('main-content')

<div>
  <div id="v-table" class="mt-3 container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="text-danger text-center">
          Cet espace est reservé aux dévéloppeurs du site
        </div>
      </div>
      <div class="col-sm-12">
        <div class="d-flex justify-content-between">
          <div class="h3 mb-4">Index du moteur de recherche</div>
          <hr>
          <div class="text-right">
            <a class="confirm-index-generatio btn btn-sm btn-success" href="{{ route("admin.webengine.generate_index") }}" > Générer l'index </a>
            <a class="confirm-index-clearing btn btn-sm btn-danger" href="#" data-href="{{ route("admin.webengine.clear_index") }}" > Vider l'index </a>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="">
          <table class="table bg-white table-hover table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Utilisateur</th>
                <th scope="col">Mots clées</th>
                <th scope="col">Mise à jour</th>
              </tr>
            </thead>
            <tbody id="v-table-row">

              @foreach ($index_rows as $index => $row)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $row->user->fullname }}</td>
                  <td>{{ $row->keywords }}</td>
                  <td>{{ $row->updated_at }}</td>
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
setup_confirm_dialog(".confirm-index-clearing","Voulez vous vraiment vider l'index ?");
setup_confirm_dialog(".confirm-index-generation","Voulez vous vraiment générer l'index ?");
</script>
@endsection
