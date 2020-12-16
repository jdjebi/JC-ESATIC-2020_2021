<div class="row">
    <div class="col-md-12">
        <div class="my-3 p-5 bg-white rounded resac-linkedin-shadow">
            <div class="mb-4 d-flex justify-content-between">
                <div class="h4">
                    Rôles 
                    <span id="v-role-updating" class="v-component d-none">
                        <span v-if="role && role.updating" class="text-muted small">Mise à jour...</span>
                    </span>
                </div>
                <div>
                    <a href="#" v-on:click="OnOpenRoleCreateForm" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#create_role">Nouveau rôle</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" style="table-layout: fixed;">
                    <thead>
                    <tr scope="row">
                        <th scope="col">Rôle</th>
                        <th scope="col">Alias</th>
                        <th scope="col">Permissions</th>
                        <th scope="col" class="text-right">Options</th>
                    </tr>
                    </thead>
                    <tbody id="v-table-roles-row" class="d-none">
                        <tr v-for="role_tmp in role.roles">
                            <td v-bind:title="'ID ' + role_tmp.id" class="font-weight-bolder">
                                <span v-if="role_tmp.is_permission_system" class="text-primary">
                                    <i class="fa fa-lock"></i>
                                    &nbsp; 
                                </span>
                                <span v-if="!role_tmp.is_permission_system" class="text-primary">
                                    <i class="fa fa-lock-open"></i>
                                    &nbsp; 
                                </span>
                                @{{ role_tmp.label }}
                            </td>
                            <td>@{{ role_tmp.name }}</td>
                            <td>
                                <template v-for="permission in role_tmp.permissions">
                                    <span class="permission-badge badge badge-block badge-primary">@{{ permission.name }}</span>&nbsp;
                                </template>
                            </td>
                            <td class="text-right">
                                <a v-bind:href="role_tmp.url" class="text-secondary"><i class="fa fa-edit"></i></a>&nbsp;
                                <a href="#" v-bind:disabled="role.deleting"
                                    v-on:click="OnDeleteRole(role_tmp.id,$event)" 
                                    class="text-secondary"
                                ><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="v-table-roles-loader">
                @include('admin.components.table-loader')
            </div>
        </div>
    </div>
</div>
