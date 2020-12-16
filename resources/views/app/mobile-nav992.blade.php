<style>
.selector-holder{
    color: #5c6469;
    font-weight: 500;
} 
</style>
<footer id="mobile-nav" class="footer">
   <div id="buttonGroup" class="btn-group selectors" role="group" aria-label="Basic example">
      <button id="home" type="button" class="btn button-active">
         <div>
           <a class="selector-holder" href="{{ route('actu') }}">
             <i class="far fa-newspaper"></i>
             <span>Actualités</span>
           </a>
         </div>
      </button>
      <button id="feed" type="button" class="btn">
        <div>
          <a class="selector-holder" href="{{ route('annuaire') }}">
            <i class="fa fa-address-book"></i>
            <span>Annuaire</span>
          </a>
        </div>
      </button>
      <button id="create" type="button" class="btn button-inactive">
        <div>
          <a class="selector-holder" href="{{ route('profil') }}">
            <i class="fa fa-user-circle"></i>
            <span>Profil</span>
          </a>
        </div>
      </button>
      @if(Resac\Auth2::is_admin_logged())
        <button id="account" type="button" class="btn button-inactive">
           <div>
             <a class="selector-holder" href="{{ route('admin.users.index') }}">
               <i class="fa fa-tachometer-alt"></i>
               <span>Admin</span>
             </a>
           </div>
        </button>
      @endif
   </div>
</footer>
