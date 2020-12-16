@extends('admin.base')

@section('extras_style')
  @parent
  @include('admin.user.account.style')
@endsection

@section('main-content')
  <div id="v-app">
    <div class="nav-scroller shadow-sm">
      <nav id="resac-breadcrumb" aria-label="breadcrumb" >
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_user_profil',['id' => $user->id]) }}">{{ $user->fullname }} #{{ $user->id }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Compte</li>
          </ol>
      </nav>
    </div>
    @include('flash')

    <div class="container-fluid mt-3 ">
      <div class="row">
        <div class="col-sm-12">
          <div class="h4 mb-4">Compte</div>
          <hr>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-3">    
          @include('admin.user.account.components.menu')
        </div>
        <div class="col-sm-12 col-md-7 col-lg-8">
          @include('admin.user.account.modules.user',['user' => $user])
          @include('admin.user.account.modules.roles',['user' => $user])
          @include('admin.user.account.modules.delete_account',['user' => $user])
        </div>
      </div>
    </div>
    <div class="toast" role="alert" data-delay="4000" aria-live="assertive" aria-atomic="true" style="position: fixed; bottom: 60px; right: 30px;">
      <div class="toast-header">
          <div class="text-success"><i class="fas fa-info-circle"></i></div>&nbsp;&nbsp;
          <strong class="mr-auto">Notification</strong>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="toast-body">
          <b>@{{ toast.message }}</b>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
@parent
<script src="{{ asset("asset/js/extras/sweetalert2.all.min.js") }}" type="text/javascript"></script>
<script src="{{ cdn_asset("asset/js/lib/axios/axios.min.js") }}"></script>
<script>

</script>
<script type="text/javascript">
$('#btn-delete-user').click(function(e){
  delete_user_dialog()
});
function delete_user_dialog(){
  Swal.fire({
    title:'Confirmation',
    icon: 'warning',
    text:'Voulez vous vraiment supprimer cet utilisateur',
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Oui",
    cancelButtonText: "Annuler"
  }).then( (result) => {
    if(result.value){
      window.location = "{{ route('admin_delete_user',[],false) }}?delete={{ $user->id }}&redirect={{ route('admin.users.index',[],false) }}";
    }
  });
}
</script>
@endsection
