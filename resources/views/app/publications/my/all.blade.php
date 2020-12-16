@foreach ($posts as $post)

  <div class="row">
    <div class="col-sm-12 col-md-7">
      @foreach ($posts as $key => $post)

        @include("app.publications.templates.post")

      @endforeach
    </div>
  </div>

@endforeach
