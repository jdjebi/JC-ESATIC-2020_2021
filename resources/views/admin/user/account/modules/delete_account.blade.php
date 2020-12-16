<div class="resac-account-module">
    <div class="module-card">
        <div class="module-header text-danger">
            Zone dangereuse
        </div>
        <div class="module-body">
            @if(UserAuth()->id != $user->id)
                <button id="btn-delete-user" class="btn btn-danger">Supprimer le compte</button>
            @else
                <p>
                    Vous ne pouvez pas supprimer votre propre compte
                </p>
                <button class="btn btn-danger disabled">Supprimer le compte</button>
            @endif
        </div>
    </div>
</div>