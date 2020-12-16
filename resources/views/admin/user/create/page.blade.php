@extends('admin.base')

@section('extras_style')
@parent
<style>
.btn_form_active{
    color: #fff;
    background-color: #0062cc;
    border-color: #005cbf;
    box-shadow: 0 0 0 0.2rem rgba(38,143,255,.5);
}
.btn_form_active:hover{
    color: #fff;
    background-color: #0062cc;
    border-color: #005cbf;
    box-shadow: 0 0 0 0.2rem rgba(38,143,255,.5);
}
</style>
@endsection

@section('main-content')
<div class="nav-scroller shadow-sm">
  <nav id="resac-breadcrumb" aria-label="breadcrumb" >
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
          <li class="breadcrumb-item active" aria-current="page">Créer</li>
      </ol>
  </nav>
</div>
@include('flash')

<div class="container mt-3">
    <div id="v-form" class="d-none bg-white resac-linkedin-shadow p-4 mb-1">
        <div class="h3">
            Créer un utilisateur
        </div>
        <div V-if="form.global.is_required_error" class="alert alert-danger">
            Veuillez remplir tous les champs avec (*)
        </div>
        <div>
            <form v-on:submit.prevent="CreateUser">
                @csrf
                <input type="hidden" name="id" value="">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" v-bind:class="FieldClass('nom')" v-model="form.nom.value" name="nom" id="nom" placeholder="Nom de l'utilisateur">
                        <span v-if="IsError('nom')" v-text="Error('nom')" class="text-danger small" ></span>
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="prenom">Prénom</label>
                        <input type="text" v-bind:class="FieldClass('prenom')" v-model="form.prenom.value" name="prenom" id="prenom" placeholder="Prénom de l'utilisateur">
                        <span v-if="IsError('prenom')" v-text="Error('prenom')" class="text-danger small" ></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="username">Identifiant</label>
                        <input type="text" v-bind:class="FieldClass('username')" v-model="form.username.value" name="username" id="username" placeholder="Identifiant de connexion/Matricule">
                        <span v-if="IsError('username')" v-text="Error('username')" class="text-danger small" ></span>
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="login_code">Code de login*</label>
                        <input type="text" type="text" v-bind:class="FieldClass('login_code')" v-model="form.login_code.value" name="login_code" id="login_code" placeholder="Code de connexion">
                        <span v-if="IsError('login_code')" v-text="Error('login_code')" class="text-danger small" ></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" type="text" v-bind:class="FieldClass('email')" v-model="form.email.value" name="email" id="email" placeholder="Adresse E-mail">
                    <span v-if="IsError('email')" v-text="Error('email')" class="text-danger small" ></span>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6">
                      <label for="password">Mot de passe*</label>
                      <input type="password" v-bind:class="FieldClass('password')" type="password" v-model="form.password.value" name="password" value="" id="password">
                      <span v-if="IsError('password')" v-text="Error('password')" class="text-danger small" ></span>
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                      <label for="conf_password">Confirmation du mot de passe*</label>
                      <input type="password" v-bind:class="FieldClass('password')" type="password" v-model="form.conf_password.value" name="conf_password" value="" id="conf_password">
                    </div>
                </div>
                <div class="mb-4">
                    <div>
                        <label for="">Rôle</label>
                        <div>
                            <template v-for="role in roles">
                                <button type="button" v-on:click="SelectRole(role)" v-bind:class="['btn btn-sm resac-fb-btn-default mr-1', role_selected != null && (role.role.name==role_selected.role.name) ? 'btn_form_active' : '']">@{{ role.role.label }}</button>
                            </template>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div>
                        <label for="">Type</label>
                        <div v-if="role_selected != null">
                            <template v-for="type in role_selected.types">
                                <button type="button" v-on:click="SelectType(type)" v-bind:class="['btn btn-sm resac-fb-btn-default mr-1', type_selected != null && (type.name==type_selected.name) ? 'btn_form_active' : '']">@{{ type.label }}</button>
                            </template>
                        </div>
                        <div v-else>
                            <b>Veuillez sélectionner un rôle</b>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" name="save" class="btn btn-primary" v-bind:disabled="role_selected == null || type_selected == null || form.sending">
                        Créer
                        <span  v-if="form.sending" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ cdn_asset("asset/js/lib/axios/axios.min.js") }}"></script>
<script type="text/javascript">

var BASE_FIELD = {
    error:false,
    value: "",
    message:""
};

var vm = new Vue({
  el: '#v-form',
  data:{
    roles: @json($roles),
    role_selected: null,
    type_selected: null,
    form:{
        sending:false,
        url: "{{ route('backend.admin.users.create') }}",
        global:{
            validate:false,
            is_required_error:false
        },
        nom:{
            error:false,
            value: "",
            message:""
        },
        prenom:{
            error:false,
            value: "",
            message:""
        },
        email:{
            error:false,
            value: "",
            message:""
        },
        username:{
            error:false,
            value: "",
            message:""
        },
        login_code:{
            error:false,
            value: "",
            message:""
        },
        password:{
            error:false,
            value: "",
            message:""
        },
        conf_password:{
            error:false,
            value: "",
            message:""
        }
    }
  },  

  mounted: function(){
    $("#v-form").removeClass('d-none');
  },

  methods:{

    FieldState: function (key){
        if(this.form.global.validate)
            return this.form[key].error ? 'is-invalid' : 'is-valid';
        else
            return "";
    },

    FieldClass: function(key){
        return ['form-control',this.FieldState(key)];
    },

    IsError: function(key){
        return this.form.global.validate && this.form[key].error;
    },

    Error: function(key){
        return this.form[key].message;
    },

    StyleBtnRole: function (role){
        return "btn btn-sm resac-fb-btn-default mr-1" + (this.role_selected != null && role.name==this.role_selected.name ? " btn_form_active " + role.name : "");
    },

    CollectFormData: function(){
        data = {};
        data.nom = this.form.nom.value;
        data.prenom = this.form.prenom.value;
        data.email = this.form.email.value;
        data.login_code = this.form.login_code.value;
        data.username = this.form.username.value;
        data.password = this.form.password.value;
        data.conf_password = this.form.conf_password.value;
        data.role = this.role_selected.role.name;
        data.type = this.type_selected.name;
        return data;
    },

    SelectRole: function (role){
        this.role_selected = role;
    },

    SelectType: function(type){
        this.type_selected = type;
    },

    CreateUser: function(){
        form_data = this.CollectFormData();

        this.form.global.validate = false;
        this.form.sending = true;

        axios.post(this.form.url, form_data)
        .then(function (response) {

            vm.form.sending = false;

            data = response.data;

            vm.form.global.validate = data.form.vars.already_validate;

            if(data.is_errors){
                if(data.form.errors.required){
                    vm.form.global.is_required_error = true;
                }else{
                    vm.form.global.is_required_error = false;   
                }

                keys = Object.keys(data.form.clear_data);

                for (let i = 0; i < keys.length; i++) {
                    if(data.form.errors[keys[i]]){
                        vm.form[keys[i]].error = true;
                        vm.form[keys[i]].message = data.form.errors.messages[keys[i]]
                    }else{
                        if(typeof vm.form[keys[i]] !== 'undefined')
                            vm.form[keys[i]].error = false;
                    }
                }

            }else{
                vm.form.global.validate = false;
                vm.form.nom.value = "";
                vm.form.prenom.value = "";
                vm.form.email.value = "";
                vm.form.login_code.value = "";
                vm.form.username.value = "";
                // vm.form.password.value = "";
                // vm.form.conf_password.value = "";
                Swal.fire({
                    icon: 'success',
                    title: 'Utilisateur enregistré',
                });
            }

           
        })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {
            
        });
    }
  }  
});

</script>
@endsection
