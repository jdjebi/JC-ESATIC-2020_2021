<?php

use App\RESAC\Core\Forms\FormError;

require_once __DIR__."/Form.php";

class RegisterForm extends Form{

  protected $required = ['nom','prenom','email','password','conf_password'];

  protected $emails = ['email'];

  protected $equals = [['password','conf_password']];

  public function __construct($data){
    $this->data = $data;
  }

  public function check_email(){
    // Unicité de l'adresse E-mail
    if(!$this->isset('emails','email')){
      if(!Users::email_is_unique($this->data['email']))
        $this->errors['uniques']['email'] = true;
    }
  }

  public function validate(){
    $this->check_email();
    $this->clear_data['email'] = $this->data['email'];
  }
}

class RegisterForm2 extends Form{

  protected $required = ['nom','prenom','email','password','conf_password','username'];

  protected $emails = ['email'];

  protected $equals = [['password','conf_password']];

  public function __construct($data){
    $this->data = $data;
  }

  public function check_email(){
    // Unicité de l'adresse E-mail
    if(!$this->isset('emails','email')){
      if(!Users::email_is_unique($this->data['email']))
        $this->errors['uniques']['email'] = true;
    }
  }

  public function check_username(){
    // Unicité du nom d'utilisateur
    if(!$this->isset('required','username')){
      if(!Users::username_is_unique($this->data['username']))
        $this->errors['uniques']['username'] = true;
    }
  }

  public function validate(){
    $this->check_email();
    $this->check_username();
    $this->clear_data['email'] = $this->data['email'];
    $this->clear_data['username'] = $this->data['username'];
  }
}

class AdminRegisterForm extends Form{

  protected $required = ['password','conf_password','login_code'];

  protected $emails = ['email'];

  protected $equals = [['password','conf_password']];

  public function __construct($data){
    $this->data = $data;
  }

  public function check_email(){
    // Unicité de l'adresse E-mail
    if(!$this->isset('emails','email')){
      if(!Users::email_is_unique($this->data['email']))
        $this->errors['uniques']['email'] = true;
      else
        $this->clear_data['email'] = $this->data['email'];
    }
  }

  public function check_username(){
    // Unicité du nom d'utilisateur
    if(!$this->isset('required','username')){
      if(!Users::username_is_unique($this->data['username']))
        $this->errors['uniques']['username'] = true;
      else
        $this->clear_data['username'] = $this->data['username'];
    }
  }

  public function check_login_code(){
    // Unicité du code de connexion
    if(!$this->isset('required','login_code')){
      if(!Users::login_code_is_unique($this->data['username']))
        $this->errors['uniques']['login_code'] = true;
      else
        $this->clear_data['login_code'] = $this->data['login_code'];
    }
  }

  public function validate(){
    $this->check_email();
    $this->check_username();
    $this->check_login_code();
  }

  public function collect_errors(){

    $form = $this;

    if($form->isset('required2','nom')){
      $form->add_error('nom',FormError::empty_field);
    }
    if($form->isset('required2','prenom')){
      $form->add_error('prenom',FormError::empty_field);
    }

    if($form->isset('required2','login_code')){
      $form->add_error('login_code',FormError::empty_field);
    }else if($form->isset('uniques','email')){
      $form->add_error('login_code',FormError::login_code_unique);
    }

    if($form->isset('required2','email')){
      $form->add_error('email',FormError::empty_field);
    }else if($form->isset('emails','email')){
      $form->add_error('email',FormError::email_format);
    }else if($form->isset('uniques','email')){
      $form->add_error('email',FormError::email_unique);
    }

    if($form->isset('required2','password')){
      $form->add_error('password',"Veuillez renseigner un mot de passe.");
    }else if($form->isset('equals','password')){
      $form->add_error('password',"Les mots de passe sont différents.");
    }

    if($form->isset('required2','username')){
      $form->add_error('username',FormError::empty_field);
    }else if($form->isset('uniques','username')){
      $form->add_error('username',FormError::username_unique);
    }

    if($form->isset('equals','password')){
      $form->add_error('password',"Les mots de passe sont différents.");
    }
  }

}
?>
