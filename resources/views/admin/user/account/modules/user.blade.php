<div class="resac-account-module">
    <div class="module-card">
        <div class="module-header">
            Utilisateur
        </div>
        <div class="module-body">
            <form action="{{ route('backend.compte.general2') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control {{ $form->state('nom') }}" value="{{ $form->get("nom") }}" name="nom" id="nom">
                    <span class="text-danger small">{{ $form->get_error('required2','nom') }}</span>
                </div>
    
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control {{ $form->state('prenom') }}" value="{{ $form->get("prenom") }}" name="prenom" id="prenom">
                    <span class="text-danger small">{{ $form->get_error('required2','prenom') }}</span>
                </div>
    
                <div class="form-group">
                    <label for="username">Identifiant</label>
                    <input type="text" class="form-control {{ $form->state('username') }}" value="{{ $form->get("username") }}" name="username" id="username">
                    <span class="text-danger small">{{ $form->get_error('*','username') }}</span>
                </div>
            
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control {{ $form->state('email') }}" value="{{ $form->get("email") }}" name="email" id="email">
                    <span class="text-danger small">{{ $form->get_error('*','email') }}</span>
                </div>
                <div>
                    <button type="submit" name="change_info" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>