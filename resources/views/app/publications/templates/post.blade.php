<div class="pub-box" id="">
    <div class="box resac-linkedin-shadow bg-white mb-3 resac-clear-rounded-on-sm resac-clear-border-left-on-sm resac-clear-border-right-on-sm">
        <div class="header pl-4 pt-3 pb-3 pr-4">
          <div class="media">
            <a title="{{ $post->user_object->fullname }}" href="{{ route('profil.visitor',$post->user_object->id) }}">
              <img class="pub-user-photo" src="{{ photos_cdn_asset($post->user_object) }}" alt="Photo {{ $post->user_object->fullname }}">
            </a>
            <div class="ml-3 media-body">
              <div class="dropdown float-right">
                <a class="dropdown-toggle" href="#" role="button" id="pub-box-menu-option-{{ $post->id }}" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                  <i class="text-muted fa fa-ellipsis-h"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="pub-box-menu-option-{{ $post->id }}">
                    <h6 class="dropdown-header">
                      Options 
                      @if(Auth::is_admin_logged())
                      <b>(Admin)</b>
                      @endif
                    </h6>

                    @if($post->user_object->id == $user->id)
                        <a class="dropdown-item small" href="{{ route("app.post.show",$post->id) }}"><i class="fa fa-eye"></i> &nbsp; Afficher la publication</a>
                    @endif

                    @if($post->user_object->id == $user->id || Auth::is_admin_logged())
                        <a class="dropdown-item small" href="{{ route("app.post.delete",$post->id) }}?origin=feed"><i class="fa fa-trash"></i> &nbsp; Supprimer la publication</a>
                    @endif

                </div>
              </div>

              <div class="mt-0 pub-user-name">
                <a href="{{ route('profil.visitor',$post->user_object->id) }}">
                  {{ $post->user_object->fullname }}
                </a> &nbsp;
                <span title="Publication {{ $post->validate ? "approuvée" : "non approuvée"}}" class="text-{{ $post->validate ? "success" : "danger"}}"><i class="fa fa-check-circle"></i></span>
              </div>

              <span class="text-muted small">
                <span class="post-badge post-badge-info mr-1">INFO</span>&nbsp;
                <time class="timeago" datetime="{{ $post->date }}" title="{{ $post->date }}"> <i class="far fa-clock"></i></time>
                &middot
                <span title="La publication peut être vu par tout le monde."> <i class="fa fa-globe-africa"></i> {{ $post->scope }}</span>
              </span>

            </div>
          </div>
        </div>
        <div class="body pl-4 pr-4 pb-3"><?= $post->content ?></div>
    </div>
  </div>