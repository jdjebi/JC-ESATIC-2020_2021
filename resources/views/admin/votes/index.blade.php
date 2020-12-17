@extends('admin.base')

@section('extras_style')

@endsection


@section('main-content')

@include('flash')

<div>

    <div id="v-table" class="mt-3 container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="d-flex justify-content-between">
            <div class="h3">Panneau de control</div>
            <div class="text-right">
              <a href="{{ route('admin.votes.toggle') }}" class="btn btn-primary">
                @if($v_status)
                    Désactiver les votes
                @else
                    Activer les votes
                @endif
            </a>
            </div>
          </div>
          <div>
            <hr>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="">
            <div class="h4">Vote du public</div>
            <table class="table bg-white table-hover table-responsive-sm font-weight-bold">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Groupe</th>
                  <th scope="col">Nombre de voies</th>
                  <th>Bonus points</th>
                </tr>
              </thead>
              <tbody id="v-table-row">
                  @foreach ($groupes as $i => $groupe)
                  <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $groupe->titre }}</td>
                        <td>{{ $groupe->nbr_vote_public }} / {{ $groupe->GetTotalVotePublic() }}</td>
                        <td>+{{ 30 * ($groupe->nbr_vote_public /  $groupe->GetTotalVotePublic()) }} / 30 </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>

            <div class="h4">Vote des parrains</div>
            <table class="table bg-white table-hover table-responsive-sm font-weight-bold">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Groupe</th>
                  <th scope="col">Nombre de voies</th>
                  <th>Bonus points</th>
                </tr>
              </thead>
              <tbody id="v-table-row">
                  @foreach ($groupes as $i => $groupe)
                  <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $groupe->titre }}</td>
                        <td>{{ $groupe->nbr_vote_parrain }} / {{ $groupe->GetTotalVoteParrain() }} </td>
                        <td>+{{ 10 * ($groupe->nbr_vote_parrain /  $groupe->GetTotalVoteParrain()) }} / 10</td>
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