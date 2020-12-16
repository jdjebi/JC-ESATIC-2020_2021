<?php

if(!isset($_SESSION['previous_url']))
  $_SESSION['previous_url'] = $_SERVER["REQUEST_URI"];

$CURRENT_URL = $_SERVER["REQUEST_URI"];
$PREVIOUS_URL = $_SESSION['previous_url'];

$_SESSION["previous_url"] = $CURRENT_URL;

class HTTP{
  static function previous_url(){
    global $PREVIOUS_URL;
    return $PREVIOUS_URL;
  }
}

?>
