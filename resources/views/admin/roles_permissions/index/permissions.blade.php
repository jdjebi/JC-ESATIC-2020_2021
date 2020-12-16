<div class="row">
    <div class="col-md-12">
        <div class="my-3 p-5 bg-white rounded resac-linkedin-shadow">
            <div class="mb-4 d-flex justify-content-between">
                <div class="h4">Permissions</div>
            </div>
            <form v-on:submit.prevent>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input v-bind:disabled="permissions.creating" name="role_name" v-model="permissions.form.name" class="form-control form-control-sm" placeholder="Nom de la permission" type="text">
                        <small v-if="permissions.form.error" class="form-text text-danger" v-text="permissions.form.error"></small>
                    </div>
                    <div class="col-md-6">
                        <button 
                            v-bind:disabled="permissions.creating"
                            v-on:click="OnCreatePermission"
                            class="btn btn-sm btn-success"
                        >Ajouter</button>
                    </div>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Permission</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody id="v-table-permissions-row" class="d-none">
                    <tr v-for="permission in permissions.collection">
                        <td v-bind:title="'ID ' + permission.id" class="font-weight-bolder">
                            <span class="text-primary"><i class="fa fa-lock-open"></i></span>&nbsp; <span class="badge badge-primary badge-lg">@{{ permission.name }}</span>  
                        </td>
                        <td class="text-right">
                            <a href="#" v-bind:disabled="permissions.deleting"
                                v-on:click="OnDeletePermission2(permission.id,$event)" 
                                class="text-secondary"
                            ><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
