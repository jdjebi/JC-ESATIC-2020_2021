<div v-if="post">
    <div class="pub-box">
        <div class="box border rounded shadow-sm bg-white mb-3 resac-clear-rounded-on-sm resac-clear-border-left-on-sm resac-clear-border-right-on-sm">
            <div class="header pl-4 pt-3 pb-3 pr-4">
                <div class="media">
                    <a v-bind:title:="post.user.fullname" v-bind:href="post.user.admin_profil_url">
                        <img class="pub-user-photo" v-bind:src="post.user.photo" v-bind:alt="'Photo' + post.user.fullname">
                    </a>
                    <div class="ml-3 media-body">

                        <div class="float-right">
                            <button v-if="post.status != 2" v-on:click="OnPostPublished" v-bind:disabled="post.validate_status != 1 || post.status == 1 || is_post_manager_operation" class="btn btn-success btn-sm resac-fb-btn-success"><i class="fa fa-upload"></i> Publier</button>
                            <button v-if="post.status != 2" v-on:click="OnOpenEditor" class="btn btn-info btn-sm resac-fb-btn-default">Modifier</button>
                        </div>

                        <div class="mt-0 pub-user-name">
                            <a v-bind:href="post.user.admin_profil_url" v-text="post.user.fullname"></a> &nbsp;
                            <span v-if="post.status != 2" v-bind:title="post.validate_status_title" v-bind:class="'text-'+post.validate_status_tag"><i class="fa fa-check-circle"></i> &nbsp;</span>
                            <span v-if="post.status == 2" v-bind:title="'Etais une '+post.validate_status_title" class="text-dark"><i class="fa fa-check-circle"></i> &nbsp;</span> 
                            <template v-if="post.status == 0">
                                <span class="posts-list-elm-tag-status-media text-muted">Brouillon</span>
                            </template>
                            <template v-else-if="post.status == 1">
                                <span v-if="post.is_active == 1" class="posts-list-elm-tag-status-media text-success">Publié</span>
                                <span v-else class="posts-list-elm-tag-status-media text-warning">Bloqué</span>
                            </template> 
                            <template v-else-if="post.status == 2">
                                <span class="posts-list-elm-tag-status-media text-dark">Terminé</span>
                            </template> 

                        </div>
        
                        <span class="text-muted small">
                            <i class="far fa-clock"></i> <time class="timeago"  v-bind:datetime="post.date" v-bind:title="post.date"> <i class="far fa-clock"></i></time>
                            &middot
                            <span title="La publication peut être vu par tout le monde."> <i class="fa fa-globe-africa"></i> @{{ post.scope }}</span>
                        </span>
        
                    </div>
                </div>
            </div>
            <div class="body pl-4 pr-4 pb-3" v-html="post.content"></div>
        </div>
    </div>
</div>
  
