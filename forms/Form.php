<?php

class Form{
  /*
    v2

    La version du formulaire implémente la logique de la version précédente

    Les données optionelles ne sont pas automatiquement ajouté au clear_data

  */

  protected $is_validate = true;
  protected $already_validate = false;
  protected $data = [];
  protected $clear_data = [];
  protected $required = [];
  protected $emails = [];
  protected $equals = [];
  protected $selects = [];
  protected $types = ['required2','emails','uniques','repeat','selects','phone'];

  public $errors = [];

  public function __construct($data = [], $default_data = []){
    $this->data = $data;
    $this->set_default($default_data);
  }

  public function validate(){}

  public function validate_emails(){
    // Validation du format: Adresse E-mail
    foreach ($this->emails as $key) {
      $email = $this->data[$key];
      if(!empty($email)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $this->clear_data[$key] = $this->data[$key];
        }else{
          $this->errors['emails'][$key] = true;
          $this->clear_data[$key] = "";
        }
      }
    }
  }

  public function validate_equals(){
    // Validation des valeurs égales - Comparaison égalitaire de deux valeurs
    foreach ($this->equals as $tuple) {
      $key1 = $tuple[0];
      $key2 = $tuple[1];
      $val1 = $this->data[$key1];
      $val2 = $this->data[$key2];
      if($val1 != $val2){
        $this->errors['equals'][$key1] = true;
        $this->clear_data[$key1] = "";
        $this->clear_data[$key2] = "";
      }else{
        $this->clear_data[$key1] = $val1;
        $this->clear_data[$key2] = $val2;
      }
    }
  }

  public function validate_select(){
    // Validation des champs de type select
    foreach ($this->selects as $items) {
      $key = $items["key"];
      $value = $this->clear_data[$key];
      if(!empty($value)){
        $array = $items["array"];
        if(!in_array($value,$array)){
          $this->errors['selects'][$key] = true;
        }
      }
    }
  }

  public function auto_validate(){
    $this->validate_emails();
    $this->validate_equals();
    $this->validate_select();
  }

  public function set_default($data){
    foreach ($data as $key => $value) {
      $this->clear_data[$key] = trim($value);
    }
  }

  public function check_required(){
    // On ajoute toute les valeurs au valeurs propres

    foreach ($this->data as $key => $value) {
      $this->clear_data[$key] = trim($value);
    }
    // On traite le cas des valeurs manquantes
    foreach ($this->required as $key) {
      if(!array_key_exists($key,($this->data)) or empty(trim($this->data[$key])) ){
        $this->errors["required2"][$key] = true;
        $this->errors['required'] = true;
      }
    }

  }

  public function is_validate(){

    $this->already_validate = true;

    if($this->data){

      // Validation des champs requis
      $this->check_required();

      // Validation de tous les champs
      if(!$this->is_errors()){
          $this->auto_validate();
          $this->validate();
          if($this->is_errors()){
            $this->is_validate = false;
          }
      }else{
        $this->is_validate = false;
      }
    }else{
      $this->is_validate = false;
    }
    return $this->is_validate;
  }

  public function is_errors(){
    return count($this->errors) > 0;
  }

  public function isset($type,$key){
    // Vérifie s'il y'a une erreur sur un champ
    if($type == '*'){
      foreach($this->types as $t){
        if(isset($this->errors[$t][$key]))
          return true;
      }
      return false;
    }else{
      return isset($this->errors[$type][$key]);
    }
  }

  public function get($key){
    if(array_key_exists($key,$this->clear_data)){
        return $this->clear_data[$key];
    }else{
      return "";
    }
  }

  public function get_errors(){
    return $this->errors;
  }

  public function get_error($type,$key){
    if($this->is_err_messages()){
      $error_messages = $this->errors['messages'];
      if($this->isset($type,$key) && array_key_exists($key,$error_messages)){
        return $error_messages[$key];
      }else{
        return "";
      }
    }else{
      return "";
    }
  }

  public function get_data(){
    return $this->clear_data;
  }

  public function add_error($field,$message){
    $this->errors[$field] = true;
    $this->errors["messages"][$field] = $message;
  }

  public function add_error2($tag,$message){
    $elm = explode('.',$tag);
    $this->errors[$elm[0]] = true;
    $this->errors["messages"][$elm[0].'2'][$elm[1]] = $message;
  }


  /* New */
  protected function is_err_messages(){
    return isset($this->errors['messages']);
  }

  public function is_err($field){
    return isset($this->errors[$field]);
  }

  public function state($field){
    /* Retourne l'état d'un champ  */
    if($this->already_validate && $this->is_errors()){
      return $this->is_err($field) ? $this->states['valid'] : $this->states['invalid'];
    }else{
      return "";
    }
  }

  public function register_array($key,$array){
    $this->selects[] = [
      "key" => $key,
      "array" => $array
    ];
  }

  public function export_results(){
    return [
      "vars" => [
        "already_validate" =>  $this->already_validate
      ],

      "errors" => $this->get_errors(),
      "clear_data" => $this->get_data()
    ];
  }

  public function import_data($form){
    $this->errors = $form["errors"];
    $this->clear_data = $form["clear_data"];
    $this->already_validate = $form["vars"]["already_validate"];
  }
  
}
?>
