<div class="post">
    <div class="border rounded shadow-sm bg-white">
        <div class="p-3 d-flex border-bottom">
            <div class="text-muted"><span class="font-weight-bolder">Modification</span> &middot; <small>Libre</small></div>
        </div>
        <div id="scrolling-cotainer">
            <div class="quill-box">
                <form v-on:submit.prevent="OnSaveEditor" id="post-editor" method="post" action="{{ route("backend.post.create.libre") }}">
                    @csrf
                    <input type="hidden" name="content">
                    <div id="editor" class="bg-white ui-widget-content border-bottom"></div>
                    <div class="p-2">
                        <div class="d-flex align-items justify-content-between">
                            <div></div>
                            <div v-if="post">
                                <button v-bind:disabled="is_post_saved_operation" class="btn btn-sm btn-primary font-weight-bold" type="submit" name="register-post">
                                    <span v-if="!is_post_saved_operation"><i class="fas fa-save"></i></span>
                                    <span v-if="is_post_saved_operation" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enregistrer
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  