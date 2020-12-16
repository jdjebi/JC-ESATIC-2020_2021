<div class="media">
  <img class="wh-40 border resac-border-light-2 rounded-circle" src="{{ photos_cdn_asset(UserAuth()) }}" alt="Photo {{  UserAuth()->fullname }}">
  <div class="media-body ml-2 small">
    <div>
      {{ UserAuth()->fullname }}
    </div>
    <div class="">
      {{  UserAuth()->emploi }} &middot {{  UserAuth()->universite }}
    </div>
  </div>
</div>

<hr>
<!--
<h6 class="text-muted">Publications</h6>
<ul class="nav flex-column resac-nav-ul">
  <li class="nav-item nav-pills">
    <a class='nav-link small' href="{{ route('app.post.hub') }}">Editeur de publication </a>
    <a class='nav-link small' href="{{ route('app.post.create.free') }}">
      Créer publication libre</a>
  </li>
</ul>
-->
