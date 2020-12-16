

<div class="post-box" id="post-box-v1">
  <form action="" method="post">
    @csrf
    <div class="box border bg-white">
        <div class="header pl-4 pt-3 pb-3">
          <div class="header-post-message">
            <i class="fa fa-edit"></i> Publication
          </div>
        </div>
        <div class="body pl-4 pr-4 pb-3">
          <textarea class="form-control" id="post-area" rows="5" name="content" placeholder="Exprimez vous..."></textarea>
        </div>
        <div class="footer p-2 pr-4 border-top text-right">
          <button class="btn btn-sm btn-primary" type="submit" name="register-post">Publier</button>
        </div>
    </div>
  </form>
</div>
