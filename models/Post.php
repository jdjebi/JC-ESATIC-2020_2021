<?php

use Illuminate\Support\Facades\DB;

class Post extends Model {

  static public $table = "pub_v1";

  public $id;
  public $user;
  public $scope;
  public $type;
  public $date;
  public $content;
  public $version;

  /* Certification de validation */
  public $validate;
  public $validate_by;
  public $validate_at;

  public function __construct($data){
    global $DB;
    $this->db = $DB;

    $this->id = $data["id"];
    $this->user = Users::get($data["user"]);
    $this->user_id = $data["user"];
    $this->scope = $data["scope"];
    $this->type = $data["type"];
    $this->date = $data["date"];
    $this->content = $data["content"];
    $this->version = $data["version"];
    $this->validate = $data["validate"];
    $this->validate_by = $data["validate_by"];
    $this->validate_at = $data["validate_at"];

    /* Certification */
    // Instance du dernier utilisateur à l'origine de la dernière opération
    if($this->validate_by)
      $this->certificate_author = Users::get($this->validate_by);
    else
      $this->certificate_author = null;


  }

  static public function create($data){
    global $DB;
    $table = Post::$table;
    $sql = "INSERT INTO $table(user,content) VALUES(:user,:content)";
    $q = $DB->prepare($sql);
    $q->execute($data);
  }

  public function delete(){
    global $DB;
    $table = Post::$table;
    $sql = "DELETE FROM $table WHERE id = $this->id";
    $q = $DB->prepare($sql);
    $q->execute();
  }

  public function get_certificate_author(){
    // Retourne le nom utilisateur à l'origine de la dernière opération de certification
    return $this->certificate_author->get_complete_name();
  }

  static public function get($id){
    /* Le retour de données multiple n'est pas géré */
    global $DB;
    $table = Post::$table;
    $sql = "SELECT * FROM $table WHERE id = $id";
    $q = $DB->prepare($sql);
    $q->execute();
    $data = $q->fetch();
    if($data){
      return new Post($data);
    }
    return null;
  }

  static function get2($id){
    return DB::table('pub_v1')->where('id',$id)->first();
  }

  static function all(){
    global $DB;
    $table = Post::$table;
    $sql = "SELECT * FROM $table ORDER BY date DESC";
    $q = $DB->prepare($sql);
    $q->execute();
    $posts_data = $q->fetchAll();
    $posts = [];

    foreach ($posts_data as $data) {
      $posts[] = new Post($data);
    }
    return $posts;
  }

  static function all2(){
    $posts = DB::table('pub_v1')->get();
    return \Post::pack_all($posts);
  }

  static function pack_all($posts){
    $tmp_posts = [];
    foreach ($posts as $post)
      $tmp_posts[] = Post::pack($post);
    return $tmp_posts;
  }

  static function pack($post){

    $user = \Users::get($post->user);

    $tmp_post = [
      "id" => $post->id,
      "user" => \Users2::pack($user),
      "content" => $post->content,
      "date" =>  $post->date,
      "validate" => $post->validate,
    ];

    return $tmp_post;
  }

  /* Using DB  */

  static function certificate($post_id,$user_id){
    DB::table('pub_v1')
    ->where('id',$post_id)
    ->update([
      "validate" => true,
      "validate_by" => $user_id,
      "validate_at"  => new \DateTime()
    ]);
  }

  static function cancel_certificate($post_id,$user_id){
    DB::table('pub_v1')
    ->where('id',$post_id)
    ->update([
      "validate" => false,
      "validate_by" => $user_id,
      "validate_at"  => new \DateTime()
    ]);
  }

}

?>
