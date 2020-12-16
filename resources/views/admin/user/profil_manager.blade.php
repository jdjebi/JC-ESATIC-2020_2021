<div class="row">
  <div class="col-sm-12 p-2 pt-5">
    <div class="h2">Gestion</div>
    <hr>

    <form method="post">
      @csrf
      <div class="form-group">
        <label for="role">Rôle</label>
        <select class="form-control" name="role" value="" id="role">
            <option value="admin" <?= $user_visited->staff_role_code == "admin" ? "selected" : "" ?>>Administrateur</option>
            <option value="member" <?= $user_visited->staff_role_code == "member" ? "selected" : "" ?>>Membre</option>
        </select>
      </div>
      <button class="btn btn-primary" type="submit" name="button">Enregistrer</button>
    </form>

  </div>
  <div class="col-sm-12">
    <hr>
    <div class="bg-white p-2 resac-linkedin-shadow">
      <a href="#">
        <div class="h5 font-weight-bold"><i class="fa fa-cogs"></i> Paramètre du compte</div>
      </a>
    </div>
  </div>
</div>
