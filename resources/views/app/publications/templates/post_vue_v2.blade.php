<div v-for="post in posts" class="pub-box" id="">
    <div class="box resac-linkedin-shadow bg-white mb-3 resac-clear-rounded-on-sm resac-clear-border-left-on-sm resac-clear-border-right-on-sm">
        <div class="header pl-4 pt-3 pb-3 pr-4">
          <div class="media">
            <a v-bind:title:="post.user.fullname" v-bind:href="post.user.profil_url">
              <img class="pub-user-photo" v-bind:src="post.user.photo" v-bind:alt="'Photo' + post.user.fullname">
            </a>
            <div class="ml-3 media-body">
              <div class="dropdown float-right">
                <a class="dropdown-toggle" href="#" role="button" v-bind:id="'pub-box-menu-option-'+post.id" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                  <i class="text-muted fa fa-ellipsis-h"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" v-bind:aria-labelledby="'pub-box-menu-option-'+post.id">
                    <h6 class="dropdown-header">
                      Options 
                      @if(Resac\Auth2::is_admin_logged())
                      <b>(Admin)</b>
                      @endif
                    </h6>
                    <a v-if='post.user.id == {{ UserAuth()->id }}'
                      class="dropdown-item small" v-bind:href="'{{ route("app.post.show","") }}/' + post.id"><i class="fa fa-eye"></i> &nbsp; Afficher la publication</a>
                    @if(Resac\Auth2::is_admin_logged())
                        <a class="dropdown-item small" v-bind:href="'{{ route("app.post.delete","") }}/' + post.id + '?origin=feed'"><i class="fa fa-trash"></i> &nbsp; Supprimer la publication</a>
                    @else 
                    <a v-if='post.user.id == {{ UserAuth()->id }}'
                    class="dropdown-item small" v-bind:href="'{{ route("app.post.delete","") }}/' + post.id + '?origin=feed'"><i class="fa fa-trash"></i> &nbsp; Supprimer la publication</a>
                    @endif
                </div>
              </div>

              <div class="mt-0 pub-user-name">
                <a v-bind:href="post.user.profil_url">
                    @{{ post.user.fullname }}
                </a> &nbsp;
              
            </div>

              <span class="text-muted small">
                <time class="timeago"  v-bind:datetime="post.date" v-bind:title="post.date"> <i class="far fa-clock"></i></time>
                &middot
                <span title="La publication peut être vu par tout le monde."> <i class="fa fa-globe-africa"></i> @{{ post.scope }}</span>
              </span>

            </div>
          </div>
        </div>
        <div class="body pl-4 pr-4 pb-3" v-html="post.content"></div>
    </div>
  </div>