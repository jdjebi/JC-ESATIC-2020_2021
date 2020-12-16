@extends('app.page')

@section('extras_style')
  @include('app.explorer.style')
  <style media="screen">
    body{
      background-color: #f1f3f6
    }

    .resac-user-card .info{
      font-size: 13px;
    }

    .resac-user-card .resac-user-card-content{
      background-color: #fff;
      width: 17rem;
      position: relative;
    }

    @media(max-width: 768px) {
      body{
        background-color: #fff;
      }
      .u-photo{
        width: 160px;
        height: 160px;
      }

      .resac-user-card .resac-user-card-content{
        background-color: #fff;
        width: 21rem;
      }
     
    }
  </style>
@endsection


@section('content')
<div class="container mt-3">
  @include("flash")
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2 class="p-3 text-center">Annuaire des caïmans</h2>
    </div>
  </div>
</div>

<div id="loader" class="mt-5 text-center">
  <div class="spinner-border text-primary" role="status">
    <span class="sr-only">Chargement...</span>
  </div>
</div>

<div id="portofolio" class="container">
  <div class="row">
    <div 
      v-for="user in users" 
      class="card-user col-sm-12 col-md-6 col-lg-4 p-0 mb-5"
    >
        <a v-bind:href="user.profil_url">

        <div class="resac-user-card d-none">

          <div class="d-flex justify-content-center">
            <div class="resac-user-card-content text-center resac-rounded-2px p-4 resac-linkedin-shadow">
              <div style="position: absolute; top: 8px">
                <span class="small p-1 text-secondary font-weight-bold">@{{ user.promo }}</span>
              </div>
              <div style="position: absolute; top: 8px; right: 20px">
                <span class="small p-1 text-secondary" v-html="user.drapeau"></span>
              </div>
              <div>
                <img class="u-photo shadow-sm rounded-circle" v-bind:src="user.photo" alt="">
              </div>
              <div class="info mt-2">
                <div style="font-weight: 500" class="">
                  <span>@{{ user.nom }} @{{ user.prenom }}</span>
                </div>
                <div style="font-weight: 500" class="">
                  @{{ user.emploi }} &middot @{{ user.universite }}
                </div>
              </div>
            </div>
          </div>
        </div>

        </a>

    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src=" {{ asset('asset/js/vue.js') }}" type="text/javascript"></script>
<script type="text/javascript">
var vm = new Vue({
  el: '#portofolio',
  data:{
    users:  <?= $users_json ?>,
    user_connected: {{ \Resac\Auth2::check() ? 'true' : 'false' }},

  },

  mounted: function(){
    $(".card-user .resac-user-card").each(function(){
      $(this).removeClass("d-none");
      $("#loader").hide();
    })
  }
});
</script>
@endsection
