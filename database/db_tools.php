<?php

class DB{
  
  static function check($table,$field,$value){

    global $DB;

    $sql = "SELECT * FROM $table WHERE $field = ?";

    $q = $DB->prepare($sql);
    $q->execute([$value]);

    $data = $q->fetchAll(PDO::FETCH_OBJ);

    if($data){
      return true;
    }else{
      return false;
    }
  }
}


?>
