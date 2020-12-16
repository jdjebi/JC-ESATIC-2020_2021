@extends('admin.base')

@section('extras_style')

@endsection


@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div id="v-app" class="offset-md-4 col-md-4">
                    <div id="verif-form" class="bg-white borderounded resac-linkedin-shadow mt-5 d-none">
                        <form action="">
                            <div class=" p-3 ">
                                <div class="form-group">
                                    <div class="h4 mb-4">Vérification</div>
                                    <input type="text" v-bind:disabled="form.operation" v-model="form.code" class="form-control" id="exampleInputEmail1" placeholder="Entrer le code à vérifier">
                                    <small v-if="form.message_error" class="form-text text-danger">@{{ form.message_error }}</small>    
                                </div>
                            </div>
                            <div v-if="form.code_ok">
                                <ul>
                                    <li>@{{ data.role }}</li>
                                    <li>@{{ data.type }}</li>
                                    <li v-if="data.is_used">Code utilisé</li>
                                    <li v-if="!data.is_used">Code inutilisé</li>
                                </ul>
                            </div>
                            <div class="bg-light p-3 d-flex justify-content-between">
                                <div>
                                    <button v-on:click="VerifBtn" type="button" class="btn-primary btn-sm btn" v-bind:disabled="form.operation || form.verif_disabled">
                                        <span v-if="form.verif_running" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Vérifier
                                    </button>
                                </div>
                                <div>
                                    <button v-on:click="MarkBtn" type="button" class="btn-success btn-sm btn" v-bind:disabled="form.operation || form.mark_disabled">
                                        <span v-if="form.mark_running" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Marquer
                                    </button>
                                    <button v-on:click="CancelBtn" type="button" class="btn-danger btn-sm btn" v-bind:disabled="form.operation || form.cancel_disabled">
                                        <span v-if="form.cancel_running" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Annuler
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{ cdn_asset("asset/js/lib/axios/axios.min.js") }}"></script>
<script type="text/javascript">

var vm = new Vue({
  el: '#v-app',
  data:{
  
    urls:{
        verif:"{{ route('backend.admin.codes.verif') }}",
        mark:"",
        cancel:""
    },

    form:{

        code_ok:false,

        message_error: "",

        operation: false,

        verif_running:false,
        mark_running:false,
        cancel_running:false,

        verif_disabled:false,
        mark_disabled:true,
        cancel_disabled:true,

        code:"",

    },

    data:{
        code:'',
        role:'',
        type:'',
        is_used:''
    }
  },  

  mounted: function(){
    $("#verif-form").removeClass('d-none');
  },

  methods:{
    VerifBtn: function(){
        this.form.code_ok = false;
        this.form.message_error = "";
        this.form.verif_disabled = true;
        this.form.verif_running = true;
        this.form.operation = true;

        axios.post(this.urls.verif, {
            code:this.form.code
        })
            .then(function (response) {
                data = response.data;

                console.log(data.error);

                if(data.error)  {
                    vm.form.message_error = data.message;
                }else{
                    vm.form.code_ok = true;
                    vm.data.code = data.user.code;
                    vm.data.role = data.user.role;
                    vm.data.type = data.user.type;
                    vm.data.is_used = data.user.login_code_used
                }
        
            })
            .catch(function (error) {
                alert(error);
            })
            .then(function () {
                vm.form.verif_disabled = false;
                vm.form.verif_running = false;
                vm.form.operation = false;

            });
    },

    MarkBtn: function(){
        this.mark_disabled = true;
        this.operation = true;
    },

    CancelBtn: function(){
        this.cancel_disabled = true;
        this.operation = true;
    }
  }  
});

</script>
@endsection