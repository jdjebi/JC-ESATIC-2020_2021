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
<div class="modal fade" id="create_role" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="create_role" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="create_roleLabel">Nouveau rôle</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="role-create" v-on:submit.prevent="OnSaveRole">
            @csrf
            <div class="modal-body">
                
                <div v-if="role.creating_error_msg != ''">
                    <div  class="alert alert alert-danger alert-dismissible fade show" role="alert">
                        @{{ role.creating_error_msg }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Titre du rôle:</label>
                    <input type="text"v-model="role.form_role_name" name="role_name" class="form-control" id="recipient-name" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button v-bind:disabled="role.creating" type="submit" class="btn btn-primary">
                    <span v-if="role.creating" class="spinner-border text-white spinner-border-sm" role="status"></span>
                    Enregistrer
                </button>
            </div>
        </form>
        </div>
    </div>
</div>