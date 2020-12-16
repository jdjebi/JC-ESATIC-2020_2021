@extends('app.page')

@section('extras_style')
<link rel="stylesheet" href="{{ cdn_asset("asset/css/placeholder-loading.min.css") }}">
<link rel="stylesheet" href="{{ cdn_asset("asset/css/resac/pubs.css") }}">
<style media="screen">
body{
  background-color: #f1f3f6
}
</style>
<style media="screen">
#resume .user-cover-pic{
  height: 80px;
}
#resume .user-photo{
  width: 90px;
  height: 90px;
  border-radius: 50%;
  position: relative;
  top: 30px;
}
#resume .resume-content{
  position: relative;
}
.resac-nav-ul .nav-link{
  padding-left: 0px;
}
</style>
<style media="screen">
.last-feature .content{
  font-size: 13px
}
</style>
@endsection

@section('content')

<div id="v-app" class="container-fluid mt-3">

  <div class="row">

    <div class="col-md-2 offset-lg-1 d-none d-lg-block offset-sm-2">
      
      @include('app.feed.left')

    </div>

    <div class="resac-padding-left-right-on-sm col-sm-12 col-md-8 col-lg-5">

      @include('flash')

      <!--
      <div class="post-box" id="post-box-v1">
        <form action="{{ route('backend.post.create.from_member') }}" method="post">
          <div class="box bg-white resac-linkedin-shadow">
              <div class="header pl-4 pt-3 pb-3">
                <div class="header-post-message">
                  <i class="fa fa-edit"></i> Publication
                </div>
              </div>
              <div class="body pl-4 pr-4 pb-3">
                <textarea id="textarea-post-box" class="form-control" id="post-area" rows="3" name="content" placeholder="Exprimez vous..."></textarea>
              </div>
              <div class="footer p-2 pr-4 border-top text-right">
                <button class="btn btn-sm btn-primary" type="submit" name="new_post">Publier</button>
              </div>
          </div>
        </form>
      </div>
      -->

      <div class="separator"></div>

      <div id="v-feed" class="resac-feed d-none">

        @include("app.publications.templates.post_vue_v2")

      </div>
      <div class="resac-feed-loader text-center">
        <div class="text-muted font-weight-bold">Chargement des publications...</div>
      </div>

    </div>

    <div id="annonce" class="col-sm-4 d-none d-md-block d-lg-block">
      @include('app.feed.annonce')
    </div>

  </div>

</div>

@endsection

@section('scripts')
<script src="{{ asset("asset/js/timeago/jquery.timeago.js") }}"></script>
<script src="{{ asset("asset/js/timeago/jquery.timeago.fr-short.js") }}"></script>
<script src="{{ cdn_asset("asset/js/vue.js") }}" type="text/javascript"></script>
<script src="{{ cdn_asset("asset/js/resac/vue.truncate_filter.js") }}" type="text/javascript"></script>
<script src="{{ cdn_asset("asset/js/lib/autosize.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("asset/js/extras/sweetalert2.all.min.js") }}" type="text/javascript"></script>
<script>
  autosize($('#textarea-post-box'));
</script>
<script>
  var vm = new Vue({

    el: "#v-feed",

    data:{

      posts: [],

      url:{
        get_posts: "{{ route('backend.api.post.get.all') }}?content=rich-text&status=published"
      }

    },

    mounted: function (){
      this.LoadPosts();
    }, 

    methods:{
      LoadPosts: function (){
        $.get({
          url: this.url.get_posts,

          success: function(data,status){
            $(".resac-feed").removeClass('d-none');
            vm.posts = data.data;
            $(".resac-feed-loader").hide();
          },

          error: function(data,status,error){
            vm.OnNetError(data,status,error);
          }
        })
      },

      OnNetError: function (data,status,error){
        Swal.fire("Oops !","Une erreur c'est produite. Veuillez contacter un administrateur du site.","error");
      },

      HideLoader: function (){
      }
    }

  });

  setInterval(function (){
    x = $("time.timeago").timeago();
  },500);
</script>
@endsection
