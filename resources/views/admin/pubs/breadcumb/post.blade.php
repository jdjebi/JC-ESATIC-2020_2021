<div class="nav-scroller shadow-sm">
    <nav id="resac-breadcrumb" aria-label="breadcrumb" >
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin_user_profil',['id' =>  $post->user_object->id]) }}">Moi</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.post.my_posts") }}">Mes publications</a></li>
            <li class="breadcrumb-item active" aria-current="page" >Publications #{{ $post->id }}</li>
        </ol>
    </nav>
</div>