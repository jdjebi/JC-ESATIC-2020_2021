@extends('app.page')

@section('extras_style')
  @include('app.profil.style')
  <link rel="stylesheet" href="{{ asset("asset/css/resac/pubs.css") }}">
@endsection

@section('content')

<div class="container">
  @include("flash")
</div>

<div id="v-user">


<div class="container">
  <div class="row">
    <div class="resac-padding-left-right-on-sm col-md-12  resac-feed ">
      <div class="resac-style-2 section section-about bg-white resac-linkedin-shadow resac-rounded-2px resac-clear-border-left-on-sm resac-feed resac-clear-border-right-on-sm resac-clear-rounded-on-sm">
        @if($show_portofolio)
          @include("app.profil.visitor-top")
        @else
          @include("app.profil.user-top")
        @endif
      </div>
    </div>
  </div>
</div>



</div>

@endsection

@section('scripts')
<script type="module" src="{{ cdn_asset("asset/js/resac/init.timeago.js") }}"></script>
<script src="{{ cdn_asset("asset/js/vue.js") }}" type="text/javascript"></script>

<script>
var vm = new Vue({
    el: "#v-user",
    data:{
        user:null,
        page_ready:false,
        url:{
            get_user_main_data: "{{ route('backend.user.connected.main_data') }}"
        }
    },
    mounted: function(){
        $.get({
            url: this.url.get_user_main_data,
            dataType: 'json',
            success: function (data,status){
               console.log("success");
            },
            error: function (data,status){
               console.log("error");
            },
        });
    }
});
</script>
@endsection

