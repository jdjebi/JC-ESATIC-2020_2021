@extends('admin.base')

@push('styles')
<link rel="stylesheet" href="{{ cdn_asset('asset/css/resac/admin/roles-permissions.css') }}">
@endpush

@section('main-content')
    <div class="nav-scroller shadow-sm">
        <nav id="resac-breadcrumb" aria-label="breadcrumb" >
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.user.roles') }}">Rôles et permissions</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rôle #{{ $role_id }}</li>
            </ol>
        </nav>
    </div>
    @include('flash')
    <div id="v-app" class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="h4 mb-4">Gestion des rôles et permissions</div>
                <hr>
            </div>
        </div>
        <div id="v-loader" class="row mt-3">
            <div class="col-md-12">
                @include("admin.pubs.vue_components.v_loader")   
            </div>
        </div>
        <div class="v-component row d-none">
            <div v-if="role" class="col-md-12">
                <div class="rp-item-detail my-3 p-5 bg-white rounded resac-linkedin-shadow">
                    <div class="mb-2 d-flex justify-content-between">
                        <div class="h4">Rôle #@{{ role.id }}</div>
                        <div>
                            <button v-on:click="OnUpdateRole" v-bind:disabled="!edited || updating" class="btn btn-sm btn-success" ><i class="fa fa-save"></i> Mettre à jour</button>
                        </div>
                    </div>
                    <div>
                        <div class="row rp-item-detail-first-row">
                            <div class="col-md-3 col-sm-12">
                                <span class="label">ID</span>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <span class="label-val" v-text="role.id"></span>
                            </div>
                        </div>
                        <div class="row border-top rp-item-detail-row">
                            <div class="col-md-3 col-sm-12">
                                <span class="label">Rôle</span>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <span class="label-val" v-text="role.label"></span>
                            </div>
                        </div>
                        <div class="row border-top rp-item-detail-row">
                            <div class="col-md-3 col-sm-12">
                                <span class="label" >Alias</span>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <span class="label-val" v-text="role.name"></span>
                            </div>
                        </div>
                        <div class="row border-top rp-item-detail-row">
                            <div class="col-md-3 col-sm-12">
                                <span class="label">Permissions</span>
                                <span v-if="edited" class="text-primary label">(modifiée)</span>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <template v-for="(permission,i) in role.permissions">
                                    <span v-on:click="RemoveRole(i,$event)" class="permission-badge badge badge-primary"> - @{{ permission.name }}</span>&nbsp;
                                </template>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div class="text-muted">Cliquez sur une permission pour l'ajouter au rôle </div> 
                        <div class="mt-3">
                            <template v-for="(permission,i) in permissions">
                                <span v-on:click="AddRole(i,$event)" class="permission-badge badge badge-secondary"> + @{{ permission.name }}</span>&nbsp;
                            </template>
                        </div>
                    </div>
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
    <script src="{{ cdn_asset("asset/js/lib/axios/axios.min.js") }}"></script>
    <script src="{{ cdn_asset("asset/js/lib/lodash/lodash.min.js") }}"></script>
    <script>
        var vm = new Vue({
        el: "#v-app",
        data:{
            role: null,
            permissions:null,
            edited: false,
            updating: false,
            url: {
                role:{
                    get: "{{ route("backend.roles.show",$role_id) }}",
                    update: "{{ route("backend.roles.update",$role_id) }}",
                },
                permissions:{
                    get_available: "{{ route("backend.permissions.index") }}?skip_permissions_of_role={{ $role_id }}",
                }
            },
            toast:{
                error: null,
                message: ""
            }
        },

        mounted: function (){
            // Récupération des rôles
            axios.get(this.url.role.get)
                .then(function (response) {
                    vm.role = response.data.data;
                })
                .catch(function (error) {
                    Swal2_tools_emit_basic_error();
                })
                .then(function () {
                    $(".v-component").removeClass('d-none');
                    $("#v-loader").hide();
                });
            
            axios.get(this.url.permissions.get_available)
                .then(function (response) {
                    vm.permissions = response.data.data;
                })
                .catch(function (error) {
                    Swal2_tools_emit_basic_error();
                });
 
        },

        computed: {
            SortedPermissions: function (){
                return _.orderBy(this.permissions, 'name')
            },
            SortedRolePermissions: function (){
                return _.orderBy(this.role.permissions, 'name') 
            }
        },

        methods:{
            OnError: function(error){
                Swal2_tools_emit_basic_error();
            },
            ShowToast: function(message){
                vm.toast.message = message;
                $('.toast').toast('show');
            },
            OnUpdateRole: function(){
                this.updating = true;
                axios.put(this.url.role.update,{
                        permissions: vm.role.permissions,
                    })
                    .then(function (response) {
                        vm.ShowToast(response.data.message);
                    })
                    .catch(function (error) {
                        Swal2_tools_emit_basic_error();
                    })
                    .then(function () {
                        vm.updating = false;
                        vm.edited = false;
                    }); 
            },

            AddRole: function (i,event){
                this.edited = true,
                permission = this.permissions[i];
                this.permissions.splice(i,1);
                this.role.permissions.push(permission);
            },
            RemoveRole: function (i,event){
                this.edited = true,
                permission = this.role.permissions[i];
                this.role.permissions.splice(i,1);
                this.permissions.push(permission);
            }
        }
    });
    </script>
@endsection
