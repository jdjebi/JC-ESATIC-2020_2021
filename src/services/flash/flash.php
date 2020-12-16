<?php
class Flash{
  static public function add($message,$type="success",$permanent=false){
    if(!isset($_SESSION["notifications"]))
      $_SESSION["notifications"] = [];
      $_SESSION["notifications"][] = ["message" => $message,"type" => $type,"permanent" => $permanent];
  }

  static public function get(){
    $notifs = [];
    if(isset($_SESSION["notifications"])){
      $notifs = $_SESSION["notifications"];
    }

    foreach ($notifs as $notif) {

      if(!$notif["permanent"]){
        $_SESSION["notifications"] = [];
      }
    }

    return $notifs;

  }

  static public function get2(){
    $notifs = [];
    if(isset($_SESSION["notifications"])){
      $notifs = $_SESSION["notifications"];
    }
    return $notifs;
  }

  static public function clear(){
    $_SESSION["notifications"] = [];
  }
}

?>
