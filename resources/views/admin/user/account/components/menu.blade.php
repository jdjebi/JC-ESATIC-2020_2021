<nav class="menu mb-3 resac-linkedin-shadow">
    <div class="menu-heading text-center">
        <div>
            <img id="account-user-photo" class="avatar avatar-user mr-2 mb-1" src="{{ photos_cdn_asset($user) }}" width="80" height="80" alt="{{ $user->fullname }}">
        </div>
        <div class="text-gray-dark text-bold css-truncate css-truncate-target mb-1">{{ $user->fullname }}</div>
        <div class="f6 text-gray text-normal mb-2">{{ $user->staff_role }} &middot; {{ $user->type }}</div>
        <div class="f6 text-gray text-normal">Inscris depuis le {{ $user->created_at }}</div>
    </div>
</nav>