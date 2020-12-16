@extends('app.page')

@section('extras_style')
<style media="screen">
  body{
    background-color: #f1f3f6;
    background-image: url({{ cdn_asset('asset/imgs/intro/bgs/etu4.jpg') }});
    background-size: cover;
    background-repeat: no-repeat;
    border-color: transparent !important
  }
  @media(max-width: 768px) {
    body{
      background-color: #fff;
      background-image: none
    }
    #login-box{
      border-color: transparent !important
    }
  }
</style>
@endsection


@section('content')
@include('flash')

<div id="v-login" class="container mt-5">
  <div class="row justify-content-center p-2">
    <div id="login-box" class="col-md-10 col-lg-5 bg-white border rounded p-5">
      <form v-on:submit.prevent="onSubmit">
        @csrf
        <div class="text-center">
          <img class="text-center" src="{{ cdn_asset('asset/imgs/icons/android-chrome-192x192.png') }}" alt="" width="80px">
        </div>
        <h3 class="mt-3 mb-4 text-center">Se connecter</h3>
        <div v-if="is_error" id="error-box" class="alert alert-danger d-none">
          @{{ error_message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="form-group mb-4 mt-5">
          <input class="form-control" type="text" name="email" id="email" placeholder="Adresse E-mail">
        </div>
        <div class="form-group">
          <input id="pass-input" class="form-control" type="password" name="password" id="password" placeholder="Mot de passe">
        </div>
        <div class="mt-4">
          <button id="submit-btn" class="btn btn-block btn-primary" name="button" v-bind:disabled="submit_btn">
            <span v-if="!sending">Connexion</span>
            <div v-if="submit_btn" class="loader spinner-border text-white spinner-border-sm d-none" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </button>
          <div class="text-center mt-3 small">
          <a href="{{ route("register") }}">Créer un compte</a> &middot <a href="{{ route("app.reset.email") }}">Mot de passe oublié</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ cdn_asset("asset/js/vue.js") }}" type="text/javascript"></script>
<script type="text/javascript">
var url_post_login = "{{ route('actu') }}";
var url_redirect = "{{ $redirect_url }}" ;

var vm = new Vue({
  el: "#v-login",
  data:{
    url: "{{ route('api.login') }}",
    submit_btn: false,
    sending: false,
    is_error: false,
    error_message: "test",
    pass_input: $('#pass-input')
  },
  beforeCreate: function(){
    $('#submit-btn .loader').removeClass("d-none");
    $('#error-box').removeClass("d-none");
  },
  methods:{
    onSubmit: function(event){
      this.submit_btn = true;
      this.sending = true;
      this.submit(event.target);
    },
    submit: function(form){
      var vm = this;
      var form_data = $(form).serializeArray();
      $.post({
        url: vm.url,
        data: form_data,
        dataType: 'json',
        success: vm.onSuccess,
        error: vm.onError
      });
    },
    onSuccess: function(data,status){
      this.sending = false;
      this.submit_btn = false;
      if(data.is_error){
        this.is_error = true;
        this.error_message = data.errors.messages.global;
        $('#pass-input').val("");
      }else{
        if(url_redirect != "")
          url = url_redirect;
        else
          url = url_post_login;

          window.location = url;
      }
    },
    onError: function (data,status,error){
      alert("Une erreur c'est produite. Contactez l'administrateur.");
      console.log(error);
      $('#pass-input').val("");
      this.sending = false;
      this.submit_btn = false;
    },
  }
});
</script>
@endsection
