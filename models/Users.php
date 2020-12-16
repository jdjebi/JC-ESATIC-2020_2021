<?php

use Illuminate\Support\Facades\DB;

class Users{

  private $db;

  public $id;
  public $nom;
  public $prenom;
  public $email;
  public $date_inscription;
  public $active;
  public $password;

  /* v2 - resac-v2 */
  public $promo1;
  public $promo2;

  // Numéros
  public $numero;

  // Lieu d'habitation
  public $pays;
  public $ville;
  public $commune;

  // Université et Emploi
  public $emploi;
  public $universite;

  // Liens
  public $linkedin;
  public $facebook;
  public $instagram;

  // Role et droit
  public $is_staff;
  public $staff_role;

  // Version
  public $version;

  public $photo;

  public function __construct($data){
    global $DB;
    $this->db = $DB;

    $this->id = $data["id"];
    $this->password = $data["password"];
    $this->active = $data["active"];
    $this->date_inscription = $data["date_inscription"];

    // Général
    $this->nom = $data["nom"];
    $this->prenom = $data["prenom"];
    $this->email = $data["email"];
    $this->numero = $data["numero"];

    // Lieu d'habitation
    $this->pays = $data["pays"];
    $this->ville = $data["ville"];
    $this->commune = $data["commune"];

    // Parcours
    $this->promo1 = $data["promo1"];
    $this->promo2 = $data["promo2"];

    $this->emploi = $data["emploi"];
    $this->universite = $data["universite"];

    // Role et droit
    $this->is_staff = $data["is_staff"];
    $this->staff_role = $data["staff_role"];

    // Version
    $this->version = $data["version"];

    // Photo
    $this->photo = $data["photo"];
  }

  static function auth(){
    return Users::get(Auth::user());
  }

  static function auth2(){
    return \Illuminate\Support\Facades\Auth::user();
  }

  static public function get($id){
    /* Le retour de données multiple n'est pas géré */
    global $DB;
    $sql = "SELECT * FROM users WHERE id = $id";
    $q = $DB->prepare($sql);
    $q->execute();
    $data = $q->fetch();

    if($data){
      return new Users($data);
    }
    return null;
  }

  static function all(){
    global $DB;
    $sql = "SELECT * FROM users";
    $q = $DB->prepare($sql);
    $q->execute();
    $data = $q->fetchAll();
    $users = [];
    foreach ($data as $user_data) {
      $users[] = new Users($user_data);
    }
    return $users;
  }

  static public function create($data){
    global $DB;
    $sql = "INSERT INTO users(nom,prenom,email,password,version) VALUES(:nom,:prenom,:email,:password,:version)";
    $q = $DB->prepare($sql);
    $q->execute($data);
  }

  static public function email_is_unique($email){
    global $DB;
    $q = $DB->prepare("SELECT id FROM users WHERE email = ?");
    $q->execute([$email]);
    if($q->fetch())
      return false;
    else
      return true;
  }

  static public function username_is_unique($username){
    global $DB;
    $q = $DB->prepare("SELECT id FROM users WHERE  username = ?");
    $q->execute([$username]);
    if($q->fetch())
      return false;
    else
      return true;
  }

  static public function login_code_is_unique($login_code){
    global $DB;
    $q = $DB->prepare("SELECT id FROM users WHERE  login_code = ?");
    $q->execute([$login_code]);
    if($q->fetch())
      return false;
    else
      return true;
  }

  public function delete(){
    $sql = "DELETE FROM users WHERE id = $this->id";
    $q = $this->db->prepare($sql);
    $q->execute();
  }

  public function save(){
    $sql = "
      UPDATE users SET
      nom = :nom,
      prenom = :prenom,
      email = :email,
      numero = :numero,
      pays = :pays,
      ville = :ville,
      commune = :commune,
      promo1 = :promo1,
      promo2 = :promo2,
      password = :password,
      universite = :universite,
      emploi = :emploi,
      is_staff = :is_staff,
      staff_role = :staff_role,
      photo = :photo,
      WHERE id = :id
    ";

    $q = $this->db->prepare($sql);

    $q->execute([
      "id" => $this->id,
      "nom" => $this->nom,
      "prenom" => $this->prenom,
      "email" => $this->email,
      "numero" => $this->numero,
      "pays" => $this->pays,
      "ville" => $this->ville,
      "commune" => $this->commune,
      "promo1" => $this->promo1,
      "promo2" => $this->promo2,
      "password" => $this->password,
      "universite" => $this->universite,
      "emploi" => $this->emploi,
      "is_staff" => $this->is_staff,
      "staff_role" => $this->staff_role,
      "photo" => $this->photo
    ]);

  }

  public function get_photo(){

    if($this->photo == null)
      return "asset/imgs/user_default_pic.png";
    else
      return "storage/{$this->photo}";
  }

  public function get_complete_name(){
    return $this->nom.' '.$this->prenom;
  }

  public function get_promo(){
    return empty($this->promo1) || empty($this->promo2) ? "xxxx-xxxx" : $this->promo1.'-'.$this->promo2;
  }

  public function get_universite(){
    return empty($this->universite) ? "LCA" : $this->universite;
  }

  public function get_emploi(){
    return empty($this->emploi) ? "Etudiant" : $this->emploi;
  }

  public function get_pays(){
    return empty($this->pays) ? \Country::get("CI") : \Country::get($this->pays);
  }

  public function get_staff_role(){
    if($this->staff_role == "admin"){
      return "Administrateur";
    }else if($this->staff_role == "member"){
      return "Membre";
    }else{
      return "Membre";
    }
  }


  static function all_min(){
    global $DB;
    $sql = "SELECT * FROM users";
    $q = $DB->prepare($sql);
    $q->execute();
    $data = $q->fetchAll();
    $users = [];

    foreach ($data as $user_data) {
      $user = new Users($user_data);

      $users[] = [
        'id' => $user->id,
        'nom' => $user->nom,
        'prenom' => $user->prenom,
        'promo' => $user->get_promo(),
        'universite' => $user->get_universite(),
        'emploi' => $user->get_emploi(),
        'pays' => \Country::get($user->pays),
        'role' => $user->get_staff_role(),
        'photo' => photos_cdn_asset($user),
        'version' => $user->version, 
        'profil_url' => route('profil')."?id=".$user->id,
        'admin_profil_url' => route('admin_user_profil',['user_id' => $user->id])
      ];
    }

    return $users;
  }

}

class Users2{

  private $db;

  public $id;
  public $nom;
  public $prenom;
  public $email;
  public $date_inscription;
  public $active;
  public $password;

  /* v2 - resac-v2 */
  public $promo1;
  public $promo2;

  // Numéros
  public $numero;

  // Lieu d'habitation
  public $pays;
  public $ville;
  public $commune;

  // Université et Emploi
  public $emploi;
  public $universite;

  // Liens
  public $linkedin;
  public $facebook;
  public $instagram;

  // Role et droit
  public $is_staff;
  public $staff_role;

  public function __construct($data){
    global $DB;
    $this->db = $DB;

    $this->id = $data->id;
    $this->password = $data->password;
    $this->active = $data->active;
    $this->date_inscription = $data->date_inscription;

    // Général
    $this->nom = $data->nom;
    $this->prenom = $data->prenom;
    $this->email = $data->email;
    $this->numero = $data->numero;

    // Lieu d'habitation
    $this->pays = $data->pays;
    $this->ville = $data->ville;
    $this->commune = $data->commune;

    // Parcours
    $this->promo1 = $data->promo1;
    $this->promo2 = $data->promo2;

    $this->emploi = $data->emploi;
    $this->universite = $data->universite;

    // Role et droit
    $this->is_staff = $data->is_staff;
    $this->staff_role = $data->staff_role;
  }


  static public function get($id){
    $user_data = DB::table('users')->where('id', $id)->first();

    if($user_data)
      return new Users2($user_data);
    else
      return null;
  }

  static function all(){
    return DB::table('users')->get();
  }

  static function pack($user){

    $user = [
      'id' => $user->id,
      'nom' => $user->nom,
      'prenom' => $user->prenom,
      'promo' => $user->get_promo(),
      'universite' => $user->get_universite(),
      'emploi' => $user->get_emploi(),
      'pays' => \Country::get($user->pays),
      'role' => $user->get_staff_role(),
      'photo' => asset($user->get_photo()),
      'profil_url' => route('profil')."?id=".$user->id,
      'admin_profil_url' => route('admin_user_profil',['user_id' => $user->id])
    ];

    return $user;
  }


  public function get_photo(){
    return asset("asset/imgs/user_default_pic.png");
  }

  public function get_complete_name(){
    return $this->nom.' '.$this->prenom;
  }

  public function get_promo(){
    return empty($this->promo1) || empty($this->promo2) ? "xxxx-xxxx" : $this->promo1.'-'.$this->promo2;
  }

  public function get_universite(){
    return empty($this->universite) ? "LCA" : $this->universite;
  }

  public function get_emploi(){
    return empty($this->emploi) ? "Etudiant" : $this->emploi;
  }

  public function get_pays(){
    return empty($this->pays) ? \Country::get("CI") : \Country::get($this->pays);
  }

  public function get_staff_role(){
    if($this->staff_role == "admin"){
      return "Administrateur";
    }else if($this->staff_role == "member"){
      return "Membre";
    }else{
      return "Membre";
    }
  }

}


?>
