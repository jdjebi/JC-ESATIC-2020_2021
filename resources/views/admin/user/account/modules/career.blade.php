<div class="resac-account-module">
    <div class="module-card">
        <div class="module-header">
            Parcours
        </div>
        <div class="module-body">
            
            <h6>Promotion</h6>
            <div class="form-row mb-4">
                <div class="col-md-12 mb-3">
                    <label for="promo1">Année de début</label>
                    <input type="number" min="1945" max="2021" name="promo1" class="form-control" id="promo1" value="{{ $user->promo1 }}" disabled>
                </div>
                <div class="col-md-12 mb-3">
                <label for="promo2">Année de fin</label>
                <input type="number" min="1945" max="2021" name="promo2" class="form-control" id="promo2" value="{{ $user->promo2 }}" disabled>
                </div>
            </div>
        
            <h6>Etude et vie professionelle</h6>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="universite">Dernière université fréquentée</label>
                    <input type="text" name="universite" class="form-control" placeholder="Lycée Classique d'Abidjan" id="universite" value="{{ $user->universite }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="emploi">Emploi récent</label>
                    <input type="text" name="emploi" class="form-control" placeholder="Etudiant" id="emploi" value="{{ $user->emploi }}" disabled>
                </div>
            </div>
        </div>
    </div>
</div>