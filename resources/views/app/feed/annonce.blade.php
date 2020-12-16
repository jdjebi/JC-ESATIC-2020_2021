<div class="last-feature">
  <div class="resac-linkedin-shadow rounded-lg bg-white pb-2">
    <div class="font-weight-bold pt-3 pl-3 pb-2"> Dernières nouveautés</div>

    @if($last_feature)
    <div class="pl-3 pt-2">
      <a href="{{ route("dev_news") }}">{{ $last_feature->title }}</a>
    </div>
    <p class="pl-3 pr-3 content">
      {!! substr($last_feature->content, 0, 245) !!}... <a href="{{ route("dev_news") }}">voir plus</a>.
    </p>

    @else
    <p class="pt-2 pl-3 pr-3 content">Aucune</p>
    @endif
  </div>

</div>
