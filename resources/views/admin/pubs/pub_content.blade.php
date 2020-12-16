<div class="bg-post">

  <div class="pub-box" id="">
      <div class="box bg-white mb-3 resac-linkedin-shadow">
          <div class="header pl-4 pt-3 pb-3 pr-4">
            <div class="media">
              <a title="{{ $post->user_object->fullname }}" href="{{ route('admin_user_profil',$post->user_object->id) }}">
              <img class="pub-user-photo" src="{{ photos_cdn_asset($post->user_object) }}" alt="Photo {{ $post->user_object->fullname }}">
              </a>
              <div class="ml-3 media-body">
                <div class="mt-0 pub-user-name">
                  <a href="{{ route('profil') }}?id={{ $post->id }}">
                    {{ $post->user_object->fullname }}
                  </a> &nbsp;
                  <span title="{{ $post->validate_status_title }}" class="text-{{ $post->validate_status_tag }}"><i class="fa fa-check-circle"></i></span>
                </div>

                <span class="text-muted small">
                  <time class="timeago" datetime="{{ $post->date }}" title="{{ $post->date }}"> <i class="far fa-clock"></i></time>
                  &middot
                  <span title="La publication peut être vu par tout le monde."> <i class="fa fa-globe-africa"></i> {{ $post->scope }}</span>
                </span>

              </div>
            </div>
          </div>
          <div class="body pl-4 pr-4 pb-3">{{ $post->content }}</div>
          <div class="footer border-top p-2 pl-4 pr-4">
            <div class="d-flex justify-content-between align-items-center">
              <div>
              <h6>Récent</h6>
              <div class="small text-muted">
                @if($post->validate)
                  <div>Certifier le: {{ $post->validate_at }}</div>
                  <div>Par: {{ $post->certificate_author->fullname }} </div>
                @else
                  @if($post->validate_at)
                  <div>Certification annulé le: {{ $post->validate_at }}</div>
                  <div>Par: {{ $post->certificate_author->fullname }}</div>
                  @else
                    <div class="">Aucune opération</div>
                  @endif
                @endif
              </div>
              </div>
              <div class="text-right">
                @if(!$post->validate)
                  <a class="btn btn-sm btn-primary" href="{{ route('admin.validate_pub', $post->id) }}?action=validate">Certifier</a>
                @else
                  <a class="btn btn-sm btn-danger" href="{{ route('admin.validate_pub', $post->id) }}?action=cancel">Annuler la certification</a>
                @endif
              </div>
            </div>
          </div>
      </div>
  </div>

</div>
