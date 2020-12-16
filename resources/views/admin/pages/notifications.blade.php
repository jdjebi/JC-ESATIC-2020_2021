@extends('admin.base')

@section('main-content')
@include('flash')

<style>
  .notification-item-unread-indicator{
    width: 13px;
    height: 13px;
    background: none;
    border-radius: 50%!important;
    border: 1px solid #fff;
    position: absolute;
    top: -4px;
    left: 24px;
  }
  .notification-item-unread-indicator.notification-item-primary{
    background: #2196F3;
  }
  .bg-not-seen-at{
    background-color:#e1f5fe6e
  }
</style>

<main role="main" class="container-fluid">
  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Notifications Récentes</h6>
    @foreach(UserAuth()->notifications as $notification)
      @if($notification->data['verb'] == "admin.info.test")
      <div class="media pt-3 pl-2 pr-2 
        @if($notification->read_at != null)
        bg-light 
        @elseif($notification->seen_at == null)
        bg-not-seen-at
        @endif 
        border-bottom 
      ">
        <div class="mr-2 position-relative">
          <img src="{{ cdn_asset("imgs/icons/favicon-dark-32x32.png") }}">
          @if($notification->read_at == null)
            <div class="notification-item-unread-indicator notification-item-primary"></div>
          @endif
        </div>
        <div class="media-body pb-1 border-gray">
          <time class="float-right timeago small d-none text-muted " datetime="{{ $notification->created_at }}">{{ $notification->created_at }}</time>
          <p class="mb-0 lh-125">
            {{ $notification->data['message'] }}  
          </p>
          <div class="text-muted small text-right">
            @if($notification->read_at == null)
            <a href="{{ route("backend.notification.web.mark_as_read",["uuid" => $notification->id ]) }}" class="text-muted">Marquer comme lu</a>
            @else
            <span class="text-muted font-weight-bold">Lu</span>
            @endif
            &middot;
            <a href="#" class="text-muted">Supprimer</a>
          </div>
        </div>
      </div>
      @else
      <div class="media pt-3">
        <img mr-2 src="{{ cdn_asset("imgs/icons/favicon-dark-32x32.png") }}">
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">Notification inconnue</p>
      </div>
      @endif
    @endforeach
  </div>
</main>

@endsection

@section("scripts")
<script src="{{ cdn_asset("asset/js/timeago/jquery.timeago.js") }}"></script>
<script src="{{ cdn_asset("asset/js/timeago/jquery.timeago.fr-short-tiny.js") }}"></script>
<script>
$("time.timeago").timeago();
$("time.timeago").removeClass("d-none");
</script>
@endsection
