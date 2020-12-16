<div class="col-md-4 col-sm-12 resac-feed resac-padding-left-right-on-sm mb-2">
  <div class="card resac-clear-border-left-on-sm">
    <div class="card-header">
      Contacts
    </div>
    <div class="card-body">
      <ul class="profile-list">
        <li class="clearfix">
          <strong class="title">E-mail</strong>
          <span class="cont">{{ $user_visited->email }}</span>
        </li>
        <li class="clearfix">
          <strong class="title">Téléphone</strong>
          <span class="cont">
            {{ $user_visited->numero }}
          </span>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="col-md-8 col-sm-12 resac-padding-left-right-on-sm resac-feed">
@foreach ($posts as $key => $post)

  @include("app.publications.templates.post")

@endforeach

</div>
