@extends('admin.base')

@section('main-content')
@include('flash')
<div class="mt-3 container-fluid">
    <div class="h3">Notifications</div>
    <div>
        <a href="{{ route("backend.notification.create") }}" class="btn btn-primary">Générer</a>
        <a href="{{ route("backend.notification.auth.delete.all") }}" class="btn btn-danger">Tout supprimer</a>
    </div>
    <hr>
    <div>
        <div class="h3">Reception</div>
        @foreach(UserAuth()->notifications as $notification)
            <div class="border p-2 mb-1 bg-white">
                <div>
                    <b>ID:</b> {{ $notification->id }}
                </div>
                <div>
                    <b>TYPE:</b> {{ $notification->type }}
                </div>
                <div>
                    <b>DATA:</b> {{ json_encode($notification->data) }}
                </div>
            </div>
        @endforeach
        <div>

        </div>
    </div>
</div>


@endsection

@section("scripts")

@endsection
