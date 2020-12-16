<?php

namespace Form\User\Update;
use App\Models\User;

require_once __DIR__."/Form.php";


class Info extends \Form{

  protected $states = ["valid" => "is-invalid","invalid" => "is-valid"];
  protected $required = ['nom','prenom','email'];
  protected $emails = ['email'];
  protected $integers = ['promo1','promo2'];

  public function clear_phone_number(){
    // Validation des numéros
    // $phone_number_regex = "/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/";
    $phone_number_regex = "/^[0-9\-\(\)\/\+\s]*$/";
    $numero = $this->data['numero'];
    if(!preg_match($phone_number_regex,$numero)){
      $this->errors['phone']['numero'] = true;
    }
  }

  public function clear_integers(){
    // Validation des entiers
    $integer_regex = "/^\d+$/";
    $promo1 = trim($this->data['promo1']);
    $promo2 = trim($this->data['promo2']);
    if(!empty($promo1) || !empty($promo2)){
      if( !empty($promo1) && !empty($promo2) ){
        $error = true;
        if(!preg_match($integer_regex,$promo1)){
          $this->errors['integer']['promo1'] = true;
        }
        if(!preg_match($integer_regex,$promo2)){
          $this->errors['integer']['promo2'] = true;
        }
      }else{
          $this->errors['double_required']['promo'] = true;
      }
    }
  }

  public function clear_promos(){
    // Validation de l'intervalle des valeurs de l'année
    $min = 1945;
    $max = 2021;
    $value1 = $this->data['promo1'];
    $value2 = $this->data['promo2'];
    if(!empty($value1)){
      if($value1 < $min || $value1 > $max){
        $this->errors['interval']['promo1.interval'] = true;
      }
    }
    if(!empty($value2)){
      if($value2 < $min || $value2 > $max){
        $this->errors['interval']['promo2.interval'] = true;
      }
    }
  }

  public function check_if_repeat($field,$val){
    // Vérifie si une valeur se repète plusieurs dans le table des utilisateur
    global $DB;
    $sql = "SELECT id FROM users WHERE $field = ?";
    $q = $DB->prepare($sql);
    $q->execute([$val]);
    $data = $q->fetchAll();
    return count($data) > 0;
  }

  public function validate(){
    $this->clear_phone_number();
    $this->clear_integers();
    $this->clear_promos();

    $user = \Users::auth2();
    $email = $this->data['email'];
    $numero = $this->data['numero'];

    // Validation de l'unicité de l'adresse E-mail
    if($user->email != $email && $this->check_if_repeat("email",$email)){
        $this->errors['repeat']['email'] = true;
    };

    // Validation de l'unicité du numéro de téléphone
    if($user->numero != $numero && $this->check_if_repeat("numero",$numero)){
        $this->errors['repeat']['numero'] = true;
    };

    $this->clear_data['email'] = $this->data['email'];
  }
}

class UserGeneralForm extends \Form{

  protected $states = ["valid" => "is-invalid","invalid" => "is-valid"];
  protected $required = ['id','nom','prenom','email','username'];
  protected $emails = ['email'];

  public function check_email($user){
    // Unicité de l'adresse E-mail
    if(!$this->isset('emails','email') && $this->data['email'] != $user->email){
      if(!\Users::email_is_unique($this->data['email']))
        $this->errors['uniques']['email'] = true;
    }
  }

  public function check_username($user){
    // Unicité du nom d'utilisateur
    if(!$this->isset('required','username') && $this->data['username'] != $user->username){
      if(!\Users::username_is_unique($this->data['username']))
        $this->errors['uniques']['username'] = true;
    }
  }

  public function validate(){
    $user = User::find($this->data['id']);
    $this->check_email($user);
    $this->check_username($user);
    $this->clear_data['email'] = $this->data['email'];
    $this->clear_data['username'] = $this->data['username'];
  }
}

class Password extends \Form{

  protected $required = ['pass','nw_pass','conf_pass'];

}

?>
