@extends('admin.base')

@section('extras_style')
  @parent
  <link rel="stylesheet" href="{{ cdn_asset("asset/css/resac/pubs.css") }}">
  @include('admin.pubs.editor.style')
  <style>
    body{
      background-color: #fff
    }
  </style>
@endsection

@section('main-content')
  <div id="v-app">
    @include('admin.pubs.breadcumb.post')
    @include('flash')
    <div class="v-component d-none">
      <div v-if="flash.show" v-bind:class="'alert alert-dismissible fade show alert-' + flash.type" role="alert">
        @{{ flash.message }}
        <button v-on:click="OnCloseFlash" type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    <div class="mt-3 container-fluid">
      <div class="row justify-content-center">
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div  class="col-sm-12">
          <div id="v-table-loader" class="mt-3">
            @include("admin.pubs.vue_components.v_loader")   
          </div>
        </div>
      </div>
      <div class="row v-component d-none">
        <div v-if="!editor.is_opened" class="col-sm-8">
          @include("admin.pubs.vue_components.post_edit_view")
        </div>
        <div v-show="editor.is_opened" class="col-sm-8">
          <div v-if="post" class="h4 d-flex justify-content-between">
            <div>
              Modification de la publication #<span v-text="post.id"></span>
            </div>
            <div>
              <a v-on:click="OnCloseEditor" href="#" class="btn btn-sm btn-light font-weight-bold">Annuler</a>
            </div>
          </div>
          <hr>
          @include("admin.pubs.vue_components.post_editor")
        </div>
        <div class="col-sm-4">
          @include("admin.pubs.components.pub_post_manager")
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@parent
<script src="{{ asset("asset/js/timeago/jquery.timeago.js") }}"></script>
<script src="{{ asset("asset/js/timeago/jquery.timeago.fr-short.js") }}"></script>
<script src="{{ asset('asset/lib/quill/quill.js') }}"></script>
<script>
  function vm_init_editor(){
    var toolbarOptions = [];
    var options = {
      placeholder: 'Commencez la redaction...',
      theme: 'bubble',
      scrollingContainer: '#scrolling-container', 
      modules: {
        toolbar: toolbarOptions
      }
    };
    var editor = new Quill('#editor', options);
    return editor
  }

  var vm = new Vue({

    el: "#v-app",

    data:{
      post: null,
      is_post_manager_operation: false,
      is_post_saved_operation: false,
      flash:{
        show: false,
        message: "",
        type: "info"
      },
      url: {
        get_post: "{{ route("backend.api.post.get.by_id",$post->id) }}?content=rich-text",
        certification:{
          start: "{{ route("backend.api.post.certif.start",["id" => $post->id, "certif_author" => UserAuth()->id]) }}",
          set: "{{ route("backend.api.post.certif.set",["id" => $post->id, "certif_author" => UserAuth()->id]) }}",
          cancel: "{{ route("backend.api.post.certif.cancel",["id" => $post->id, "certif_author" => UserAuth()->id]) }}",
        },
        state:{
          locked: "{{ route("backend.api.post.state.lock",["id" => $post->id]) }}",
          unlocked: "{{ route("backend.api.post.state.unlock",["id" => $post->id]) }}",
          archived: "{{ route("backend.api.post.state.archive",["id" => $post->id]) }}",
          published: "{{ route("backend.api.post.state.publish",["id" => $post->id]) }}"
        },
        update: "{{ route("backend.api.post.update",["id" => $post->id]) }}",
        delete: "{{ route("backend.api.post.delete",["id" => $post->id]) }}"
      },
      editor:{
        is_opened: false,
        quill: null,
      }
    },

    mounted: function (){
      $.get({
        url: this.url.get_post,
        success: function (data,status){
          vm.post = data.data;
          $(".v-component").removeClass('d-none');
          $("#v-table-loader").hide();
          var editor = vm_init_editor();
          vm.editor.quill = editor; 
        },
        error: function (data,status,error){
          Swal2_tools_emit_basic_error();
        }
      });
    
    },

    methods:{
      init_editor: function (){},

      OnError: function(){
        Swal2_tools_emit_basic_error();
      },

      OnOpenEditor: function(){
        this.editor.is_opened = true;
        this.editor.quill.setText(this.post.text_plain);
      },

      OnSaveEditor: function(){
        vm.is_post_saved_operation = true;
        content = JSON.stringify(this.editor.quill.getContents());
        length = this.editor.quill.getLength();
        text = this.editor.quill.getText(0, length);
        $('#post-editor input[name=content]').first().val(text);
        form_data = $("#post-editor").serializeArray();
        $.post({
          url: this.url.update,
          data:form_data,
          dataType:"json",
          success: function (data,status){
            vm.is_post_saved_operation = false;
            vm.editor.is_opened = false;
            vm.set_flash("Publication mise à jour","success");
            console.log(data);
            vm.post.content = data.content;
            vm.post.text_plain = data.text_plain;
            window.location = "#v-main";
          },
          error: function (data,status,error){
            Swal2_tools_emit_basic_error();
          }
        });
      },

      OnCloseEditor: function(){
        this.editor.is_opened = false;
      },

      OnCertifStart: function(){

        this.is_post_manager_operation = true;
        
        $.get({
          url: this.url.certification.start,
          success: function (data,status){
            vm.is_post_manager_operation = false;
            vm.post.validate_status_tag = "warning";
            vm.post.validate_status_title = "Publication en attente de validation";
            vm.post.validate_status = 2;
            vm.set_flash("Publication mise en attente. Une notification a été envoyé à l'auteur.","primary");
          },
          error: function (data,status,error){
            vm.is_post_manager_operation = false;
            vm.OnError();
          }
        });

      },

      OnCertifSet: function(){

        this.is_post_manager_operation = true;

        $.get({
          url: this.url.certification.set,
          dataType: "json",
          success: function (data,status){
            vm.is_post_manager_operation = false;
            vm.post.validate_status_tag = "success";
            vm.post.validate_status_title = "Publication approuvée";
            vm.post.validate_status = data.validate_status;
            vm.post.validate_at = data.validate_at;
            vm.post.user_validator = data.user
            vm.set_flash("Publication approuvée. Une notification a été envoyé à l'auteur.","success");
          },
          error: function (data,status,error){
            vm.is_post_manager_operation = false;
            vm.OnError();
          }
        });

      },

      OnCertifCancel: function(){
        this.is_post_manager_operation = true;
        $.get({
          url: this.url.certification.cancel,
          dataType: "json",
          success: function (data,status){
            vm.is_post_manager_operation = false;
            vm.post.validate_status_tag = "warning";
            vm.post.validate_status_title = "Publication en attente";
            vm.post.validate_status = data.validate_status;
            vm.post.validate_at = data.validate_at;
            vm.post.user_validator = data.user;
            vm.post.is_active = data.is_active;
            vm.set_flash("Certification annulée. Publication mise en attente.","info");
          },
          error: function (data,status,error){
            vm.is_post_manager_operation = false;
            vm.OnError();
          }
        });
      },

      OnPostPublished: function(){
        this.is_post_manager_operation = true;
        $.get({
          url: this.url.state.published,
          dataType: "json",
          success: function (data,status){
            vm.set_flash("Publication publiée.","success");
            vm.post.status = 1;
            vm.post.is_active = 1;
            vm.post.is_published = 1;
            vm.is_post_manager_operation = false;
          },
          error: function (data,status,error){
            vm.is_post_manager_operation = false;
            vm.OnError();
          }
        });
      },

      OnPostLocked: function(){
        this.is_post_manager_operation = true;
        $.get({
          url: this.url.state.locked,
          dataType: "json",
          success: function (data,status){
            console.log("locked");
            vm.set_flash("Publication bloquée.","primary");
            vm.post.is_active = false;
            vm.is_post_manager_operation = false;
          },
          error: function (data,status,error){
            vm.is_post_manager_operation = false;
            vm.OnError();
          }
        });
      },

      OnPostUnLocked: function(){
        this.is_post_manager_operation = true;
        $.get({
          url: this.url.state.unlocked,
          dataType: "json",
          success: function (data,status){
            vm.set_flash("Publication débloquée.","primary");
            vm.post.is_active = true;
            vm.is_post_manager_operation = false;
          },
          error: function (data,status,error){
            vm.is_post_manager_operation = false;
            vm.OnError();
          }
        });
      },

      OnPostArchived: function (){
        this.is_post_manager_operation = true;
        $.get({
          url: this.url.state.archived,
          dataType: "json",
          success: function (data,status){
            vm.set_flash("Publication retirée.","primary");
            vm.post.status = 2;
            vm.is_post_manager_operation = false;
          },
          error: function (data,status,error){
            vm.is_post_manager_operation = false;
            vm.OnError();
          }
        });
      },

      OnCloseFlash: function (){
        this.flash.show = false;
      },

      set_flash: function (message,type){
        this.flash.show = true;
        this.flash.message = message;
        this.flash.type = type;
      }

    }

  });

  setInterval(function (){
    $("time.timeago").timeago();
  },200);
</script>


@endsection
