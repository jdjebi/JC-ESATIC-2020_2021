@include('app.news.style')


<div class="container mt-5 mb-5">
@if($feature)
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h4>Les nouveautés</h4>
			<ul class="timeline">
				<li>
					<span class="text-primary font-weight-bold">{{ $feature->title }}</span>
					<div class="text-muted small"><i class="far fa-clock"></i> {{ $feature->get_sm_created_at() }}</div>
					<p class="mt-2">
						{!! $feature->content !!}
					</p>
				</li>
			</ul>
		</div>
    <div class="col-md-6 offset-md-3">
      <div class="text-left">
        <a href="{{ route('dev_news') }}"><i class="fa fa-arrow-alt-circle-up"></i> Voir Plus</a>
      </div>
    </div>
	</div>
@endif
</div>
