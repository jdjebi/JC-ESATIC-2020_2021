<?php

class Validators{

  public function validate_phone_number(){
    // Validation des numéros
    $phone_number_regex = "/^[0-9\-\(\)\/\+\s]*$/";
    foreach ($this->phones as $key) {
      $number = $this->data[$key];
      if(!empty($number)){
        if(!preg_match($phone_number_regex,$number)){
          $this->errors['phone'][$key] = true;
        }
      }
    }
  }

  public function validate_integers(){
    // Validation des entiers
    $integer_regex = "/^[0-9\-\(\)\/\+\s]*$/";
    foreach ($this->integers as $key) {
      $value = $this->data[$key];
      if(!empty($value)){
        if(!preg_match($integer_regex,$value)){
          $this->errors['integers'][$key] = true;
        }
      }
    }
  }

}

?>
