<div class="resac-account-module">
    <div class="module-card">
        <div class="module-header">
            Localisation
        </div>
        <div class="module-body">

            <div class="form-row">

                <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                    <label for="pays">Pays</label>
                    <select class="form-control" name="pays" id="pays" disabled>
                        @if(empty($user->pays))
                            <option selected>Aucun pays</option>
                        @else
                            <option selected>{{ $user->pays }}</option>
                        @endif
                    </select>
                </div>
        
                <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                    <label for="ville">Ville</label>
                    <input type="text" name="ville" class="form-control" id="ville" value="{{ $user->ville }}" disabled>
                </div>
        
                <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                    <label for="commune">Commune &middot Quartier</label>
                    <input type="text" name="commune" class="form-control" id="commune" value="{{ $user->commune }}" disabled>
                </div>
        
            </div>

        </div>
    </div>
</div>